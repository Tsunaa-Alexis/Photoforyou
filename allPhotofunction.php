<?php
    // affiche les photo avec une pagination automatique, pareil pour les 2 autres fonctions
    function displayAllPhotos($db) {
        
        $a = $db->query('SELECT count(*) as total FROM photos WHERE vendu = 0');
        $total = $a->fetch(PDO::FETCH_ASSOC);
        $nbpage = ($total['total'] / 6) + 1;
        $nbpage = intval($nbpage);
        $f = 0;
        $d = 'a';
        $m = 'a';

        echo' <container>

                <div class="cola">
                  <div class="tab-content" id="myTabContent">';
                  for ($i=1; $i <= $nbpage; $i++) { 
                    if ($i == 1) {
                      echo '<div class="tab-pane fade show active" id="'.$m.'" role="tabpanel" aria-labelledby="'.$m.'-tab">';
                            $q = $db->query('SELECT  Id_photo,Nom_photo,Taille_pixels_x,Taille_pixels_y,URL_photo,description, prix FROM photos WHERE vendu = 0 LIMIT 6');
                            echo '<div class="row row-cols-1 row-cols-md-3">';

                            foreach  ($q as $row) {
                              echo '
                                    <div class="col mb-4" id='.$row["Id_photo"].'>
                                      <div class="card h-100">
                                        <a href="#"><img src="'.$row["URL_photo"].'" class="card-img-top"></a>
                                        <div class="card-body">
                                          <h3 class="card-title">'.$row["Nom_photo"].'</h3>
                                          <h5>Description :</h5>
                                          <p class="card-text">'.$row["description"].'</p>
                                          <p class="card-text">Prix : '.$row["prix"].' Crédit(s)</p>
                                        </div>
                                        <button type="submit" class="btn btn-primary buyable" name="submit" photoId="'.$row["Id_photo"].'">Ajouter au panier</button>
                                      </div>
                                    </div>';

                            }
                            echo "</div>
                                </div>";
                    }
                    elseif ($i > 1) {
                      echo '<div class="tab-pane fade" id="'.$m.'" role="tabpanel" aria-labelledby="'.$m.'-tab">';
                            $q = $db->query('SELECT  Id_photo,Nom_photo,Taille_pixels_x,Taille_pixels_y,URL_photo,description, prix FROM photos WHERE vendu = 0 LIMIT '.$f.',6');
                            echo '<div class="row row-cols-1 row-cols-md-3">';

                            foreach  ($q as $row) {
                              echo '
                                    <div class="col mb-4" id='.$row["Id_photo"].'>
                                      <div class="card h-100">
                                        <a href="#"><img src="'.$row["URL_photo"].'" class="card-img-top"></a>
                                        <div class="card-body">
                                          <h3 class="card-title">'.$row["Nom_photo"].'</h3>
                                          <h5>Description :</h5>
                                          <p class="card-text">'.$row["description"].'</p>
                                          <p class="card-text">Prix : '.$row["prix"].' Crédit(s)</p>
                                        </div>
                                        <button type="submit" class="btn btn-primary buyable" name="submit" photoId="'.$row["Id_photo"].'">Ajouter au panier</button>
                                      </div>
                                    </div>';

                            }
                            echo "</div>
                                </div>";
                    }
                    $m .= 'a';
                    $f +=  6;
                  }
                echo'
                  </div>
                </div>
                ';
        

        
        echo '
        <nav aria-label="Page navigation example">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="page-item"><a class="page-link" href="#">Previous</a></li>';
            for ($i=1; $i <= $nbpage ; $i++) { 

      echo '
            <li class="nav-item">
              <a class="nav-link" id="'.$d.'-tab" data-toggle="tab" href="#'.$d.'" role="tab" aria-controls="'.$d.'" aria-selected="true">'.$i.'</a>
            </li>';
            $d .= 'a';  
            }
      echo'<li class="page-item"><a class="page-link" href="#">Next</a></li>
          </ul>
        </nav>
      </container>';

     }

      function displayAllPhotos2($db) {

        $q = $db->query('SELECT  Id_photo,Nom_photo,Taille_pixels_x,Taille_pixels_y,URL_photo,description, prix FROM photos LIMIT 3');
        
        $a = $db->query('SELECT count(*) as total FROM photos');
        $total = $a->fetch(PDO::FETCH_ASSOC);
        $nbpage = ($total['total'] / 6) + 1;
        $nbpage = intval($nbpage);
        $f = 0;
        $d = 'a';
        $m = 'a';

        echo' <container>

                <div class="cola">
                  <div class="tab-content" id="myTabContent">';
                  for ($i=1; $i <= $nbpage; $i++) { 
                    if ($i == 1) {
                      echo '<div class="tab-pane fade show active" id="'.$m.'" role="tabpanel" aria-labelledby="'.$m.'-tab">';
                            $q = $db->query('SELECT  Id_photo,Nom_photo,Taille_pixels_x,Taille_pixels_y,URL_photo,description, prix FROM photos LIMIT 6');
                            echo '<div class="row row-cols-1 row-cols-md-3">';

                            foreach  ($q as $row) {
                              echo '
                                    <div class="col mb-4" id='.$row["Id_photo"].'>
                                      <div class="card h-100">
                                        <a href="#"><img src="'.$row["URL_photo"].'" class="card-img-top"></a>
                                        <div class="card-body">
                                          <h3 class="card-title">'.$row["Nom_photo"].'</h3>
                                          <h5>Description :</h5>
                                          <p class="card-text">'.$row["description"].'</p>
                                          <p class="card-text">Prix : '.$row["prix"].' Crédit(s)</p>
                                        </div>
                                        <button type="submit" class="btn btn-primary buyable" name="submit" photoId="'.$row["Id_photo"].'">Ajouter au panier</button>
                                      </div>
                                    </div>';

                            }
                            echo "</div>
                                </div>";
                    }
                    elseif ($i > 1) {
                      echo '<div class="tab-pane fade" id="'.$m.'" role="tabpanel" aria-labelledby="'.$m.'-tab">';
                            $q = $db->query('SELECT  Id_photo,Nom_photo,Taille_pixels_x,Taille_pixels_y,URL_photo,description, prix FROM photos LIMIT '.$f.',6');
                            echo '<div class="row row-cols-1 row-cols-md-3">';

                            foreach  ($q as $row) {
                              echo '
                                    <div class="col mb-4" id='.$row["Id_photo"].'>
                                      <div class="card h-100">
                                        <a href="#"><img src="'.$row["URL_photo"].'" class="card-img-top"></a>
                                        <div class="card-body">
                                          <h3 class="card-title">'.$row["Nom_photo"].'</h3>
                                          <h5>Description :</h5>
                                          <p class="card-text">'.$row["description"].'</p>
                                          <p class="card-text">Prix : '.$row["prix"].' Crédit(s)</p>
                                        </div>
                                        <button type="submit" class="btn btn-primary buyable" name="submit" photoId="'.$row["Id_photo"].'">Ajouter au panier</button>
                                      </div>
                                    </div>';

                            }
                            echo "</div>
                                </div>";
                    }
                    $m .= 'a';
                    $f +=  5;
                  }
                echo'
                  </div>
                </div>
                ';
        

        
        echo '
        <nav aria-label="Page navigation example">
          <ul class="nav nav-tabs" id="myTab" role="tablist">';
            for ($i=1; $i <= $nbpage ; $i++) { 

      echo '<li class="nav-item">
              <a class="nav-link" id="'.$d.'-tab" data-toggle="tab" href="#'.$d.'" role="tab" aria-controls="'.$d.'" aria-selected="true">'.$i.'</a>
            </li>';
            $d .= 'a';  
            }
      echo'
          </ul>
        </nav>
      </container>';

     }



      function displayAllPhotos3($db) {
        
        $a = $db->query('SELECT count(*) as total FROM photos WHERE vendu = 0');
        $total = $a->fetch(PDO::FETCH_ASSOC);
        $nbpage = ($total['total'] / 6) + 1;
        $nbpage = intval($nbpage);
        $f = 0;
        $d = 'b';
        $m = 'b';

        echo' <container>
                <div class="cola">
                  <div class="tab-content" id="myTabContent">';
                  for ($i=1; $i <= $nbpage; $i++) { 
                    if ($i == 1) {
                      echo '<div class="tab-pane fade show active" id="'.$m.'" role="tabpanel" aria-labelledby="'.$m.'-tab">';
                            $q = $db->query('SELECT  Id_photo,Nom_photo,Taille_pixels_x,Taille_pixels_y,URL_photo,description, prix FROM photos WHERE vendu = 0 ORDER BY date_up DESC LIMIT 6');
                            echo '<div class="row row-cols-1 row-cols-md-3">';

                            foreach  ($q as $row) {
                              echo '
                                    <div class="col mb-4" id='.$row["Id_photo"].'>
                                      <div class="card h-100">
                                        <a href="#"><img src="'.$row["URL_photo"].'" class="card-img-top"></a>
                                        <div class="card-body">
                                          <h3 class="card-title">'.$row["Nom_photo"].'</h3>
                                          <h5>Description :</h5>
                                          <p class="card-text">'.$row["description"].'</p>
                                          <p class="card-text">Prix : '.$row["prix"].' Crédit(s)</p>
                                        </div>
                                        <button type="submit" class="btn btn-primary buyable" name="submit" photoId="'.$row["Id_photo"].'">Ajouter au panier</button>
                                      </div>
                                    </div>';

                            }
                            echo "</div>
                                </div>";
                    }
                    elseif ($i > 1) {
                      echo '<div class="tab-pane fade" id="'.$m.'" role="tabpanel" aria-labelledby="'.$m.'-tab">';
                            $q = $db->query('SELECT  Id_photo,Nom_photo,Taille_pixels_x,Taille_pixels_y,URL_photo,description, prix FROM photos WHERE vendu = 0 ORDER BY date_up DESC LIMIT '.$f.',6');
                            echo '<div class="row row-cols-1 row-cols-md-3">';

                            foreach  ($q as $row) {
                              echo '
                                    <div class="col mb-4" id='.$row["Id_photo"].'>
                                      <div class="card h-100">
                                        <a href="#"><img src="'.$row["URL_photo"].'" class="card-img-top"></a>
                                        <div class="card-body">
                                          <h3 class="card-title">'.$row["Nom_photo"].'</h3>
                                          <h5>Description :</h5>
                                          <p class="card-text">'.$row["description"].'</p>
                                          <p class="card-text">Prix : '.$row["prix"].' Crédit(s)</p>
                                        </div>
                                        <button type="submit" class="btn btn-primary buyable" name="submit" photoId="'.$row["Id_photo"].'">Ajouter au panier</button>
                                      </div>
                                    </div>';

                            }
                            echo "</div>
                                </div>";
                    }
                    $m .= 'a';
                    $f +=  6;
                  }
                echo'
                  </div>
                </div>
                ';
        

        
        echo '
        <nav aria-label="Page navigation example">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>';
            for ($i=1; $i <= $nbpage ; $i++) { 

      echo '<li class="nav-item">
              <a class="nav-link" id="'.$d.'-tab" data-toggle="tab" href="#'.$d.'" role="tab" aria-controls="'.$d.'" aria-selected="true">'.$i.'</a>
            </li>';
            $d .= 'a';  
            }
      echo'<li class="page-item"><a class="page-link" href="#">Next</a></li>
          </ul>
        </nav>
      </container>';

     }
?>