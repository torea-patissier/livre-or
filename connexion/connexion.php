<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../lecss/index.css" rel="stylesheet">
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
    </header>

    <main>
        <div class="formulaireconnexion">
            <h1 class="h1connexion">Connexion</h1>
            <form action="connexion.php" method="POST">
                <input class="login" type="text" name='login' placeholder="Identifiants"><br />
                <input class="password" type="password" name='password' placeholder="Mot de passe"><br />
                <input class="password" type="password" name='confpass' placeholder="Confirmation mot de passe"><br />
                <input class="submit" type="submit" name='envoyer' value="Se connecter">
            </form>
        </div>
        <a href="http://localhost:8888/livre-or/inscription/inscription.php">
            <input class="submit" type="submit" name='inscritpion' value="S'inscrire">
        </a>
    </main>

    <footer>
    </footer>

</body>

</html>

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
        echo ' Mauvais mot de passe';
    }
}
?>