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
          <ul id="project-title-container">
            <li><div id="title-container"><h1 id="title-no-gradient">Stormy</h1></div></li>
            <li><div id="subtitle-container"><h4 id="subtitle">Responsive weather app</h4></div></li>
          </ul>
          <ul id="project-main-image-container">
            <li><img src="img/project1.png" alt=""></li>
            <li><img src="img/project1-2.png" alt=""></li>
          </ul>

          <ul id="project-description-container">
            <li>
              <p>
                Stormy is a responsive weather application
                that uses the Dark Sky API to display the user
                weather based on their location.
              </p>
            </li>
            <li>
              <ul>
                <li><p>Built with <a href="https://darksky.net/dev">Dark Sky API</a></p></li>
                <li><p>Check it out on github under account <a href="https://github.com/angusmiller28">angusmiller28</a></p></li>
              </ul>
            </li>
          </ul>

          <ul id="back-container">
            <li><h3><i class="fas fa-arrow-circle-left"></i></h3></li>
            <li><h3><a href="projects.html">Back to Projects</a></h3></li>
          </ul>
        </section>

        <footer>
          <p>Made with love by Angus Miller 2018</p>
        </footer>
    </div>
  </body>
