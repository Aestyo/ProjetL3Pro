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
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav>
        <div class="header">
            <img src="content/img/logo.png" alt="logo">
            <h2>Projet Alternant</h2>
        </div>
        <ul>
                <li><a href="start.php?categorie=mathematiques">Mathématiques</a></li>
                <li><a href="start.php?categorie=geographie">Histoire-Géographie</a></li>
                <li><a href="start.php?categorie=culture_generale">Culture générale</a></li>
        </ul>
    </nav>

    <div class="hero">
        <div class="heroInfos">
            <h1>Projet Alternant</h1>
            <p>Cette application est un quizz de culture générale pour les enfants.
                Les questions portent sur les mathématiques et la géographie.
                Il s'agit d'un projet étudiant réalisé en parallèle de nos alternances.
                Il propose 3 types de sujets différents, les questions sont modifiables dans
                les fichiers JSON du dossier questions</p>
            <a href="start.php?categorie=aleatoire"><button>Essayer gratuitement</button></a>
            </div>
        <div class="heroAsset">
            <img src="content/img/landing-main-asset.png" alt="hero">
        </div>
    </div>
</body>
</html>