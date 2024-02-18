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
        $query = "DELETE FROM cart WHERE user_id='$_SESSION[user_id]'"  ;
        $path  = "cart.php";
        $app->delete($query, $path);
?>