<?php
    $data = json_decode(file_get_contents('questions/histoire-geo.json'), true);
    if(json_last_error() != JSON_ERROR_NONE){
        throw new Exception("Error when decoding the json ".json_last_error_msg());
    }    
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

<button onClick="load_question()">Test</button>

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
            <p class="quote" id="question">Avec quel objet puis-je jouer au baseball ?</p>
        </div>

        <div class="choixMultiple">
            <div class="ligne ligne1">
                <button type="disabled" class="reponseM" id="reponse1">Un club</button>
                <button type="disabled" class="reponseM" id="reponse2">Une batte</button>
            </div>
            <br>
            <div class="ligne ligne2">
                <button type="disabled" class="reponseM" id="reponse3">Des quilles</button>
                <button type="disabled" class="reponseM" id="reponse4">Un volant</button>
            </div>
        </div>
    </div>
</body>

</html>