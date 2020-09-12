<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once(__DIR__.'../../../db/connection.php');

    $conn = DBCoonect();
//FUNCTIONS




// if(isset($_POST["test-questions"])) {

//     return markTest();

// }   
// else if(isset($_GET["delete"])) {

// deleteResource();

// }else if (isset($_POST['setDownload'])){
//     setDownloadCounter();
// }
 

function getUsers(){
    $conn = DBCoonect();

       $sql = "SELECT * FROM users  ";

    
    $results = mysqli_query($conn,$sql);
    
    $rows = [];
    
    while ($row = mysqli_fetch_assoc($results)) {
        array_unshift($rows,$row);
    }
    return $rows;
}


function getFiles($type,$filter){
    $conn = DBCoonect();
    
     $sql = "SELECT * FROM  resources_report 
    WHERE `type` = '$type'
     GROUP BY $filter
    ";
    
    $results = mysqli_query($conn,$sql);
    
    $rows = [];
    $downloads = 0;
    
    while ($row = mysqli_fetch_assoc($results)) {
        # code...
        //   $downloads += $row['downloads'];
          
 
        array_unshift($rows,$row);
    }
    //    var_dump($rows);
 
    return [$rows,$downloads];
}
function getPastPapers($filter){
    $conn = DBCoonect();
    
    $sql = "SELECT * FROM past_papers 
     GROUP BY `$filter` 
     ";
    
    $results = mysqli_query($conn,$sql);
    
    $rows = [];
    $downloads = 0;
    
    while ($row = mysqli_fetch_assoc($results)) {
        # code...
        //   $downloads += $row['downloads'];
          
 
        array_unshift($rows,$row);
    }
    //    var_dump($rows);
 
    return [$rows,$downloads];
}

function getMarkschemas($filter){
    $conn = DBCoonect();
    
    $sql = "SELECT * FROM mark_schema  
     ORDER BY `$filter` 
    ";
    
    $results = mysqli_query($conn,$sql);
    
    $rows = [];
    $downloads = 0;
    
    while ($row = mysqli_fetch_assoc($results)) {
        # code...
          $downloads += $row['downloads'];
          
 
        array_unshift($rows,$row);
    }
    //    var_dump($rows);
 
    return [$rows,$downloads];
}

function getFileStoragePath(){
    return 'http://'.$_SERVER['HTTP_HOST'].'/comp_test/storage/';
}
