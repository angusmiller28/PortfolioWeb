<?php

  /**
   *
   */
  class ImageUploader
  {
    public $file_content;
    function __construct($url)
    {
        // open image
        $fp = fopen($url, 'r');
        $file_content = fread($fp, filesize($url));
        $file_content = $file_content;
        fclose($fp);
    }

    public function &fileContent(){
      return $this->file_content;
    }
  }



?>
