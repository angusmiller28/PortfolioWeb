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
    <?php require_once('controllers/process-admin.php'); ?>
    <div id="container" >
        <nav id="nav-container">
          <div id="nav-bar-container">
            <ul>
              <li id="nav-bar-logo"><div id="logo">
                <img src="img/logo" alt="logo" height="23.15px" width="62.9px" />
              </div></li>
            </ul>
            <ul id="nav-bar-nav">
              <li id="nav-projects"><a href="projects.php"><i class="fas fa-folder-open"></i></a></li>
              <li id="nav-projects"><a href="index.php"><i class="fas fa-user"></i></a></li>
              <li id="nav-projects"><a href=""><i class="fas fa-bars"></i></a></li>
            </ul>
          </div>
        </nav>

        <section id="body-container">
          <div id="title-container"><h1 id="title">Admin Panel</h1></div>

          <div id="gallery" class="cards">
            <h3>Add project</h3>

            <form class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
             <label for="project-title">Title</label> <input type="text" name="project-title" id="project-title"><span class="error">* <?php echo $name_err;?></span>
             <label for="project-subtitle">Subtitle</label> <input type="text" name="project-subtitle" id="project-subtitle"><span class="error">* <?php echo $sub_title_err;?></span>

             <label for="project-card-image">Card image</label> <input type="file" name="project-card-image" id="project-card-image" accept="image/png"><span class="error">* <?php echo $card_image_err;?></span>
             <label for="project-display-image">Display image</label> <input type="file" name="project-display-image" id="project-display-image" accept="image/png"><span class="error">* <?php echo $display_image_err;?></span>
             <label for="project-display-image2">Display image 2</label> <input type="file" name="project-display-image2" id="project-display-image2" accept="image/png"><span class="error">* <?php echo $display_image2_err;?></span>


             <label for="project-description">Description</label> <input type="text" name="project-description" id="project-description"><span class="error">* <?php echo $description_err;?></span>
             <label for="project-tools">Tools</label> <input type="text" name="project-tools" id="project-tools"><span class="error">* <?php echo $tools_err;?></span>
             <label for="project-github-link">GitHub link</label><input type="text" name="project-github-link" id="project-github-link"><span class="error">* <?php echo $github_link;?></span>

             <input type="submit" name="" value="Add Project">
            </form>
          </div>
        </section>

        <footer>
          <p>Made with love by Angus Miller <?php echo date("Y") ?></p>
        </footer>
    </div>

</body>
</html>
