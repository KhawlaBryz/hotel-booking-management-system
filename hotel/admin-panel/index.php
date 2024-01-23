<?php require "layouts/header.php"; ?>
<?php require "config/config.php"; ?>
<?php
if(!isset($_SESSION['adminname'])){
    header("location:".ADMINURL."/admins/login-admins.php");
}
$hotels=$conn->query("SELECT COUNT(*) AS count_hotels FROM hotels  ");
$hotels->execute();
$allhotels=$hotels->fetch(PDO::FETCH_OBJ);
$rooms=$conn->query("SELECT COUNT(*) AS count_rooms FROM rooms  ");
$rooms->execute();
$allrooms=$rooms->fetch(PDO::FETCH_OBJ);
$admins=$conn->query("SELECT COUNT(*) AS count_admins FROM admins  ");
$admins->execute();
$alladmins=$admins->fetch(PDO::FETCH_OBJ);
$bookings=$conn->query("SELECT COUNT(*) AS count_bookings FROM bookings  ");
$bookings->execute();
$allbookings=$bookings->fetch(PDO::FETCH_OBJ);
?>        
      <div class="row">
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Hotels</h5>
              <!-- <h6 class="card-subtitle mb-2 text-muted">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
              <p class="card-text">number of hotels: <?php echo $allhotels->count_hotels; ?></p>
             
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Rooms</h5>
              
              <p class="card-text">number of rooms: <?php echo $allrooms->count_rooms; ?></p>
              
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Admins</h5>
              
              <p class="card-text">number of admins: <?php echo $alladmins->count_admins; ?></p>
              
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Bookings</h5>
              
              <p class="card-text">number of bookings: <?php echo $allbookings->count_bookings; ?></p>
              
            </div>
          </div>
        </div>
      </div>
   <?php require "layouts/footer.php"; ?>