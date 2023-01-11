<?php
    include 'nav.html.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/pally.css">
    <title>Apprentissage ludique pour enfants</title>
    <style>
        h1 {
            margin: 0 auto;
            width: 50%; /* pour donner à h1 une largeur définie */
            text-align: center;
        }
        .table {
    border-collapse: collapse;
    width: 90%;
    margin: 0 auto;
    width: 70%;
}

.table th, td {
    border: 1px solid #dddddd;
    text-align: center;
    padding: 8px;
}

/* .table th {
    background-color: #dddddd;
} */
    </style>
</head>

<body>
    
    <header>
        <h1>Bienvenue sur notre site d'apprentissage ludique pour enfants!</h1>
    </header>

    <main>
        <section id="Apropos">
            <h2>A propos</h2>
            <p>Notre site est conçu pour aider les enfants de 4 à 14 ans à apprendre de manière interactive et amusante. Nous croyons que l'apprentissage peut être amusant, et nous avons créé des jeux éducatifs pour aider les enfants à découvrir de nouvelles choses tout en s'amusant.</p>
        </section>

        <section id="Jeux">
            <h2>Jeux</h2>
            <p>Notre site propose une variété de jeux éducatifs pour les enfants de différents âges et de différentes matières. Jetez un coup d'œil à notre liste de jeux pour voir ce que nous avons à offrir.</p>
            
            <table class="table">
  <tr>
    <th><a href="mathematique.html.php">
                <li>Jeux de mathématiques</li>
            </a></th>
    <th><a href="histoire-geo.html.php">
                <li>Jeux d'histoire et géographie</li>
            </a></th>
    <th><a href="cult-g.html.php">
                <li>Jeux de culture Générale</li>
            </a></th>
  </tr>
  <tr>
    <td>Image</td>
    <td>Image</td>
    <td>Image</td>
  </tr>
</table>
        </section>

    </main>

</body>
