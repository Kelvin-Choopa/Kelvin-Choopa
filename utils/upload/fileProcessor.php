
<?php

require_once('../../db/connection.php');

require_once('../../layout/admin/header.php');



    $conn = DBCoonect();

?>


<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">File Processor</h5>
<?php
$target_dir = "../../storage/";
$fileName = basename($_FILES["file"]["name"]);
$target_file = $target_dir . $fileName;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["file"]["size"] > 900000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "pdf" ) {
    echo "Sorry, only JPG, JPEG, PNG & pdf files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
        $link =$fileName;
        $type = $imageFileType;
        storeResource($conn,$link,$type);
    } else {
        $err = "Sorry, there was an error uploading your file.";
             header('Location: ./index.php?err='.$err);

    }
}
?>

  </div>
</div>


<?php
require_once('../../layout/admin/footer.php');












//FUNCTIONS


function storeResource($conn,$link,$type) {

    $title = $_POST['title'];
    $description = $_POST['description'];


$sql = "INSERT INTO `resources` (`id`, `title`, `link`, `description`,`type`)
 VALUES (NULL, '$title', '$link', '$decription' ,'$type')";

 mysqli_query($conn,$sql) or die(mysqli_error($conn));

  
                     $ok = 'Done' ;  
                    header('Location:./index.php?err='.$ok);

        exit;

}















?>




