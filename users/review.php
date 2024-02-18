<?php
    require "../config/config.php";
    require "../libs/App.php";
    require "../includes/header.php";
?>

<?php 
            if(isset($_POST['submit'])){
                //<?php echo $_SESSION['username'] 
                $review = $_POST['review'];
                $username = $_SESSION['username'];
               
        
                $query = "INSERT INTO reviews(review, username) VALUES(:review, :username)";
        
                $arr = [
                    ":review" => $review,
                    ":username" => $username,
                ];
                $path = "orders.php";
                $app->insert($query, $arr, $path);
            }
?>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Review Our Service </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Review </a></li>
                            <!-- <li class="breadcrumb-item text-white active" aria-current="page">Booking</li> -->
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Reservation Start -->
        <div class="container-xxl py-5 px-0 wow fadeInUp" data-wow-delay="0.1s">
            <div class="row g-0">
                <div class="col-md-6">
                    <div class="video">
                        <button type="button" class="btn-play" data-bs-toggle="modal" data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                            <span></span>
                        </button>
                    </div>
                </div>
                <div class="col-md-6 bg-dark d-flex align-items-center">
                    <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">Review</h5>
                        <h1 class="text-white mb-4">Review our Service</h1>
                        <form method="post" action="review.php">
                            <div class="row g-3">
                                    <div class="form-floating">
                                        <textarea name="review" class="form-control" placeholder="submit review" id="message" style="height: 100px; resize:none;"></textarea>
                                        <label for="message">Review us </label>
                                    </div>
                            </div>
                                <div class="col-12">
                                    <button name="submit" class="btn btn-primary w-100 py-3" style="margin-top: 10px;" type="submit">Review Now</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- 16:9 aspect ratio -->
                        <div class="ratio ratio-16x9">
                            <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
                                allow="autoplay"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Reservation Start -->
        
<?php require "../includes/footer.php"; ?>
