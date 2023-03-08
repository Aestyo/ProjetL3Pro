<?php
include 'nav.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/pally.css">

<body>
    <?php
    session_start();
    if (isset($_SESSION['questions'])) {
        unset($_SESSION['questions']);
    }
    ?>
    <style>
        main {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 80vh;
        }

        button {
            width: 200px;
            padding: 20px;
            margin:10px
        }
    </style>
    <main>
        <button type="submit" class="button big" name="bouton" value="maths">
            <a href="mathematique.php" style="color: black;">Mathématiques</a>
        </button>
        <button type="submit" class="button big" name="bouton" value="histoire-geo">
            <a href="histoire-geo.php" style="color: black;">Histoire-Géo</a>
        </button>
        <button type="submit" class="button big" name="bouton" value="culture-g">
            <a href="cult-g.php" style="color: black;">Culture G</a>
        </button>
    </main>

</body>