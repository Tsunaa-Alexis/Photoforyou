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
  $cmanager = new CreditManager($db);

  if (isset($_POST['deconnexion']))
  {
    session_unset ();
    session_destroy ();
    header('Location: index.php');
  }
?>
<!-- L'élément HTML <header> représente un groupe de contenu introductif aidant à la navigation. -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="css/profil.css">
  <meta charset="utf-8">
  <script src="https://kit.fontawesome.com/768b55194c.js" crossorigin="anonymous"></script>
		<!-- nav est un élément HTML servant à la navigation -->
    	<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="index.php">PhotoForYou</a>
        	<!-- Pour passer en mode hamburger si on est sur un petit écran -->

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
  						  <?php
  						    if (isset($_SESSION['login']) ) {
                		if ( $_SESSION['Type'] == 'Photographe') {
                			echo '<a class="nav-link" href="#">Vendre</a>';
                		}
                		elseif ( $_SESSION['Type'] == 'Client') {
                			echo '<a class="nav-link" href="allPhoto.php">Toutes les Photos</a>';
                		}
                  }
              	?>		
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
                      						<a class="dropdown-item" href="historique.php">Historique des factures</a>';
                					} 
                		    echo'
  						          </div>
                      </li>
          		      </ul>';

                    if ( $_SESSION['Type'] == 'Client') {
                      echo '<ul class="navbar-nav mr-right">
                              <li class="nav-item">
                                <a href="cart.php" class="btn btn-success">
                                  Panier <span class="badge badge-light" id="notif"></span>
                                </a>
                              </li>
                            </ul>';
                    }

                    echo'
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