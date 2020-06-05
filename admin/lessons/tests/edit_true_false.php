











  <div class="row">

  <div class="col-4">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Multiple Choice</a>
    </div>
  </div>


  <div class="col-8">
    <div class="tab-content" id="nav-tabContent">

      <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
      

  <div class="col-md-12">


 <div class="card" style="width: 41rem;">
  <div class="card-body">
    <h5 class="card-title"> Edit True / False Question</h5>

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
    <label for="grade">Level</label>
        <select  class="form-control" name="level" aria-describedby="genderHelp" >
  <option value='junior'> Junior </option>
  <option value='senior'> Senior </option>
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


      
    </div>
  </div>
  </div>















