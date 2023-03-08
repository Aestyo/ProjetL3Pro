<?php
include 'nav.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/pally.css">
    <style>
        .cadre {
            max-width: 800px;
            margin: 0 auto;
            margin-top: 250px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 5px #ccc;
        }

        h2,
        h3 {
            color: white;
            font-weight: bold;
            margin-bottom: 10px;
        }

        ul {
            margin-left: 20px;
        }

        li {
            margin-bottom: 5px;
        }

        footer {
            margin-top: 50px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="cadre">
        <h2>À propos</h2>
        <p>Notre site de jeux éducatifs pour enfants a pour but d'aider les jeunes apprenants à renforcer leurs
            connaissances dans différents domaines, tels que les mathématiques, l'histoire, la géographie et la culture
            générale. Nous proposons une variété de jeux interactifs, y compris des quiz à choix multiples (QCM), pour
            rendre l'apprentissage amusant et stimulant.</p>
        <h3>Notre équipe</h3>
        <ul style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px;">
            <li>Charef Mouad</li>
            <li>Abgo Charles </li>
            <li>Mathis</li>
            <li>Espoir</li>
            <li>Camille </li>
            <li>Tanguy</li>
        </ul>

        <h3>Contactez-nous</h3>
        <p>Si vous avez des questions ou des commentaires sur notre site de jeux éducatifs pour enfants, n'hésitez pas à
            nous contacter :</p>
        <ul>
            <li>Email : contact@jeux-educatifs-enfants.com</li>
            <li>Téléphone : +33 (0)1 23 45 67 89</li>
            <li>Adresse : 123 rue des Jeux Éducatifs, 30000 Angers, France</li>
        </ul>
    </div>
    <footer>
        <p>&copy; 2023 Jeux éducatifs pour enfants - Tous droits réservés.</p>
    </footer>
</body>

</html>