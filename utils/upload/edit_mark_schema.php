
<?php
require_once('../../layout/admin/header.php');
require_once('api.php');
$id = $_GET['id'];
$data = getMarkSchema($id);
$title = $data['title'];
$year = $data['year'];
$month = $data['month'];
$level = $data['level'];
$description = $data['description'];
?>

<button class='btn'></button>

<div class="card" style="width: 21rem;">
  <div class="card-body">
    <h5 class="card-title"> Update Mark Schema</h5>
    <h6 class="card-subtitle mb-2 text-muted">
    

<span class="badge badge-pill badge-success">Pdf (Past papers)</span>
    </h6>

      <?php

      if(isset($_GET['err'])):
    ?>

      <blockquote class='text-danger'>
         <?php
     echo $_GET['err'];
    ?>

      </blockquote>


    <?php endif ?>
   

<form action="fileProcessor.php" method="post" enctype="multipart/form-data">
<input type="hidden" class="form-control"  name="is_edit" value='true' aria-describedby="nameHelp" />
    <input type="hidden" class="form-control"  name="id" value='<?php echo $id  ?>' aria-describedby="nameHelp" />
   

        <div class="form-group ">
    <label for="title">Title</label>
    <input type="hidden" class="form-control" name="past_paper" aria-describedby="nameHelp" />
    <input type="hidden" class="form-control" name="mark_schema" aria-describedby="nameHelp" />
    <input type="title" class="form-control" value="<? echo $title ?>" name="title" aria-describedby="nameHelp" />
  </div>

        <div class="form-group ">
    <label for="description">Description</label>
    <input type="description" value="<? echo $description ?>" class="form-control" name="description" aria-describedby="nameHelp" />
  </div>

    
        <div class="form-group ">
    <label for="description">Year</label>
    <input type="number" name='year' min="1900" value="<? echo $year ?>" max="2099" step="1" value="2016" />

  </div>
        <div class="form-group ">
    <label for="description">Month</label>
    <input type="number" name='month' min="0" value="<? echo $month ?>" max="12" step="1" value='' />
  </div>


     <div class="form-group ">
    <label for="grade">Level</label>
        <select  class="form-control"  name="level" aria-describedby="genderHelp" >
  <option <?  if($level == 'junior') echo 'selected'  ?>   value='junior'> Junior </option>
  <option <?  if($level == 'senior') echo 'selected'  ?>  value='senior'> Senior </option>
    </select>
  </div>

<div class="form-group">
  <label for="exampleFormControlFile1">Click to upload</label>
  <input type="file" name='file' class="form-control-file" id="exampleFormControlFile1">
</div>

<button>  Update </button>
</form>

  </div>
</div>

<?php
require_once('../../layout/admin/footer.php')
?>