<?php
    require "../config/config.php";
    require "../libs/App.php";
    require "../includes/header.php";
?>

<?php

        // if(!isset($_SERVER['HTTP_REFERER'])){
        //         header('location: http://localhost/stafflounge/index.php');
        //         exit;
        // }
?> 


        <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown text-white"> Confirmation Order </h1>
                    <!-- <p class="lead">
                        We accepted Your Order and your order will be there in 30 minutes!
                    </p> -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                        <a href="<?php echo APPURL; ?>" class="btn btn-primary">Go Home</a>
                        </ol>
                    </nav>
                </div>

        </div>
        <div class="col-lg-12 text-center my-5 pt-5 pb-4">
                        <!-- <h5 class="section-title ff-secondary text-start text-primary fw-normal">About Us</h5> -->
                        <h1 class="mb-4"><i class="fa fa-utensils text-primary me-2"></i>Staff Lounge</h1>
                        <p class="mb-4">We accepted Your Order and your order will be there in 30 minutes!</p>
                        <!-- <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p> -->
                        <a class="btn btn-primary py-3 px-5 mt-2" href="<?php echo APPURL; ?>/menu.php">Go Menu</a>
         </div>
    </div>

<?php require "../includes/footer.php"; ?>