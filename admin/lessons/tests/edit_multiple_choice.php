



  <div class="row">

  <div class="col-4">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Multiple Choice</a>
    </div>
  </div>


  <div class="col-8">
    <div class="tab-content" id="nav-tabContent">

      <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
      

  <div class="col-md-6">


 <div class="card" style="width: 21rem;">
  <div class="card-body">
    <h5 class="card-title"> Create Multiple Choice Question</h5>

<form class='' action='api.php' method='post'>
<input type="hidden" class="form-control" name="edit-question" aria-describedby="textHelp" />
<input type="hidden" class="form-control" value="<? echo $id?>" name="id" aria-describedby="textHelp" />

    <?php
      if(isset($_GET['msg'])):

    ?>

      <blockquote class='text-danger'>
         <?php
     echo $_GET['msg'];
    ?>

      </blockquote>


    <?php endif ?>



      <div class="form-group ">
    <label for="name">Question</label>
    <input type="text" class="form-control" value="<? echo $text?>" name="text" aria-describedby="textHelp" />
  </div>

   <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">A</span>
  </div>
  <input type="text" name='a' value="<? echo $a?>" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
</div>

   <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">B</span>
  </div>
  <input type="text" name='b' value="<? echo $b?>" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
</div>

   <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">C</span>
  </div>
  <input type="text" name='c' value="<? echo $c?>" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
</div>

   <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">D</span>
  </div>
  <input type="text" name='d' value="<? echo $d?>" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
</div>

     <div class="form-group ">
    <label for="gender">Answer</label>
    <select  class="form-control" name="answer" aria-describedby="genderHelp" >


  <option <?  if($answer == 'a') echo 'selected'  ?>   value='a'> A </option>
  <option <?  if($answer == 'b') echo 'selected'  ?>   value='b'> B </option>
  <option <?  if($answer == 'c') echo 'selected'  ?>   value='c'> C </option>
  <option <?  if($answer == 'd') echo 'selected'  ?>   value='d'> D </option>

    </select>
  </div>



       <div class="form-group ">
    <label for="grade">Level</label>
        <select  class="form-control"  selected="<? echo $level ?>" name="level" aria-describedby="genderHelp" >


  <option <?  if($level == 'junior') echo 'selected'  ?>   value='junior'> Junior </option>
  <option <?  if($level == 'senior') echo 'selected'  ?>  value='senior'> Senior </option>
    </select>
  </div>

     <div class="form-group ">

  <button type="submit" class="btn btn-primary">Update</button>
  </div>


</form>

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
