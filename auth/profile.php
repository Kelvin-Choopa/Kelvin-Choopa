<?php
require_once('../layout/admin/header.php');

   $name =  $_SESSION['user']['name'];
   $email =  $_SESSION['user']['email'];
   $dob =  $_SESSION['user']['dob'];
   $school =  $_SESSION['user']['school'];
   $level =  $_SESSION['user']['level'];
   $grade =  $_SESSION['user']['grade'];
   $password =  $_SESSION['user']['password'];
   $gender =  $_SESSION['user']['gender'];


?>

<div class="card col-md-12">
  <h5 class="card-header"> Login </h5>
  <div class="card-body">
    <h5 class="card-title">Have access to limitless Computer Resources </h5>
    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit ullam dolor fuga rerum qui voluptate ipsa nisi dolorum quisquam! Placeat odit perspiciatis quae maiores eligendi obcaecati tenetur! At, magnam dicta.</p>
    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
  </div>
</div>

  <div class="row">

  <div class="col-md-10 offset-md-2">

      <?php

      if(isset($_GET['err'])):
    ?>

      <blockquote class='text-danger'>
         <?php
     echo $_GET['err'];
    ?>

      </blockquote>


    <?php endif ?>


<form class='' action='api.php' method='post'>
<div class="card text-white bg-dark mb-3" style="width: 58rem;">
  <img class="card-img-top" src=".../100px180/?text=Image cap" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Your Profile</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item "><span class='btn btn-default' >Name  </span>   <span class='btn btn-info text-align-right'><?php echo $name  ?>   </span>   </li>
    <li class="list-group-item "><span class='btn btn-default' >Email </span>   <span class='btn btn-info text-align-right'><?php echo $email  ?>  </span>    </li>
    <li class="list-group-item "><span class='btn btn-default' >School</span>   <span class='btn btn-info text-align-right'><?php echo $school  ?> </span>     </li>
    <li class="list-group-item "><span class='btn btn-default' >Grade </span>   <span class='btn btn-info text-align-right'><?php echo $grade  ?>  </span>    </li>
    <li class="list-group-item "><span class='btn btn-default' >Gender</span>   <span class='btn btn-info text-align-right'><?php echo $gender  ?> </span>     </li>
   
  </ul>
  <div class="card-body">
    <a href="edit_profile.php" class="card-link">Edit</a>
    <!-- <a href="#" class="card-link">Delete</a> -->
  </div>
</div>
</form>

</div>
</div>

<?php
require_once('../layout/admin/footer.php')
?>
