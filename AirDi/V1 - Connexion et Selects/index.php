<?php
	include_once("modele/Pilote.class.php");

	$tParam = parse_ini_file("param/param.ini");
	//var_dump($tParam);

	$connexion = null;
	$dsn = "mysql:host=".$tParam['host']."; port=".$tParam['port']."; dbname=".$tParam['bdd']."; charset=utf8";
	try {
		// Crée la connexion
		$connexion = new PDO($dsn, $tParam['user'], $tParam['password'],
						array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		echo 'connexion OK';
	
		// Récupère la liste des Pilotes
		$sql = "SELECT * FROM pilote ORDER BY pilnom ASC";
		// echo $sql; // pour mise au point
	
		$rs=$connexion->query($sql);
		$rs->setFetchMode(
			PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,
			'Pilote',
			array('pil','pilNom','adr'));
		$records = $rs->fetchAll(); // on lit tout ;
		$rs->closeCursor();
		
		//var_dump($records) ; // pour test
		echo "<br />";
		echo $records[0];
		
		// Récupère 1 pilote avec un '?'
		$sql = "SELECT * FROM pilote WHERE pil = ?";
		// echo $sql; // pour mise au point
		$pil = 50;
	
		$rs=$connexion->prepare($sql);
		$rs->setFetchMode(
			PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,
			'Pilote',
			array('pil','pilNom','adr'));
		$rs->execute(array($pil));
		$records = $rs->fetchAll(); // on lit tout ;
		$rs->closeCursor();
		
		$nombre = $rs->rowCount();
		if ($nombre > 0) {
			echo "<br />";
			echo $records[0];
		} else {
			throw new PDOException("Aucun pilote avec pil=" . $pil);
		}
		
		// Récupère 1 pilote avec une étiquette ':pil'
		$sql = "SELECT * FROM pilote WHERE pil = :pil";
		// echo $sql; // pour mise au point
		$pil = 5;
	
		$rs=$connexion->prepare($sql);
		$rs->setFetchMode(
			PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,
			'Pilote',
			array('pil','pilNom','adr'));
		$rs->execute(array(':pil'=>$pil));
		$records = $rs->fetchAll(); // on lit tout ;
		$rs->closeCursor();
		
		echo "<br />";
		echo $records[0];
		
		$connexion = null;
	}
	catch(PDOException $e)
	{	// en cas erreur on affiche un message et on arrete tout
		die('Erreur de requête : ' . $e->getMessage());
	}
    
?>