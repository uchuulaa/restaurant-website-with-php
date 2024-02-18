<?php
  require "../../config/config.php";
  require "../../libs/App.php";
  require "../layouts/header.php" 
 ?>
 <?php
 $app = new App();
 $app->notLoggedInAdmin();
 $count = 1; 

 $admins_query = "SELECT * FROM admins";
 $admins = $app->selectAll($admins_query)
 ?>

      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Admins</h5>
             <a  href="<?php echo ADMINURL?>/admins/create-admins.php" class="btn btn-primary mb-4 text-center float-right">Add Admins</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">username</th>
                    <th scope="col">email</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($admins as $admin): ?>
                  <tr>
                    <th scope="row"><?php echo $count; $count++;?></th>
                    <td><?php echo $admin->username?></td>
                    <td><?php echo $admin->email?></td>
                   
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>

<?php require "../layouts/footer.php" ?>

 