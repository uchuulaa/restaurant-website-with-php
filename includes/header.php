<?php
    $app = new App;
    $app->startingSession();
    define("APPURL", "http://localhost/stafflounge");
    define("ADMIN", "http://localhost/stafflounge/admin-panel");
    define("APPIMAGE", "http://localhost/stafflounge/admin-panel/foods-admins/foods-image");
?>
<?php 
            $query = "SELECT * FROM admins";
            $admins= $app->selectAll($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>AASTU Staff Lounge</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href=" <?php echo APPURL; ?>/lib/animate/animate.min.css" rel="stylesheet">
    <link href=" <?php echo APPURL; ?>/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?php echo APPURL; ?>/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo APPURL; ?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?php echo APPURL; ?>/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="<?php echo APPURL;?>" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>STAFF LOUNGE</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <?php if(isset($_SESSION['username'])) : ?>
                        <?php foreach($admins as $admin ): ?>
                        <?php if($admin->username == $_SESSION['username'] && $admin->email == $_SESSION['email']):?>
                            <a href="<?php echo ADMIN;?>" class="nav-item nav-link">Admin Panel</a>
                        <?php endif; ?>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        <a href="<?php echo APPURL;?>" class="nav-item nav-link">Home</a>
                        <a href="<?php echo APPURL;?>/about.php" class="nav-item nav-link">About</a>
                        <a href="<?php echo APPURL;?>/service.php" class="nav-item nav-link">Service</a>
                        <a href="<?php echo APPURL;?>/menu.php" class="nav-item nav-link">Menu</a>
                        <a href="<?php echo APPURL;?>/contact.php" class="nav-item nav-link">Contact</a>
                        <?php if(isset($_SESSION['username'])) : ?>
                        <a href="<?php echo APPURL;?>/food/cart.php" class="nav-item nav-link"><i class="fa-sharp fa-solid fa-cart-shopping"></i>Cart</a>
                        <a href="<?php echo APPURL;?>/booking.php" class="nav-item nav-link" >Book Table</a>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo $_SESSION['username'] ?>
                                <!-- <?php echo $_SESSION['user_id'] ?> -->
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="<?php echo APPURL;?>/users/bookings.php">Booking</a></li>
                                <li><a class="dropdown-item" href="<?php echo APPURL;?>/users/orders.php">Orders</a></li>
                                <li><a class="dropdown-item" href="<?php echo APPURL ?>/auth/logout.php">Log out</a></li>
                            </ul>
                            </li>
                      
                        <?php else: ?>
                        <a href="<?php echo APPURL;?>/auth/login.php" class="nav-item nav-link">Login</a>
                        <a href="<?php echo APPURL;?>/auth/register.php" class="nav-item nav-link">Register</a>
                        <?php endif; ?>
                    </div>
                   
                </div>
            </nav>