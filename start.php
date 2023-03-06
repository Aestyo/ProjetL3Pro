<?php 
    session_start();
    if(isset($_POST['bouton'])){
        $_SESSION["categorie"] = $_POST['bouton'];
    }

    # Si les questions ne sont pas chargées dans la session, on crée un nouveau tableau de questions
    if (!isset($_SESSION['questions'])) {
        
        // On commence par lire le fichier JSON correspondant
        $json = file_get_contents("questions/".$_SESSION["categorie"].".json");
        $data = json_decode($json, true);
        var_dump($data);
    
        //On initialise le tableau de questions
        $questions = array();
        $random_indexes = array_rand($data[1], 10);
        foreach ($random_indexes as $index) {
            $questions[] = $data[1][$index];
        }
    
        //On stocke les questions choisies dans la session
        $_SESSION['questions'] = json_encode($questions);
    }
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
        <button type="submit" class="button big" formaction="qcm.php">START!</button>
    </form>
    
</body>
</html>