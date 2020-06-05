
<?php

require_once('../../db/connection.php');

// require_once('../../layout/admin/header.php');

    if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

    $conn = DBCoonect();

?>


<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">File Processor</h5>
<?php
$target_dir = "../../storage/";

// Check if image file is a actual image or fake image
if(isset($_FILES["file"]) && $_FILES["file"]["name"] ) {
 

     $fileName = basename($_FILES["file"]["name"]);
$target_file = $target_dir . $fileName;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // $check = getimagesize($_FILES["file"]["tmp_name"]);
    // if($check !== false) {
    //     echo "File is an image - " . $check["mime"] . ".";
    //     $uploadOk = 1;
    // } else {
    //     echo "File is not an image.";
    //     $uploadOk = 0;
    // }

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["file"]["size"] > 50000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if(isset($_POST['past_paper']) && $imageFileType != "pdf" ){
    echo "Sorry, only pdf files are allowed.";
    $uploadOk = 0;
    
}else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "pdf" && $imageFileType != "mp4" ) {
    echo "Sorry, only JPG, JPEG, PNG,mp4 & pdf files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    //rename
        $fileName =  mt_rand(100000,999999).'.'.$imageFileType;
        $target_file = $target_dir . $fileName; 
;
        
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
        $link =$fileName;
        $type = $imageFileType;
        isset($_POST['past_paper']) ?  storeExamResource($conn,$link,$type) :  storeResource($conn,$link,$type);
    } else {
        $err = "Sorry, there was an error uploading your file.";
             header('Location: ./index.php?err='.$err);

    }

}
}else{

        $link =null;
        $type =null;
        isset($_POST['past_paper']) ?  storeExamResource($conn,$link,$type) :  storeResource($conn,$link,$type);
}
?>

  </div>
</div>


<?php
require_once('../../layout/admin/footer.php');












//FUNCTIONS


function storeResource($conn,$link,$type) {
    if(isset($_POST['is_edit'])) return editResource($conn,$link,$type);


    $title = $_POST['title'];
    $description = $_POST['description'];
    $level = $_POST['level'];
    $created_by = $_SESSION['user']['name'];



$sql = "INSERT INTO `resources` (`id`, `title`, `link`, `description`,`type`,`created_by`,`level`)
 VALUES (NULL, '$title', '$link', '$description' ,'$type','$created_by','$level')";

 mysqli_query($conn,$sql) or die(mysqli_error($conn));

  
                     $ok = 'Done' ;  
                    header('Location:./index.php?err='.$ok);

                die();
;

}
function editResource($conn,$link,$type) {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $level = $_POST['level'];
    $created_by = $_SESSION['user']['name'];



$sql = "INSERT INTO `resources` (`id`, `title`, `link`, `description`,`type`,`created_by`,`level`)
 VALUES (NULL, '$title', '$link', '$description' ,'$type','$created_by','$level')";

 mysqli_query($conn,$sql) or die(mysqli_error($conn));

  
                     $ok = 'Done' ;  
                    header('Location:./index.php?err='.$ok);

                die();
;

}


function storeExamResource($conn,$link,$type) {
    if(isset($_POST['mark_schema'])) return storeMarkResource($conn,$link,$type);
    if(isset($_POST['is_edit'])) return editPastPaper($conn,$link,$type);


    $title = $_POST['title'];
    $description = $_POST['description'];
    $year = $_POST['year'];
    $month = strlen($_POST['month']) == 0 ? 0 : ($_POST['month']);
    $created_by = $_SESSION['user']['name'];

    $level = $_POST['level'];




$sql = "INSERT INTO `past_papers` (`id`, `title`, `link`, `description`,`year`,`month`,`created_by`,`level`)
 VALUES (NULL, '$title', '$link', '$description' ,'$year','$month','$created_by','$level')";

 mysqli_query($conn,$sql) or die(mysqli_error($conn));

  
                     $ok = 'Done' ;  
                    header('Location:./past_papers.php?err='.$ok);

        die();

}
function editPastPaper($conn,$link = null,$type) {

    $title = $_POST['title'];
    $id = $_POST['id'];
    $description = $_POST['description'];
    $year = $_POST['year'];
    $month = strlen($_POST['month']) == 0 ? 0 : ($_POST['month']);
    $created_by = $_SESSION['user']['name'];

    $level = $_POST['level'];


        if($link){

$sql = "UPDATE  `past_papers` set  `title` = '$title', `link` = '$link', `description` = '$description',`year`  ='$year', 
`month` = '$month' ,`created_by` = '$created_by',`level` = '$level' WHERE `id` = '$id' ";
        }else{

$sql = "UPDATE  `past_papers` set  `title` = '$title', `description` = '$description',`year`  ='$year', 
`month` = '$month' ,`created_by` = '$created_by',`level` = '$level'  WHERE `id` = '$id'";
        }


 mysqli_query($conn,$sql) or die(mysqli_error($conn));

                     $ok = 'Done' ;  
                    header("Location:./edit_past_paper.php?id=$id&err=$ok");

        die();

}



function storeMarkResource($conn,$link,$type) {
    if(isset($_POST['is_edit'])) return editMarkResource($conn,$link,$type);


    $title = $_POST['title'];
    $description = $_POST['description'];
    $year = $_POST['year'];
    $level = $_POST['level'];
    $month = strlen($_POST['month']) == 0 ? 0 : ($_POST['month']);
    $created_by = $_SESSION['user']['name'];



$sql = "INSERT INTO `mark_schema` (`id`, `title`, `link`, `description`,`year`,`month`,`created_by`,`level`)
 VALUES (NULL, '$title', '$link', '$description' ,'$year','$month','$created_by','$level')";

 mysqli_query($conn,$sql) or die(mysqli_error($conn));

  
                     $ok = 'Done' ;  
                    header('Location:./mark_schema.php?err='.$ok);

                die();
;

}

function editMarkResource($conn,$link,$type) {
  

    $title = $_POST['title'];
    $description = $_POST['description'];
    $year = $_POST['year'];
    $level = $_POST['level'];
    $id = $_POST['id'];
    $month = strlen($_POST['month']) == 0 ? 0 : ($_POST['month']);
    $created_by = $_SESSION['user']['name'];

        if($link){
$sql = "UPDATE `mark_schema` SET  `title` = '$title', `link` = '$link', `description` = '$description', 
`year` = '$year', `month` ='$month', `created_by` ='$created_by', `level` = '$level' WHERE `id` = '$id'";
        }else {

$sql = "UPDATE `mark_schema` SET  `title` = '$title',  `description` = '$description', 
`year` = '$year', `month` ='$month', `created_by` = '$created_by', `level` = '$level' WHERE `id` = '$id'";
        }

 mysqli_query($conn,$sql) or die(mysqli_error($conn));

                     $ok = 'Done' ;  
                    header("Location:./edit_mark_schema.php?err=$ok&id=$id");

                die();
;

}


function getMarkSchema(){
    $conn = DBCoonect();

$sql = "SELECT * FROM answers  ";

        $results = mysqli_query($conn,$sql);    

       while ($row = mysqli_fetch_assoc($results)) {
           # code...
           $ans = $row['text'];
           $id = $row['id'];

           echo "
  <option value='$id' > $ans </option>
           
           ";
       }


}


function getPastPaper($id){
    $conn = DBCoonect();
       $sql = "SELECT * FROM past_papers WHERE `id` = '$id'";
    $results = mysqli_query($conn,$sql);
    return mysqli_fetch_assoc($results);
}

?>




