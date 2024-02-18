<?php
    require "../config/config.php";
    require "../libs/App.php";
    require "../includes/header.php";
?>
<?php 
    if(!isset($_SERVER['HTTP_REFERER'])){
        echo "<script>window.location.href='".APPURL."' </script>";
        exit;
    }
?> 
<?php 
            $app = new App;
            if(isset($_POST['submit'])){
                //<?php echo $_SESSION['username'] 
                $name = $_SESSION['username'];
                $email = $_SESSION['email'];
                $block = $_POST['block'];
                $phone_number = $_POST['phone'];
                $comment = $_POST['comment'];
                $total_price  = $_SESSION['total_price'];
                $user_id = $_SESSION['user_id'];
        
                $query = "INSERT INTO orders(name, email, block, phone_number,comment,total_price, user_id) VALUES(:name, :email, :block, :phone_number, :comment, :total_price, :user_id)";
                $query_delete = "DELETE FROM cart ";
        
                $arr = [
                    ":name" => $name,
                    ":email" => $email,
                    ":block" => $block,
                    ":phone_number" => $phone_number,
                    ":comment" => $comment,
                    ":total_price" => $total_price,
                    ":user_id" => $user_id,  
                ];
                $app->deleteCart($query_delete);
                $path = "confirm-order.php";
                $app->insert($query, $arr, $path);
            }
?>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Checkout</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Checkout</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Service Start -->
            <div class="container">
                
                <div class="col-md-12 bg-dark">
                    <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">Reservation</h5>
                        <h1 class="text-white mb-4">Checkout</h1>
                        <form  class="col-md-12" method="post" action="checkout.php">
                            <div class="row g-3">
                                <!-- <div class="col-md-12">
                                    <div class="form-floating">
                                        <input name="name" type="text" class="form-control" id="name" placeholder="Your Name">
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input name="email" type="email" class="form-control" id="email" placeholder="Your Email">
                                        <label  for="email">Your Email</label>
                                    </div>
                                </div> -->
                               
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input name="block" type="number" min="1" max="100"
                                        class="form-control" id="block_no" placeholder="Block Number">
                                        <label for="block_no">Block Number</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-floating">
                                        <input name="phone" type="text" class="form-control" id="email" placeholder="Phone number">
                                        <label for="text">Phone number</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea name="comment" class="form-control" placeholder="Comment" id="message" style="height: 100px"></textarea>
                                        <label for="message">Comment</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button  class="btn btn-primary w-100 py-3" name="submit" type="submit">Order Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        <!-- Service End -->
        

        <!-- Footer Start -->
        <?php require "../includes/footer.php"; ?>