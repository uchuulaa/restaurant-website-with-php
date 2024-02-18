<?php
    require "../config/config.php";
    require "../libs/App.php";
    require "../includes/header.php";
?>
<?php
    $app = new App;

    if(!isset($_SESSION['user_id'])){
        echo "<script>window.location.href='".APPURL."' </script>";
    }
    
    $query = "SELECT * FROM orders WHERE user_id='$_SESSION[user_id]'";
    $orders = $app->selectAll($query);
    $order_counter = $app->selectSingle("SELECT COUNT(*) AS total FROM orders");


?>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Orders</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo APPURL; ?>/users/orders.php?id=<?php echo $_SESSION['user_id']; ?>">orders</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Service Start -->
            <div class="container">
                <?php if($order_counter->total > 0): ?>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Block</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Comment</th>
                            <th scope="col">Total price</th>
                            <th scope="col">status</th>
                            <th scope="col">Date</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php foreach($orders as $order): ?>        
                            <tr>
                                <td><?php echo $order->name;?></td>
                                <td><?php echo $order->email; ?></td>
                                <td><?php echo $order->block;?></td>
                                <td><?php echo $order->phone_number;?></td>
                                <td><?php echo $order->comment;?></td>
                                <td><?php echo $order->total_price;?></td>
                                <td><?php echo $order->status; ?></td>
                                <td><?php echo $order->created_at; ?></td>
                                <td>
                                    <?php if($order->status == 'Confirmed'): ?>
                                    <a class="btn btn-success text-white" href="<?php echo APPURL; ?>/users/review.php">Review us
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                      </table>
                </div>
                <?php else: ?>
                    <div class="col-md-12">
                        <h1>You don't have order</h1>
                    </div>
                <?php endif; ?>
            </div>
        <!-- Service End -->
        

        <!-- Footer Start -->
        <?php require "../includes/footer.php"; ?>  