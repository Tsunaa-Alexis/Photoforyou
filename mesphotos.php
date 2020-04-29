<!DOCTYPE html>
<html>
<head>
	<title>PhotoForYou</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Liaison au fichier css de Bootstrap -->
	<link href="Bootstrap/css/bootstrap.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://kit.fontawesome.com/768b55194c.js" crossorigin="anonymous"></script>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link href="Bootstrap/css/bootstrap.css" rel="stylesheet">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>


  <?php
	include ("include/entete.inc.php");

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
      <a href="#">Ajouter une photo <i class="fas fa-images"></i><span class="glyphicon glyphicon-send"></span></a>
    </div>';
   
  }

  elseif ($_SESSION['Type'] == 'Client') {
    echo '<div class="edits">
      <a href="acheter.php">Acheter des photo<i class="fas fa-images"></i><span class="glyphicon glyphicon-send"></span></a>
    </div>';
   
  }
?>
    <div class="profilcard" style="display: flex; flex-flow: wrap; padding-top: 50px;">
  
    <?php 
      $pmanager->getPhotoUser($_SESSION['Id'],$_SESSION['Type']);             
    ?>
  </div> 

  <?php
  if($_SESSION['Type'] == 'Photographe') {
  ?>
  <div class="changed changed-off">
    <h4> NOUVELLE PHOTO </h4>
    <div class="closed"><img src="https://raw.githubusercontent.com/asmfadholi/urbanhireproject/master/icon/signout.png"></div>
      <form method="post" class="tab" id='form' enctype="multipart/form-data">      
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
          
        <input type="submit" value="Save" class="saved" name="valider" />
      </form>
    </div>  
  </div> 
  <?php
  }
  ?>    
</div>  

<!-- Script changement profil -->
  <script>$(document).ready(function(){
  $(".icon").click(function(){
    $(".icon").toggleClass('active');
    $('body').toggleClass("over");
    $('.on').toggleClass('off');
    $('.sidebar').toggleClass('active');    
  });
  $(".on").click(function(){
    $(".icon").toggleClass('active');
    $('body').toggleClass("over");
    $('.on').toggleClass('off');
    $('.sidebar').toggleClass('active');
  });
  $(".notif").click(function(){
    $(".circle").toggleClass("circle-off");
  });
  $(window).on('scroll', function(){
    if ($(window).scrollTop()){
      $("nav").slideUp();
    } else {
      $("nav").slideDown();
    }
  });
  $(".search2").click(function(){
    $(".find").toggleClass("find-off");
  });
  
  
  $(".edits, .closed, .saved").click(function(){
    $(".changed").toggleClass("changed-off");
    $('.on-1').toggleClass('off-1');
    $('body').toggleClass("over");
  });
  
  $('.datas').each(function(index){
  var simpan = $(this).html();    
  $(".change").eq(index).val(simpan);   
});

$(".saved").click(function(){
  $('.change').each(function(index){
    var searchData = $(this).eq(0).val();
    $(".datas").eq(index).html(searchData);
    var dat = $(".datas").eq(5).html();
  var tag = $(".datas").eq(1).html(); 
    $(".ubah").html(dat);
  $(".nametag").html(tag);
  });  
});
  $(".change").keypress(function(e){
    
    if(e.which == 13){      
      $(".saved").click();
    };
  });
})



(function() {
    "use strict"
    window.addEventListener("load", function() {
      var form = document.getElementById("form")
      form.addEventListener("submit", function(event) {
        if (form.checkValidity() == false) {
          event.preventDefault()
          event.stopPropagation()
        }
        form.classList.add("was-validated")
      }, false)
    }, false)
  }())
  </script>   


	
  <?php
  include ("include/piedDePage.inc.php");
  ?>
</body>
</html>