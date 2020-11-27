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

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../lecss/index.css" rel="stylesheet">
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <title>Accueil</title>
</head>

<body>


    <main>

    </main>
    <footer>

    </footer>
</body>

</html>