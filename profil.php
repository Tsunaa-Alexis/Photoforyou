<!DOCTYPE html>
<html>
<head>
	<title>PhotoForYou</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Liaison au fichier css de Bootstrap -->
	<link href="Bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>


  <?php
	include ("include/entete.inc.php");


	if (isset($_POST['valider'])) {
  		$user = new User(['Id' => $_POST['id'], 'Nom' => $_POST['nom'], 'Prenom' => $_POST['prenom'], 'Mail' => $_POST['mail'], 'NumTel' => $_POST['numtel']]); 
 		$manager->edit($user);

 		$_SESSION['NomUtilisateur'] = $_POST['nom'];
      	$_SESSION['PrenomUtilisateur'] = $_POST['prenom'];
      	$_SESSION['Mail'] = $_POST['mail'];
      	$_SESSION['NumTel'] = $_POST['numtel'];
  }

  if (isset($_POST['submit'])) {
    $manager->imgprofile('photo/',$_FILES['file']['tmp_name'],$_FILES['file']['type'],$_SESSION['Id'].'.png');
  }
  ?>
<!------ Include the above in your HEAD tag ---------->

<div class="container emp-profile">         
  <div class="row">
    <div class="col-md-4">
      <div class="profile-img">
        <?php
        $filename = 'photo/'.$_SESSION['Id'].'.png';
        if (file_exists($filename)) {
          echo '<img src="photo/'.$_SESSION['Id'].'.png" height="200px" width="300px"/>';
        } 
        else {
          echo '<img src="photo/1.png" alt=""/>';
        }
        ?>
        <div class="file btn btn-lg btn-primary">
          <div id="compteur">
            Change Photo
          </div>
          <form method="POST" action = "profil.php" enctype="multipart/form-data">
            <input type="file" name="file" id="col11" onclick="less1()" />
            <input type="submit" name="submit" value="blabla" style="display: none" id="col12" onclick="more1()">
          </form>
        </div>                    
      </div>
    </div>


    <div class="col-md-6">
      <div class="profile-head">
        <h5>
          <?php
          echo ''.$_SESSION['NomUtilisateur'].'&nbsp'.$_SESSION['PrenomUtilisateur'];
          ?>
        </h5>
        <h6>
          <?php
          echo $_SESSION['Type'];
          ?>
        </h6>
        <p class="proile-rating">RANKINGS : <span>8/10</span></p>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" onclick="on()" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab" onclick="diss()" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
          </li>
        </ul>
      </div>
    </div>


    
    <div class="row">
      <div class="col-md-4">
        <div class="profile-work">     
        </div>
      </div>
      <div class="col-md-8">
        <div class="tab-content profile-tab" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab" >
          	<div class="edit">
      			<a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/64/Edit_icon_%28the_Noun_Project_30184%29.svg/768px-Edit_icon_%28the_Noun_Project_30184%29.svg.png"></a>
    		</div>
            <div class="row">
              <div class="col-md-6">
                <label>Nom</label>
              </div>
              <div class="col-md-6">
                <p><?php
                  echo ''.$_SESSION['NomUtilisateur'].'&nbsp';
                ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label>Prénom</label>
              </div>
              <div class="col-md-6">
                <p><?php
                  echo ''.$_SESSION['PrenomUtilisateur'];
                ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label>Email</label>
              </div>
              <div class="col-md-6">
                <p><?php
                  echo $_SESSION['Mail'];
                ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label>Téléphone</label>
              </div>
              <div class="col-md-6">
                <p><?php
                  echo $_SESSION['NumTel'];
                ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label>Profession</label>
              </div>
              <div class="col-md-6">
                <p><?php
                  echo $_SESSION['Type'];
                ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label>Crédit</label>
              </div>
              <div class="col-md-6">
                <p><?php
                  echo $_SESSION['Credit'];
                ?></p>
              </div>
            </div>
            <div class="col-md-2">
            </div>
          </div>


          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
          	<div class="profilcard" style="display: flex; flex-flow: wrap;">
          		<?php 
          		$pmanager->getPhotoUser($_SESSION['Id'],$_SESSION['Type']);
          		?>
            </div>    
          </div>
        </div>
      </div>
    </div>          
  </div>
        
  <div class="changed changed-off">
    <h4> PROFIL </h4>
    <div class="closed"><img src="https://raw.githubusercontent.com/asmfadholi/urbanhireproject/master/icon/signout.png"></div>
      <form method="post" class="tab" id='form'>      
        <td><input class="change" name='id' type="hidden" value="<?php echo $_SESSION['Id'];?>"/></td>
        <tr>
          <br  /><td class="space">Prénom</td>
          <td><input class="change" name='prenom' value="<?php echo $_SESSION['PrenomUtilisateur'];?>"></td>  
        </tr>
        <tr>
          <br  /><td class="space">Nom</td>
          <td><input class="change" name='nom' value="<?php echo $_SESSION['NomUtilisateur'];?>"></td> 
        </tr>
        <tr>
          <br  /><td class="space">Email</td>
          <td><input class="change" name='mail' value="<?php echo $_SESSION['Mail'];?>"></td> 
        </tr>
        <tr>
          <br  /><td class="space">Phone</td>
          <td><input class="change" name='numtel' value="<?php echo $_SESSION['NumTel'];?>"></td>
        </tr>
        <input type="submit" value="Save" class="saved" name="valider" />
      </form>
    </div>  
  </div>     
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
  
  
  $(".edit, .closed, .saved").click(function(){
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

  <script type="text/javascript">
        function less1() {
          document.getElementById('col12').style.display='block';
          document.getElementById('col11').style.display='none';
          var msg ='Valider';
          $('#compteur').text(msg);


        }

        function more1(){
            document.getElementById('col11').style.display='block';
            document.getElementById('col12').style.display='none';
            var msg ='Change photo';
            $('#compteur').text(msg);

        }

        
    </script> 

  <?php
    include ("include/piedDePage.inc.php");
  ?>
</body>
</html>