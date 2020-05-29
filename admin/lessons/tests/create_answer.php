
<?php
require_once('../../../layout/admin/header.php');
require_once('./api.php');

?>

<div class="card col-md-12">
  <h5 class="card-header"> Create Test Answers </h5>
  <div class="card-body">
    <h5 class="card-title">Become part of the KC computer community </h5>
    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit ullam dolor fuga rerum qui voluptate ipsa nisi dolorum quisquam! Placeat odit perspiciatis quae maiores eligendi obcaecati tenetur! At, magnam dicta.</p>
    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
  </div>
</div>

  <div class="row">
  <div class="col-md-10 offset-md-2">
<form class='' action='api.php' method='post'>

    <?php
      if(isset($_GET['msg'])):

    ?>

      <blockquote class='text-danger'>
         <?php
     echo $_GET['msg'];
    ?>

      </blockquote>


    <?php endif ?>

    <input type="hidden" class="form-control" name="createAnswer" value='createAnswer' />


      <div class="form-group ">
    <label for="name">Question</label>
    <input type="text" class="form-control" name="text" aria-describedby="textHelp" />
  </div>




      <div class="form-group ">
    <label for="gender">type</label>
    <select  class="form-control" name="type" aria-describedby="genderHelp" >

  <option> General </option>


    </select>
  </div>

        <div class="form-group ">
    <label for="gender">Answer</label>
    <select  class="form-control" name="answer_id" aria-describedby="answer_idHelp" >

    <?php
getAnswers();
  ?>
    </select>
  </div>

     <div class="form-group ">


  <button type="submit" class="btn btn-primary">Submit</button>
  </div>


  </div>


 

</form>

</div>
</div>

<?php
require_once('../../../layout/admin/footer.php')
?>
