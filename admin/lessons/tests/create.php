
<?php
require_once('../../../layout/admin/header.php');
require_once('./api.php');





?>

  <div class="container">
  <div class="col-md-12">


  <div class="row">
  <div class="col-4">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Multiple Choice</a>
      <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">One Word Answer</a>
    </div>
  </div>
  <div class="col-8">
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
      

  <div class="col-md-6">


 <div class="card" style="width: 21rem;">
  <div class="card-body">
    <h5 class="card-title"> Create Multiple Choice Question</h5>
    <h6 class="card-subtitle mb-2 text-muted">

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

    <input type="hidden" class="form-control" name="createQuestion" value='createQuestion' />
    <input type="hidden" class="form-control" name="type" value='multiple_choice' />


      <div class="form-group ">
    <label for="name">Question</label>
    <input type="text" class="form-control" name="text" aria-describedby="textHelp" />
  </div>

 

   <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">A</span>
  </div>
  <input type="text" name='a' class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
</div>

   <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">B</span>
  </div>
  <input type="text" name='b' class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
</div>

   <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">C</span>
  </div>
  <input type="text" name='c' class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
</div>

   <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">D</span>
  </div>
  <input type="text" name='d' class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
</div>



     <div class="form-group ">
    <label for="gender">Answer</label>
    <select  class="form-control" name="answer" aria-describedby="genderHelp" >
  <option value='a' > A </option>
  <option value='b' > B </option>
  <option value='c'> C </option>
  <option value='d'> D </option>
    </select>
  </div>

     <div class="form-group ">


  <button type="submit" class="btn btn-primary">Submit</button>
  </div>




</form>

</div>
</div>

</div>
      </div>

      <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
      

              <!--  one word start  -->




              <!--  one word end  -->


      </div>

    </div>
  </div>
</div>









</div>

</div>





         











         <!-- ONE WORD ANSWER start  !-->
         <!-- ONE WORD ANSWER end !-->



















<?php
require_once('../../../layout/admin/footer.php')
?>
