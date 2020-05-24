<?php
//session_start();

require_once(__DIR__.'../../../db/connection.php');

    $conn = DBCoonect();
//FUNCTIONS




if(isset($_POST["test-questions"])) {

    return markTest();

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

function getQuestions(){
    $conn = DBCoonect();
    
    $sql = "SELECT * FROM questions   ";
    
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
            $studentAns= $_POST["$id-question"];

            if($rightAns === $studentAns){
                $corrrectAns++;
            }else{
                $wrongAns++;
            }
             $index++;

        }

        $score = $corrrectAns > 0 ?  ($corrrectAns/$total)*100 : 0;
             header("Location: ../test/results.php?r=$corrrectAns&w=$wrongAns&t=$total&s=$score");

}