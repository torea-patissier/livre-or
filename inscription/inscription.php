<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../lecss/livreor.css" rel="stylesheet">
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <title>Inscription</title>
</head>

<body>

    <header>
        <nav class="navbar">
            <a class="navlink" href="../index/index.php">Accueil</a>
            <a class="navlink" href="../livre-or/livre-or.php">Livre d'or</a>
            <a class="navlink" href="../connexion/connexion.php">Connexion</a>
        </nav>
        <div class="imgheader">
            <img src="../images/spotifyy.png" alt="presentationspotify">
        </div>
    </header>

    <main>
        <div class="formulaire">
            <h1 class="h1inscritpion">Formulaire d'inscription</h1>
            <form action="inscription.php" method="POST">
                <input class="login" type="text" name='login' placeholder="Login" required><br />
                <input class="password" type="password" name='password' placeholder="Mot de passe" required><br />
                <input class="password" type="password" name='confpass' placeholder="Confirmation mot de passe" required><br />
                <input class="submit" type="submit" name='envoyer' placeholder="S'inscrire" onclick="alert('Inscription envoyé')">
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

$db = mysqli_connect("localhost", "root", "", "livreor"); //Connexion Db
if (isset($_POST["envoyer"])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    $select = mysqli_query($db, "SELECT * FROM utilisateurs WHERE login = '" . $_POST["login"] . "' "); // On vérifie si un login n'est pas déjà existant en Db
    if (mysqli_num_rows($select)) {
        exit('Login déjà existant'); //Fin de commande
    } elseif ($_POST['password'] != $_POST['confpass']) { // On vérifie si le Mdp est le même
        exit('Vos mots de passe ne correspondent pas'); //Fin de commande
    } else {
        $requete = "INSERT INTO utilisateurs(login, password) VALUES ('$login','$password')"; // On ajoute le nouvel utilisateurs en Db
        $query = mysqli_query($db, $requete); // Executer la requête
        $_SESSION['id'] = $_POST['id']; // Ouverture de session
        header('Location:http://localhost/livre-or/connexion/connexion.php'); //Redirection vers connexion
    }
}

?>