
<?php
require_once('../layout/admin/headerNotLoggedIn.php');
?>

<div class="card col-md-12">
  <h5 class="card-header"> Register </h5>
  <div class="card-body">
    <h5 class="card-title">Become part of the KC computer community </h5>
    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit ullam dolor fuga rerum qui voluptate ipsa nisi dolorum quisquam! Placeat odit perspiciatis quae maiores eligendi obcaecati tenetur! At, magnam dicta.</p>
    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
  </div>
</div>
</div>

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
        <select  class="form-control" name="grade" aria-describedby="genderHelp" >

  <option> 8 </option>
  <option> 9 </option>
  <option> 10 </option>
  <option> 11 </option>
  <option> 12 </option>

    </select>
  </div>



      <div class="form-group ">
    <label for="dob">Date of Birth</label>
    <input type="date" class="form-control" name="dob" aria-describedby="dobHelp" />
  </div>


      <div class="form-group ">
    <label for="gender">Gender</label>
    <select  class="form-control" name="gender" aria-describedby="genderHelp" >

  <option> Male </option>
  <option> female </option>

    </select>
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
