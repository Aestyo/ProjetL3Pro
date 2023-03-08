<!DOCTYPE html>
<html>

<head>
   <title>Mon site web</title>
   <style>
      nav {
         display: flex;
         justify-content: space-between;
         align-items: center;
         background-color: #f2f2f2;
      }

      nav ul {
         display: flex;
         list-style: none;
         margin: 0;
         padding: 0;
      }

      nav ul a {
         display: block;
         padding: 10px;
         color: black;
         text-decoration: none;
      }

      nav ul a:hover {
         background-color: #ddd;
      }
   </style>
</head>

<body>
   <?php
      session_start();
      if(isset($_SESSION['questions'])){
         unset($_SESSION['questions']);
      }
   ?>
   <nav>
      <ul>
         <li><a href="index.php">Accueil</a></li>
         <li><a href="mathematique.php">Mathématiques</a></li>
         <li><a href="histoire-geo.php">Histoire-Géographie</a></li>
         <li><a href="cult-g.php">Culture Générale</a></li>
         <li><a href="propos.php">A propos</a></li>
      </ul>
   </nav>
</body>

</html>
