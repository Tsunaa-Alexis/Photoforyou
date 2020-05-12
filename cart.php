<?php
if (isset($_POST['buy'])) {
setcookie("CART", "[]",0,"/");
header('Location: cart.php');
}
?>

<!DOCTYPE html>
<html>
<header>
  <title>PhotoForYou</title>
  <?php
  include ("include/entete.inc.php");
  ?>
</header>
<body class="bg-light">
<?php

    $cart = json_decode($_COOKIE["CART"]);
    $totpanier = 0;
    foreach  ($cart as $elem) {
      $totpanier ++;
    }
?>
    <div class="container">
      <div class="row py-5 titre">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Votre panier</span>
            <span class="badge badge-secondary badge-pill"><?php echo $totpanier ?></span>
          </h4>
          <ul class="list-group mb-3">
            <?php
            $total = 0;
            foreach  ($cart as $elem) {
              $photo = $pmanager->getcart($elem->id);
              echo '
              <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div style="width: 50%;  overflow: hidden;">
                  <h6 class="my-0">'.$photo->getNom_photo().'</h6>
                </div>
                <span class="text-muted">'.$photo->getPrix().' Crédit(s)</span>
                <div id='.$photo->getId_photo().'>
                  <button style="border:0;background:transparent;" class="del"><span class="text-muted"><i class="far fa-times-circle" placeId="'.$photo->getId_photo().'"></i></span></button>
                </div>
                
              </li>
              ';
              $total += $photo->getPrix();
            }?>
            <li class="list-group-item d-flex justify-content-between">
              <span id="notif">Total (CREDIT)</span>
              <strong><?php echo $total ?> Crédit(s)</strong>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Mes Crédits</span>
              <strong><?php echo $_SESSION['Credit'] ?> Crédit(s)</strong>
            </li>
          </ul>

          <form class="card p-2">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Promo code">
              <div class="input-group-append">
                <button type="submit" class="btn btn-secondary">Réclamer</button>
              </div>
            </div>
          </form>

          <form class="card p-2" method="post">
            <div class="input-group">
              <button type="submit" name="buy" class="btn btn-success btn-lg btn-block">Acheter</button>
            </div>
          </form>

        </div>
        <div class="col-md-8 order-md-1">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Les photos</span>
          </h4>
          <ul class="list-group mb-3">
            <?php
            $total = 0;
            foreach  ($cart as $elem) {
              $photo = $pmanager->getcart($elem->id);
              $photographe = $manager->getUserbyid($photo->getId_user());
              echo '
              <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div style=" width: 30%; word-wrap: break-word;">
                  <div>
                    <h6 class="my-0">'.$photo->getNom_photo().'</h6>
                    <img src="'.$photo->getURL_photo().'" width="75em" height="75em"/><br>
                  </div>
                  <div style="display: flex; float:left;">
                    <small class="text-muted">Description : <br>'.$photo->getDescription().'</small>
                  </div>
                </div>
                <div style="position: absolute; margin-left: 40%">
                  <small class="text-muted">Poids : '.$photo->getPoids().' O</small><br>
                  <small class="text-muted">Photographe : '.$photographe->getPrenom().' '.$photographe->getNom().'</small>
                </div>
                <div>
                  <small class="text-muted">Taille : '.$photo->getTaille_pixels_x().'x'.$photo->getTaille_pixels_y().'</small>
                </div>
              </li>
              ';
              $total += $photo->getPrix();
            }


            if (isset($_POST['buy'])) {
              if ($_SESSION['Credit'] >= $total) {
                foreach  ($cart as $elem) {
                  $photo = $pmanager->getcart($elem->id);
                  $manager->trade($_SESSION['Id'],$photo->getId_user(),$photo->getPrix());
                  $pmanager->sellphoto($elem->id,$_SESSION['Id'],$photo->getPrix());
                }
                $_SESSION['Credit'] = $_SESSION['Credit'] - $total;
                
              }
              else {
        //............///////.......//
              }
            }
            ?>
          </ul>
        </div>
      </div>
    </div>
<?php
    include ("include/piedDePage.inc.php");
?>
<script type="text/javascript" src="js/cart.js"></script>


</body>
</html>








