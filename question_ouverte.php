<?php

  function math_question()
  {
    $questions = array();
    $operations = array('+','-','*','/');

    for($i = 0; $i < 4; $i++) {
        $nombre1 = rand(1, 10);
        $nombre2 = rand(1, 10);

        // On choisit aléatoirement une opération

        $operation = $operations[array_rand($operations)];

        $question;
        $reponse;

        switch($operation)
        {
            case '+':
                $question = $nombre1 . '+' . $nombre2;
                $reponse = $nombre1 + $nombre2;
                break;
            case '-':
                $question = $nombre1 . '-' . $nombre2;
                $reponse = $nombre1 - $nombre2;
                break;
            case '*':
                $question = $nombre1 . '*' . $nombre2;
                $reponse = $nombre1 * $nombre2;
                break;
            case '/':
                $question = $nombre1 . '/' . $nombre2;
                $reponse = floor($nombre1 / $nombre2);
                break;    
        }

$questions[] = array('nombre1' => $nombre1, 'operation' => $operation, 'nombre2' => $nombre2, 'reponse' => $reponse);
}
return $questions;

  }

  $arrayOfQuestionObjects = math_question();

  function display_math_question($arrayOfQuestionObjects) {
    for ($i = 0; $i < count($arrayOfQuestionObjects); $i++) {
        echo 'Nombre 1 : '. $arrayOfQuestionObjects[$i]['nombre1'] .'<br>';
        echo 'Opération : '. $arrayOfQuestionObjects[$i]['operation'] .'<br>';
        echo 'Nombre 2 : '. $arrayOfQuestionObjects[$i]['nombre2'] .'<br><br>';
        echo 'Reponse : '. $arrayOfQuestionObjects[$i]['reponse'] .'<br><br>';
    }
}

display_math_question($arrayOfQuestionObjects);


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
</head>

<body>
    <nav>
        <ul>
            <a href="question_ouverte.php">
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
        <div class="calcul">
            <div class="infos">
              

                <?php echo "<p class='nb1 majeur'>", $arrayOfQuestionObjects[0]['nombre1'],"</p>"; ?>
                <?php echo "<p class='operateur'>", $arrayOfQuestionObjects[0]['operation'],"</p>"; ?>
                <?php echo "<p class='nb2 majeur'>", $arrayOfQuestionObjects[0]['nombre2'],"</p>"; ?>
                <?php echo "<p class='egal'>=</p>"; ?>
                <?php echo "<p class='questionMark majeur'>?</p>"; ?>

               
            </div>
        </div>

        <div class="reponse">
            <input type="text" name="reponse" id="reponse" placeholder="| &nbsp Écris ta réponse ici ..." autofocus>
        </div>

        <button type="submit" id="jeReponds">Je réponds !</button>

    </div>

</body>

</html>