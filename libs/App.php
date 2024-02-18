<?php 

 class App{
    public $host = HOST;
    public $dbname = DBNAME;
    public $user = USER;
    public $password = PASS;

    public PDO $link;


    //create a constructor
    public function __construct(){
        $this->connect();
    }

    public function connect(){
        $this->link = new PDO("mysql: host=".$this->host.";dbname=".$this->dbname."",$this->user,$this->password );
        $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // if($this->link){
        //     echo "Connected successfully";
        // }
    }

    public function selectAll($query){
        $rows = $this->link->prepare($query);
        $rows->execute();

        $allRows = $rows->fetchAll(PDO::FETCH_OBJ);
    if($allRows){
        return $allRows;
    }else{
        return false;
    }
 }

 public function selectSingle($query){
        $rows = $this->link->prepare($query);
        $rows->execute();

        $singleRow = $rows->fetch(PDO::FETCH_OBJ);
    if($singleRow){
        return $singleRow;
    }else{
        return false;
    }
    }

    //insert data

    public function insert($query, $arr, $path){
        if($this->validate($arr) == "empty"){
            echo "<script>alert('Enter one or more input')</script>";
        }else{
            $insert_record = $this->link->prepare($query);
            $insert_record->execute($arr);
            //header("location: ".$path."");
            echo "<script>window.location.href='".$path."' </script>";
        }
    }

    //update data
    public function update($query, $arr, $path){
        if($this->validate($arr) == "empty"){
            echo "<script>alert('Enter one or more input')</script>";
        }else{
            $update_record = $this->link->prepare($query);
            $update_record->execute($arr);
            //header("location : ".$path."");
            echo "<script>window.location.href='".$path."' </script>";
        }
    }


    //delete data
    public function delete($query, $path){
            $delete_record = $this->link->prepare($query);
            $delete_record->execute();
            echo "<script>window.location.href='".$path."' </script>";
    }
    public function deleteCart($query){
        $delete_cart = $this->link->prepare($query);
        $delete_cart->execute();
    }

    public function validate($arr){
        if(in_array("", $arr)){
            echo "empty";
        }
    }

    public function register($query, $arr, $path){
        if($this->validate($arr) == "empty"){
            echo "<script>alert('Enter one or more input')</script>";
        }else{
            $register_user = $this->link->prepare($query);
            $register_user->execute($arr);
            header("location: ".$path."");
        }
    }




        public function login($query, $data, $path){

            //email
        
            $login_user = $this->link->prepare($query);
            $login_user->execute();
        
            $fetchData = $login_user->fetch(PDO::FETCH_ASSOC);
            if($login_user->rowCount() > 0){
                if (password_verify($data['password'], $fetchData['password'])) {

 
                    $_SESSION['user_id'] = $fetchData['id'];
                    $_SESSION['email'] = $fetchData['email'];
                    $_SESSION['username'] = $fetchData['username'];
                    
                   
                    header("location: ".$path."");
    
                }
                else{
                    return "Invalid email or password!";
                }
            }else{
                    return "Invalid email or password!";
            }
     }
        
    
        public function validateCart($query){
            $row = $this->link->prepare($query);
            $row->execute();
            $count = $row->rowCount();
            return $count;
        }
    //starting session
    public function startingSession(){
        session_start();
    }
    //validating sessions

    public function validateSession(){
        if(isset($_SESSION['user_id'])){
            echo "<script>window.location.href='".APPURL."' </script>";
        }
    }

    #checking for login for admins!
    public function notLoggedInAdmin(){
        if(!isset($_SESSION['email'])){
            echo "<script>window.location.href='http://localhost/stafflounge/admin-panel//admins/login-admins.php' </script>";
        }
    }

    public function addNewAdmin($query, $arr){
        if($this->validate($arr) == "empty"){
            echo "<script>alert('Enter one or more input')</script>";
        }else{
            $insert_record = $this->link->prepare($query);
            $insert_record->execute($arr);
            //header("location: ".$path."");
        }
    }

}

