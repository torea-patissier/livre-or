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
    <title>Accueil</title>
</head>

<body>

    <?php
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

    <main>

        <div class="imgheader">
            <img src="../images/spotifyy.png" alt="presentationspotify">
        </div>
        <div id="getitimg">

            <div class="appstoreimg">
                <a target="_blank" href="https://apps.apple.com/fr/app/spotify-musique-et-podcasts/id324684580">
                    <img src="../images/appstore.png" alt="spotifyapple"></a>
            </div>

            <div class="googleplayimg">
                <a target="_blank" href="https://play.google.com/store/apps/details?id=com.spotify.music&hl=fr">
                    <img src="../images/googleplay.png" alt="spotifygoogle"></a>

            </div>
        </div>
        <br />

        <div class="spotaccueil">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/__pV0V7ogKo" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>

        <div id="blocspot1">

            <div class="imgspot1">
                <p>
                    <img src="../images/spot1.png" alt="spot1">
                </p>
            </div>

            <div class="textspot1">
                <h2>
                    Découvrez les podcasts avec Spotify
                </h2>

                <p>
                    Spotify vous permet d’écouter de la musique quand vous voulez,
                    <br>ou vous voulez. Mais pas que, l’application vous permet aussi
                    <br> d’écouter tout types de podcast, que ce soit sur le développement
                    <br>personnel ou comme ici, sur les entreprises et technologie.
                </p>
            </div>

        </div>


        <div id="blocspot2">

            <div class="imgspot2">
                <p>
                    <img src="../images/spot2.png" alt="spot2">
                </p>
            </div>

            <div class="textspot2">
                <h2>
                    Une application simple et intuitive
                </h2>

                <p>
                    Vous pouvez écouter de la musique depuis votre mobile et passer
                    <br>instantanément sur votre ordinateur en un clic, la transition se fait
                    <br>naturellement et la musique vous étiez en train d’écouter reprend sa
                    <br>lecture ou elle s’était arrêté une fois la transition terminé.
                </p>
            </div>

        </div>


        <div id="blocspot3">

            <div class="imgspot3">
                <p>
                    <img src="../images/spot3.png" alt="spot3">
                </p>
            </div>

            <div class="textspot3">
                <h2>
                    Ecoutez la musique qui vous ressemble
                </h2>

                <p>
                    Spotify est l’une des plateformes les plus utilisés au monde pour
                    <br>écouter de la musique, vous y trouverez presque tous les sons
                    <br>existant, notamment le fameux WAP de Cardi B pour une soirée plus
                    <br>que convivial avec votre famille et vos ami(e)s.
                </p>
            </div>

        </div>

        <div id="blocspot4">

            <div class="imgspot4">
                <p>
                    <img src="../images/spot4.png" alt="spot4">
                </p>
            </div>

            <div class="textspot4">
                <h2>
                    Retrouvez vos artistes préférés
                </h2>

                <p>
                    Enfin, si vous n’aimez pas Cardi B vous pourrez chercher le titre
                    <br>que vous voulez, ou rechercher des musiques par genres et artistes
                    <br>tout en créant des playlist à votre image.
                </p>
            </div>

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