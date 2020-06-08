<?php


require_once(__DIR__.'../../db/connection.php');

    $conn = DBCoonect();

if (isset($_POST['regiser'])) {


    register($conn);

}elseif (isset($_POST['login'])) {
    # code...

    login($conn);
}elseif (isset($_GET['logout'])) {
    logout();
    # code...
}elseif (isset($_POST['edit-profile'])) {
    # code...
    editProfile($conn);

}





//FUNCTIONS



function login($conn){

        $email = $_POST['email'];
    $password = md5($_POST['password']);

$sql = "SELECT * FROM users WHERE `email` = '$email' AND  `password`='$password' ";

        $results = mysqli_query($conn,$sql);    

       if($results->num_rows !== 1){
            $err = 'Sorry wrong password or email';

             header('Location: login.php?err='.$err);

            exit;
       }

        session_start();

       $results = mysqli_fetch_assoc($results);
  
       $_SESSION['user'] = $results;


         echo "<script> location.href='../'; </script>";
        exit;


}




function register($conn) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $school = $_POST['school'];
    $grade = $_POST['grade'];
    $password = $_POST['password'];
    $level = $_POST['level'];
    $gender = $_POST['gender'];



$sql = "INSERT INTO `users` (`id`, `name`, `email`, `dob`, `school`, `grade`, `password`, `gender`)
 VALUES (NULL, '$name', '$email', '$dob', '$school',  '$grade', MD5('$password'), '$gender')";

 mysqli_query($conn,$sql) or header('Location: register.php?err='.mysqli_error($conn));
         echo "<script> location.href='login.php'; </script>";
        exit;

}


function editProfile($conn) {

    session_start();

    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $school = $_POST['school'];
    $grade = $_POST['grade'];
    $password = $_POST['password'];
   $id =  $_SESSION['user']['id'];

    $gender = $_POST['gender'];


$sql = "UPDATE  `users` SET  `name` ='$name', `dob`= '$dob', `school` = '$school', `grade` = '$grade', 
`password` = MD5('$password'), `gender` = '$gender' WHERE `id`= '$id' ";


 mysqli_query($conn,$sql) or header('Location: edit_profile.php?err='.mysqli_error($conn));
         echo "<script> location.href='profile.php'; </script>";
        exit;

}

function logout(){
        session_start();
        session_destroy();
         echo "<script> location.href='login.php'; </script>";
        exit;

}