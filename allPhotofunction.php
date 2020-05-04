<?php
    function displayAllPhotos($db) {
        $q = $db->query('SELECT  Id_photo,Nom_photo,Taille_pixels_x,Taille_pixels_y,URL_photo,description, prix FROM photos LIMIT 3');
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
                </div>
                ';

        }
        echo '</div>
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
          </ul>
        </nav>';

     }

     function displayAllPhotos2($db) {
        $q = $db->query('SELECT  Id_photo,Nom_photo,Taille_pixels_x,Taille_pixels_y,URL_photo,description, prix FROM photos WHERE id_user = 11');
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
                ";

     } 

     function displayAllPhotos3($db) {
        $q = $db->query('SELECT  Id_photo,Nom_photo,Taille_pixels_x,Taille_pixels_y,URL_photo,description, prix FROM photos WHERE id_photo = 1');
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
                ";

     }       
?>