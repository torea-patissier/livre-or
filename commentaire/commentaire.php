<?php 
session_start();

$db = mysqli_connect("localhost", "root", "root", "livreor");// Go to Db
$requete = "SELECT * FROM utilisateurs WHERE id = '".$_SESSION['id'] ."'";// Selectionner l'id en cours d'utilisation (prepar command)
$query = mysqli_query($db, $requete);//  execute la commande
$users = mysqli_fetch_assoc($query);// Took 1line from Db 

if(isset($_SESSION['id']) AND 'id' == TRUE){
echo '    <header>
<nav class="navbar">
        <a class="navlink" href="../index/index.php">Accueil</a>
        <a class="navlink" href="../livre-or/livre-or.php">Livre d\'or</a>
        <a class="navlink" href="../profil/profil.php">Profil</a>
    </nav>
</header>';
}
else{
    echo '    <header>
    <nav class="navbar">
            <a class="navlink" href="../index/index.php">Accueil</a>
            <a class="navlink" href="../livre-or/livre-or.php">Livre d\'or</a>
            <a class="navlink" href="../connexion/connexion.php">Connexion</a>
        </nav>
    </header>';
}


var_dump($users['id']);
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  href="../lecss/index.css" rel="stylesheet">
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <title>inscription</title>
</head>

<body>

    <main>
        <div class="formulairecommentaire">
            <h1 class="h1commentaire">Ecrire un commentaire</h1>
            <form action="commentaire.php" method="POST">
                <textarea id="coms" name="coms" rows="5" cols="35"></textarea><br/><br/>
                <input class="submit" type="submit" name='envoyer' placeholder="Envoyer">
            </form>
        </div>
    </main>
    <footer>

    </footer>
</body>
</html>

<?php
if(isset($_POST['envoyer'])){// Si on appuie sur envoyer
    $id = $users['id'];//$ prend l'id de l'user en cours
    $commentaire = $_POST['coms'];//$ devient le commentaire
    $commentaire = addslashes($commentaire); // Permet à la Db de récupérer des commentaires contenant des ' ou " ou / etc etc
    $horaire = date("Y-m-d H:i:s");// $ devient l'heure

    if(empty($_POST['coms'])){// Si  la zone de commentaire est vide
        exit('Zone de texte vide');// Afficher:
    }else{// Sinon
        $db = mysqli_connect ("localhost", "root", "root", "livreor");// Go to db 
        $connect =  "INSERT INTO commentaires(commentaire, id_utilisateur, date) VALUES ('$commentaire', '$id', '$horaire') ";// Prepar command
        $query = mysqli_query($db, $connect);// Execut command
        header ('location: http://localhost:8888/livre-or/livre-or/livre-or.php');// Header to
    }

}

?>