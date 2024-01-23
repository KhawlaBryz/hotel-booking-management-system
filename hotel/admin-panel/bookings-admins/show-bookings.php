<?php require "../layouts/header.php"?>
<?php require "../config/config.php" ?>
<?php 
if(!isset($_SESSION['adminname'])){
  header("location:".ADMINURL."/admins/login-admins.php");

}

$bookings=$conn->query("SELECT * FROM bookings ");
$bookings->execute();
$allbookings=$bookings->fetchAll(PDO::FETCH_OBJ);
?>

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Bookings</h5>
            
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">check in</th>
                    <th scope="col">check out</th>
                    <th scope="col">email</th>
                    <th scope="col">phone number</th>
                    <th scope="col">full name</th>
                    <th scope="col">hotel name</th>
                    <th scope="col">room name</th>
                    <th scope="col">status</th>
                    <th scope="col">payment</th>
                    <th scope="col">created at</th>
                    <th scope="col">status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($allbookings as $bookings) :?>
                  <tr>
                    <th scope="row"><?php echo $bookings->id?></th>
                    <td><?php echo $bookings->check_in?></td>
                    <td><?php echo $bookings->check_out?></td>
                    <td><?php echo $bookings->email?></td>
                    <td><?php echo $bookings->phone_number?></td>
                    <td><?php echo $bookings->full_name?></td>
                    <td><?php echo $bookings->hotel_name?></td>
                    <td><?php echo $bookings->room_name?></td>
                    <td><?php echo $bookings->status?></td>
                    <td>$<?php echo $bookings->payment?></td>
                    <td><?php echo $bookings->check_in?></td>
                    
                     <td><a href="status_bookings.php?id=<?php echo $bookings->id; ?>" class="btn btn-warning  text-center ">status</a></td>

                  </tr>
               <?php endforeach;?>
                
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