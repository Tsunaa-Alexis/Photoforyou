<?php

if (isset($_POST['identifier']))
{
  if ($manager->getUser($_POST['mail']))
  {
  	$utilisateur = $manager->getUser($_POST['mail']);
    if ($utilisateur->getMdp() == $_POST['motdepasse'])
    {
      session_start ();
      $_SESSION['login'] = true;
      $_SESSION['NomUtilisateur'] = $utilisateur->getNom();
      $_SESSION['PrenomUtilisateur'] = $utilisateur->getPrenom();
      $_SESSION['Type'] = $utilisateur->getType();
      $_SESSION['Mail'] = $utilisateur->getMail();
      $_SESSION['NumTel'] = $utilisateur->getNumTel();
      $_SESSION['Id'] = $utilisateur->getId();
      $_SESSION['Credit'] = $utilisateur->getCredit();

      header('Location: membres.php');
    }
    else
    {
      header('Location: index.php');
      echo "<p>Il existe pas</p>";
    }
  }
  else
  {
    echo '<div class="jumbotron">
      <p class="lead">Ce mail n\'est pas présent dans la base !</p>
    </div>';
  }  
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>PhotoForYou : connexion</title>
	<?php
  include ("include/entete.inc.php");
  ?>
</head>
<body>
	<div class="container">
    <div class="jumbotron">
      <h1 class="display-4">Connexion</h1>
      <p class="lead">Merci de vous identifier</p>
    </div>
    <form method="post" id="formId"  novalidate>
      <div class="form-group row">
        <div class="col-md-4 mb-3">
          <label for="email">Adresse électronique : </label>
          <input type="email" class="form-control" name="mail" id="email" placeholder="E-mail" required>
          <div class="invalid-feedback">
            Le champ email est obligatoire
          </div>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-4 mb-3">
          <label for="motDePasse1">Mot de passe :</label>
          <input type="password" class="form-control" name="motdepasse" required>
        </div>
        <div class="invalid-feedback">
            Vous devez fournir un mot de passe.
        </div>
      </div>
      <input type="submit" value="Valider" class="btn btn-primary" name="identifier" />
    </form>
  </div>
  <script>
  (function() {
    "use strict"
    window.addEventListener("load", function() {
      var form = document.getElementById("formId")
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