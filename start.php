<?php 
    session_start();
    if(isset($_POST['bouton'])){
        $_SESSION["categorie"] = $_POST['bouton'];
    }

    # Si les questions ne sont pas chargées dans la session, on crée un nouveau tableau de questions
    if (!isset($_SESSION['questions'])) {
        
        if($_SESSION["categorie"] == "maths"){
            $_SESSION['questions'] = json_encode(math_question());
        } else {
            $_SESSION['questions'] = json_encode(json_question());
        }
        var_dump($_SESSION['questions']);
    }

    function math_question() {
        $operations = array('+','-','*','÷');
        for ($i = 0; $i < 10; $i++) {
            $operation = $operations[array_rand($operations)];
            $nombre1 = rand(1, 10);
            $nombre2 = rand(1, 10);
            switch ($operation) {
                case '+':
                    $reponse = $nombre1 + $nombre2;
                    break;
                case '-':
                    $reponse = $nombre1 - $nombre2;
                    break;
                case '*':
                    $reponse = $nombre1 * $nombre2;
                    break;
                case '÷':
                    $reponse = intdiv($nombre1, $nombre2);
                    break;
            }
            $question = "$nombre1 $operation $nombre2";
            $questions[] = compact('nombre1', 'operation', 'nombre2', 'reponse', 'question');
        }
        return $questions;        
    }

    function json_question() {
        $questions_file = "questions/" . $_SESSION["categorie"] . ".json";
        $data = json_decode(file_get_contents($questions_file), true);
        $random_indexes = array_rand($data[1], 10);
        $questions = array_intersect_key($data[1], array_flip($random_indexes));
        return array_values($questions);
    }
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/pally.css">

        <script src="js/app.js"></script>

    </head>
    <body>
        
        <form>
            <?php
                if($_SESSION["categorie"] == "maths"){
                    echo '<button type="submit" class="button big" formaction="open.php">START!</button>';
                } else {
                    echo '<button type="submit" class="button big" formaction="qcm.php">START!</button>';
                }
            ?>
        </form>
        
    </body>
</html>