<?php
  require "../../config/config.php";
  require "../../libs/App.php";
  require "../layouts/header.php" 
 ?>
  <?php
 $app = new App();
 $app->notLoggedInAdmin();
 $count = 1; 

 $orders_query = "SELECT * FROM orders";
 $orders = $app->selectAll($orders_query);

 $order_counter = $app->selectSingle("SELECT COUNT(*) AS total FROM orders");
 ?>

          <div class="row">
            <?php if($order_counter->total > 0): ?>
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Orders</h5>
            
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <!-- <th scope="col">email</th> -->
                    <th scope="col">Block</th>
                    <th scope="col">phone_number</th>
                    <th scope="col">address</th>
                    <th scope="col">total_price</th>
                    <th scope="col">status</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($orders as $order): ?>
                  <tr>
                    <th scope="row"><?php echo $count; $count++; ?></th>
                    <td><?php echo $order->name ?></td>
                    <td><?php echo $order->block;?></td>

                    <td><?php echo $order->phone_number;?></td>
                    <td><?php echo $order->comment;?></td>
                    <td><?php echo $order->total_price;?></td>

                    <td><a href="status.php?id=<?php echo $order->id; ?>" class="btn btn-success  text-center "><?php echo $order->status;?></a></td>
                     <td><a href="delete-orders.php?id=<?php echo $order->id;?>" class="btn btn-danger  text-center ">Delete</a></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
        <?php else: ?>
          <h1 class='text-danger text-center'>You don't have order!</h1>

          <?php endif; ?>
      </div>



  <?php
  require "../layouts/footer.php" 
 ?>