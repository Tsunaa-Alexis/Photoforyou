<?php
  session_start();
  
  function chargerClasse($classname)
  {
    require 'classes/'.$classname.'.class.php';
  }
  spl_autoload_register('chargerClasse');

  $db = new PDO('mysql:host=127.0.0.1:3308;dbname=photoforyou','root','');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
  $manager = new UserManager($db);
  $pmanager = new PhotoManager($db);

  if (isset($_POST['deconnexion']))
  {
    session_unset ();
    session_destroy ();
    header('Location: index.php');
  }
?>
<!-- L'élément HTML <header> représente un groupe de contenu introductif aidant à la navigation. -->
<header>
  <meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- nav est un élément HTML servant à la navigation -->
    	<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="index.php">PhotoForYou</a>
        	<!-- Pour passer en mode hamburger si on est sur un petit écran -->

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="index.html">Photos</a>
  						<div class="dropdown-menu">
  						  <?php
  						    if (isset($_SESSION['login']) ) {
                		if ( $_SESSION['Type'] == 'Photographe') {
                			echo '<a class="dropdown-item" href="#">Vendre</a>';
                		}
                		elseif ( $_SESSION['Type'] == 'Client') {
                			echo '<a class="dropdown-item" href="acheter.php">Toutes les Photos</a>';
                		}
                  }
              	?>		
  							<a class="dropdown-item" href="#">Les plus populaires</a>
  							<a class="dropdown-item" href="#">Les nouveautés</a>
  						</div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="credit.php">Crédits</a>
            </li>
          </ul>
          		
				      <!-- formulaire de recherche -->
          <form class="form-inline my-2 my-lg-0" method="POST">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          <?php
          if (!isset($_SESSION['login']) ) {
            echo '
                  <ul class="navbar-nav mr-right">
                    <li class="nav-item">
                      <a class="nav-link btn btn-outline-dark" href="inscription.php">S\'inscrire</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link btn btn-outline-dark"   href="connexion.php">S\'identifier</a>
                    </li>
                  </ul>';
            }
          else {
              echo '
          		      <ul class="navbar-nav mr-auto">
                      <li class="nav-item dropdown">
                  		  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="index.html">'.$_SESSION['PrenomUtilisateur'].'&nbsp;'.$_SESSION['NomUtilisateur'].'</a>
  						          <div class="dropdown-menu">';
  						            if ( $_SESSION['Type'] == 'Photographe') {
                						echo '
                      						<a class="dropdown-item" href="profil.php">Mon Profil</a>
                      						<a class="dropdown-item" href="mesphotos.php">Mes Photos</a>
                      						<a class="dropdown-item" href="profil.php">Historique des Ventes</a>';
                					}
                					elseif ( $_SESSION['Type'] == 'Client') {
                						echo '
                      						<a class="dropdown-item" href="profil.php">Mon Profil</a>
                      						<a class="dropdown-item" href="mesphotos.php">Mes Photos</a>
                      						<a class="dropdown-item" href="#">Historique des factures</a>
                      						<a class="dropdown-item" href="panier.php">Panier</a>';
                					} 
                		    echo'
  						          </div>
                      </li>
          		      </ul>


                    <ul class="navbar-nav mr-right">
                      <li class="nav-item">
                        &nbsp;<input type="submit" value="Deconnexion" class="btn btn-primary" name="deconnexion" />
                      </li>
                    </ul>';
            }
          ?>
        </form>
        </div>
      </nav>
</header>