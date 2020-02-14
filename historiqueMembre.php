<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="historiqueMembre.css">
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>historique membre</title>
</head>
<body>
	<div id="Hmembre">
<a href="my_cinema.php"> <img src="images/02.jpg" alt="logo"/></a>

<?php

$bdd = new PDO('mysql:host=localhost;dbname=epitech_tp', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


if(sizeof($_GET) > 0)
{
	if(isset($_GET['id']))
	{
		$requete = $bdd->prepare("SELECT * FROM historique_membre AS h LEFT JOIN membre as m ON h.id_membre = m.id_membre LEFT JOIN film as f ON h.id_film = f.id_film WHERE m.id_membre = " . $_GET['id']. "");
		$requete->execute();
		while ($donnees = $requete->fetch())
		{
			echo $donnees['id_film']. ' - ' . $donnees['titre'] . ' le ' . $donnees['date']. '<br/>';
		}	
	}
}
?>
</body>
</html>

