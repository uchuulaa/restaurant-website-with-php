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
    if(isset($_GET['id'])){
        $id  = $_GET['id'];

        $query = "DELETE FROM cart WHERE id='$id'";
        $path  = "cart.php";
        $app->delete($query, $path);
    }else{
        echo "<script>window.location.href='".APPURL."/404.php'</script>";
    }
?>