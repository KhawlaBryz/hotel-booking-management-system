<?php require "../includes/header.php"  ?>
<?php require "../config/config.php" ?>
<?php
if(!isset($_SESSION['username'])){
    header("location:".APPURL."/auth/login.php");
}
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$room=$conn->query("SELECT * FROM rooms WHERE status=1 AND id='$id' ");
	$singleRoom=$room->fetch(PDO::FETCH_OBJ);
}

//utilities

$utilities=$conn->query("SELECT * FROM utilities WHERE room_id='$id'");
$utilities->execute();
$allutilities=$utilities->fetchALL(PDO::FETCH_OBJ);

if(isset($_POST['submit'])){
	if( empty($_POST['email'])  || empty($_POST['phone_number']) ||empty($_POST['full_name'])  || empty($_POST['check_in']) || empty($_POST['check_out'])){
	  echo "<script>alert('one are more input are empty')</script>";
	}else{
		$check_in=$_POST['check_in'];
		$check_out=$_POST['check_out'];
		$email=$_POST['email'];
		$phone_number=$_POST['phone_number'];
		$full_name=$_POST['full_name'];
		$hotel_name=$singleRoom->hotel_name;
		$room_name=$singleRoom->name;
		$user_id=$_SESSION['id'];

		if(date("m/d/y")> $check_in OR date("m/d/y")>$check_out){
			echo "<script>alert('picka date that is not in the past,pick starting from tomorrow')</script>";	

		}else{
			if($check_in>$check_out OR $check_in==date("m/d/y") ){
				echo "<script>alert('pick a date that is not today for check_in and pick a check_in date that less that check_out date')</script>";	


			}
			else{
				$booking=$conn->prepare("INSERT INTO bookings (check_in,check_out,email,phone_number,full_name,hotel_name,room_name,user_id) VALUES (:check_in, :check_out, :email, :phone_number, :full_name, :hotel_name, :room_name, :user_id)");
				$booking->execute([
					":check_in"=>$check_in,
					":check_out"=>$check_out,
					":email"=>$email,
					":phone_number"=>$phone_number,

					":full_name"=>$full_name,

					":hotel_name"=>$hotel_name,
					":room_name"=>$room_name,
					":user_id"=>$user_id,

				]);			}
		}
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <style>
        .full-width-background {
      height: 1000px; /* Hauteur de l'image */
      width:100%;
      background-image: url('<?php echo APPURL ?>/image/<?php echo $singleRoom->image; ?>');
      background-size: cover;
      background-position: center;
      position: relative;
      text-align: center;
      color: white;
	  background-attachment: fixed; 

    }
    .full-width-background h2 {
      font-size: 45px; /* Taille du texte Welcome */
      margin-top: 31px;
      margin-bottom: 20px; /* Espacement avec les boutons */
      padding-top: 50px;
    }
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
    }

    .appointment-form {
    display: flex;
    justify-content: flex-end; /* Aligner le contenu du formulaire à droite */
    margin-top: 31px;
    margin-right: 20px; /* Pour un espacement du bord droit */
}

    .form-wrap {
        background-color: white;
        padding: 50px;
        width: 300px;
        border-radius: 5px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .btn-primary {
        background-color: #fd7792;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        width: 100%;
    }

    .btn-primary:hover {
        background-color: rgba(253, 119, 146, 0.8);
    }

    .row {
        display: flex;
        flex-wrap: wrap;
        margin-right: -10px;
        margin-left: -10px;
    }

    .col-md-6 {
        flex: 0 0 50%;
        max-width: 50%;
        padding-right: 10px;
        padding-left: 10px;
    }

    .input-wrap {
        position: relative;
    }

    .input-wrap .icon {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        left: 10px;
    }

        .form-container {
            background-color:white;
            padding: 30px;
			
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 350px;
        }
	
</style>
</head>
<body>
<div class="full-width-background">
        <div class="col-md-7 ftco-animate">
          	<h2 class="subheading">Welcome to Riad Medina</h2>
          	<h1 class="mb-4"><?php echo $singleRoom->name; ?></h1>
        </div>
		<div class="reservation-container">

		<div class="appointment-form">
        <div class="form-container">
            <form action="room-single.php?id=<?php echo $id; ?>" method="POST">
                <h3 class="mb-3" style="color:black;">Book this room</h3>
                <div class="form-group">
                    <input type="text" class="form-control" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="full_name" placeholder="Full Name">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="phone_number" placeholder="Phone Number">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control appointment_date-check-in" name="check_in" placeholder="Check-In">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control appointment_date-check-out" name="check_out" placeholder="Check-Out">
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Book and Pay Now" class="btn btn-primary py-3 px-4">
                </div>
            </form>
        </div>
    </div>
</div>
                </div>

</body>
</html>
<?php require "../includes/footer.php"; ?>
