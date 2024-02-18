<?php
  require "../../config/config.php";
  require "../../libs/App.php";
  require "../layouts/header.php" 
 ?>
 <?php
 $app = new App();
 $app->notLoggedInAdmin();
  if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $description = $_POST['description'];
    $meal_id = $_POST['meal_id'];

    $dir = "foods-image/".basename($image);


    

    $query ="INSERT INTO foods(name, image, description, price, meal_id) VALUES (:name, :image, :description, :price, :meal_id)";

    $arr = [
        ":name" => $name,
        ":image" => $image,
        ":description" => $description,
        ":price"=> $price,
        ":meal_id"=> $meal_id

    ];

    $path = ADMINURL."/foods-admins/show-foods.php";
    if(move_uploaded_file($_FILES['image']['tmp_name'], $dir))
    $app->insert($query, $arr, $path);
  }
 ?>
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Food Items</h5>
          <form method="POST" action="create-foods.php" enctype="multipart/form-data">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />
                 
                </div>
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="price" id="form2Example1" class="form-control" placeholder="price" />
                 
                </div>
                <div class="form-outline mb-4 mt-4">
                  <input type="file" name="image" id="form2Example1" class="form-control"  />
                 
                </div>
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Description</label>
                  <textarea name= "description" class="form-control" id="exampleFormControlTextarea1" rows="3" style="resize:none;"></textarea>
                </div>
               
                <div class="form-outline mb-4 mt-4">

                  <select name="meal_id" class="form-select  form-control" aria-label="Default select example">
                    <option selected>Choose Meal</option>
                    <option value="1">Breakfast</option>
                    <option value="2">Launch</option>
                    <option value="3">Dinner</option>
                  </select>
                </div>

                <br>
              

      
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>
<?php
  require "../layouts/footer.php" 
 ?>