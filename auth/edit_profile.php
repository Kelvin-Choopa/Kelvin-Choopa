
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

<div class="card col-md-12 text-white bg-dark mb-3">
  <h5 class="card-header"> Edit Profile </h5>
  <div class="card-body">
    <h5 class="card-title">Become part of the KC computer community </h5>
    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit ullam dolor fuga rerum qui voluptate ipsa nisi dolorum quisquam! Placeat odit perspiciatis quae maiores eligendi obcaecati tenetur! At, magnam dicta.</p>
    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
  </div>
</div>
</div>

  <div class="row">

  <div class="col-md-8 offset-md-2">

<form class='col-md-12' action='api.php' method='post'>

    <?php
      if(isset($_GET['err'])):

    ?>

      <blockquote class='text-danger'>
         <?php
     echo $_GET['err'];
    ?>

      </blockquote>


    <?php endif ?>

    <input type="hidden" class="form-control" name="edit-profile" value='regiser' />


      <div class="form-group  ">
    <label for="name">Name</label>
    <input type="name" value="<?php echo $name  ?>" class="form-control" name="name" aria-describedby="nameHelp" />
  </div>


      <div class="form-group  ">
    <label for="email">Email</label>
    <input type="email" value="<?php echo $email  ?>" readonly title='Sorry email address cannot be edited' class="form-control" name="email" aria-describedby="emailHelp" />
  </div>

     <div class="form-group ">
    <label for="country">Country</label>
    <input type="text" class="form-control" maxlength='100' name="country" aria-describedby="dobHelp" />
  </div>

     <div class="form-group ">
    <label for="district">District</label>
    <input type="text" class="form-control" maxlength='100' name="district" aria-describedby="dobHelp" />
  </div>


     <div class="form-group ">
    <label for="province">Province</label>
    <input type="text" class="form-control" maxlength='100' name="province" aria-describedby="dobHelp" />
  </div>


      <div class="form-group  ">
    <label for="school">school</label>
    <input type="school" class="form-control" value="<?php echo $school  ?>" name="school" aria-describedby="schoolHelp" />
  </div>

      <div class="form-group  ">
    <label for="grade">grade</label>
        <select  class="form-control" name="grade" value="<?php echo $grade  ?>" aria-describedby="genderHelp" >

   <option <?php if($grade === 8)  echo 'selected' ?>> 8 </option>
   <option <?php if($grade === 9)  echo 'selected' ?>> 9 </option>
   <option <?php if($grade === 10)  echo 'selected' ?>> 10 </option>
   <option <?php if($grade === 11)  echo 'selected' ?>> 11 </option>
   <option <?php if($grade === 12)  echo 'selected' ?>> 12 </option>

    </select>
  </div>



      <div class="form-group  ">
    <label for="dob">Date of Birth</label>
    <input type="date" class="form-control" value="<?php echo $dob  ?>" name="dob" aria-describedby="dobHelp" />
  </div>


      <div class="form-group  ">
    <label for="gender">gender</label>
    <select   class="form-control" name="gender" aria-describedby="genderHelp" >

  <option <?php if($gender === 'Male')  echo 'selected' ?>  > Male </option>
  <option <?php if($gender === 'Female')  echo 'selected' ?>  > Female </option>


    </select>
  </div>


      <div class="form-group  ">
    <label for="gender">password</label>
    <input type="password" value="<?php echo $password  ?>" class="form-control" name="password" aria-describedby="passwordHelp" />
  </div>
     <div class="form-group  ">


  <button type="submit" class="btn btn-primary">Update</button>
  </div>


  </div>


 

</form>

</div>
</div>

<?php
require_once('../layout/admin/footer.php')
?>
