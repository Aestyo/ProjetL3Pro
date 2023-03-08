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
   <nav>
      <ul>
         <a href="index.php">
            <li>A propos</li>
         </a>
         <a href="mathematique.php">
            <li>Mathématiques</li>
         </a>
         <a href="histoire-geo.php">
            <li>Histoire-Géographie</li>
         </a>
         <a href="cult-g.php">
            <li>Culture Générale</li>
         </a>
      </ul>
   </nav>
</body>

</html>