<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Angus Miller Portfolio - Projects</title>

    <link rel="stylesheet" href="style/css_reset.css">
    <link rel="stylesheet" href="style/nav.css">
    <link rel="stylesheet" href="style/footer.css">
    <link rel="stylesheet" href="style/project.css">

    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css" integrity="sha384-v2Tw72dyUXeU3y4aM2Y0tBJQkGfplr39mxZqlTBDUZAb9BGoC40+rdFCG0m10lXk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/brands.css" integrity="sha384-IiIL1/ODJBRTrDTFk/pW8j0DUI5/z9m1KYsTm/RjZTNV8RHLGZXkUDwgRRbbQ+Jh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/fontawesome.css" integrity="sha384-q3jl8XQu1OpdLgGFvNRnPdj5VIlCvgsDQTQB6owSOHWlAurxul7f+JpUOVdAiJ5P" crossorigin="anonymous">

    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>

    <?php
      //////////////////////////////////
      //////// Open Database ///////////
      //////////////////////////////////
      $servername = "localhost";
      $username = "root";
      $password = "root";
      $dbname = "portfolio";

      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $id = htmlspecialchars($_GET["id"]);

        $stmt = $conn->prepare('SELECT name, displayImage, displayImage2, cardImage, description, tools, githubLink, subtitle FROM projects WHERE id=:id');
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $name = $row['name'];
            $displayImage = $row['displayImage'];
            $displayImage2 = $row['displayImage2'];
            $cardImage = $row['cardImage'];
            $description = $row['description'];
            $tools = $row['tools'];
            $githubLink = $row['githubLink'];
            $subtitle = $row['subtitle'];
        }
    ?>


    <div id="container" >
        <nav id="nav-container">
          <?php include 'nav.php';?>
        </nav>
        <section id="body-container">
          <ul id="project-title-container">
            <li><div id="title-container"><h1 id="title-no-gradient"><?php echo $name ?></h1></div></li>
            <li><div id="subtitle-container"><h4 id="subtitle"><?php echo $subtitle ?></h4></div></li>
          </ul>
          <ul id="project-main-image-container">
              <!-- Display Image 1 -->
              <li><img src="data:image/jpeg;base64,<?php echo base64_encode($displayImage); ?>" /></li>

              <?php
                if (isset($row['displayImage2'])){
                  ?>
                  <!-- Display Image 2 -->
                  <li><img src="data:image/jpeg;base64,<?php echo base64_encode();?>" /></li>

                  <?php
                }

              ?>
          </ul>

          <ul id="project-description-container">
            <li><p><?php echo $description ?></p></li>
            <li>
              <ul>
                <li><p>Built with <a href="https://darksky.net/dev">Dark Sky API</a></p></li>
                <?php
                  if (!empty($githubLink)){ ?>
                    <li><p>Check it out on <i class="fab fa-github"></i> GitHub under account <a href="<?php echo $githubLink; ?>">angusmiller28</a></p></li>
                 <?php } ?>
                 <?php
                   if (!empty($githubLink)){ ?>
                     <li><p>Check it out on <i class="fab fa-dribbble"></i> Dribbble under account <a href="<?php echo $githubLink; ?>">angusmiller28</a></p></li>
                  <?php } ?>
              </ul>
            </li>
          </ul>

          <ul id="back-container">
            <li><h3><i class="fas fa-arrow-circle-left"></i></h3></li>
            <li><h3><a href="projects.php">Back to Projects</a></h3></li>
          </ul>
        </section>

        <?php include 'footer.php';?>
    </div>

    <?php
      //////////////////////////////////
      //////// Close Database ///////////
      //////////////////////////////////
      }
      catch(PDOException $e)
      {
      echo "Error: " . $e->getMessage();
      }
      $conn = null;

     ?>

  </body>
