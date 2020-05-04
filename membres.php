<!DOCTYPE html>
<html>
<head>
	<title>PhotoForYou</title>
	<?php
  include ("include/entete.inc.php");
  ?>
</head>
<body>
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