<?php
session_start();
include 'nav.php';
$questions = json_decode($_SESSION['questions']);

if (is_null($questions)) {
    $json = file_get_contents("questions/culture-g.json");
    $data = json_decode($json, true);

    $questions = array();

    foreach ($data['questions'] as $q) {
        $questions[] = $q;
    }
    $_SESSION['questions'] = json_encode($questions);
}

$iteration = $_SESSION['iteration'];
$score = $_SESSION['score'];

if (is_null($iteration) || $iteration >= count($questions)) {
    $_SESSION['iteration'] = 0;
    $iteration = 0;
    $_SESSION['score'] = 0;
    $score = 0;
}

if (isset($_POST['reponse'])) {
    $reponse = $_POST['reponse'];
    if ($reponse == $questions[$iteration]->bonne_reponse) {
        $score += 1;
        $_SESSION['score'] = $score;
    }
    $iteration = $iteration + 1;
    $_SESSION['iteration'] = $iteration;
}

if ($iteration >= count($questions)) {
    echo "<form action='#' method='post'>";
    echo "<p>Votre score est de : " . $score . "/" . count($questions) . "</p>";
    echo "<button type='submit' id='jeReponds'>Retour aux questions</button>";
    echo "</form>";
    exit;
}

$bonne_reponse = $questions[$iteration]->bonne_reponse;
$question_array = array($questions[$iteration]->reponses[0], $questions[$iteration]->reponses[1], $questions[$iteration]->reponses[2], $questions[$iteration]->reponses[3]);
shuffle($question_array);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="main">
        <div class="question">
            <p class="quote" id="question">
                <?php echo $questions[$iteration]->question ?>
            </p>
        </div>

        <div class="choixMultiple">
            <form action="#" method="post">
                <div class="ligne ligne1">
                    <button class='reponseM' id='reponse1' name='reponse'
                        value='<?php echo $question_array[0]; ?>'><?php echo $question_array[0]; ?></button>
                    <button class='reponseM' id='reponse2' name='reponse'
                        value='<?php echo $question_array[1]; ?>'><?php echo $question_array[1]; ?></button>
                </div>
                <br>
                <div class="ligne ligne2">
                    <button class="reponseM" id="reponse3" name='reponse'
                        value='<?php echo $question_array[2]; ?>'><?php echo $question_array[2]; ?></button>
                    <button class="reponseM" id="reponse4" name='reponse'
                        value='<?php echo $question_array[3]; ?>'><?php echo $question_array[3]; ?></button>
                </div>
                <?php if ($iteration < count($questions) - 1) {
                    echo "<div class='score'>";
                    echo "<p>Question " . ($iteration + 1) . "/" . count($questions) . "</p>";
                    echo "<p>Score : " . $score . "</p>";
                    echo "</div>";
                    echo "<button type='submit' id='jeReponds'>Changer l'ordre</button>";
                } else {
                    echo "<div class='score'>";
                    echo "<p>Question " . ($iteration + 1) . "/" . count($questions) . "</p>";
                    echo "<p>Score : " . $score . "</p>";
                    echo "</div>";
                }
                ?>
            </form>
        </div>
    </div>
</body>

</html>