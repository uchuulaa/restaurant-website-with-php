<?php
  require "../../config/config.php";
  require "../../libs/App.php";
  require "../layouts/header.php" 
 ?>
 <?php
 $app = new App();
 $app->notLoggedInAdmin();
  if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO admins(username, email, password) VALUES(:username, :email, :password)";
    $query_user = "INSERT INTO users(username, email, password) VALUES(:username, :email, :password)";

    $arr = [
        ":username" => $username,
        ":email" => $email,
        ":password" => $password,

    ];

    $path = ADMINURL."/admins/admins.php";
    $app->addNewAdmin($query_user, $arr);
    $app->insert($query, $arr, $path);
  }
 ?>
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Admins</h5>
          <form method="POST" action="create-admins.php" enctype="multipart/form-data">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="email" name="email" id="form2Example1" class="form-control" placeholder="email" />
                 
                </div>

                <div class="form-outline mb-4">
                  <input type="text" name="username" id="form2Example1" class="form-control" placeholder="username"  />
                </div>
                <div class="form-outline mb-4">
                  <input type="password" name="password" id="form2Example1" class="form-control" placeholder="password"  />
                </div>

               
            
                
              


                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>
 <?php    require "../layouts/footer.php" ?>