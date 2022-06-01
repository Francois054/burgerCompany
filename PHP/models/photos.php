<?php
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["photo1"]["name"]);//endroit exact où sera enregistrer l'image. nom dossier+nom image
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));//fonction qui déplace l'image du dossier temporary vers notre dossier images

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["photo1"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}


// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["photo1"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["photo"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
var_dump($_files);
?>

<form id="photo" method="POST" action= "" enctype="multipart/form-data">       
  <input type="file" name="photo"/>
  <input type="submit" value="Télécharger"/>
</form>

