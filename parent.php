<?php
    include 'nav.php';
?>
<?php

        $question = $_POST['question'];
        $reponse1 = $_POST['reponse1'];
        $reponse2 = $_POST['reponse2'];
        $reponse3 = $_POST['reponse3'];
        $reponse4 = $_POST['reponse4'];

        $data = array(
            'question' => $question,
            'reponses' => array(
                $reponse1,
                $reponse2,
                $reponse3,
                $reponse4
            )
        );
        
        $jsonData = json_encode($data);
        file_put_contents('questions/gg.json', $jsonData, FILE_APPEND);
        echo "Données sauvegardées avec succès!";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/pally.css">
    <title>Apprentissage ludique pour enfants</title>
    <style>
        h1 {
            margin: 0 auto;
            width: 50%; /* pour donner à h1 une largeur définie */
            text-align: center;
        }
        .table {
    border-collapse: collapse;
    width: 90%;
    margin: 0 auto;
    width: 70%;
}

.table th, td {
    border: 1px solid #dddddd;
    text-align: center;
    padding: 8px;
}

/* .table th {
    background-color: #dddddd;
} */
    </style>
</head>

<body>
    
    <header>
        <h1>Vous êtes parent ? Veuillez remplir ce fomulaire si vous souhaitez nous aider !</h1>
    </header>
<!-- 
Créez un formulaire HTML qui contient les champs nécessaires pour
collecter les informations que vous souhaitez enregistrer dans votre
fichier JSON. Assurez-vous de donner à chaque champ un nom unique
qui pourra être utilisé pour référencer les données une fois soumises.
 -->

 <form>
  <label for="question">Question:</label>
  <input type="text" id="question" name="question"><br>
  <label for="reponse1">Réponse 1:</label>
  <input type="text" id="reponse1" name="reponse1"><br>
  <label for="reponse2">Réponse 2:</label>
  <input type="text" id="reponse2" name="reponse2"><br>
  <label for="reponse3">Réponse 3:</label>
  <input type="text" id="reponse3" name="reponse3"><br>
  <label for="reponse4">Réponse 4:</label>
  <input type="text" id="reponse4" name="reponse4"><br><br>
  <input type="submit" value="Submit">
</form> 


 <!-- 
Ajoutez un script PHP au début de votre fichier HTML qui va vérifier
si les données ont été soumises en utilisant le superglobale $_POST.
Si les données ont été soumises, utilisez les fonctions json_encode et
file_put_contents pour encoder les données en JSON et les enregistrer
dans un fichier sur le serveur.
-->



<!-- 
Assurez-vous que votre formulaire est configuré pour soumettre
les données à votre script PHP en utilisant la méthode POST et en
spécifiant l'action de soumission de formulaire à l'emplacement de
votre script PHP.
 -->

 <!--
Utilisez json_decode() pour lire les données du fichier JSON pour
 les afficher ou les utiliser dans un autre script.
 -->

</body>