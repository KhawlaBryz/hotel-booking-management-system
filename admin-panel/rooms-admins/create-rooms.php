<?php require "../layouts/header.php"; ?>
<?php require "../config/config.php"; ?>
<?php
if(!isset($_SESSION['adminname'])){
    header("location:".ADMINURL."/admins/login-admins.php");

}

$hotels=$conn->query("SELECT * FROM hotels ");
$hotels->execute();
$allhotels=$hotels->fetchAll(PDO::FETCH_OBJ);

if(isset($_POST['submit'])){
  if(empty($_POST['name']) || empty($_FILES['image'])  ||  empty($_POST['price']) ||  empty($_POST['num_persons']) || empty($_POST['num_beds']) || empty($_POST['size'])  || empty($_POST['view']) || empty($_POST['hotel_name'])  || empty($_POST['hotel_id']) ){
    echo "<script>alert('one or more input are empty')</script>";
  }else{
    $name=$_POST['name'];
    $image=$_FILES['image']['name'];
    $price = $_POST['price'];
    $num_persons = $_POST['num_persons'];
    $num_beds = $_POST['num_beds'];
    $size = $_POST['size'];
    $view = $_POST['view'];

    $hotel_name = $_POST['hotel_name'];
    $hotel_id = $_POST['hotel_id'];




    $dir="room_images/".basename($image);

    $insert= $conn->prepare("INSERT INTO rooms (name,image,price,num_persons,num_beds,size,view,hotel_name,hotel_id) VALUES(:name,:image,:price,:num_persons,:num_beds,:size,:view,:hotel_name,:hotel_id)");
      $insert->execute([":name"=> $name,
      ":image"=>$image,
      ":price"=>$price,
      ":num_persons"=>$num_persons,
      ":num_beds"=>$num_beds, 
      ":size"=>$size, 
      ":view"=>$view, 
      ":hotel_name"=>$hotel_name, 
      ":hotel_id"=>$hotel_id, 




    ]);
      if(move_uploaded_file($_FILES['image']['tmp_name'],$dir)){
        header("location:".ADMINURL."/rooms-admins/show-rooms.php");

      }
    } 
}
  
  ?>
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Rooms</h5>
          <form method="POST" action="create-rooms.php" enctype="multipart/form-data">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />
                 
                </div>
                <div class="form-outline mb-4 mt-4">
                  <input type="file" name="image" id="form2Example1" class="form-control" />
                 
                </div>  
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="price" id="form2Example1" class="form-control" placeholder="price" />
                 
                </div> 
                 <div class="form-outline mb-4 mt-4">
                  <input type="text" name="num_persons" id="form2Example1" class="form-control" placeholder="num_persons" />
                 
                </div> 
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="num_beds" id="form2Example1" class="form-control" placeholder="num_beds" />
                 
                </div> 
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="size" id="form2Example1" class="form-control" placeholder="size" />
                 
                </div> 
               <div class="form-outline mb-4 mt-4">
                <input type="text" name="view" id="form2Example1" class="form-control" placeholder="view" />
               
               </div> 
               
                <select name="hotel_name" class="form-control">
                <option >Choose Hotel Name</option>
                <?php foreach($allhotels as $hotel): ?>
                  
                  <option value="<?php echo $hotel->name; ?>"><?php echo $hotel->name; ?></option>
                <?php endforeach; ?>
                </select>
                <br>

                <select name="hotel_id" class="form-control">
                <option >Choose the same Hotel Name</option>
                <?php foreach($allhotels as $hotel): ?>
                  
                  <option value="<?php echo $hotel->id; ?>"><?php echo $hotel->name; ?></option>
                <?php endforeach; ?>
                </select>
                <br>
              
              
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>
      <?php require "../layouts/footer.php"; ?>
