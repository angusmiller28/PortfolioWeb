<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Angus Miller Portfolio - Projects</title>

    <link rel="stylesheet" href="style/css_reset.css">
    <link rel="stylesheet" href="style/nav.css">
    <link rel="stylesheet" href="style/footer.css">
    <link rel="stylesheet" href="style/projects.css">

    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css" integrity="sha384-v2Tw72dyUXeU3y4aM2Y0tBJQkGfplr39mxZqlTBDUZAb9BGoC40+rdFCG0m10lXk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/brands.css" integrity="sha384-IiIL1/ODJBRTrDTFk/pW8j0DUI5/z9m1KYsTm/RjZTNV8RHLGZXkUDwgRRbbQ+Jh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/fontawesome.css" integrity="sha384-q3jl8XQu1OpdLgGFvNRnPdj5VIlCvgsDQTQB6owSOHWlAurxul7f+JpUOVdAiJ5P" crossorigin="anonymous">

    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
    <div id="container" >
      <nav id="nav-container">
        <?php include 'nav.php';?>
      </nav>
        <section id="body-container">
          <div id="title-container"><h1 id="title">Projects</h1></div>

          <div id="gallery" class="cards">
            <ul>

              <?php

              $servername = "localhost";
              $username = "root";
              $password = "root";
              $dbname = "portfolio";

              try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // get datafrom database

                $stmt = $conn->prepare('SELECT id, name, cardImage FROM projects');
                $stmt->execute();
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  ?><li><div class="card"><a href="project.php?id=<?php echo $row['id'] ?>"><img src="data:image/jpeg;base64,<?php echo base64_encode($row['cardImage']);?>" /></a></li><?php

                }

                }
                catch(PDOException $e)
                {
                echo "Error: " . $e->getMessage();
                }
                $conn = null;

               ?>
            </ul>
          </div>
        </section>


        <?php include "footer.php" ?>
    </div>

</body>
</html>
