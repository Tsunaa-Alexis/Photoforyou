<!DOCTYPE html>
<html>
<head>
	<title>PhotoForYou</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Liaison au fichier css de Bootstrap -->
	<link href="Bootstrap/css/bootstrap.css" rel="stylesheet">
</head>
<body>


  <?php
	include ("include/entete.inc.php")
  ?>
	<div class="container">
    	<div class="jumbotron">
      		<h1 class="display-4">Page des utilisateurs de PhotoForYou</h1>
      		<?php echo '<p class="lead">Bonjour '.$_SESSION['PrenomUtilisateur'].' comment allez vous ?</p>'?>
      		<hr class="my-4">
    </div>
  <?php
    include ("include/piedDePage.inc.php");
  ?>
</body>
</html>