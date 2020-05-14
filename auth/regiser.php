
<?php
require_once('../layout/admin/header.php');
?>

  <div class="row">

  <div class="col-md-10 offset-md-2">




<form class='' action='api.php' method='post'>

    <?php
      if(isset($_GET['err'])):

    ?>

      <blockquote class='text-danger'>
         <?php
     echo $_GET['err'];
    ?>

      </blockquote>


    <?php endif ?>

    <input type="hidden" class="form-control" name="regiser" value='regiser' />


      <div class="form-group ">
    <label for="name">Name</label>
    <input type="name" class="form-control" name="name" aria-describedby="nameHelp" />
  </div>


      <div class="form-group ">
    <label for="email">Email</label>
    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" />
  </div>




      <div class="form-group ">
    <label for="school">school</label>
    <input type="school" class="form-control" name="school" aria-describedby="schoolHelp" />
  </div>
      <div class="form-group ">
    <label for="grade">grade</label>
    <input type="number" class="form-control" name="grade" aria-describedby="gradeHelp" />
  </div>


      <div class="form-group ">
    <label for="level">level</label>
    <input type="number" class="form-control" name="level" aria-describedby="levelHelp" />
  </div>

      <div class="form-group ">
    <label for="dob">Date of Birth</label>
    <input type="date" class="form-control" name="dob" aria-describedby="dobHelp" />
  </div>


      <div class="form-group ">
    <label for="gender">gender</label>
    <select  class="form-control" name="gender" aria-describedby="genderHelp" >

  <option> Male </option>
  <option> female </option>

    </select>
  </div>


      <div class="form-group ">
    <label for="gender">password</label>
    <input type="password" class="form-control" name="password" aria-describedby="passwordHelp" />
  </div>
     <div class="form-group ">


  <button type="submit" class="btn btn-primary">Submit</button>
  </div>


  </div>


 

</form>

</div>
</div>

<?php
require_once('../layout/admin/footer.php')
?>
