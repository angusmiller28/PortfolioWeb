<!DOCTYPE html>
<html ng-app="plunkr" >
  <head>
    <meta charset="utf-8">
    <title>Angus Miller Portfolio - Projects</title>

    <link rel="stylesheet" href="style/css_reset.css">
    <link rel="stylesheet" href="style/nav.css">
    <link rel="stylesheet" href="style/footer.css">
    <link rel="stylesheet" href="style/admin.css">

    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css" integrity="sha384-v2Tw72dyUXeU3y4aM2Y0tBJQkGfplr39mxZqlTBDUZAb9BGoC40+rdFCG0m10lXk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/brands.css" integrity="sha384-IiIL1/ODJBRTrDTFk/pW8j0DUI5/z9m1KYsTm/RjZTNV8RHLGZXkUDwgRRbbQ+Jh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/fontawesome.css" integrity="sha384-q3jl8XQu1OpdLgGFvNRnPdj5VIlCvgsDQTQB6owSOHWlAurxul7f+JpUOVdAiJ5P" crossorigin="anonymous">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="helpers/filereader.js">

    </script>
  </head>
  <body>
    <?php require_once('controllers/process-admin.php'); ?>
    <div id="container" >
      <nav id="nav-container">
        <?php include 'nav.php'; ?>
      </nav>

        <section id="body-container">
          <div id="title-container"><h1 id="title">Admin Panel</h1></div>

          <div id="gallery" class="cards" >
            <form class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
              <ul>
                <li>
                  <h3>Add project</h3>
                </li>
                <ul>
                  <li>
                    <ul>
                      <li><label for="project-title">Title*</label></li>
                      <li><span class="error"><?php echo $name_err;?></span></li>
                      <li><input type="text" name="project-title" id="project-title" value="<?php if(!empty($name)){ echo $name; } ?>"></li>
                    </ul>
                  </li>
                </ul>
                <ul>
                  <li>
                    <ul>
                      <li><label for="project-subtitle">Subtitle*</label></li>
                      <li><span class="error"><?php echo $sub_title_err;?></span></li>
                      <li><input type="text" name="project-subtitle" id="project-subtitle" value="<?php if(!empty($sub_title)){ echo $sub_title; } ?>"></li>
                    </ul>
                  </li>
                </ul>

                <ul>
                  <li>
                    <ul>
                      <li><label for="project-card-image">Card image*</label></li>
                      <li><span class="error"><?php echo $card_image_err; ?></span></li>
                      <li><input type="file" name="project-card-image" id="project-card-image" accept="image/png" ng-file-select="onFileSelect($files)" ng-model="imageSrc"></li>
                      <li><img  ng-src="{{imageSrc}}" width="300" id="myFile" /></li>
                      <!-- <li class="center-component"><button ng-click="cardImage.images = null" ng-show="!!cardImage.images" class="btn btn-warning">Remove image</button></li>  -->
                    </ul>
                  </li>
                </ul>
                <ul>
                  <li>
                    <ul>
                      <li><label for="project-display-image">Display image*</label></li>
                      <li><span class="error"><?php echo $display_image_err;?></span></li>
                      <li><input type="file" name="project-display-image" id="project-display-image" accept="image/png" ng-file-select="onFileSelect($files)" ng-model="imageSrc2"></li>
                      <li><img  ng-src="{{imageSrc2}}" width="300" id="myFile" /></li>
                    </ul>
                  </li>
                </ul>
                <ul>
                  <li>
                    <ul>
                      <li><label for="project-display-image2">Display image 2*</label></li>
                      <li><span class="error"><?php echo $display_image2_err;?></span></li>
                      <li><input type="file" name="project-display-image2" id="project-display-image2" accept="image/png" ng-file-select="onFileSelect($files)" ng-model="imageSrc3"></li>
                      <li><img  ng-src="{{imageSrc3}}" width="300" id="myFile" /></li>
                    </ul>
                  </li>
                </ul>
                <ul>
                  <li>
                    <ul>
                      <li><label for="project-description">Description*</label></li>
                      <li><span class="error"><?php echo $description_err;?></span></li>
                      <li><textarea name="project-description" id="project-description" ><?php if(!empty($description)){ echo $description; } ?></textarea></li>
                    </ul>
                  </li>
                </ul>
                <ul>
                  <li>
                    <ul>
                      <li><label for="project-tools">Tools</label></li>
                      <li><span id="error-tools" class="error"></span></li>
                      <li><input type="text" ng-model="tool" name="project-tools" id="project-tools" ></li>
                      <li><button type="button" id="add_tool">Add another tool<i class="fas fa-plus"></i></button></li>
                      <ul id="tools-list"></ul>
                    </ul>
                  </li>
                </ul>
                <ul>
                  <li>
                    <ul>
                      <li><label for="project-github-link">GitHub link*</label></li>
                      <li><span class="error"></span></li>
                      <li><input type="text" name="project-github-link" id="project-github-link" value="<?php if(!empty($github_link)){ echo $github_link; } ?>"></li>
                    </ul>
                  </li>
                </ul>

                <li class="center-component"><input id="submit" type="submit" name="submit" value="Add Project" class="btn btn-default"></li>
              </ul>
            </form>
          </div>
        </section>

        <?php include "footer.php" ?>
    </div>

    <script>
    $(document).ready(function(){
        var toolsList = [];
        var count = 0;

        $("#add_tool").click(function(){
            count++;
            var tool = $("#project-tools").val();
            if($.trim($('#project-tools').val()) == ''){
              $("#error-tools").text("Invalid tool name. Must NOT be empty.");
            } else {
              $("#error-tools").text("");
              toolsList.push({name: tool, index: count});
              console.log(toolsList);
              $("#tools-list").append('<li class="tool-item" id="'+count+'"><button class="tool-item" type="button" id="add_tool">'+tool +'<i class="fas fa-minus"></i></button></li>');
            }
        });

        $("#tools-list").delegate("li", "click",  function(){
          $(this).remove();
          var index = $(this).attr("id");

          for(i=0;i<toolsList.length;i++){
           if(toolsList[i].index == index){
             toolsList.splice(i, 1);
           }
          }
          console.log(toolsList);
        });

        $("#submit").click(function(){
          var toolsListCompressed = "";
            for(i=0;i<toolsList.length;i++){
                toolsListCompressed = toolsListCompressed + toolsList[i].name + ",";
            }
            $("#project-tools").val(toolsListCompressed);
            console.log(toolsListCompressed);
        });

    });
    </script>
</body>
</html>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            
