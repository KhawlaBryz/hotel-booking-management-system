<?php 
require "../includes/header.php";
require "../config/config.php";

if (!isset($_SESSION['username'])) {
    header("location:".APPURL."/auth/login.php");
}

if (isset($_GET['hotel_id'])) {
    $id = $_GET['hotel_id'];
    $stmt = $conn->prepare("SELECT * FROM rooms WHERE status = 1 AND hotel_id = ?");
    $stmt->execute([$id]);
    $allrooms = $stmt->fetchAll(PDO::FETCH_OBJ);
    $stmth = $conn->prepare("SELECT * FROM hotels WHERE id = ?");
    $stmth->execute([$id]);
    $hotels = $stmth->fetch(PDO::FETCH_OBJ);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
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
      
    }
    .full-width-background h2 {
        padding-top:150px;
      font-size: 48px; /* Taille du texte Welcome */
      margin-top: 31px;
      margin-bottom: 20px; /* Espacement avec les boutons */
    }
    .rooms-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center; /* Centre les éléments horizontalement */
}
h1{
    text-align: center;
}
.room-wrap {
    border: 1px solid #ccc;
    margin-bottom: 20px;
    height: 350px; /* Hauteur fixe pour chaque carte */
    width: 300px;
    display: flex;
    margin-left: 70px;
    background-color: #ccc; /* Remplacez par le chemin de votre image */
    background-size: cover; /* Ajuste la taille de l'image pour couvrir la carte */
    background-position: center; /* Centre l'image dans la carte */
}
.room-wrap .img {
        flex: 1;
        position: relative;
        overflow: hidden;
    }

    .room-wrap .img img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* L'image s'ajuste pour remplir la totalité du conteneur */
    }
.room-wrap .left-arrow {
  flex: 1;
  background-color: #f8f9fa;
}

.room-wrap .text {
  padding: 20px;
}

.room-wrap h3 {
  font-size: 22px;
  margin-bottom: 15px;
  color: black; /* Couleur du texte */
    text-decoration: none;
}
.room-wrap .text {
    padding: 20px;
    background-color: white; /* Définit la couleur de fond initiale */
    color: black; /* Couleur du texte */
    text-decoration: none;
    transition: background-color 0.3s ease; /* Animation de transition fluide */
}

.room-wrap h3 a,
.room-wrap .btn-custom {
  color: black;
  text-decoration: none; /* Enlève le soulignement des liens */
}
.room-wrap .btn-custom:hover {
  color: #fd7792;
  text-decoration: none; /* Enlève le soulignement des liens */
}
  </style>
</head>
<body>
<div class="full-width-background">
    <h2>Appartment Room</h2>
    <p class="khawla"></p>
</div> 

<h1>Rooms of <?php echo $hotels->name;?></h1>
<div class="row no-gutters rooms-container">
        <?php foreach($allrooms as $rooms): ?>
            <div class="col-lg-6">
                <div class="room-wrap ">
                <a href="<?php echo APPURL ?>/rooms/room-single.php?id=<?php echo $rooms->id ?>" class="img"><img src="<?php echo APPURL?>/image/<?php echo $rooms->image; ?>" alt="<?php echo $rooms->name; ?>"></a>
                    <div class="half left-arrow d-flex align-items-center">
                        <div class="text p-4 p-xl-5 text-center">
                            <p class="star mb-0 pink-stars">
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </p>
                            <h3 class="mb-3"><a href="<?php echo APPURL?>/rooms/room-single.php?id=<?php echo $rooms->id?>" ><?php echo $rooms->name; ?><span class="icon-long-arrow-right"></span></a></h3>
                            <ul class="list-accommodation">
                                <li><span>Max:</span> <?php echo $rooms->num_persons ?> Persons</li>
                                <li><span>Size:</span> <?php echo $rooms->size ?> m2</li>
                                <li><span>View:</span> <?php echo $rooms->view ?></li>
                                <li><span>Bed:</span> <?php echo $rooms->num_beds ?></li>
                            </ul>
                            <p class="pt-1">
                                <?php if (!isset($_SESSION['username'])) : ?>
                                    <a href="<?php echo APPURL ?>/index.php" class="btn-custom px-3 py-2">View Room Details <span class="icon-long-arrow-right"></span></a>
                                <?php else : ?>
                                    <a href="<?php echo APPURL ?>/rooms/room-single.php?id=<?php echo $rooms->id ?>" class="btn-custom px-3 py-2">View Room Details <span class="icon-long-arrow-right"></span></a>
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
   </div>


<?php require "../includes/footer.php"; ?>