  <?php
    include("allPhotofunction.php");   
?>



<!DOCTYPE html>
<html>
<header>
  <title>PhotoForYou</title>
  <?php
  include ("include/entete.inc.php");
  ?>
</header>
<body>
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="photo/1.jpg" class="d-block w-100" alt="..."  width="500px" height="500px">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="photo/2.jpg" class="d-block w-100" alt="..." width="500px" height="500px">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="photo/3.jpg" class="d-block w-100" alt="..." width="500px" height="500px">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<div class="container">
  <div class="leg">
    <legend>Toutes les photo qu'il vous faut !</legend>
  </div>
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Toutes les photos</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Populaires</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Nouveautés</a>
    </li>
  </ul>
  <div class="cola">
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"><?php displayAllPhotos($db); ?></div>
      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"><?php displayAllPhotos2($db); ?></div>
      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"><?php displayAllPhotos3($db); ?></div>
    </div>
  </div>
</div>




<?php
    include ("include/piedDePage.inc.php");
?>
<script type="text/javascript" src="js/cart.js"></script>
</body>
</html>