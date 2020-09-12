<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once(__DIR__.'../../../db/connection.php');

    $conn = DBCoonect();
//FUNCTIONS




if(isset($_POST["test-questions"])) {

    return markTest();

}   
else if(isset($_GET["delete"])) {

deleteResource();

}else if (isset($_POST['setDownload'])){
    setDownloadCounter();
}
 


function getFiles($type){
    $conn = DBCoonect();
    
    

    $sql = "SELECT * FROM resources WHERE `type` = '$type' ";
    
    $results = mysqli_query($conn,$sql);
    
    $rows = [];
    
    while ($row = mysqli_fetch_assoc($results)) {
        # code...
        
        array_unshift($rows,$row);
    }
    //    var_dump($rows);
    return $rows;
}


function getPastPapers(){
    $conn = DBCoonect();

       $grade = isset($_SESSION['user']['grade']) ? $_SESSION['user']['grade']: 'junior' ;
       $level = $grade > 9 ? 'senior' : 'junior';

            if (isset($_GET['month']) && isset($_GET['year'])) {
           $month = $_GET['month'];
           $year = $_GET['year'];

       $sql = "SELECT * FROM past_papers WHERE `month` = '$month' AND `year` = '$year' AND `level` = '$level' ";

           }
            elseif(isset($_SESSION['user']['role']) && $_SESSION['user']['role'] == 'admin'){
       $sql = "SELECT * FROM past_papers ";

            }
            else{
       $sql = "SELECT * FROM past_papers WHERE `level` = '$level' ";

           }
    
    
    $results = mysqli_query($conn,$sql);
    
    $rows = [];
    
    while ($row = mysqli_fetch_assoc($results)) {
        # code...
        
        array_unshift($rows,$row);
    }
    //    var_dump($rows);
    return $rows;
}

function getMarkSchema(){
    $conn = DBCoonect();

       $grade = isset($_SESSION['user']['grade']) ? $_SESSION['user']['grade']: 'junior' ;
       $level = $grade > 9 ? 'senior' : 'junior';


               if (isset($_GET['month']) && isset($_GET['year'])) {
           $month = $_GET['month'];
           $year = $_GET['year'];
       $sql = "SELECT * FROM mark_schema WHERE `month` = '$month' AND `year` = '$year' AND `level` = '$level' ";

               }

               else if(isset($_SESSION['user']['role']) && $_SESSION['user']['role'] == 'admin'){

       $sql = "SELECT * FROM mark_schema ";

       }else{
       $sql = "SELECT * FROM mark_schema WHERE `level` = '$level' ";
       }
    
    
    $results = mysqli_query($conn,$sql);
    
    $rows = [];
    
    while ($row = mysqli_fetch_assoc($results)) {
        # code...
        
        array_unshift($rows,$row);
    }
    //    var_dump($rows);
    return $rows;
}

function getQuestions($isRandomise = false){
    $conn = DBCoonect();

          $grade = isset($_SESSION['user']['grade']) ? $_SESSION['user']['grade']: 'junior' ;
       $level = $grade > 9 ? 'senior' : 'junior';

           if (isset($_GET['month']) && isset($_GET['year'])) {
           $month = $_GET['month'];
           $year = $_GET['year'];

       $sql = "SELECT * FROM questions WHERE `month` = '$month' AND `year` = '$year' AND `level` = '$level' ";

       }
            elseif(isset($_SESSION['user']['role']) && $_SESSION['user']['role'] == 'admin'){
       $sql = "SELECT * FROM questions ";

               }
       
       else{
       $sql = "SELECT * FROM questions WHERE `level` = '$level' ";
       }

           if($isRandomise){

           $sql .=' ORDER BY RAND() LIMIT 100';
       }
    
    $results = mysqli_query($conn,$sql);
    
    $rows = [];
    
    while ($row = mysqli_fetch_assoc($results)) {
        array_unshift($rows,$row);
    }
    return $rows;
}



function getFileStoragePath(){
    return 'http://'.$_SERVER['HTTP_HOST'].'/comp_test/storage/';
}
            


function markTest(){

    $questions = getQuestions();
    $corrrectAns= 0;
    $wrongAns= 0;
    $total = count($questions);
    $index = 0;


     

        while ($index < $total) {

                 $row = $questions[$index];
                 $id = $row['id'];
            
                 $rightAns = strtolower($row['answer']);


                 if(isset($_POST["$id-question"]) && strlen($_POST["$id-question"])){
                   
                     //check if question was picked among random list
                 $studentAns= strtolower($_POST["$id-question"]) ;
            if($rightAns === $studentAns){
                $corrrectAns++;
            }else{
                $wrongAns++;
            }
        }
             $index++;

        }

 
            $total =  $wrongAns+$rightAns;
                $score = $corrrectAns > 0 ?  ($corrrectAns/$total)*100 : 0;
        saveScore($corrrectAns,$wrongAns,($corrrectAns+$wrongAns),$score);

}


function saveScore($corrrectAns,$wrongAns,$total,$score) {
    $conn = DBCoonect();
$comment = $corrrectAns >= $wrongAns ? 'pass' : 'fail'; 
$studentId = $_SESSION['user']['id'];

$sql = "INSERT INTO `test_results` (`id`, `right`, `wrong`, `total`, `score`,`comment`,`student_id` )
 VALUES (NULL, '$corrrectAns', '$wrongAns', '$total', '$score','$comment','$studentId')";

 mysqli_query($conn,$sql) or die(mysqli_error($conn));

             header("Location: ../test/results.php?r=$corrrectAns&w=$wrongAns&t=$total&s=$score");
             

}

function deleteResource(){
    $conn = DBCoonect();


     $table = $_GET['table'];
     $id = $_GET['id'];

    
       $sql = "DELETE  FROM $table WHERE `id` = '$id' ";
       $results = mysqli_query($conn,$sql);

       echo "<script> window.history.back(); </script>";

}

function getResults(){
    $conn = DBCoonect();

       $sql = "SELECT * FROM test_results INNER JOIN `users` ON `users`.`id` = `test_results`.`student_id` ";

    
    $results = mysqli_query($conn,$sql);
    
    $rows = [];
    
    while ($row = mysqli_fetch_assoc($results)) {
        array_unshift($rows,$row);
    }
    return $rows;
}


function setDownloadCounter(){
    $conn = DBCoonect();

       $table = $_POST['table'];
       $id = $_POST['id'];

            $userId = $_SESSION['user']['id'];
            $country = $_SESSION['user']['country'];
            $district = $_SESSION['user']['district'];
            $province = $_SESSION['user']['province'];

       
       //return latest download
        $sql = "SELECT `downloads`,`type` FROM $table WHERE id = '$id' ";
       $res =   mysqli_fetch_assoc(mysqli_query($conn,$sql));
       $downloads = $res['downloads'];
    //    $type = $_POST['type'];
       $type = isset($res['type']) ? $res['type'] : $_POST['table']  ;
       $downloads = $downloads+1;
        mysqli_query($conn,"UPDATE $table SET `downloads` = $downloads WHERE `id` = '$id'");

        $insertSql = "INSERT INTO `resources_report` (`id`,`type`, `resource_id`, `country`, `district`, `province`, `user_id`, `created_at`)
         VALUES (NULL,'$type', '$id', '$country', '$district', '$province', '$userId', current_timestamp())";

        mysqli_query($conn,$insertSql);



        echo $downloads;

}