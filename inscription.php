<?php
include ("include/entete.inc.php");
if (isset($_POST['valider']))
{
  $user = new User(['Nom' => $_POST['nom'], 'Prenom' => $_POST['prenom'], 'Mail' => $_POST['mail'], 'Mdp' => $_POST['motdepasse1'],  'Type' => $_POST['choixType'], 'NumTel' => $_POST['numtel']]); 
  $manager->add($user);
  header('Location: inscriptionOK.php'); 
}

?>

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
	<div class="container">
    <div class="jumbotron">
      <h1 class="display-4">Inscription</h1>
      <p class="lead">Merci de remplir ce formulaire d'inscription.</p>
      <hr class="my-4">
      <p>Vous ferez bientôt parti de nos membres. Vous avez fait le bon choix ;-)</p>
    </div>
    <form method="post" oninput='motdepasse2.setCustomValidity(motdepasse2.value != motdepasse1.value ?  "Mot de passe non identique" : "")' id="form"  novalidate>
      <div class="form-group row">
        <div class="col-md-4 mb-3">
          <label for="prenom">Prénom</label>
          <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Votre prénom" required>
          <div class="invalid-feedback">
            Le champ prénom est obligatoire
          </div>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-4 mb-3">
          <label for="nom">Nom</label>
          <input type="text" class="form-control" name="nom" id="nom" placeholder="Votre nom" required>
          <div class="invalid-feedback">
            Les mots de passe ne sont pas identiques
          </div>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-4 mb-3">
          <label for="email">Adresse électronique</label>
          <input type="email" class="form-control" name="mail" id="email" placeholder="E-mail" required>
          <small id="emailHelp" class="form-text text-muted">Nous ne partagerons votre email.</small>
          <div class="invalid-feedback">
            Vous devez fournir un email valide.
          </div>
        </div>
      </div>

      <div class="form-group row">
        <div class="col-md-4 mb-3">
          <label for="prenom">Num. Tel</label>
          <input type="text" class="form-control" name="numtel" id="numtel" placeholder="Votre numéro de téléphone" >
          <div class="invalid-feedback">
            Le champ prénom n'est pas obligatoire
          </div>
        </div>
      </div>

      <div class="form-group row">
        <div class="col-md-4 mb-3">
          <label for="motDePasse1">Votre mot de passe</label>
          <input type="password" class="form-control" name="motdepasse1" required>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-4 mb-3">
          <label for="motDePasse2">Confirmation du mot de passe</label>
          <input type="password" class="form-control" name="motdepasse2" required>
          <div name="message" class="invalid-feedback">
            Mot de passe invalide
          </div>
        </div>
      </div>

      <!-- Choix entre Client ou Photographe -->
      <div class="btn-group btn-group-toggle" data-toggle="buttons">
        <label class="btn btn-info">
          <input type="radio" name="choixType" id="client" value="Client">
          Client
        </label>
        <label class="btn btn-info">
          <input type="radio" name="choixType" id="Photographe" value="Photographe">
          Photographe
        </label>
      </div>

      <div class="form-group">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="emailPromo">
          <label class="form-check-label" for="emailPromo">
            Oui, je veux recevoir des sources d’inspiration visuelles, des offres spéciales et autres communications par e-mail. 
          </label>
        </div>
      </div>
      <input type="submit" value="Valider" class="btn btn-primary" name="valider" />
    </form>
  </div>

  
  <script>
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