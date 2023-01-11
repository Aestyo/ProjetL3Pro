<?php
    $data = json_decode(file_get_contents('questions/maths.json'), true);
    if(json_last_error() != JSON_ERROR_NONE){
        throw new Exception("Error when decoding the json ".json_last_error_msg());
    }
    include 'nav.html.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="js/mathematique.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/pally.css">
</head>
<button onClick="ChargementQuestionReponses()">ChargerQuestion</button> <button onClick="displayQCM()">QuestionSuivante</button><button onClick="clear_cache()">Clear</button>

<body>
    <div class="main">
        <div class="calcul">
            <div class="infos">
                <p class="nb1 majeur">6</p>
                <p class="operateur">+</p>
                <p class="nb2 majeur">4</p>
                <p class="egal">=</p>
                <p class="questionMark majeur">?</p>
            </div>
        </div>

        <div class="reponse">
            <input type="text" name="reponse" id="reponse" placeholder="| &nbsp Écris ta réponse ici ..." autofocus>
        </div>

        <button type="submit" id="jeReponds">Je réponds !</button>

    </div>


</body>

</html>