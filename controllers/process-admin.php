<?php

require_once('image-uploader.php');

$name_err = "";
$sub_title_err = "";
$card_image_err = "";
$card_image_err = "";
$display_image_err = "";
$display_image2_err = "";
$description_err = "";
$tools_err = "";
$github_link_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
  $servername = "localhost";
  $username = "root";
  $password = "root";
  $dbname = "portfolio";

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get data from the page
      if (empty($_POST["project-title"])){
        $name_err = "Title is required";
      } else {
        $name = $_POST["project-title"];
      }

      if (empty($_POST["project-subtitle"])){
        $sub_title_err = "Subtitle is required";
      } else {
        $sub_title = $_POST["project-subtitle"];
      }

      if (isset($_FILES['project-card-image'])){
        $file_name = $_FILES['project-card-image']['name'];
        $file_tmp = $_FILES['project-card-image']['tmp_name'];
        move_uploaded_file($file_tmp, "images/".$file_name);

        // open image
        $url = "images/".$file_name;
        $fp = fopen($url, 'r');
        $card_content = fread($fp, filesize($url));
        $card_content = $card_content;
        fclose($fp);

        //$card_image = new ImageUploader("D:\\xamp\\php\\www\\PortfolioWeb\\img\\card1-small.png");
        // $card_content = &$card_image->fileContent();
        var_dump($card_content);
      } else {
        $card_image_err = "Card image required";
      }


      if (empty($_POST["project-display-image"])){
        $display_image = "Display image required";
      } else {
          if (test_input($_POST["project-display-image"])){
            $display_image = new ImageUploader("D:\\xamp\\php\\www\\PortfolioWeb\\img\\card1-small.png"); //new ImageUploader("'.$_POST["project-display-image"].'");
            $display_content = &$display_image->fileContent();
          }
      }

      if (empty($_POST["project-display-image2"])){
        $display_image2 = "Display image required";
      } else {
          if (test_input($_POST["project-display-image2"])){
            $display_image2 = new ImageUploader("D:\\xamp\\php\\www\\PortfolioWeb\\img\\card1-small.png"); //new ImageUploader("'.$_POST["project-display-image2"].'");
            $display_content2 = &$display_image2->fileContent();
          }
      }

      if (empty($_POST["project-description"])){
        $description_err = "Description required";
      } else {
        $description = test_input($_POST["project-description"]);
      }

      if (empty($_POST["project-tools"])){
        $tools_err = "Tools required";
      } else {
        $tools = test_input($_POST["project-tools"]);
      }

      if (empty($_POST["project-github-link"])){
        $github_link_err = "GitHub link required";
      } else {
        $github_link = test_input($_POST["project-github-link"]);
      }

      if ($name_err == "" &&
      $sub_title_err == "" &&
      $card_image_err == "" &&
      $display_image_err == "" &&
      $display_image2_err == "" &&
      $description_err == "" &&
      $tools_err == "" &&
      $github_link_err == ""){
        // prepare query
        $stmt = $conn->prepare('INSERT INTO projects (name, subtitle,  displayImage, displayImage2, cardImage, description, tools, githubLink) VALUES (:name, :subtitle, :displayImage, :displayImage2, :cardImage, :description, :tools, :githubLink)');
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':subtitle', $sub_title);
        $stmt->bindValue(':cardImage', $card_content, PDO::PARAM_LOB);
        $stmt->bindValue(':displayImage', $display_image, PDO::PARAM_LOB);
        $stmt->bindValue(':displayImage2', $display_image2, PDO::PARAM_LOB);
        $stmt->bindValue(':description', $description);
        $stmt->bindValue(':tools', $tools);
        $stmt->bindValue(':githubLink', $github_link);

        // push project data to database
        $stmt->execute();
      } else if (
        $name_err == "" &&
        $sub_title_err == "" &&
        $card_image_err == "" &&
        // $display_image_err = "" &&
        $description_err == ""
      ){
        // prepare query
        $stmt = $conn->prepare('INSERT INTO projects (name, subtitle, cardImage, description ) VALUES (:name, :subtitle, :cardImage, :description)');
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':subtitle', $sub_title);
        $stmt->bindValue(':cardImage', $card_content, PDO::PARAM_LOB);
        // $stmt->bindValue(':displayImage', $display_image, PDO::PARAM_LOB);
        $stmt->bindValue(':description', $description);

        // push project data to database
        $stmt->execute();
      }

  }
  catch(PDOException $e){
    echo "Error: " . $e->getMessage();
  }

  $conn = null;

}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

 ?>
