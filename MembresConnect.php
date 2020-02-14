<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Orbitron&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="MembresConnect.css">
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<?php
$bdd = new PDO('mysql:host=localhost;dbname=epitech_tp', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


if(sizeof($_POST) > 0)
{
	$requete = $bdd->prepare("SELECT * FROM membre as m LEFT JOIN
		fiche_personne as f ON f.id_perso = m.id_fiche_perso  WHERE f.prenom LIKE '%" . $_POST['membre'] . "%'");
	$requete->execute();
	while ($donnees = $requete->fetch())
	{
		echo $donnees['prenom'] . " " . $donnees['nom'] . " " . $donnees['id_membre'] . " " . $donnees['date_naissance'] . " " . $donnees['email'] . " " . $donnees['adresse'] . " " . $donnees['cpostal'] . " " . $donnees['ville'] . " " . $donnees['pays'] . '- <a href="historiqueMembre.php?id='.$donnees['id_membre'].'">historique membre</a><br/>';
	};
}

?>

</html>

