<?php require "includes/header.php"  ?>
<?php require "config/config.php" ?>
<?php 
//hotels
$hotel=$conn->query("SELECT * FROM hotels where status=1");
$hotel->execute();
$allhotels=$hotel->fetchAll(PDO::FETCH_OBJ);
//rooms
$rooms=$conn->query("SELECT * FROM rooms where status=1");
$rooms->execute();
$allrooms=$rooms->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
      font-size: 48px; /* Taille du texte Welcome */
      margin-top: 31px;
      margin-bottom: 20px; /* Espacement avec les boutons */
    }
    .full-width-background .btn {
      padding: 10px 20px;
      border: 2px solid transparent;
      border-radius: 5px;
      margin: 0 10px;
      cursor: pointer;
      text-decoration: none;
      width: 100px; /* Largeur fixe pour les boutons */
      display: inline-block;
    }
    
    .full-width-background .rent {
      background-color: #fd7792; /* Rose */
      color: white;
    }
    .hotel-card .btn{
        padding: 10px 20px;
      border: 2px solid transparent;
      border-radius: 5px;
      cursor: pointer;
      text-decoration: none;
      width: 100px; /* Largeur fixe pour les boutons */
      display: inline-block;
      margin: auto;
    }
    .hotel-card .rent {
      background-color: #fd7792; /* Rose */
      color: white;
    }
    .hotel-card .rent:hover {
      background-color: rgba(253, 119, 146, 0.1); /* Rose au survol */
      border-color: #fd7792; /* Bordure rose au survol */
      color: #fd7792;
    }
    .full-width-background .contact {
      background-color: white; /* Blanc */
      color: black;
    }
    .full-width-background .rent:hover {
      background-color: rgba(253, 119, 146, 0.1); /* Rose au survol */
      border-color: #fd7792; /* Bordure rose au survol */
      color: #fd7792;
    }
    .full-width-background .contact:hover {
      background-color: rgba(253, 119, 146, 0.1); /* Rose au survol */
      border-color: white; /* Bordure rose au survol */
      color: white;
    }
    h2{
        padding-top:100px;
    }
    .hotel-card {
        border: 1px solid #ccc;
        padding: 10px; /* Réduit le rembourrage */
        margin: 10px;
        width: 250px;
        height: 400px;
        display: inline-block;
        overflow: hidden;
    }

    .hotel-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        margin-bottom: -80px; /* Réduit l'espace entre l'image et le texte */
    }

    .hotel-card .info {
        overflow-y: auto;
    }

    .hotel-card h2,
    .hotel-card p {
        margin: 5px 0; 
    }
        /* Vos autres styles */
        .rooms-container {
  display: flex;
  flex-wrap: wrap;
  gap: 20px; /* Espacement entre les cartes */
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
h1 {
            text-align: center;
            margin-top: 20px; /* Ajoute de l'espace en haut du titre */
        }
        .room-wrap {
    border: 1px solid #ccc;
    margin-bottom: 20px;
    height: 350px; /* Hauteur fixe pour chaque carte */
    width: 300px;
    display: flex;
    background-image: url('<?php echo APPURL?>/image/Riad2.jpg'); /* Remplacez par le chemin de votre image */
    background-size: cover; /* Ajuste la taille de l'image pour couvrir la carte */
    background-position: center; /* Centre l'image dans la carte */
}
.final {
      height: 300px; /* Hauteur de l'image */
      background-image: url('<?php echo APPURL?>/image/Riad.jpg');
      
      background-size: cover;
      background-position: center;
      position: relative;
      text-align: center;
      color: white;
      scroll-behavior: auto;
      background-attachment: fixed; 
      
    }
    .final h2 {
      font-size: 48px; /* Taille du texte Welcome */
      margin-top: 1px;
      margin-bottom: 20px; /* Espacement avec les boutons */
    }
    .final .btn {
      padding: 10px 20px;
      border: 2px solid transparent;
      border-radius: 5px;
      margin: 0 10px;
      cursor: pointer;
      text-decoration: none;
      width: 100px; /* Largeur fixe pour les boutons */
      display: inline-block;
    }
    .final .rent {
      background-color: #fd7792; /* Rose */
      color: white;
    }
    .final .contact {
      background-color: white; /* Blanc */
      color: black;
    }
    .final .rent:hover {
      background-color: rgba(253, 119, 146, 0.1); /* Rose au survol */
      border-color: #fd7792; /* Bordure rose au survol */
      color: #fd7792;
    }
    .final .contact:hover {
      background-color: rgba(253, 119, 146, 0.1); /* Rose au survol */
      border-color: white; /* Bordure rose au survol */
      color: white;
    }
    .pink-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(253, 119, 146, 0.5); /* Couleur rose avec transparence */
        z-index: 1;
    }
    .star mb-0 .pink-stars .fa-star {
            color: #fd7792; /* Couleur rose */
        }
    </style>
</head>
<body>
<div class="full-width-background">
  <h2>Welcome to Riad Medina</h2>
  <p class="khawla">Rent an appartment for your vacation</p>
  <a href="#" class="btn rent">Learn more</a>
  <a href="<?php echo APPURL?>/contact.php" class="btn contact">Contact Us</a>
</div>
<h1>Our Hotels</h1>
    <div class="hotels-list">
        <?php if ($allhotels && count($allhotels) > 0) : ?>
            <?php foreach ($allhotels as $hotel) : ?>
                <div class="hotel-card">
                    <img src="image/<?php echo $hotel->image; ?>" alt="<?php echo $hotel->name; ?>">
                    <h2><?php echo $hotel->name; ?></h2>
                    <p>Description : <?php echo $hotel->description; ?></p>
                    <p>Emplacement : <?php echo $hotel->location; ?></p>
                    <?php if(!isset($_SESSION['username'])):?>
                    <a href="<?php echo APPURL ?>/auth/login.php?hotel_id=<?php echo $hotel->id ?>" class="btn rent">View Rooms</a>
                    <?php else :?>
                    <a href="<?php echo APPURL ?>/rooms/room-list.php?hotel_id=<?php echo $hotel->id ?>" class="btn rent">View Rooms</a>
                    <?php endif?>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>Aucun hôtel disponible pour le moment.</p>
        <?php endif; ?>
    </div>
    <h1>Our Rooms</h1>
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
                                <li><span>Price:</span> <?php echo $rooms->price?>$</li>
                                <li><span>Max:</span> <?php echo $rooms->num_persons ?> Persons</li>
                                <li><span>Size:</span> <?php echo $rooms->size ?> m2</li>
                                <li><span>View:</span> <?php echo $rooms->view ?></li>
                                <li><span>Bed:</span> <?php echo $rooms->num_beds ?></li>
                                

                            </ul>
                            <p class="pt-1">
                                <?php if (!isset($_SESSION['username'])) : ?>
                                    <a href="<?php echo APPURL ?>/auth/login.php" class="btn-custom px-3 py-2">View Room Details <span class="icon-long-arrow-right"></span></a>
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

   <div class="final">
   <div class="pink-overlay">
   <h2>Ready to get started</h2>
  <p class="khawla">It’s safe to book online with us! Get your dream stay in clicks or drop us a line with your questions.
</p>
  <a href="#" class="btn rent">Learn more</a>
  <a href="<?php echo APPURL?>/contact.php" class="btn contact">Contact Us</a>
   </div>
</div>
</body>
</html>
<?php require "includes/footer.php"; ?>
