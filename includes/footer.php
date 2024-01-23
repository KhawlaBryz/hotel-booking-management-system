<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"><!-- Lien vers Font Awesome -->
  <title>Footer Example</title>
  <style>
    /* Vos styles CSS ici */
    body {
      margin: 0;
      font-family: Arial, sans-serif;
    }
    /* Styles pour les deux sections */
    .dark-section {
      background-color: rgba(0, 0, 0, 0.80);
      color: #BDBDBD;
      padding: 20px 0;
      text-align: center;
    }
    .light-section {
      background-color: black;
      color: white;
      padding: 20px 0;
      text-align: center;
    }
    .container {
      display: flex;
      justify-content: space-around;
      flex-wrap: wrap;
      max-width: 1200px;
      margin: 0 auto;
    }
    .column {
      width: 200px;
      margin-bottom: 20px;
      text-align: left;
    }
    .column h2 {
      font-size: 18px;
      margin-bottom: 10px;
    }
    .column p {
      font-size: 14px;
      line-height: 1.5;
      margin-bottom: 15px;
    }
    .column ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }
    .column ul li {
      margin-bottom: 5px;
    }
    .subscribe-form {
      display: flex;
      margin-bottom: 20px;
    }
    .subscribe-form input[type="text"] {
      width: 120px;
      padding: 5px;
      border: 1px solid #ccc;
      border-radius: 3px;
      margin-right: 5px;
    }
    .subscribe-form button {
      padding: 5px 10px;
      background-color: #333;
      color: #fff;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }
    .follow-us {
      display: flex;
      justify-content: center;
      margin-bottom: 20px;
    }
    .follow-us a {
      display: inline-block;
      width: 30px;
      height: 30px;
      background-color: #333;
      color: #fff;
      text-align: center;
      line-height: 30px;
      border-radius: 50%;
      margin-right: 10px;
      text-decoration: none; /* Supprime le soulignement */
    }
    .footer-bottom {
      border-top: none; /* Supprime la bordure */
      padding-top: 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
    }
    .footer-bottom .links {
      display: flex;
      align-items: center;
      flex-wrap: wrap;
      margin-left: -10px; /* Supprime l'espacement initial */
      align-items: left;
    }
    .footer-bottom .links a {
      margin-right: 10px;
      font-size: 12px;
      color: #ccc; /* Couleur gris clair */
      text-decoration: none !important; /* Supprime le soulignement */
    }
    .copyright {
      margin-left: auto; /* Aligner à droite */
      color: #BDBDBD; /* Couleur du texte */
    }
    .read{
        color:#fd7792;
        text-decoration: none;
    }
    .tagcloud a {
        color:#ccc; /* Couleur gris clair */
        text-decoration: none !important; /* Supprime le soulignement */
        font-size: 12px;
    }
    

.follow-us a:hover {
  color: #fd7792; /* Change la couleur des icônes au survol */
}
  </style>
</head>
<body>
<footer class="footer">
  <div class="dark-section">
    <div class="container">
      <div class="column">
        <h2>Riad Medina</h2>
        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
        <a href="#" class="read">Read more <span style="font-size: 11px;">&gt;</span></a>
      </div>
      <div class="column">
        <h2>Services</h2>
        <ul class="tagcloud">
          <li><a href="#">Map Direction</a></li>
          <li><a href="#">Accommodation Services</a></li>
          <li><a href="#">Great Experience</a></li>
          <li><a href="#">Perfect central location</a></li>
        </ul>
      </div>
      <div class="column">
        <h2>Tag cloud</h2>
        <div class="tagcloud">
          <a href="#">apartment</a>
          <a href="#">home</a>
          <a href="#">vacation</a>
          <a href="#">rental</a>
          <a href="#">rent</a>
          <a href="#">house</a>
          <a href="#">place</a>
          <a href="#">drinks</a>
        </div>
      </div>
      <div class="column">
        <h2 class="follow-us">Follow us</h2>
        <div class="follow-us">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a  href="#"><i class="fab fa-twitter"></i></a>
          <a  href="#"><i class="fab fa-instagram"></i></a>
        </div>
      </div>
    </div>
  </div>
  <div class="light-section">
    <div class="footer-bottom">
      <div class="container">
        <div class="links" style="margin-right: auto;" >
          <a href="#">Terms</a>
          <a href="#">Privacy</a>
          <a href="#">Compliances</a>
        </div>
        <p class="copyright">
          &copy; <script>document.write(new Date().getFullYear())</script> All rights reserved
        </p>
      </div>
    </div>
  </div>
</footer>
</body>
</html>