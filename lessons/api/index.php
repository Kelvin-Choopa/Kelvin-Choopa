<?php
//session_start();

require_once(__DIR__.'../../../db/connection.php');

    $conn = DBCoonect();







//FUNCTIONS



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


function getFileStoragePath(){
    return 'http://'.$_SERVER['HTTP_HOST'].'/comp_test/storage/';
}