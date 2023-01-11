<?php
    session_start();

    //Fonction pour charger des questions depuis un fichier JSON
    function load_question(){
        //Vérifie si les questions sont déjà dans la session
        $questions = json_decode($_SESSION['questions']);
        
        if(is_null($questions)){
            //Si les questions ne sont pas dans la session, on lit le fichier JSON
            $json = file_get_contents("questions/histoire-geo.json");
            $data = json_decode($json, true);

            //Initialise le tableau de questions
            $questions = array();
            
            // On choisit aléatoirement 3 questions parmi les données lues dans le fichier JSON
            for($i = 0; $i < 3; $i++){
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
        //Retourne les questions
        return $questions;
    }

    print_r(load_question());
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

<button onClick="load_question()">ChargerQuestion</button><button onClick="displayQCM()">QuestionSuivante</button><button onClick="clear_cache()">Clear</button>

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
            <form action="#" method="post">
                <div class="ligne ligne1">
                    <button class="reponseM" id="reponse1">Un club</button>
                    <button class="reponseM" id="reponse2">Une batte</button>
                </div>
                <br>
                <div class="ligne ligne2">
                    <button class="reponseM" id="reponse3">Des quilles</button>
                    <button class="reponseM" id="reponse4">Un volant</button>
                </div>
                <div class="ligne ligne3">
                    <button type="submit" id="jeReponds">Je réponds !</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>