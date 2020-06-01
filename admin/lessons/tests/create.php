
<?php
require_once('../../../layout/admin/header.php');
require_once('./api.php');

?>


<div class="card col-md-12">
  <h5 class="card-header"> Create Test Questions </h5>
  <div class="card-body">
    <h5 class="card-title">Help student do online test</h5>
    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit ullam dolor fuga rerum qui voluptate ipsa nisi dolorum quisquam! Placeat odit perspiciatis quae maiores eligendi obcaecati tenetur! At, magnam dicta.</p>
    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
  </div>
</div>

  <div class="container">
  <div class="col-md-12">


  <div class="row">
  <div class="col-4">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Multiple Choice</a>
      <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">One Word Answer</a>
      <a class="list-group-item list-group-item-action" id="list-true-false" data-toggle="list" href="#true-false-tab" role="tab" aria-controls="profile">True/False</a>
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
    <input type="hidden" class="form-control" name="type" value='multiple-choice' />


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

               <div class="card" style="width: 21rem;">
  <div class="card-body">
    <h5 class="card-title"> Create One Word Question</h5>
    <h6 class="card-subtitle mb-2 text-muted">

<form class='' action='api.php' method='post'>
    <input type="hidden" class="form-control" name="create-one-word-question" aria-describedby="textHelp" />

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
    <input type="hidden" class="form-control" name="type" value='one-word' />
      <div class="form-group ">
    <label for="name">Question</label>
    <input type="text" class="form-control" name="text" aria-describedby="textHelp" />
  </div>

     <div class="form-group ">
    <label for="gender">Answer</label>
    <input type="text" class="form-control" name="answer" aria-describedby="textHelp" />
  </div>
     <div class="form-group ">
  <button type="submit" class="btn btn-primary">Submit</button>
  </div>


</form>
              <!--  one word end  -->
      </div>
      </div>
      </div>



      <div class="tab-pane fade" id="true-false-tab" role="tabpanel" aria-labelledby="list-profile-list">
      

              <!--  true/false start  -->
               <div class="card" style="width: 21rem;">
  <div class="card-body">
    <h5 class="card-title"> Create True/False Question</h5>
    <h6 class="card-subtitle mb-2 text-muted">


<form class='' action='api.php' method='post'>
    <input type="hidden" class="form-control" name="create-true-false-question" value='true-false' />


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
    <input type="hidden" class="form-control" name="type" value='true-false' />


      <div class="form-group ">
    <label for="name">Question</label>
    <input type="text" class="form-control" name="text" aria-describedby="textHelp" />
  </div>

  

     <div class="form-group ">
    <label for="gender">Answer</label>
    <select  class="form-control" name="answer" aria-describedby="genderHelp" >
  <option value='true' > True </option>
  <option value='false' > False </option>
    </select>
  </div>

     <div class="form-group ">

  <button type="submit" class="btn btn-primary">Submit</button>
  </div>


</form>


              <!--  true/false end  -->


      </div>
      </div>
      </div>


    </div>
  </div>
</div>









</div>

</div>





         






























<?php
require_once('../../../layout/admin/footer.php')
?>
