<?php require "../layouts/header.php"?>
<?php require "../config/config.php" ?>
<?php
if(!isset($_SESSION['adminname'])){
    header("location:".ADMINURL."/admins/login-admins.php");

}

if(isset($_POST['submit'])){
  if(empty($_POST['name']) || empty($_FILES['image'])  || empty($_POST['description']) || empty($_POST['location'])  ){
    echo "<script>alert('one or more input are empty')</script>";
  }else{
    $name=$_POST['name'];
    $image=$_FILES['image']['name'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $dir="hotel_images/".basename($image);

    $insert= $conn->prepare("INSERT INTO hotels (name,image,description,location) VALUES(:name,:image,:description,:location)");
      $insert->execute([":name"=> $name,
      ":image"=>$image,
      ":description"=>$description,
      ":location"=>$location]);
      if(move_uploaded_file($_FILES['image']['tmp_name'],$dir)){
        header("location:".ADMINURL."/hotels-admins/create-hotels.php");

      }
    }
  
  }
?>
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Hotels</h5>
          <form method="POST" action="create-hotels.php" enctype="multipart/form-data">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />
                 
                </div>

                <div class="form-outline mb-4 mt-4">
                  <input type="file" name="image" id="form2Example1" class="form-control"/>
                 
                </div>

                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Description</label>
                  <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>

                <div class="form-outline mb-4 mt-4">
                  <label for="exampleFormControlTextarea1">Location</label>

                  <input type="text" name="location" id="form2Example1" class="form-control"/>
                 
                </div>

      
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>
      <?php require "../layouts/footer.php"?>
