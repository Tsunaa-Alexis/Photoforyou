<?php
class UserManager
{
	private $_db;

	public function __construct($db)
	{
		$this->setDB($db);
	}

	// ajouter un user
	public function add(User $user)
	{
		$q = $this->_db->prepare('INSERT INTO users(nom,prenom,type,mail,mdp,numtel) VALUES(:nom, :prenom, :type, :mail, :mdp, :numtel)');
		$q->bindValue(':nom', $user->getNom());
		$q->bindValue(':prenom', $user->getPrenom());
		$q->bindValue(':type', $user->getType());
		$q->bindValue(':mail', $user->getMail());
		$q->bindValue(':mdp', $user->getMdp());
		$q->bindValue(':numtel', $user->getNumTel());

		$q->execute();

		$user->hydrate([
			'Id' => $this->_db->lastInsertId(),
			'Credit' => 0]);
	}

	// récupérer les informations en fonction de l'email
	public function getUser($sonMail)
	{
		$q= $this->_db->query('SELECT  Nom, Prenom, Mail, Mdp, Type, NumTel, Id , Credit FROM users WHERE Mail = "'. $sonMail .'"');
		$userInfo = $q->fetch(PDO::FETCH_ASSOC);
		if ($userInfo)
		{
			return new User($userInfo);
		}	
		else
		{
			return $userInfo;
		}
	}

	// récupérer les informations d'un utilisateurs à partir de sont id
	public function getUserbyid($id)
	{
		$q= $this->_db->query('SELECT  Nom, Prenom, Mail, Mdp, Type, NumTel, Id , Credit FROM users WHERE Id = "'. $id .'"');
		$userInfo = $q->fetch(PDO::FETCH_ASSOC);
		if ($userInfo)
		{
			return new User($userInfo);
		}	
		else
		{
			return $userInfo;
		}
	}

	// modifier les information d'un user
	public function edit(User $user)
	{
		$q = $this->_db->prepare("UPDATE users SET nom = :nom, prenom = :prenom, mail = :mail, numtel = :numtel WHERE id= :id");


		$q->bindValue(':nom', $user->getNom());
		$q->bindValue(':prenom', $user->getPrenom());
		$q->bindValue(':mail', $user->getMail());
		$q->bindValue(':numtel', $user->getNumTel());
		$q->bindValue(':id', $user->getId());

		$q->execute();
	}

	// compter le nombre d'utilisateurs
	public function count()
	{
		return $this->_db->query("SELECT COUNT(*) FROM users")->fetchColumn();
	}

	// vérifier qu'un utilisateur éxiste
	public function exists($mailUser, $mdpUser)
	{
		$q= $this->_db->prepare('SELECT COUNT(*) FROM users WHERE mail = :mail AND mdp = :mdp');
		$q->execute([':mail'=> $mailUser, ':mdp'=> $mdpUser]);
		return (bool) $q->fetchColumn();
	}

	// initialisation de la db
	public function setDb(PDO $db)
	{
		$this->_db = $db;
	}

	// crée un code aléatoire
	public function randomcode() {
		$input = array("0","1","2","3","4","5","6","7","8","9");
		$code = 0;

		for ($i = 1; $i <= 9; $i++) {
    
		$rand_keys = array_rand($input);

    	$code .= $input[$rand_keys];
 		}

 		return $code;
	}

	// modification de l'image de profile
	public function imgprofile($content_dir,$tmp_file,$type_file,$name_file) {
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
	    header('Location: profil.php');
	}

	// ajout de crédit
	public function addCredit($val,$id) {
		$q = $this->_db->prepare('UPDATE users SET credit = credit + '.$val.' WHERE id = '.$id);
		$q->execute();
	}

	//échange de crédits d'un utilisateur à un autre
	public function trade($idbuy,$idsell,$amount){
		$q = $this->_db->prepare('UPDATE users SET credit = credit + '.$amount.' WHERE id = '.$idsell);
		$q->execute();
		$s = $this->_db->prepare('UPDATE users SET credit = credit - '.$amount.' WHERE id = '.$idbuy);
		$s->execute();
	}
}
?>