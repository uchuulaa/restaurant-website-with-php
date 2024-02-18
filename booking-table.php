<?php
    require "config/config.php";
    require "libs/App.php";
    require "includes/header.php";
?>

<?php 

if(!isset($_SERVER['HTTP_REFERER'])){
  echo "<script>window.location.href='".APPURL."' </script>";
  exit;
}

  if(isset($_POST['submit'])){
    //<?php echo $_SESSION['username'] 
    $name = $_SESSION['username'];
    $email = $_SESSION['email'];
    $date_booking = $_POST['date_booking'];
    $num_people = $_POST['num_people'];
    $special_request = $_POST['special_request'];
    $status = 'Pending';
    $user_id = $_SESSION['user_id'];
    // echo $date_booking;
    // echo date('y/m/d');
    if($date_booking > date('m/d/y h:i:sa')){
        $query = "INSERT INTO bookings(name, email, date_booking, num_people, special_request, status, user_id) VALUES(:name, :email, :date_booking, :num_people, :special_request, :status, :user_id)";
    
    $arr = [
        ":name" => $name,
        ":email" => $email,
        ":date_booking" => $date_booking,
        ":num_people" => $num_people,
        ":special_request" => $special_request,
        ":status"=>  $status,
        ":user_id"=> $user_id,
    ];
    $path = "index.php";
    $app->insert($query, $arr, $path);
  }
   else{
    echo "<script>alert('you have to choose today or forehead days')</script>";
    echo "<script>window.location.href='index.php'</script>";
  }
}
?>
<?php require "includes/footer.php";?>