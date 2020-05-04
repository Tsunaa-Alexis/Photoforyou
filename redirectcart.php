<!DOCTYPE html>
<html>
<head>
    <title>PhotoForYou</title>
    <?php
    include ("include/entete.inc.php");
    ?>
</head>
<body class="bg-light">


<?php
    include ("include/piedDePage.inc.php");
?>
<script type="text/javascript" src="bootstrap/js/cart.js"></script>


</body>
</html>









<?php 
/* foreach  ($cart as $elem) {
              $photo = $pmanager->getcart($elem->id);
              $photographe = $manager->getUserbyid($photo->getId_user());
              echo '
              <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div style="word-wrap: break-word;">
                  <h6 class="my-0" style="width: 50%;">'.$photo->getNom_photo().'</h6>
                  <img src="'.$photo->getURL_photo().'" width="75em" height="75em"/><br>
                  <small class="text-muted" style="width: 100%;">Description : <br>'.$photo->getDescription().'</small>
                </div>
                <div style="position: absolute; margin-left: 40%">
                  <small class="text-muted">Poids : '.$photo->getPoids().' O</small><br>
                  <small class="text-muted">Photographe : '.$photographe->getPrenom().' '.$photographe->getNom().'</small>
                </div>
                <small class="text-muted">Taille : '.$photo->getTaille_pixels_x().'x'.$photo->getTaille_pixels_y().'</small>
              </li>
              ';
              $total += $photo->getPrix();
            }?>*/



?>