<?php
session_start();

//On vérifie si les questions sont déjà dans la session, sinon on lit le fichier JSON
if (!isset($_SESSION['questions'])) {
    $json = file_get_contents("questions/histoire-geo.json");
    $data = json_decode($json, true);

    //On initialise le tableau de questions
    $questions = array();

    //On choisit aléatoirement 10 questions parmi les données lues dans le fichier JSON
    $random_indexes = array_rand($data[1], 10);
    foreach ($random_indexes as $index) {
        $questions[] = $data[1][$index];
    }

    //On stocke les questions choisies dans la session
    $_SESSION['questions'] = json_encode($questions);
}

//On récupère les questions depuis la session
$questions = json_decode($_SESSION['questions']);

//On récupère l'itération actuelle depuis la session, on la remet à 0 si on a atteint la fin des questions
$iteration = isset($_SESSION['iteration']) ? $_SESSION['iteration'] : 0;
$iteration = $iteration >= 10 ? 0 : $iteration;

//On récupère la bonne réponse pour la question en cours d'itération
$bonne_reponse = $questions[$iteration]->reponse1;
$_SESSION['bonne_reponse'] = $bonne_reponse;

//On crée un tableau avec les réponses possibles à la question en cours d'itération
//et on le mélange
$question_array = array($questions[$iteration]->reponse1, $questions[$iteration]->reponse2, $questions[$iteration]->reponse3, $questions[$iteration]->reponse4);
shuffle($question_array);

//On stocke la nouvelle itération
$_SESSION['iteration'] = $iteration + 1;

echo $iteration;
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
            <a href="question_ouverte.html">
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