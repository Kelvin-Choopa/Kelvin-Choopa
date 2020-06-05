
<?php

require_once('../../db/connection.php');

// require_once('../../layout/admin/header.php');
    $conn = DBCoonect();




function getPastPaper($id){
    $conn = DBCoonect();
       $sql = "SELECT * FROM past_papers WHERE `id` = '$id'";
    $results = mysqli_query($conn,$sql);
    return mysqli_fetch_assoc($results);
}

function getMarkSchema($id){
    $conn = DBCoonect();
       $sql = "SELECT * FROM mark_schema WHERE `id` = '$id'";
    $results = mysqli_query($conn,$sql);
    return mysqli_fetch_assoc($results);
}














?>




