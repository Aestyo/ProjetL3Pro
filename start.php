<?php
session_start();

# Si la catégorie n'est pas définie ou si elle est incorrecte, on redirige vers la page d'accueil
if (isset($_POST['bouton'])) {
    if (in_array($_POST['bouton'], array("mathematiques", "geographie", "culture_generale"))) {
        $_SESSION["categorie"] = $_POST['bouton'];
    } else {
        header("Location: index.php");
    }
} else {
    header("Location: index.php");
}

# Si les questions ne sont pas chargées dans la session, on crée un nouveau tableau de questions
if (!isset($_SESSION['questions'])) {
    if ($_SESSION["categorie"] == "mathematiques") {
        $_SESSION['questions'] = json_encode(math_question());  # On crée un tableau de questions mathématiques aléatoires
    } else {
        $_SESSION['questions'] = json_encode(json_question());  # On crée un tableau de questions à partir des fichiers json
    }
    $_SESSION['iteration'] = 0;  # On initialise l'itération à 0
}

function math_question()
{
    $operations = array('+', '-', '×', '÷');
    for ($i = 0; $i < 10; $i++) {
        $operation = $operations[array_rand($operations)];
        $nombre1 = rand(1, 10);
        $nombre2 = rand(1, 10);
        switch ($operation) {
            case '+':
                $reponse1 = $nombre1 + $nombre2;
                break;
            case '-':
                $reponse1 = $nombre1 - $nombre2;
                break;
            case '×':
                $reponse1 = $nombre1 * $nombre2;
                break;
            case '÷':
                $reponse1 = intdiv($nombre1, $nombre2);
                break;
        }
        $intitule = "$nombre1 $operation $nombre2";
        $questions[] = compact('nombre1', 'operation', 'nombre2', 'reponse1', 'intitule');
    }
    return $questions;
}

function json_question()
{
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
    <title>Question Histoire Géo</title>
    <link rel="stylesheet" href="css/game.css">
</head>

<body>
    <p class="return"><a href="index.php">Retour</a></p>
    <form>
        <div class="content">
            <?php
            if ($_SESSION["categorie"] == "mathematiques") {
                echo '<button type="submit" class="button big" formaction="php/qmaths.php">Commencer !</button>';
            } else {
                echo '<button type="submit" class="button big" formaction="php/qcm.php">Commencer !</button>';
            }
            ?>
        </div>

        <img src="content/img/hist-geo.png" alt="Renard qui voyage" class="illustration" />
    </form>
</body>

</html>