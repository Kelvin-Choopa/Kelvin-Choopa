
<?php
require_once('../../layout/admin/header.php');
require_once('../api/index.php');
$type  = 'pdf';
$files = getFiles($type);

?>

<button class='btn'></button>

<?php  if(count($files)):
        $index = 0;
        while($index < count($files) ):
            $row = $files[$index] ;
            $title = $row['title'];
            $downloads = $row['downloads'];
            $description = $row['description'];
            $file = ($row['link']) ;
             $fileStorage =  getFileStoragePath();

            $path = ($fileStorage.$file) ;
        
    ?>

<div class="card" style="width: 30rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $title?></h5>
   
    <p class="card-text">
    <?php echo $description?>
    </p>
    <embed src="<?php echo $path;  ?>" width="400" height="200" alt="pdf" pluginspage="http://www.adobe.com/products/acrobat/readstep2.html">


 
    <a href="#" class="card-link">View </a>
    <a href="#" class="card-link"> Download</a>
    <hr />
        <h6 class="card-subtitle mb-2 text-muted">
    Downloads :<?php echo $downloads?></h6>
  </div>
</div>



        <?php $index++; endwhile;   else:  ?>


<?php  endif  ?>



<?php
require_once('../../layout/admin/footer.php')

?>












