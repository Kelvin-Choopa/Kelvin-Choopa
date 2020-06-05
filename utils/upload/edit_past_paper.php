
<?php
require_once('../../layout/admin/header.php');
require_once('api.php');
$id = $_GET['id'];
$data = getPastPaper($id);
$title = $data['title'];
$year = $data['year'];
$month = $data['month'];
$level = $data['level'];
$description = $data['description'];
?>

<button class='btn'></button>

<div class="card   col-md-12 justify-content-center" >
  <div class="card-body">
    <h5 class="card-title">Edit Past Paper</h5>
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

        <div class="form-group ">
    <label for="title">Title</label>
    <input type="hidden" class="form-control"  name="past_paper" aria-describedby="nameHelp" />
    <input type="hidden" class="form-control"  name="is_edit" value='true' aria-describedby="nameHelp" />
    <input type="hidden" class="form-control"  name="id" value='<?php echo $id  ?>' aria-describedby="nameHelp" />
   
    <input type="title" class="form-control" value="<? echo $title ?>" name="title" aria-describedby="nameHelp" />
  </div>

        <div class="form-group ">
    <label for="description">Description</label>
    <input type="description" class="form-control" value="<? echo $description ?>" name="description" aria-describedby="nameHelp" />
  </div>

    
        <div class="form-group ">
    <label for="description">Year</label>
    <input type="number" name='year' min="1900" max="2099" step="1" value="<? echo $year ?>" />

  </div>
        <div class="form-group ">

    <label for="description">Month</label>
    <input type="number" name='month' min="0" max="12" step="1" value="<? echo $month ?>" />

  </div>

       <div class="form-group ">
    <label for="grade">Level</label>
        <select  class="form-control"  selected="<? echo $level ?>" name="level" aria-describedby="genderHelp" >


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