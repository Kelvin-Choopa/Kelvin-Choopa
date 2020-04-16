





<?php
require_once('../../layout/admin/header.php');
?>

<button class='btn'></button>

<div class="card" style="width: 21rem;">
  <div class="card-body">
    <h5 class="card-title"> Upload Resources</h5>
    <h6 class="card-subtitle mb-2 text-muted">
    
    <span class="badge badge-pill badge-primary">Video</span>
<span class="badge badge-pill badge-secondary">Illustratiions</span>
<span class="badge badge-pill badge-success">Pdf (Past papers)</span>
<span class="badge badge-pill badge-dark">Gif</span>
    
    </h6>
   

<form action="fileProcessor.php" method="post" enctype="multipart/form-data">

<div class="form-group">
  <label for="exampleFormControlFile1">Click to upload</label>
  <input type="file" name='file' class="form-control-file" id="exampleFormControlFile1">
</div>

<button>  Upload </button>
</form>




  </div>
</div>


<?php
require_once('../../layout/admin/footer.php')
?>