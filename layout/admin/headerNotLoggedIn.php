<?php
//   $path =  $_SERVER['REQUEST_URI'];

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_SESSION['user']['name'])){
          echo "<script> location.href='/comp_test/lessons/past_papers/'; </script>";
     die('You are not authorised to view this page');
}
      
      $path = "/comp_test/assets/css/";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $path.'bootstrap.min.css' ?>" >
    <link rel="stylesheet" href="<?php echo $path.'custom.css' ?>"  >

        <link rel='stylesheet prefetch'
          href='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css'>
    <title>Comp Test KC</title>
</head>
<body>

  <?php
require_once('navbar.php');
  
  ?>

<div class='row'>
    
