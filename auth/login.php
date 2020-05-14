<?php
require_once('../layout/admin/header.php');
?>

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
