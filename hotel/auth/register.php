<?php include_once "../includes/header.php"  ?>
<?php include_once "../config/config.php" ?>
<?php
if(isset($_SESSION['username'])){
  echo "<script>window.location.href='".APPURL."'</script>";
}
if(isset($_POST['submit'])){
  if(empty($_POST['username']) || empty($_POST['email'])  || empty($_POST['password']) ){
    echo "<script>alert('one are more input are empty')</script>";
  }else{
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $insert= $conn->prepare("INSERT INTO users (username,email,mypassword) VALUES(:username,:email,:mypassword)");
    $insert->execute([":username"=> $username,
    ":email"=>$email,
    ":mypassword"=>$password]);
    header("location:login.php",true);
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        .hero-wrap {
            position: relative;
            height: 100vh;
            background-image: url('../image/Riad.jpg'); /* Remplacez par votre chemin d'image */
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 31px;
            background-attachment: fixed; 
        }
        .form-wrap {
            background-color: white;
            padding: 50px;
            width: 300px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0);
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-control {
            width: 270px;
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
            width: 290px;
        }
        .btn-primary:hover {
            background-color: rgba(253, 119, 146, 0.8);
        }
    </style>
    </style>
</head>
<body>
<body>
    <div class="hero-wrap">
        <div class="form-wrap">
            <form action="register.php" method="POST" class="appointment-form">
                <h3 class="mb-3">Register</h3>
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Username">
                </div>
                <div class="form-group">
                    <input type="text" name="email" class="form-control" placeholder="Email">
                </div>
               
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Register" class="btn btn-primary py-3 px-4">
                </div>
            </form>
        </div>
    </div>
</body>
</body>
</html>
<?php require "../includes/footer.php"; ?>
