<?php
    session_start();

    //On récupère les questions de la session et le numéro de l'itération actuel
    if(isset($_SESSION['questions']) && isset($_SESSION['iteration'])){
        $iteration = $_SESSION['iteration'];
        $questions = json_decode($_SESSION['questions']);
        $question = $questions[$iteration];
        $reponses = array($question->reponse1, $question->reponse2, $question->reponse3, $question->reponse4);
        shuffle($reponses);
    }else{
        header("Location: ../index.php");
    }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question Histoire Géo</title> 
    <link rel="stylesheet" href="../css/game.css">
</head>
<body>
    <p class="return"><a href="../index.php">Retour</a></p>
    <form action="error-win.php" method="post">
        <div class="content">
            <div class="question">
                <p><?php echo $question->intitule ?></p>
            </div>
            <div class="reponses">
                
                <?php echo "<div class='rep' id='rep1'><p>$reponses[0]</p></div>" ?>
                <?php echo "<div class='rep' id='rep2'><p>$reponses[1]</p></div>" ?>
                <?php echo "<div class='rep' id='rep3'><p>$reponses[2]</p></div>" ?>
                <?php echo "<div class='rep' id='rep4'><p>$reponses[3]</p></div>" ?>

                <input type="hidden" name="reponse" id="input_hidden" value="0">

            </div>
        
            <div class="answer">
                <button type='submit'>Je réponds !</button>
            </div>
        </div>
    </form>

    <img src="../content/img/hist-geo.png" alt="Renard qui voyage" class="illustration">
    <script src="../js/script.js"></script>

</body>
</html>