<?php
session_start();

//On récupère les questions de la session et le numéro de l'itération actuel
if (isset($_SESSION['questions']) && isset($_SESSION['iteration'])) {
    $iteration = $_SESSION['iteration'];
    $questions = json_decode($_SESSION['questions']);
    $question = $questions[$iteration];
} else {
    header("Location: ../index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question Mathématiques'</title>
    <link rel="stylesheet" href="../css/game.css">
</head>

<body>
    <p class="return"><a href="../index.php">Retour</a></p>
    <div class="content">
        <div class="question">
            <div class="chiffre">
                <?php echo "<p>$question->nombre1</p>" ?>
            </div>
            <?php echo "<p class='chiffre'>$question->operation</p>" ?>
            <div class="chiffre">
                <?php echo "<p>$question->nombre2</p>" ?>
            </div>
            <p>=</p>
            <p class="chiffre">?</p>
        </div>
        <form action="error-win.php" method="post">
            <div class="reponse">
                <input type="text" name="reponse" id="reponse" placeholder="Écrit ta réponse ici!" autofocus>
                </br>
                <p class="return" id="countdown"></p>
                <div class="answer">
                    <button type='submit'>Je réponds !</button>
                </div>

            </div>



        </form>
    </div>

    <img src="../content/img/maths.png" alt="Renard qui fait des maths" class="illustration">
    <script src="../js/button.js"></script>
    <script src="../js/timer.js"></script>

</body>

</html>