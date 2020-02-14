<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Orbitron&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Anton|Coda+Caption:800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="my_cinema.css">
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>film city my_cinema</title>
</head>

<body>
   
        <div class="container">
            <nav class="navbar navbar-inverse navbar-fixed-top mynav">
             <img src="images/001.jpg" alt="logo"/>
                <ul class="nav navbar-nav">
                    <li><a href="#">Menu</a></li>
                    <li><a href="Membres.php">Rechercher un membre</a></li>
                    <li><a href="indexCompte.php">Mon compte</a></li>
                </ul>
            </nav>
        </div>

        <form action="./films.php" method="post" class="formselect">
        
     <select name="genre">
            <option value="default">Genre</option>

        <?php
            $bdd = new PDO('mysql:host=localhost;dbname=epitech_tp;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        //pour recuperer tous les genres
            $requete = $bdd->prepare('SELECT * FROM genre ORDER BY nom');
            $requete->execute();
                while ($donnees = $requete->fetch())
{
        ?>
            <option value="<?= $donnees['nom']; ?>"><?php echo $donnees['nom']; ?></option>
        <?php
}
        ?>  
    </select>
        
        <select name="distributeur">
            <option value="default">Distributeur</option>

        <?php

            $requete = $bdd->prepare('SELECT * FROM distrib');
            $requete->execute();
                while ($donnees = $requete->fetch())
{
        ?>
            <option value="<?= $donnees['nom']; ?>"><?php echo $donnees['nom']; ?></option>
        <?php
}
        ?>  
        </select>
            <button type="submit" class="btn btn-primary btn-sm">Rechercher</button>
    </form>

        <form action="./films.php" method="post" class="navbar-form" >
            <input type="text" name="titre" class="form-control innput-sm"placeholder="trouve ton film">
            <button type="submit" class="btn btn-primary btn-sm">Rechercher</button>
        </form>
</div>
        
           <h2>Nos genres de films</h2>

        <div class="row">
            
                <?php

            $requete = $bdd->prepare('SELECT * FROM genre');
            $requete->execute();
                while ($donnees = $requete->fetch())
{
        ?>
            <a class="col-3"href="./films.php?genre=<?= $donnees['nom'] ?>"><strong><?= $donnees['nom'] ?></strong></a>
        <?php
}
        ?>   
           
 </div>

 <h2> Nos distributeurs </h2>

 <div class="row row2">
                <?php

            $requete = $bdd->prepare('SELECT * FROM distrib');
            $requete->execute();
                while ($donnees = $requete->fetch())
{
        ?>
            <a class="col-4"href="./films.php?distrib=<?= $donnees['nom'] ?>"><strong><?= $donnees['nom'] ?></strong></a>
        <?php
}
        ?>


    


    </div>











</section>













<article>
    












</article>
















<footer>
    










</footer>









</body>

