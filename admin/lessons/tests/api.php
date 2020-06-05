<?php
//session_start();

require_once(__DIR__.'../../../../db/connection.php');

    $conn = DBCoonect();



if (isset($_POST['create-one-word-question'])) {
    createOneWordQuestion($conn);

}
else if (isset($_POST['create-true-false-question'])) {
    createTrueFalseQuestion($conn);

}
else if (isset($_POST['createQuestion'])) {
    createQuestion($conn);

}elseif (isset($_POST['createAnswer'])) {
    # code...

    createAnswer($conn);
}




//FUNCTIONS


function  createQuestion($conn) {

    $type = $_POST['type'];
    $text = $_POST['text'];
    $level = $_POST['level'];

    $a = 'null';
    $b = 'null';
    $c = 'null';
    $d = 'null';
    $answer = $_POST['answer'];
    $created_by = $_SESSION['user']['name'];


$sql = "INSERT INTO `questions` (`id`, `type`, `text`, `answer`, `created_by`, `created_at`, `updated_at`,`a`,`b`,`c`,`d`,`level`) 
VALUES (NULL, '$type', '$text', '$answer', '$created_by', current_timestamp(), NULL,'$a','$b','$c','$d','$level');";

 mysqli_query($conn,$sql) or header('Location: create.php?msg='.mysqli_error($conn));

         echo "<script> location.href='create.php?msg=Done'; </script>";
        exit;

}

function createTrueFalseQuestion($conn) {

    $type = $_POST['type'];
    $text = $_POST['text'];
    $level = $_POST['level'];

    $a = 'null';
    $b = 'null';
    $c = 'null';
    $d = 'null';
    $answer = $_POST['answer'];
    $created_by = $_SESSION['user']['name'];


$sql = "INSERT INTO `questions` (`id`, `type`, `text`, `answer`, `created_by`, `created_at`, `updated_at`,`a`,`b`,`c`,`d`,`level`) 
VALUES (NULL, '$type', '$text', '$answer', '$created_by', current_timestamp(), NULL,'$a','$b','$c','$d','$level');";

 mysqli_query($conn,$sql) or header('Location: create.php?msg='.mysqli_error($conn));

         echo "<script> location.href='create.php?msg=Done'; </script>";
        exit;

}

function createOneWordQuestion($conn) {

    $type = 'one-word';
    $text = $_POST['text'];
    $a = null;
    $b = null;
    $c = null;
    $d = null;
    $level = $_POST['level'];

    $answer = $_POST['answer'];
    $created_by = $_SESSION['user']['name'];

$sql = "INSERT INTO `questions` (`id`, `type`, `text`, `answer`, `created_by`, `created_at`, `updated_at`,`a`,`b`,`c`,`d`,`level`) 
VALUES (NULL, '$type', '$text', '$answer', '$created_by', current_timestamp(), NULL,'$a','$b','$c','$d','$level');";

 mysqli_query($conn,$sql) or header('Location: create.php?msg='.mysqli_error($conn));

         echo "<script> location.href='create.php?msg=Done&type=$type'; </script>";
        exit;
}


// function createQuestion($conn) {

//     $type = $_POST['type'];
//     $text = $_POST['text'];
//     $options = $_POST['options'];
//     $created_by = $_SESSION['user']['name'];


// $sql = "INSERT INTO `answers` ( `text`, `type`, `options`,  `created_at`, `updated_at`,`created_by`)
//  VALUES ( '$type', '$type', '$options',  current_timestamp(), NULL,'$created_by');";

//  mysqli_query($conn,$sql) or header('Location: create_answer.php?msg='.mysqli_error($conn));
//          echo "<script> location.href='create_answer.php?msg=Done'; </script>";
//         exit;
// }



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



function getQuestion($id){
    $conn = DBCoonect();

       $sql = "SELECT * FROM questions WHERE `id` = '$id'";
    
    $results = mysqli_query($conn,$sql);
   return mysqli_fetch_assoc($results);
}

