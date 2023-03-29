<?php
session_start();

if (isset($_SESSION['questions']) && isset($_SESSION['iteration'])) {
    $iteration = $_SESSION['iteration'];
    $questions = json_decode($_SESSION['questions']);
    $question = $questions[$iteration];
    $bonne_reponse = $question->reponse1;
} else {
    header("Location: ../index.php");
}



if ($iteration >= 9) {
    header("Location: end.php");
} else {
    $_SESSION['iteration']++;
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultat !</title>
    <link rel="stylesheet" href="../css/error-win.css">
</head>

<body>
    <p class="return"><a href="../index.php">Retour</a></p>
    <div class="content">

        <?php
        if(isset($_POST['reponse'])){


        if ($bonne_reponse == $_POST['reponse']) {
            $_SESSION['points'] += 1;
            echo "<div class='asset'>";
            echo "<img src='../content/img/win.png' alt=''>";
            echo "</div>";
            echo "<h1>C'est la bonne réponse !</h1>";
            echo "<p>Tu peux être fier de toi !</p>";
        } else {
            echo "<div class='asset'>";
            echo "<img src='../content/img/error.png' alt='' srcset=''>";
            echo "</div>";
            echo "<h1>Mauvaise réponse ...</h1>";
            echo "<p>La bonne réponse était : $bonne_reponse</p>";
        }

        } else{
            echo "<div class='asset'>";
            echo "<img src='../content/img/error.png' alt='' srcset=''>";
            echo "</div>";
            echo "<h1>Pas de réponse ?</h1>";
            echo "<p>On dirait que tu as manqué de temps ...</p>";
        }
        ?>

        <form>
            <?php
            if ($_SESSION["categorie"] == "mathematiques") {
                echo '<button type="submit" class="button big" formaction="qmaths.php">Prochaine question!</button>';
            } else {
                echo '<button type="submit" class="button big" formaction="qcm.php">Prochaine question!</button>';
            }
            ?>
        </form>
    </div>
</body>

</html>