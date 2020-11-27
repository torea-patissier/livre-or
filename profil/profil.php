<?php
session_start();

$db = mysqli_connect("localhost", "root", "root", "livreor"); // Connect to Db
$requete = "SELECT * FROM utilisateurs WHERE id = '" . $_SESSION['id'] . "'"; // SQL query
$query = mysqli_query($db, $requete); // Execut the query
$user = mysqli_fetch_assoc($query); //Took 1line from the Db
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../lecss/index.css" rel="stylesheet">
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <title>Profil</title>
</head>

<body>

    <header>
        <nav class="navbar">
            <a class="navlink" href="../index/index.php">Accueil</a>
            <a class="navlink" href="../livre-or/livre-or.php">Livre d'or</a>
        </nav>
    </header>

    <main>

        <?php echo 'Bonjour ' . $user['login']; ?>

        <div class="formulaireprofil">
            <h1 class="h1profil">Profil</h1>
            <form action="profil.php" method="POST">
                <label>Identifiants</label><br />
                <input class="login" type="text" name='login' placeholder="<?php echo $user['login']; ?>" required><br />
                <label>Mot de passe</label><br />
                <input class="password" type="password" name='password' placeholder="<?php echo $user['password']; ?>" required><br />
                <label>Confirmez la modification</label><br />
                <input class="password" type="password" name='confpass' placeholder="<?php echo $user['password']; ?>" required><br />
                <input class="submit" type="submit" name="modifier" value="Modifier" onclick="alert('Informations modifiés')">
            </form>
        </div>
        <form action="profil.php" method="POST">
            <input class="submit" type="submit" name='deco' value="Déconnexion" onclick="alert('Vous êtes déconnecté')">
        </form>
    </main>

    <footer>
    </footer>
</body>

</html>

<?php

if (isset($_POST["modifier"])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    if ($_POST["password"] != ($_POST["confpass"])) {
        exit('Le mot de passe ne correspond pas');
    } else {
        $requete2 = "UPDATE utilisateurs SET login='$login', password='$password' WHERE id = '" . $_SESSION['id'] . "' "; // Important to put $ between '' and not " "
        $query = mysqli_query($db, $requete2);
        header('location:http://localhost:8888/livre-or/profil/profil.php');
    }
}

if (isset($_POST['deco'])) {
    session_destroy();
    header('location:http://localhost:8888/livre-or/index/index.php');
}

?>