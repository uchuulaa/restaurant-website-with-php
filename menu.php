<?php
    require "config/config.php";
    require "libs/App.php";
    require "includes/header.php";


    $app = new App;

    //taking breakfast menu from data base
    $query_breakfast = "SELECT * FROM foods WHERE meal_id=1";
    $meals_1 = $app->selectAll($query_breakfast);
    //taking launch menu from database
    $query_launch = "SELECT * FROM foods WHERE meal_id=2";
    $meals_2 = $app->selectAll($query_launch);
    //taking dinner from data base
    $query_dinner = "SELECT * FROM foods WHERE meal_id=3";
    $meals_3 = $app->selectAll($query_dinner);

    $meal1_counter = $app->selectSingle("SELECT COUNT(*) AS total FROM foods WHERE meal_id = 1");
    $meal2_counter = $app->selectSingle("SELECT COUNT(*) AS total FROM foods WHERE meal_id = 2");
    $meal3_counter = $app->selectSingle("SELECT COUNT(*) AS total FROM foods WHERE meal_id = 3");
?>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Food Menu</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="<?php echo APPURL;?>">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Menu</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Menu Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Food Menu</h5>
                    <h1 class="mb-5">Most Popular Items</h1>
                </div>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                    <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill" href="#tab-1">
                                <i class="fa fa-coffee fa-2x text-primary"></i>
                                <div class="ps-3">
                                    <small class="text-body">Popular</small>
                                    <h6 class="mt-n1 mb-0">Breakfast</h6>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#tab-2">
                                <i class="fa fa-hamburger fa-2x text-primary"></i>
                                <div class="ps-3">
                                    <small class="text-body">Special</small>
                                    <h6 class="mt-n1 mb-0">Launch</h6>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill" href="#tab-3">
                                <i class="fa fa-utensils fa-2x text-primary"></i>
                                <div class="ps-3">
                                    <small class="text-body">Lovely</small>
                                    <h6 class="mt-n1 mb-0">Dinner</h6>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                                <?php if($meal1_counter->total > 0): ?>
                                <?php foreach($meals_1 as $meal_1) :?>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="<?php echo APPIMAGE ?>/<?php echo $meal_1->image;?>" alt="" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span><?php echo $meal_1->name; ?></span>
                                                <span class="text-primary"><?php echo $meal_1->price; ?></span>
                                            </h5>
                                            <small class="fst-italic"><?php echo $meal_1->description?></small>
                                            <a type="button" href="<?php
                                            

                                            $add_cart = "http://localhost/stafflounge/food/add-cart.php";
                                            $login = "http://localhost/stafflounge/auth/login.php";

                                            if(isset($_SESSION['user_id'])){
                                                    echo $add_cart;
                                            }else{
                                                echo $login;
                                            }
                                            
                                           ?>?id=<?php echo $meal_1->id;?>" class="btn btn-primary py-2 top-0 end-0 mt-2 me-2">view</a>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                                <?php else: ?>
                                    <h1 class="text-danger">Dinner Menu is Not added!</h1>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div id="tab-2" class="tab-pane fade show p-0">
                            <div class="row g-4">
                            <?php if($meal2_counter->total > 0): ?>
                            <?php foreach($meals_2 as $meal_2) :?>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="<?php echo APPIMAGE ?>/<?php echo $meal_2->image;?>" alt="" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span><?php echo $meal_2->name; ?></span>
                                                <span class="text-primary"><?php echo $meal_2->price; ?></span>
                                            </h5>
                                            <small class="fst-italic"><?php echo $meal_2->description?></small>
                                            <a type="button" href="<?php
                                            

                                            $add_cart = "http://localhost/stafflounge/food/add-cart.php";
                                            $login = "http://localhost/stafflounge/auth/login.php";

                                            if(isset($_SESSION['user_id'])){
                                                    echo $add_cart;
                                            }else{
                                                echo $login;
                                            }
                                            
                                            ?>?id=<?php echo $meal_2->id;?>" class="btn btn-primary py-2 top-0 end-0 mt-2 me-2">view</a>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                                <?php else: ?>
                                    <h1 class="text-danger">Dinner Menu is Not added!</h1>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div id="tab-3" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <?php if($meal3_counter->total > 0): ?>
                                <?php foreach($meals_3 as $meal_3) :?>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="<?php echo APPIMAGE ?>/<?php echo $meal_3->image;?>" alt="" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span><?php echo $meal_3->name; ?></span>
                                                <span class="text-primary"><?php echo $meal_3->price; ?></span>
                                            </h5>
                                            <small class="fst-italic"><?php echo $meal_3->description?></small>
                                            <a type="button" href="<?php

                                                $add_cart = "http://localhost/stafflounge/food/add-cart.php";
                                                $login = "http://localhost/stafflounge/auth/login.php";

                                                if(isset($_SESSION['user_id'])){
                                                        echo $add_cart;
                                                }else{
                                                    echo $login;
                                                }
                                             
                                             ?>?id=<?php echo $meal_3->id;?>" class="btn btn-primary py-2 top-0 end-0 mt-2 me-2">view</a>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                                <?php else: ?>
                                    <h1 class="text-danger">Dinner Menu is Not added!</h1>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

        <!-- Menu End -->
        

<?php
    require "includes/footer.php";
?>     