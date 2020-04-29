<?php
class Photo
{
	// Attributs
	private $_id_photo;
	private $_nom_photo;
	private $_taille_pixels_x;
	private $_taille_pixels_y;
	private $_poids;
	private $_URL_photo;
	private $_id_user;
	private $_description;
	private $_prix;
	private $_vendu;
	

	public function __construct(array $donnees)
	{
		$this->hydrate($donnees);
	}

	public function hydrate(array $donnees)
	{
		foreach ($donnees as $key => $value) {
			$method = 'set'.ucfirst($key);

			if (method_exists($this, $method))
			{
				$this->$method($value);
			}
		}
	}

	// Getters

	public function getId_photo()
	{
		return $this->_id_photo;
	}

	public function getNom_photo()
	{
		return $this->_nom_photo;
	}

	public function getTaille_pixels_x()
	{
		return $this->_taille_pixels_x;
	}

	public function getTaille_pixels_y()
	{
		return $this->_taille_pixels_y;
	}

	public function getPoids()
	{
		return $this->_poids;
	}

	public function getURL_photo()
	{
		return $this->_URL_photo;
	}

	public function getId_user()
	{
		return $this->_id_user;
	}
	public function getDescription()
	{
		return $this->_description;
	}
	public function getPrix()
	{
		return $this->_prix;
	}
	public function getVendu()
	{
		return $this->_vendu;
	}

	// Setters

	public function setId_photo($id_photo)
	{
		if (is_string($id_photo))
		{
			$this->_id_photo = $id_photo;
		}
	}	

	public function setId_user($id_user)
	{
		$id_user = (int) $id_user;
		$this->_id_user = $id_user;
	}

	public function setTaille_pixels_x($taille_pixels_x)
	{
		$taille_pixels_x = (int) $taille_pixels_x;
		$this->_taille_pixels_x = $taille_pixels_x;
	}

	public function setTaille_pixels_y($taille_pixels_y)
	{
		$taille_pixels_y = (int) $taille_pixels_y;
		$this->_taille_pixels_y = $taille_pixels_y;
	}

	public function setPoids($poids)
	{
		$poids = (int) $poids;
		$this->_poids = $poids;
	}

	public function setPrix($prix)
	{
		$prix = (int) $prix;
		$this->_prix = $prix;
	}

	public function setVendu($vendu)
	{
		$vendu = (int) $vendu;
		$this->_vendu = $vendu;
	}

	public function setNom_photo($nom_photo)
	{
		if (is_string($nom_photo))
		{
			$this->_nom_photo = $nom_photo;
		}	
	}

	public function setURL_photo($URL_photo)
	{
		if (is_string($URL_photo))
		{
			$this->_URL_photo = $URL_photo;
		}	
	}

	public function setDescription($description)
	{
		if (is_string($description))
		{
			$this->_description = $description;
		}	
	}


}
?>