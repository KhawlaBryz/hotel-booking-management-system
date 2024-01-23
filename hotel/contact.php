<?php require "includes/header.php"  ?>
<?php require "config/config.php" ?>
<?php
if(isset($_POST['submit'])) {
    if(empty($_POST['Name']) || empty($_POST['Email']) || empty($_POST['Subject']) || empty($_POST['Message'])) {
        echo "<script>alert('One or more inputs are empty')</script>";
    } else {
        $name = $_POST['Name'];
        $email = $_POST['Email'];
        $subject = $_POST['Subject'];
        $message = $_POST['Message'];
        $insert = $conn->prepare("INSERT INTO contact (name, email, subject, message) VALUES (:name, :email, :subject, :message)");
        $insert->execute([
            ":name" => $name,
            ":email" => $email,
            ":subject" => $subject,
            ":message" => $message
        ]);
        
        header("location: login.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        .hero-wrap {
            position: relative;
            height: 100vh;
            background-image: url("<?php echo APPURL?>/image/Riad.jpg"); /* Remplacez par votre chemin d'image */
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
</head>
<body>
<div class="hero-wrap">
        <div class="form-wrap">
            <form action="contact.php" method="POST" class="appointment-form">
                <h3 class="mb-3">Contact</h3>
                <div class="form-group">
                    <input type="text" name="Name" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                    <input type="text" name="Email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="text" name="Subject" class="form-control" placeholder="Subject">
                </div>
                <div class="form-group">
                    <textarea  name="Message" class="form-control" placeholder="Message"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Send message" class="btn btn-primary py-3 px-4">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<?php require "includes/footer.php"; ?>
