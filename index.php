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
        <link rel="stylesheet" href="css/pally.css">
        <script src="js/app.js"></script>
    </head>

    <body>

        <h1>Choisissez votre catégorie</h1>

        <form method="post" action="start.php">
            <button type="submit" class="button big" name="bouton" value="maths">Mathématiques</button>
            <button type="submit" class="button big" name="bouton" value="histoire-geo">Histoire-Géo</button>
            <button type="submit" class="button big" name="bouton" value="culture-g">Culture G</button>
        </form>

    </body>

</html>