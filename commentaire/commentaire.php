<?php
session_start();

$db = mysqli_connect("localhost", "root", "root", "livreor"); // Go to Db
$requete = "SELECT * FROM utilisateurs WHERE id = '" . $_SESSION['id'] . "'"; // Selectionner l'id en cours d'utilisation (prepar command)
$query = mysqli_query($db, $requete); //  execute la commande
$users = mysqli_fetch_assoc($query); // Took 1line from Db 

if (isset($_SESSION['id']) and 'id' == TRUE) {
    echo '    <header>
<nav class="navbar">
        <a class="navlink" href="../index/index.php">Accueil</a>
        <a class="navlink" href="../livre-or/livre-or.php">Livre d\'or</a>
        <a class="navlink" href="../profil/profil.php">Profil</a>
    </nav>
</header>';
} else {
    echo '    <header>
    <nav class="navbar">
            <a class="navlink" href="../index/index.php">Accueil</a>
            <a class="navlink" href="../livre-or/livre-or.php">Livre d\'or</a>
            <a class="navlink" href="../connexion/connexion.php">Connexion</a>
        </nav>
    </header>';
}

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../lecss/livreor.css" rel="stylesheet">
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <title>Commentaire</title>
</head>

<body>

    <main>
        <div class="imgheader">
            <img src="../images/spotifyy.png" alt="presentationspotify">
        </div>
        <div class="formulaire">
            <h1 class="h1commentaire">Ecrire un commentaire</h1>
            <form action="commentaire.php" method="POST">
                <textarea id="coms" name="coms" rows="5" cols="35"></textarea><br /><br />
                <input class="submit" type="submit" name='envoyer' placeholder="Envoyer">
            </form>
        </div>
    </main>
    <footer>

        <div class="réseaux">
            <p><b>Retrouvez nous sur:</b></p>
        </div>

        <div id="réseauxspotify">

            <div class="facebook">
                <a target="_blank" href="https://www.facebook.com/Spotify.France">
                    <img src="../images/facebook.png" alt="facebookspotify"></a>
            </div>

            <div class="instagram">

                <a target="_blank" href="https://www.instagram.com/spotify/?hl=fr">
                    <img src="../images/instagram.png" alt="instagramspotify"></a>
            </div>

            <div class="twitter">

                <a target="_blank" href="https://twitter.com/spotifyfrance?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor">
                    <img src="../images/twitter.png" alt="twitterspotify"></a>
            </div>

        </div>

    </footer>
</body>

</html>

<?php
if (isset($_POST['envoyer'])) { // Si on appuie sur envoyer
    $id = $users['id']; //$ prend l'id de l'user en cours
    $commentaire = $_POST['coms']; //$ devient le commentaire
    $commentaire = addslashes($commentaire); // Permet à la Db de récupérer des commentaires contenant des ' ou " ou / etc etc
    $horaire = date("Y-m-d H:i:s"); // $ devient l'heure

    if (empty($_POST['coms'])) { // Si  la zone de commentaire est vide
        exit('Zone de texte vide'); // Afficher:
    } else { // Sinon
        $db = mysqli_connect("localhost", "root", "root", "livreor"); // Go to db 
        $connect =  "INSERT INTO commentaires(commentaire, id_utilisateur, date) VALUES ('$commentaire', '$id', '$horaire') "; // Prepar command
        $query = mysqli_query($db, $connect); // Execut command
        header('location: http://localhost:8888/livre-or/livre-or/livre-or.php'); // Header to
    }
}

?>