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
          <div id="nav-bar-container">
            <ul>
              <li id="nav-bar-logo"><div id="logo">
                <img src="img/logo" alt="logo" height="23.15px" width="62.9px" />
              </div></li>
            </ul>
            <ul id="nav-bar-nav">
              <li id="nav-projects"><a href="projects.html"><i class="fas fa-folder-open"></i></a></li>
              <li id="nav-projects"><a href="index.html"><i class="fas fa-user"></i></a></li>
              <li id="nav-projects"><a href=""><i class="fas fa-bars"></i></a></li>
            </ul>
          </div>
        </nav>

        <section id="body-container">
          <div id="title-container"><h1 id="title">Projects</h1></div>

          <div id="gallery" class="cards">
            <ul>
              <li>
                hello
              </li>
              <li>
                <div class="card">
                  <a href="project.html"><img src="img/card1-small.png" alt=""></a>
                </div>
              </li>
              <li>
                <div class="card">
                  <a href="project.html"><img src="img/card2-small.png" alt=""></a>
                </div>
              </li>
              <li>
                <div class="card">
                  <a href="project.html"><img src="img/card3-small.png" alt=""></a>
                </div>
              </li>
            </ul>
          </div>
        </section>


        <footer>
          <p>Made with love by Angus Miller <?php echo date("Y") ?></p>
          <?php




          $servername = "localhost";
          $username = "root";
          $password = "root";
          $dbname = "portfolio";

          try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // open file
            $newtmpName = "D:\\xamp\\php\\www\\PortfolioWeb\\img\\card1-small.png";
            $name = "angus";

            $fp = fopen($newtmpName, 'r');
            $file_content = fread($fp, filesize($newtmpName));
            $file_content = $file_content;
            fclose($fp);

          // prepare query
          //$stmt = $conn->prepare('INSERT INTO test(name) VALUES("angus")');
          $stmt = $conn->prepare('INSERT INTO projects (name, cardImage) VALUES (:name, :image)');
          $stmt->bindValue(':name', $name);
          $stmt->bindValue(':image', $file_content, PDO::PARAM_LOB);


          $stmt->execute();
          // get datafrom database

        $stmt = $conn->prepare('SELECT name, cardImage FROM projects');
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          ?><h1><?php echo $row['name'] ?></h1><img src="data:image/jpeg;base64,<?php echo base64_encode($row['cardImage']);?>" /><?php

        }

          }
          catch(PDOException $e)
          {
          echo "Error: " . $e->getMessage();
          }
          $conn = null;

           ?>
        </footer>
    </div>

</body>
</html>
