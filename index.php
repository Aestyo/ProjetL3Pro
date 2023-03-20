<?php 
    session_start();
    session_unset();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projet Alternant</title>
    <link rel="stylesheet" href="css/landing.css">
</head>
<body>
    <nav>
        <div class="logo">
            <img src="content/img/logo.png" alt="logo">
            <h1>Projet alternant</h1>
        </div>
        <div class="nav-links">
            <ul>
                <li><a href="php/qcm.php">QCM</a></li>
                <li><a href="html/maths.html">WIPMathématiques</a></li>
                <li><a href="#">WIPQuestions</a></li>
                <li><a href="html/win.html">WIPPage réussite</a></li>
                <li><a href="html/error.html">WIPPage erreur</a></li>
            </ul>
        </div>
    </nav>
    <div class="landingPage">
        <div class="landingInfo">
            <h1>Projet Alternant</h1>
            <p>Cette application est un quizz de culture générale pour les enfants. Les questions portent sur les mathématiques et la géographie. Il s'agit d'un projet étudiant réalisé en parallèle de nos alternances. Il propose 3 types de sujets différents, les questions sont modifiables dans les fichiers JSON du dossier questions.</p>

            <form action="start.php" method="post">
                <a href="php/geographie.php"> <button type="submit" name="bouton" value="geographie">Géographie</button></a>
                <a href="php/mathematiques.php"> <button type="submit" name="bouton" value="mathematiques">Mathématiques</button></a>
                <a href="php/culture_generale.php"> <button type="submit" name="bouton" value="culture_generale">Culture Générale</button></a>
            </form>
        </div>
        <div class="landingAsset">
            <img src="content/img/landing-main-asset.png" alt="landing-main-asset">
        </div>
    </div>
</body>
</html>