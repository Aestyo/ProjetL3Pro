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
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/pally.css">

    <script src="js/app.js"></script>

</head>
<body>
    <nav>
        <ul>
            <a href="index.html"><li>Accueil</li></a>
            <a href="math.html"><li>Mathématiques</li></a>
            <a href="start.html"><li>Histoire-Géographie</li></a>
            <a href="question_ouverte.html"><li>Culture Générale</li></a>
            <a href="#"><li>Gérer les questions</li></a>
        </ul>
    </nav>
    <form>
        <button type="submit" id="jeReponds" formaction="qcm.php">START!</button>
    </form>
    
</body>
</html>