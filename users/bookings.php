<?php
    require "../config/config.php";
    require "../libs/App.php";
    require "../includes/header.php";
?>
<?php

    if(!isset($_SESSION['user_id'])){
        echo "<script>window.location.href='".APPURL."' </script>";
    }

    $app = new App;    
    $query = "SELECT * FROM bookings WHERE user_id='$_SESSION[user_id]'";
    $bookings = $app->selectAll($query);
    $booking_counter = $app->selectSingle("SELECT COUNT(*) AS total FROM bookings");


?>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Bookings</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo APPURL; ?>/users/bookings.php?id=<?php echo $_SESSION['user_id']; ?>">Bookings</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Service Start -->
            <div class="container">
                <?php if($booking_counter->total >0): ?>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Booking Date</th>
                            <th scope="col">Number of people</th>
                            <th scope="col">Special Request</th>
                            <th scope="col">Status</th>
                            <th scope="col">Review</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php foreach($bookings as $booking): ?>        
                            <tr>
                                <td><?php echo $booking->name;?></td>
                                <td><?php echo $booking->email; ?></td>
                                <td><?php echo $booking->date_booking;?></td>
                                <td><?php echo $booking->num_people; ?></td>
                                <td><?php echo $booking->special_request;?></td>
                                <td><?php echo $booking->status; ?></td>
                                <?php if($booking->status == 'Confirmed'): ?>
                                    <td><a class="btn btn-success text-white" href="<?php echo APPURL;?>/users/review.php">Review us</td>
                                <?php else: ?>
                                <?php endif; ?>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                      </table>
                </div>
                <?php else: ?>
                <div class="col-md-12">
                    <h1>You don't have any booking</h1>
                </div>
                <?php endif; ?>
            </div>
        <!-- Service End -->
        

        <!-- Footer Start -->
        <?php require "../includes/footer.php"; ?>  