<?php
class UserManager
{
	private $_db;

	public function __construct($db)
	{
		$this->setDB($db);
	}

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

	public function count()
	{
		return $this->_db->query("SELECT COUNT(*) FROM users")->fetchColumn();
	}

	public function exists($mailUser, $mdpUser)
	{
		$q= $this->_db->prepare('SELECT COUNT(*) FROM users WHERE mail = :mail AND mdp = :mdp');
		$q->execute([':mail'=> $mailUser, ':mdp'=> $mdpUser]);
		return (bool) $q->fetchColumn();
	}

	public function setDb(PDO $db)
	{
		$this->_db = $db;
	}

	public function randomcode() {
		$input = array("0","1","2","3","4","5","6","7","8","9");
		$code = 0;

		for ($i = 1; $i <= 9; $i++) {
    
		$rand_keys = array_rand($input);

    	$code .= $input[$rand_keys];
 		}

 		return $code;
	}

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
}
?>