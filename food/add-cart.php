
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
    //$app->startingSession();
    //$app->notLoggedIn();
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM foods WHERE id='$id'";
        $selectedFood = $app->selectSingle($query);
        


        if(isset($_SESSION['user_id'])){
            $queryCheckCart = "SELECT * FROM cart WHERE item_id='$id' AND user_id='$_SESSION[user_id]'";
            $count = $app->validateCart($queryCheckCart);
        }
        //var_dump($_SESSION);
       


        if(isset($_POST['submit'])){
            //<?php echo $_SESSION['username'] 
            $item_id = $_POST['item_id'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $image = $_POST['image'];
            $user_id = $_SESSION['user_id']; 
    
            $query = "INSERT INTO cart(item_id, name, price, image, user_id) VALUES(:item_id, :name, :price, :image, :user_id)";
    
            $arr = [
                ":item_id" => $item_id,
                ":name" => $name,
                ":price" => $price,
                ":image" => $image,
                ":user_id" => $user_id,  
            ];
            $path = "cart.php";
            $app->insert($query, $arr, $path);
        }
    }else{

        echo "<script>window.location.href='".APPURL."/404.php'</script>";
    }

?>



            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown"><?php echo $selectedFood->name ?></h1>
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
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-md-6">
                        <div class="row g-3">
                            <div class="col-12 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="<?php echo APPIMAGE;?>/<?php echo $selectedFood->image;?>">
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h1 class="mb-4"><?php echo $selectedFood->name;?></h1>
                        <p class="mb-4"><?php echo $selectedFood->description;?></p>
                        <div class="row g-4 mb-4">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h3>Price: <?php echo $selectedFood->price;?> </h3>                                   
                                </div>
                            </div>
                           
                        </div>
                        <form method="post" action="add-cart.php?id=<?php echo $id;?>">
                            <input type="hidden" name="item_id" value ="<?php echo $selectedFood->id;?>"/>
                            <input type="hidden" name="name" value ="<?php echo $selectedFood->name;?>"/>
                            <input type="hidden" name="image" value ="<?php echo $selectedFood->image;?>"/>
                            <input type="hidden" name="price" value ="<?php echo $selectedFood->price;?>"/>
                            <input type="hidden" name="user_id" value ="<?php echo $_SESSION['user_id'];?>"/>
                            <?php if($count > 0): ?>
                                <button name="submit" type="submit" class="btn btn-primary py-3 px-5 mt-2" disabled>Added to Cart</button>
                            <?php else: ?>
                                <button name="submit" type="submit" class="btn btn-primary py-3 px-5 mt-2">Add to Cart</button>
                            <?php endif; ?>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>

      <!-- Footer Start -->
   <?php require "../includes/footer.php"; ?>   