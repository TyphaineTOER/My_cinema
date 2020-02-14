<?php
$bdd = new PDO('mysql:host=localhost;dbname=epitech_tp', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

// pour recuperer tous les genres
// $requete = $bdd->prepare('SELECT * FROM genre');
// $requete->execute(array($_GET['genre']));
// while ($donnees = $requete->fetch())
// {
// 	echo '<p>' . $donnees['nom'] . '</p>';
// }

if(sizeof($_GET) > 0)
{
	if(isset($_GET['genre']))
	{
		$requete = $bdd->prepare("SELECT * FROM film as f LEFT JOIN genre as g ON f.id_genre = g.id_genre WHERE g.nom = '" . $_GET['genre']. "'");
		$requete->execute();
		while ($donnees = $requete->fetch())
		{
			echo $donnees['titre'] . " il dure " . $donnees['duree_min'] .'<br/>';
		}	
	}
	if(isset($_GET['distrib']))
	{
		$requete = $bdd->prepare("SELECT * FROM film as f LEFT JOIN distrib as d ON f.id_distrib = d.id_distrib WHERE d.nom = '" . $_GET['distrib']. "'");
		$requete->execute();
		while ($donnees = $requete->fetch()) 
		{
			echo $donnees['titre'] . '<br/>';
		}

	}
}


if(sizeof($_POST) > 0)
 {

if(isset($_POST['genre'])) {

	if($_POST['genre'] == 'default' || $_POST['distributeur'] == 'default'){
		echo "Veuillez choisir un genre et un distributeur";
	}

	else {
		$requete = $bdd->prepare("SELECT * FROM film AS f LEFT JOIN genre as g ON f.id_genre = g.id_genre LEFT JOIN distrib as d ON d.id_distrib = f.id_distrib WHERE d.nom = '" . $_POST['distributeur']. "' AND g.nom = '" . $_POST['genre'] . "'");
		$requete->execute();
		while ($donnees = $requete->fetch()){
			echo $donnees['titre'] . '<br/>';
		}
	}

}
else {
		$requete = $bdd->prepare("SELECT * FROM film WHERE titre LIKE '%" . $_POST['titre'] . "%'");
	$requete->execute();
	while ($donnees = $requete->fetch())
	{
		echo $donnees['titre'] .'<br/>';
	}
 
}
}





?>