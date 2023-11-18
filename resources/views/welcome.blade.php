<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet" type="text/css">
    
    <link rel="stylesheet" href="public/css/fontawesome.css">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
    </head>
   
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
<style>
body {font-family: "Poppins",sans-serif;}
h1, h2, h3, h4, h5, h6 {
  font-family: " Poppins",sans-serif;
  
}
</style>
</head>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-padding w3-card" style="letter-spacing:4px;">
    <a href="#home" class="w3-bar-item w3-button"><i class="fa-solid fa-image"></i>My Gallery</a>
    <!-- Right-sided navbar links. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
      <a href="{{ route('register') }}" class="w3-bar-item w3-button">Register</a>
      <a href="{{ route('login') }}" class="w3-bar-item w3-button">Login</a>
      <a href="#menu" class="w3-bar-item w3-button">Our Service</a>
      <a href="#about" class="w3-bar-item w3-button">About</a>
      <a href="#contact" class="w3-bar-item w3-button">Contact Us</a>
    </div>
  </div>
</div>
<!-- Header -->
<header class="w3-display-container w3-content w3-wide" style="margin-top:50px;max-width:1700px; min-width:00px; height: 800px; background-image: url('user_images/thumb/camera.jpg'); background-size: cover; background-position: center;" id="home">
</header>

<!-- Page content -->
<div class="w3-content" style="max-width:1100px">

  <!-- About Section -->
 <div class="w3-row w3-padding-64" id="about">
    <div class="w3-col m6 w3-padding-large w3-hide-small">
     <img src="user_images\thumb\slider-image2.jpg"  width="500" height="600">
    </div>

    <div class="w3-col m6 w3-padding-large">
      <h1 class="w3-center">About us</h1><br>
      <p class="w3-large">Notre équipe dévouée s'engage à offrir une plateforme de gestion de galerie d'images qui combine innovation et convivialité. Nous mettons l'utilisateur au cœur de notre mission en proposant des outils avancés pour télécharger, organiser et transformer les images, tout en garantissant la sécurité des données. Notre priorité est d'offrir une expérience exceptionnelle grâce à une interface intuitive et des fonctionnalités de pointe. Nous restons à l'écoute de nos utilisateurs pour constamment améliorer et adapter notre plateforme, tout en assurant un service clientèle réactif. Notre engagement envers l'excellence, l'innovation et la satisfaction des utilisateurs guide notre travail quotidien pour offrir une solution de gestion d'images fiable, performante et évolutive.</p>
    </div>
</div>
  
  <hr>
  
  <!-- Menu Section -->
  <div class="w3-row w3-padding-64" id="menu">
    <div class="w3-col l6 w3-padding-large">
      <h1 class="w3-center">Our services</h1><br>
      <h4>Téléchargement, Chargement et Suppression d'Images</h4>
      <p class="w3-text-grey">Permet aux utilisateurs de facilement télécharger, charger et supprimer des images individuelles ou en lot au sein de leur galerie.</p><br>
      <h4>Organisation Hiérarchique des Images</h4>
      <p class="w3-text-grey">Permet aux utilisateurs de catégoriser et d'organiser les images selon une structure hiérarchique basée sur différents thèmes.</p><br>
      <h4>Transformation d'Images</h4>
      <p class="w3-text-grey">Permet aux utilisateurs de créer de nouvelles images en appliquant diverses transformations telles que le recadrage, la mise à l'échelle et d'autres modifications aux images existantes.</p><br>
      <h4>Utilisation de Descripteurs de Contenu d'Images</h4>
      <p class="w3-text-grey">Intégration avec une API REST basée sur Python (construite avec Flask et Flask Restful) qui calcule des descripteurs spécifiques du contenu des images</p><br>
    </div>
    
    <div class="w3-col l6 w3-padding-large">
      <img src="user_images\thumb\slider-image3.jpg" width="600" height="600">
    </div>
  </div>

  <hr>

  <!-- Contact Section -->
  <div class="w3-container w3-padding-64" id="contact">
    <h1>Contact</h1><br>
    <p>You can also contact us by phone 00553123-2323 or email catering@catering.com, or you can send us a message here:</p>
    <form action="/action_page.php" target="_blank">
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Name" required name="Name"></p>
      <p><input class="w3-input w3-padding-16" type="email" placeholder="email" ></p>
      <p><input class="w3-input w3-padding-16" type="datetime-local" placeholder="Date and time" required name="date" value="2020-11-16T20:00"></p>
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Message \ Special requirements" required name="Message"></p>
      <p><button class="w3-button w3-light-grey w3-section" type="submit">SEND MESSAGE</button></p>
    </form>
  </div>
  
<!-- End page content -->
</div>
<!-- Footer -->
<footer class="w3-center w3-light-grey w3-padding-32">
  <a href="#" class="w3-hover-text-indigo"><i class="fa fa-facebook-official w3-hover-opacity w3-xlarge"></i></a>
  <a href="#" class="w3-hover-text-purple"><i class="fa fa-instagram w3-hover-opacity w3-xlarge"></i></a>
  <a href="#" class="w3-hover-text-light-blue"><i class="fa fa-twitter w3-hover-opacity w3-xlarge"></i></a>
  <a href="#" class="w3-hover-text-red"><i class="fa fa-youtube w3-hover-opacity w3-xlarge"></i></a>
  <p>Propulsé par Students MBD</p>
  <p>Copyright &copy; 2023</p>
</footer>
</body>
</html>
    </body>
</html>
