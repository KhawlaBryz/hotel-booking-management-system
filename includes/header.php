<?php 
define("APPURL","http://localhost/hotel");
session_start();
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Header </title>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"><!-- Lien vers Font Awesome -->

  <style>
    .nav-item {
  position: relative;
}

.nav-item:hover .dropdown-menu {
  display: block;
}

.dropdown-menu {
  position: absolute;
  top: 100%;
  left: 0;
  z-index: 1000;
  display: none;
  float: left;
  min-width: 10rem;
  padding: 0.5rem 0;
  margin: 0.125rem 0 0;
  font-size: 1rem;
  color: #212529;
  text-align: left;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid rgba(0, 0, 0, 0.15);
  border-radius: 0.25rem;
  text-decoration: none;
}

.dropdown-item {
  display: block;
  width: 100%;
  padding: 0.25rem 1.5rem;
  clear: both;
  font-weight: 400;
  color: #212529;
  text-align: inherit;
  white-space: nowrap;
  background-color: transparent;
  border: 0;
  text-decoration: none;
}

.dropdown-item:hover {
  background-color: #f8f9fa;
  color: #212529;
}
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      padding-top: 0px;
    }
    header {
      background-color: white;
      padding: 0px 0;
    }
    .top-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      height: 25px;
      font-size: 12px;
      background-color: #fd7792;
    }
    .contact-info {
      margin-left: 20px;
    }
    .contact-info span {
      color: white;
    }
    .social-icons {
      margin-right: 20px;
    }
    .social-icons a {
      margin-right: 10px;
    }
    nav ul {
      list-style: none;
      display: flex;
      align-items: center;
      padding: 0 15px; /* Ajout de padding pour l'espacement des liens */
    }
    nav ul li a.lien {
      margin-left: 50px; /* Pour ajouter de l'espace entre les liens */
      color: black; /* Couleur des liens */
      text-decoration: none; /* Supprime le soulignement */
      transition: color 0.3s, border-bottom-color 0.3s; /* Animation de transition */
      padding-bottom: 30px; /* Espace pour la bordure inférieure */
      border-bottom: 2px solid transparent; /* Bordure inférieure transparente */
    }
  
    nav ul li a.lien:hover {
      color: #fd7792; /* Couleur rose au survol */
      border-bottom-color: #fd7792; /* Bordure inférieure rose au survol */
    }
    nav ul li a.lien.active {
  color: #fd7792; /* Couleur rose pour le lien actif */
  border-bottom-color: #fd7792; /* Bordure inférieure rose pour le lien actif */
}
    nav ul li:first-child {
      margin-left: 0; /* Annule la marge pour le premier élément */
      margin-right: auto; /* Place le premier élément à gauche */
    }
    .site-name {
      font-weight: bold;
      font-size: 18px;
      color: black;
      text-decoration: none;

    }
    /* Styles de survol spécifiques au lien "Riad Medina" */
    .site-name:hover {
      text-decoration: none;
    }
    nav ul li span{
        color: #fd7792;
    }
    
    .social-icons a:hover {
        color:black;
}
.nav-link dropdown-toggle{
      margin-left: 50px; /* Pour ajouter de l'espace entre les liens */
      color: black; /* Couleur des liens */
      text-decoration: none; /* Supprime le soulignement */
      transition: color 0.3s, border-bottom-color 0.3s; /* Animation de transition */
      padding-bottom: 30px; /* Espace pour la bordure inférieure */
      border-bottom: 2px solid transparent; 
}
.nav-link.dropdown-toggle {
    /* Vos styles pour le lien du nom d'utilisateur */
    color: black; /* Couleur du texte */
    text-decoration: none; /* Suppression du soulignement */
    transition: color 1s; /* Animation de transition */
    margin-left: 50px;
  }
  </style>
</head>
<body>
  <header>
    <div class="top-bar">
      <div class="contact-info">
        <a><span>0677889900</span></a>
        <a><span>RiadMedina@gmail.com</span></a>
      </div>
      <div class="social-icons">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
      </div>
    </div>
    <nav>
      <ul>
        <li><a href="<?php echo APPURL?>/index.php" class="site-name">Riad<span>Medina</span></a></li>
        <li><a href="<?php echo APPURL?>/index.php" class="lien <?php if($currentPage === 'index.php') echo 'active';?>">Home</a></li>
        <li><a href="<?php echo APPURL?>/About.php" class="lien <?php if($currentPage === 'About.php') echo 'active';?>">About</a></li>
        <li><a href="<?php echo APPURL?>/Services.php" class="lien <?php if($currentPage === 'Services.php') echo 'active';?>">Services</a></li>
        <li><a href="<?php echo APPURL?>/contact.php" class="lien <?php if($currentPage === 'contact.php') echo 'active';?>">Contact</a></li>
        <?php if(!isset($_SESSION['username'])) : ?>
        <li><a href="<?php echo APPURL;?>/auth/Register.php" class="lien <?php if($currentPage === 'register.php') echo 'active';?>">Register</a></li>
        <li><a href="<?php echo APPURL;?>/auth/login.php" class="lien <?php if($currentPage === 'login.php') echo 'active';?>">Login</a></li>
        <?php else : ?>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo $_SESSION['username']; ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?php echo APPURL;?>/auth/logout.php">logout</a></li>
          </ul>
        </li>
        <?php endif; ?>
       </ul>
    </nav>
  </header>
</body>
</html>