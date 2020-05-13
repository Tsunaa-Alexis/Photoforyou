<?php
class CreditManager
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

	// function pour récupérer les information d'une offre par rapport à son id
	public function getCredit($id)
	{

		$q= $this->_db->query('SELECT  Nom_offre, Prix_offre, Credit, Formule FROM achatcredit WHERE Id_credit = '.$id);

		$creditInfo = $q->fetch(PDO::FETCH_ASSOC);
		if ($creditInfo)
		{
			return new Credit($creditInfo);
		}	
		else
		{
			return $creditInfo;
		}
	}
}

?>