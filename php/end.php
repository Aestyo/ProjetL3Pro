<?php
session_start();

if (isset($_SESSION['questions']) && isset($_SESSION['iteration'])) {
    $points = $_SESSION['points'];
} else {
    header("Location: ../index.php");
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
        if ($points > 5) {
            echo "<div class='asset'>";
            echo "<img src='../content/img/win.png' alt=''>";
            echo "</div>";
            echo "<h1>Tu as eu " . $points . " / 10</h1>";
            echo "<p>Tu peux être fier de toi !</p>";
        } else {
            echo "<div class='asset'>";
            echo "<img src='../content/img/error.png' alt='' srcset=''>";
            echo "</div>";
            echo "<h1>Tu as eu " . $points . " / 10</h1>";
            echo "<p>Tu feras mieux la prochaine fois !</p>";
        }
        ?>

        <form>
            <?php
            echo '<button type="submit" class="button big" formaction="../index.php">Retour au menu</button>';
            ?>
        </form>
    </div>
</body>

</html>