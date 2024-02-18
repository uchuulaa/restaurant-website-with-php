<?php
  require "../config/config.php";
  require "../libs/App.php";
  require "layouts/header.php" 
 ?>
 <?php
 $app = new App();
 $app->notLoggedInAdmin(); 

 $meal_counter = $app->selectSingle("SELECT COUNT(*) AS total FROM foods");
 $order_counter = $app->selectSingle("SELECT COUNT(*) AS total FROM orders");
 $booking_counter = $app->selectSingle("SELECT COUNT(*) AS total FROM bookings");
 $admin_counter = $app->selectSingle("SELECT COUNT(*) AS total FROM admins");

 ?>

            
<div class="row">
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Foods</h5>
              <!-- <h6 class="card-subtitle mb-2 text-muted">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
              <p class="card-text">number of foods: <?php echo $meal_counter->total ?></p>
             
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Orders</h5>
              
              <p class="card-text">number of orders: <?php echo $order_counter->total ?></p>
              
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Bookings</h5>
              
              <p class="card-text">number of bookings: <?php echo $booking_counter->total ?></p>
              
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Admins</h5>
              
              <p class="card-text">number of admins: <?php echo $admin_counter->total ?></p>
              
            </div>
          </div>
        </div>
      </div>

<?php require "layouts/footer.php" ?>
