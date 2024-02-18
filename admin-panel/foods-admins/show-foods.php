<?php
  require "../../config/config.php";
  require "../../libs/App.php";
  require "../layouts/header.php" 
 ?>
<?php
  $app = new App();
  $app->notLoggedInAdmin();
  $count = 1; 

  $foods_query = "SELECT * FROM foods";
  $foods = $app->selectAll($foods_query);
 ?>

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Foods</h5>
              <a  href="<?php echo ADMINURL?>/foods-admins/create-foods.php" class="btn btn-primary mb-4 text-center float-right">Add Foods</a>

              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">image</th>
                    <th scope="col">price</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($foods as $food): ?>
                  <tr>
                    <th scope="row"><?php echo $count; $count++ ?></th>
                    <td><?php echo $food->name?></td>
                    <td><img src="http://localhost/stafflounge/img/<?php echo $food->image;?>" style="width: 50px; height: 50px"/></td>
                    <td><?php echo $food->price ?></td>
                     <td><a href="delete-foods.php?id=<?php echo $food->id;?>" class="btn btn-danger  text-center ">delete</a></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>



  </div>
<script type="text/javascript">

</script>
</body>
</html>