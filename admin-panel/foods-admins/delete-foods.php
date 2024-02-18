<?php
  require "../../config/config.php";
  require "../../libs/App.php";
   //require "../layouts/header.php" 
?>
<?php 
    if(!isset($_SERVER['HTTP_REFERER'])){
        echo "<script>window.location.href='".ADMINURL."' </script>";
        exit;
    }
?> 
<?php 
    $app = new App;
    if(isset($_GET['id'])){
        $id  = $_GET['id'];
        //deleting image from folder
        $query = "SELECT * FROM foods WHERE id='$id'";
        $selectedFood = $app->selectSingle($query);
        unlink("foods-image/".$selectedFood->image);
        //deleting food with the given id 
        
         $query = "DELETE FROM  foods WHERE id='$id'";
        $path = "http://localhost/stafflounge/admin-panel/foods-admins/show-foods.php";
        $app->delete($query, $path);
    }else{
        echo "<script>window.location.href='".APPURL."/404.php'</script>";
    }
?>