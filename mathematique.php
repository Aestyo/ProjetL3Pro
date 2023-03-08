<?php
clearstatcache();
session_start();

include 'nav.php';

if (!isset($_SESSION['questions'])) {
    $json = file_get_contents("questions/maths.json");
    $data = json_decode($json, true);

    $questions = array();

    foreach ($data['questions'] as $q) {
        $questions[] = $q;
    }
    $_SESSION['questions'] = json_encode($questions);
}

$questions = json_decode($_SESSION['questions']);
$iteration = $_SESSION['iteration'] ?? 0;
$score = $_SESSION['score'] ?? 0;

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
    echo "<button type='submit' id='jeReponds'><a href='index.php'>Retour aux menu</a></button>";
    echo "</form>";
    exit;
}

$bonne_reponse = $questions[$iteration]->bonne_reponse;
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
                    <input type="text" name="reponse" required>
                    <button type="submit">Valider</button>
                </div>
            </form>
            <?php if ($iteration < count($questions) - 1) {
                echo "<div class='score'>";
                echo "<p>Question " . ($iteration + 1) . "/" . count($questions) . "</p>";
                echo "<p>Score : " . $score . "</p>";
                echo "</div>";
            } else {
                echo "<div class='score'>";
                echo "<p>Question " . ($iteration + 1) . "/" . count($questions) . "</p>";
                echo "<p>Score : " . $score . "</p>";
                echo "</div>";
            }
            ?>
        </div>
    </div>
</body>

</html>
