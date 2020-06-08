<?php
require_once('../layout/admin/headerNotLoggedIn.php');
?>

<div class="card col-md-12">
  <h5 class="card-header"> Login </h5>
  <div class="card-body">
    <h5 class="card-title">Have access to limitless Computer Resources </h5>
    <p class="card-text"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit ullam dolor fuga rerum qui voluptate ipsa nisi dolorum quisquam! Placeat odit perspiciatis quae maiores eligendi obcaecati tenetur! At, magnam dicta.</p>
    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
  </div>
</div>
</div>

  <div class="row">

  <div class="col-md-4 offset-md-2">

      <?php
      if(isset($_GET['err'])):
        // print out server errors
    ?>

      <blockquote class='text-danger'>
         <?php
     echo $_GET['err'];
    ?>

      </blockquote>


    <?php endif ?>


<form class='' action='api.php' method='post'>
    <input type="hidden" class="form-control" name="login" value='login' />


  <div class="form-group ">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name='email' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name='password' class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>
</div>

<?php
require_once('../layout/admin/footer.php')
?>
