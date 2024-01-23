<?php require "includes/header.php"  ?>
<?php require "config/config.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <style>
        .full-width-background {
      height: 700px; /* Hauteur de l'image */
      background-image: url('<?php echo APPURL?>/image/Riad.jpg');
      background-size: cover;
      background-position: center;
      position: relative;
      text-align: center;
      color: white;
      scroll-behavior: auto;
      background-attachment: fixed; 
      margin-top: 31px;
      
    }
   h2 {
      font-size: 48px; /* Taille du texte Welcome */
      margin-top: 31px;
      padding-top: 150px;
      margin-bottom: 20px; /* Espacement avec les boutons */
    }
    </style>
</head>
<body>
<div class="full-width-background">
  <h2>Services</h2>
  <p class="khawla"></p>
  
</div> 
</body>
</html>
<?php require "includes/footer.php"; ?>
