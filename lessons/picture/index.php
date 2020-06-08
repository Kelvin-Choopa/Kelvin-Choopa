
<?php
require_once('../../layout/admin/header.php');
require_once('../api/index.php');
$type  = 'png';
$files = getFiles($type);

?>

<div class="card col-md-12 text-white bg-info mb-3">
  <h5 class="card-header"> Illustrations </h5>
  <div class="card-body">
    <h5 class="card-title">A Pciture is worth a 1000 words</h5>
    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit ullam dolor fuga rerum qui voluptate ipsa nisi dolorum quisquam! Placeat odit perspiciatis quae maiores eligendi obcaecati tenetur! At, magnam dicta.</p>
    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
  </div>
</div>


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

<div class="card " style="width: 30rem; ">
  <div class="card-body">
    <h5 class="card-title"><?php echo $title?></h5>
   
    <p class="card-text">
    <?php echo $description?>
    </p>

<img src="<?php echo $path;  ?>" class="img-fluid" alt="Responsive image">


 
    <a href="<?php echo $path;  ?>" target='_blank' class="card-link">View </a>
    <a href="<?php echo $path;  ?>" target='_blank' class="card-link" download>Download </a>
    
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












