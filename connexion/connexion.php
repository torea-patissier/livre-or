<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../lecss/livreor.css" rel="stylesheet">
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <title>Connexion</title>
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
        <a class="buttonalone" href="http://localhost:8888/livre-or/inscription/inscription.php">
            <input class="submit" type="submit" name='inscritpion' value="S'inscrire">
        </a>
        <div class="formulaire">
            <h1 class="h1connexion">Connexion</h1>
            <form action="connexion.php" method="POST">
                <input class="login" type="text" name='login' placeholder="Identifiants"><br />
                <input class="password" type="password" name='password' placeholder="Mot de passe"><br />
                <input class="password" type="password" name='confpass' placeholder="Confirmation mot de passe"><br />
                <input class="submit" type="submit" name='envoyer' value="Se connecter">
            </form>
        </div>

    </main>
    <?php
    if (!empty($_POST)) {
        $username = $_POST['login']; // $ = Login of the session
        $pwd = $_POST['password']; // $ = Pwd of the session

        $db = mysqli_connect("localhost", "root", "root", "livreor"); // Connect to Db
        $requete = " SELECT * FROM utilisateurs WHERE login = '$username' AND password = '$pwd' "; // Prepare the command
        $query = mysqli_query($db, $requete); // Execut the command in the Db
        $user = mysqli_fetch_assoc($query); // Took 1 line in the Db 

        if (isset($user)) { // If the user is online
            $_SESSION['id'] = $user['id'];
            header('Location:http://localhost:8888/livre-or/profil/profil.php');
        } else {
            echo '<p class="msgprofil"> Identifiant ou mot de passe incorrecte</p>';
        }
    }
    ?>

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