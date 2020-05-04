<?php
class Credit
{
	// Attributs
	private $_id_credit;
	private $_nom_offre;
	private $_prix_offre;
	private $_credit;
	private $_abonnement;


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

	public function getId_credit()
	{
		return $this->_id_credit;
	}

	public function getNom_offre()
	{
		return $this->_nom_offre;
	}

	public function getPrix_offre()
	{
		return $this->_prix_offre;
	}

	public function getCredit()
	{
		return $this->_credit;
	}

	public function getAbonnement()
	{
		return $this->_abonnement;
	}

	

	// Setters

	public function setId_credit($id_credit)
	{
		$id_credit = (int) $id_credit;
		$this->_id_credit = $id_credit;
	}	


	public function setNom_offre($nom_offre)
	{
		if (is_string($nom_offre))
		{
			$this->_nom_offre = $nom_offre;
		}	
	}

	public function setPrix_offre($prix_offre)
	{
		$prix_offre = (float) $prix_offre;
		$this->_prix_offre = $prix_offre;
	}

	public function setCredit($credit)
	{
		$credit = (int) $credit;
		$this->_credit = $credit;
	}

	public function setAbonnement($credit)
	{
		$abonnement = (int) $abonnement;
		$this->_abonnement = $abonnement;
	}		
		



}
?>