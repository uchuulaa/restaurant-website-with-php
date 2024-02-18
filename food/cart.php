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

    // $app->notLoggedIn();
    
    $query = "SELECT * FROM cart WHERE user_id='$_SESSION[user_id]'";
    $cart_items = $app->selectAll($query);

    $cart_price = $app->selectSingle("SELECT SUM(price) AS total_price FROM cart WHERE user_id='$_SESSION[user_id]'");

    if(isset($_POST['submit'])){
        $_SESSION['total_price'] = $cart_price->total_price;

        echo "<script>window.location.href='".APPURL."/food/checkout.php' </script>";
    }

?>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Cart</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Cart</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Service Start -->
            <div class="container">
                
                <div class="col-md-12">
                        <?php if($cart_price->total_price > 0) : ?>
                        <div>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php foreach($cart_items as $cart_item): ?>        
                                    <tr>
                                        <td> <img src="<?php echo APPIMAGE;?>/<?php echo $cart_item->image;?>" style="width: 50px; height: 50px"/> </td>
                                        <td><?php echo $cart_item->name;?></td>
                                        <td><?php echo $cart_item->price; ?></td>
                                        <td><a class="btn btn-danger text-white" href="<?php echo APPURL; ?>/food/delete-item.php?id= <?php echo $cart_item->id; ?>">delete</td>
                                    </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                            <div class="position-relative mx-auto" style="max-width: 400px; padding-left: 679px;">
                                <p style="margin-left: -10px;" class="w-25 py-3 ps-4 pe-5" type="text">Total: <?php echo $cart_price->total_price;?> Birr</p>
                                <form action="cart.php" method="post">
                                    <button type="submit" name="submit" class="btn btn-primary py-2 top-0 end-0 mt-2 me-2">Checkout</button>
                                </form>
                                
                            </div>  
                        </div>
                        <?php else: ?>
                            <h1 class="text-danger text-uppercase">Your Cart is Empty!</h1>
                        <?php endif; ?>

                </div>
            </div>
        <!-- Service End -->
        

        <!-- Footer Start -->
        <?php require "../includes/footer.php"; ?>  