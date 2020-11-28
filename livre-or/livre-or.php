<?php
session_start();

if (isset($_SESSION['id']) and 'id' == TRUE) {
    echo '
    <header>
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

$db = mysqli_connect("localhost", "root", "root", "livreor"); // Connnexion à MySQL
$requete = "SELECT date, login, commentaire  FROM commentaires INNER JOIN utilisateurs ON commentaires.id_utilisateur = utilisateurs.id ORDER BY date DESC";
$query = mysqli_query($db, $requete); // Lier La connexion, avec la requête
$all = mysqli_fetch_all($query, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../lecss/livreor.css" rel="stylesheet">
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <title>Livre d'or</title>
</head>

<body>

    <main>
        <div class="imgheader">
            <img src="../images/spotifyy.png" alt="presentationspotify">
        </div>
        <form action="livre-or.php" method="post">
            <a class="buttonalone" href="../commentaire/commentaire.php"><input class="submit" type="submit" name="coms" value="Poster un commentaire"> </a>
        </form>
        <div class="tablivreor">
            <?php
            foreach ($all as $key) {
                echo '<section class = "tableaucommentaire">' . '<h5>' . 'Posté le ' . $key['date'] . ' par '  . $key['login'] . ':<br/>' . $key['commentaire'] . '<br/></h5>' . '</section>';
            } // FONCTION POUR AFFICHER LES COMMENTAIRES D'UNE BASE DE DONNEE        
            ?>
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
<!-- Si on appuie sur 'poster un commentaire', redirection vers commentaire si un profil est crée
sinon, redirection vers inscription  -->

<?php

if (isset($_POST['coms'])) {
    if (isset($_SESSION['id']) and 'id' == TRUE) {
        header('location:http://localhost:8888/livre-or/commentaire/commentaire.php');
    } else {
        header('location:http://localhost:8888/livre-or/connexion/connexion.php');
    }
}

?>