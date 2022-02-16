<?php

$message = '';
if(isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Upload'){
  if(isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK){
    echo "<pre>",print_r($GLOBALS),"</pre>";
    $fileTmpName = $_FILES['uploadedFile']['tmp_name'];
    $fileName = $_FILES['uploadedFile']['name'];
    $fileSize = $_FILES['uploadedFile']['size'];
    $fileType = $_FILES['uploadedFile']['type'];

    $fileExt = pathinfo($fileName,PATHINFO_EXTENSION);
    $filePathname = pathinfo($fileName,PATHINFO_FILENAME);

    // echo $fileExt;
    $newFileName = md5(time()."-".$filePathname).".".$fileExt;
    
    
    $allowedFileTypes = array('jpg');

    if(in_array($fileExt,$allowedFileTypes)){
      $uploadDir = "./uploaded_files/";
      $destinationPath = $uploadDir.$newFileName;
      if(move_uploaded_file($fileTmpName, $destinationPath)){
        $message = "File uploaded successfully";
      }else{
        $message = "failed to upload file";
      }
    }else{
      $message = "Sorry file type is incorrect";
    }
    // echo $newFileName;
  }else{
    echo "something went wrong";
  }
  
}



?>
<html>
  <head>
    <title>File upload</title>
  </head>
  <body>
    <? echo $message; ?>
    <form method="POST" enctype="multipart/form-data">
      <div>
        <span>upload a file</span>
        <input type="file" name="uploadedFile"/>
      </div>
      <button type="submit" name="uploadBtn" value="Upload">Upload</button>
    </form>
  </body>
</html>