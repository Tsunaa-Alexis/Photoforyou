<!DOCTYPE html>
<html>
<head>
	<title>PhotoForYou</title>
	<?php
  include ("include/entete.inc.php");
  ?>
</head>
<body>


  <?php

  if (isset($_POST['valider']))
{
  $idP = $manager->randomcode();
  $filename = 'photos/'.$idP.'.png';
  $pmanager->UploadPhoto('photos/',$_FILES['photo']['tmp_name'],$_FILES['photo']['type'],$idP.'.png');
  list($width, $height, $type, $attr) = getimagesize("photos/".$idP.".png");
  $poids = filesize($filename);

  $photo = new Photo(['Id_photo' => $idP, 'Nom_photo' => $_POST['titre'], 'Description' => $_POST['descriptif'], 'Prix' => $_POST['prix'], 'Taille_pixels_y' => $height,  'Taille_pixels_x' => $width, 'Poids' => $poids, 'Id_user' => $_SESSION['Id'], 'URL_photo' => 'photos/'.$idP.'.png']); 
  $pmanager->addPhoto($photo); 
  //header('Location: mesphotos.php');
  
}
  if ($_SESSION['Type'] == 'Photographe') {
    echo '<div class="edits">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
              Ajouter une photo <i class="fas fa-images"></i><span class="glyphicon glyphicon-send"></span>
            </button>
    </div>';
   
  }

  elseif ($_SESSION['Type'] == 'Client') {
    echo '<div class="edits">
      <a href="acheter.php">Acheter des photo<i class="fas fa-images"></i><span class="glyphicon glyphicon-send"></span></a>
    </div>';
   
  }
?>
<container>
    <?php 
      $pmanager->getPhotoUser($_SESSION['Id'],$_SESSION['Type']);             
    ?>
</container>

  <?php
  if($_SESSION['Type'] == 'Photographe') {
  ?>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">NOUVELLE PHOTO</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" class="tab" id='form' enctype="multipart/form-data">  
          <div class="modal-body">   
            <td><input class="change" name='id' type="hidden" value="<?php echo $_SESSION['Id'];?>"/></td>
            <tr>
              <br  /><td class="space">Titre</td>
              <td><input class="change" name='titre' ></td>  
            </tr>
            <tr>
              <br  /><td class="space">Descriptif(200 caractères) : </td><br />
              <td><textarea class="change" name='descriptif'></textarea></td> 
            </tr>
            <tr>
              <br  /><td class="space">Prix</td>
              <td><input class="change" name='prix' ></td>  
            </tr>
            <tr>
              <br  /><td class="space">Photo : </td><br>
              <td><input type="file" name="photo"><br  /></td>  
            </tr>
                
                 
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" value="Save" class="btn btn-primary" name="valider" /> 
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php
  }
  ?>    
</div>  
	
  <?php
  include ("include/piedDePage.inc.php");
  ?>
</body>
</html>