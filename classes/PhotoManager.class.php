<?php
class PhotoManager
{
	private $_db;

	public function __construct($db)
	{
		$this->setDB($db);
	}

	public function setDb(PDO $db)
	{
		$this->_db = $db;
	}


	public function getPhotoUser($iduser,$type)
	{
		if ($type == 'Photographe') {
			$q= $this->_db->query('SELECT  Id_photo,Nom_photo,Taille_pixels_x,Taille_pixels_y,Poids,URL_photo,Id_user,description FROM photos WHERE Id_user = "'. $iduser .'"');
		}

		elseif ($type == 'Client') {
			$q= $this->_db->query('SELECT  Id_photo,Nom_photo,Taille_pixels_x,Taille_pixels_y,Poids,URL_photo,Id_user,description FROM photos WHERE Vendu = "'. $iduser .'"');
		}
		
		$i = 0;
		foreach  ($q as $row) {
			echo '<div class="card" style="width: 15rem; margin-left: 10px; margin-bottom: 10px;">
  					<img src="'.$row["URL_photo"].'" class="card-img-top" alt="..." height="50%">
  					<div class="card-body">
  						<h5 class="card-title">'.$row["Nom_photo"].'</h5>
    					<p class="card-text">'.$row["description"].'</p>
    					<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg'.$i.'">Regarder</button>
  					</div>
  				  </div>
				  <div class="modal fade bd-example-modal-lg'.$i.'" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg'.$i.'">
					    <div class="modal-content">
					      <img src="'.$row["URL_photo"].'" height="100%" width="100%"/>
					    </div>
					</div>
				  </div>';
			$i ++;
		}
	}

	public function addPhoto(Photo $photo)
	{
		$q = $this->_db->prepare('INSERT INTO photos(id_photo,nom_photo,taille_pixels_y,taille_pixels_x,poids,URL_photo,id_user,description,prix) VALUES(:id_photo, :nom_photo,:taille_pixels_y, :taille_pixels_x, :poids, :URL_photo, :id_user, :description, :prix)');
		$q->bindValue(':nom_photo', $photo->getNom_photo());
		$q->bindValue(':taille_pixels_y', $photo->getTaille_pixels_y());
		$q->bindValue(':taille_pixels_x', $photo->getTaille_pixels_x());
		$q->bindValue(':poids', $photo->getPoids());
		$q->bindValue(':URL_photo', $photo->getURL_photo());
		$q->bindValue(':id_user', $photo->getId_user());
		$q->bindValue(':description', $photo->getDescription());
		$q->bindValue(':prix', $photo->getPrix());
		$q->bindValue(':id_photo', $photo->getId_photo());

		$q->execute();

		$photo->hydrate([
			'Id_photo' => $this->_db->lastInsertId()]);
	}

	public function UploadPhoto($content_dir,$tmp_file,$type_file,$name_file) {
	    if( !is_uploaded_file($tmp_file) )
	    {
	      exit("fichier introuvable");
	    }

	    if( !strstr($type_file, 'jpg') && !strstr($type_file, 'jpeg') && !strstr($type_file, 'bmp') && !strstr($type_file, 'gif') )
	    {
	      exit("Le fichier n'est pas une image");
	    }

	    if( !move_uploaded_file($tmp_file, $content_dir . $name_file) )
	    {
	      exit("Impossible de copier le fichier dans $content_dir");
	    }
	}
}
?>