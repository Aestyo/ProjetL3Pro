<?php
session_start();

//Vérifie si les questions sont déjà dans la session
$questions = json_decode($_SESSION['questions']);

if (is_null($questions)) {
    //Si les questions ne sont pas dans la session, on lit le fichier JSON
    $json = file_get_contents("questions/histoire-geo.json");
    $data = json_decode($json, true);

    //Initialise le tableau de questions
    $questions = array();

    // On choisit aléatoirement 3 questions parmi les données lues dans le fichier JSON
    for ($i = 0; $i < 10; $i++) {
        //Choisir un index aléatoire
        $random_index = array_rand($data[1]);

        //ajoute la question choisie au tableau de questions
        $questions[] = $data[1][$random_index];

        //supprime la question choisie de l'array $data[1]
        unset($data[1][$random_index]);
    }
    //stocke les questions choisies dans la session
    $_SESSION['questions'] = json_encode($questions);
}

$questions = json_decode($_SESSION['questions']);

$iteration = $_SESSION['iteration'];
if (is_null($iteration) || $iteration >= 10) {
    $_SESSION['iteration'] = 0;
    $iteration = 0;
} else {
    $iteration = $iteration + 1;
    $_SESSION['iteration'] = $iteration;
}
echo $iteration;

$bonne_reponse = $questions[$iteration]->reponse1;
$question_array = array($questions[$iteration]->reponse1, $questions[$iteration]->reponse2, $questions[$iteration]->reponse3, $questions[$iteration]->reponse4);
shuffle($question_array);

echo $bonne_reponse;
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="js/app.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/pally.css">
</head>

<form action="#" method="post">
    <input type="submit" name="logout" value="Logout">
</form>

<body>
    <nav>
        <ul>
            <a href="question_ouverte.php">
                <li>Mathématiques</li>
            </a>
            <a href="image.html">
                <li>Histoire-Géographie</li>
            </a>
            <a href="qcm.html">
                <li>Culture Générale</li>
            </a>
            <a href="#">
                <li>Gérer les questions</li>
            </a>
        </ul>
    </nav>

    <div class="main">
        <div class="question">
            <p class="quote" id="question"><?php echo $questions[$iteration]->question ?></p>
        </div>

        <div class="choixMultiple">
            <form action="#" method="post">
                <div class="ligne ligne1">
                    <?php echo "<button class='reponseM' id='0'>", $question_array[0], "</button>"; ?>
                    <?php echo "<button class='reponseM' id='1'>", $question_array[1], "</button>"; ?>
                </div>
                <br>
                <div class="ligne ligne2">
                    <?php echo "<button class='reponseM' id='2'>", $question_array[2], "</button>"; ?>
                    <?php echo "<button class='reponseM' id='3'>", $question_array[3], "</button>"; ?>
                </div>
                <div class="ligne ligne3">
                    <?php
                    if ($iteration < 9) echo "<button type='submit' id='jeReponds'>Je réponds !</button>";
                    else echo "<button type='submit' id='jeReponds'>Fin !</button>";
                    ?>
                </div>
            </form>
        </div>
    </div>
</body>

</html>