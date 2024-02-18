<?php
  require "../../config/config.php";
  require "../../libs/App.php";
  require "../layouts/header.php" 
 ?>
  <?php
 $app = new App();
 $app->notLoggedInAdmin();
 $count = 1; 

 $bookings_query = "SELECT * FROM bookings";
 $bookings = $app->selectAll($bookings_query);

 $booking_counter = $app->selectSingle("SELECT COUNT(*) AS total FROM bookings");
 ?>

        <div class="row">
        <div class="col">
          <?php if($booking_counter->total > 0): ?>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Bookings</h5>
            
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">date_booking</th>
                    <th scope="col">num_people</th>
                    <th scope="col">special_request</th>
                    <th scope="col">created_at</th>
                    <th scope="col">status</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <!-- ":name" => $name,
             ":email" => $email,
             ":date_booking" => $date_booking,
        ":num_people" => $num_people,
        ":special_request" => $special_request,
        ":status"=>  $status,
        ":user_id"=> $user_id, -->
                <tbody>
                  <?php foreach($bookings as $booking):?>
                  <tr>
                    <th scope="row"><?php echo $count; $count++; ?></th>
                    <td><?php echo $booking->name ?></td>
                    <td><?php echo $booking->email ?></td>
                    <td><?php echo $booking->date_booking ?></td>
                    <td><?php echo $booking->num_people ?></td>
                    <td><?php echo $booking->special_request ?></td>
                    <td><?php echo $booking->created_at ?></td>
                    <td><a href="status.php?id=<?php echo $booking->id; ?>" class="btn btn-success  text-center "><?php echo $booking->status;?></a></td>
                    <td><a href="delete-booking.php?id=<?php echo $booking->id;?>" class="btn btn-danger  text-center ">delete</a></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table> 
            </div>
          </div>
          <?php else:  ?>
            <h1 class="text-danger">You don't have any Booking!</h1>
            <?php endif;  ?>
        </div>
      </div>



<?php
  require "../layouts/footer.php" 
?> 