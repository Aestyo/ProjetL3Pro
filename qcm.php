<?php
    session_start();

    //On récupère les questions de la session et le numéro de l'itération actuel
    if(isset($_SESSION['questions'])){
        $questions = json_decode($_SESSION['questions']);
    }
    if(isset($_SESSION['iteration'])){
        if($_SESSION['iteration'] >= 10){
            header("Location: index.php");
        }else{
            $iteration = $_SESSION['iteration'];
            $_SESSION['iteration']++;
        }
    }else{
        $_SESSION['iteration'] = 1;
        $iteration = 0;
    }

    //On récupère la bonne réponse pour la question en cours d'itération
    $bonne_reponse = $questions[$iteration]->reponse1;
    $_SESSION['bonne_reponse'] = $bonne_reponse;

    //On crée un tableau avec les réponses possibles à la question en cours d'itération et on le mélange
    $question_array = array($questions[$iteration]->reponse1, $questions[$iteration]->reponse2, $questions[$iteration]->reponse3, $questions[$iteration]->reponse4);
    shuffle($question_array);
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

    <form action="#" method="post">
        <input type="submit" name="logout" value="Logout">
    </form>

    <body>
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
                        if ($iteration < 9) echo "<button type='submit' class='button medium'>Je réponds !</button>";
                        else echo "<button type='submit' class='button medium'>Fin !</button>";
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>