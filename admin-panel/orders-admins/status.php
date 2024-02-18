<?php
  require "../../config/config.php";
  require "../../libs/App.php";
  require "../layouts/header.php" 
 ?>
  <?php
 $app = new App();
 $app->notLoggedInAdmin();
 if(isset($_GET['id'])){
    $id = $_GET['id'];
    if(isset($_POST['submit'])){
        $status = $_POST['status'];
        $query = "UPDATE orders SET status=:status WHERE id='$id'";
        $arr = [
            ":status" => $status,
        ];
    
        $path = ADMINURL."/orders-admins/show-orders.php";
        $app->update($query, $arr, $path);
    }
    
 }

 ?>
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Update Order Status</h5>
          <form method="post" action="status.php?id=<?php echo $id;?>" enctype="multipart/form-data">
                <div class="form-outline mb-4 mt-4">

                  <select name="status" class="form-select  form-control" aria-label="Default select example">
                    <option selected>Choose status</option>
                    <option value="Pending">Pending</option>
                    <option value="Confirmed">Confirmed</option>
                  </select>
                </div
                <br>
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">update status</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>
<?php
  require "../layouts/footer.php" 
?> 