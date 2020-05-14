<?php
//session_start();

require_once(__DIR__.'../../../../db/connection.php');

    $conn = DBCoonect();



if (isset($_POST['createQuestion'])) {


    createQuestion($conn);

}elseif (isset($_POST['createAnswer'])) {
    # code...

    createAnswer($conn);
}




//FUNCTIONS


function createQuestion($conn) {

    $type = $_POST['type'];
    $text = $_POST['text'];
    $answer_id = $_POST['answer_id'];
    $created_by = $_SESSION['user']['name'];


$sql = "INSERT INTO `questions` (`id`, `type`, `text`, `answer_id`, `created_by`, `created_at`, `updated_at`) 
VALUES (NULL, '$type', '$text', '$answer_id', '$created_by', current_timestamp(), NULL);";

 mysqli_query($conn,$sql) or header('Location: create.php?msg='.mysqli_error($conn));

         echo "<script> location.href='create.php?msg=Done'; </script>";
        exit;

}
function createAnswer($conn) {

    $type = $_POST['type'];
    $text = $_POST['text'];
    $options = $_POST['options'];
    $created_by = $_SESSION['user']['name'];


$sql = "INSERT INTO `answers` ( `text`, `type`, `options`,  `created_at`, `updated_at`,`created_by`)
 VALUES ( '$type', '$type', '$options',  current_timestamp(), NULL,'$created_by');";

 mysqli_query($conn,$sql) or header('Location: create_answer.php?msg='.mysqli_error($conn));
         echo "<script> location.href='create_answer.php?msg=Done'; </script>";
        exit;
}



function getAnswers(){
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

