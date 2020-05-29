
<?php
require_once('../../layout/admin/header.php');
require_once('../api/index.php');
$type  = 'pdf';
$files = getMarkSchema();

?>

<div class="card col-md-12">
  <h5 class="card-header">Mark Schemas</h5>
  <div class="card-body">
    <h5 class="card-title">It takes one shot to exel</h5>
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

           $month = $row['month'];
           $year = $row['year'];

           $pastPaperLink = "/comp_test/lessons/past_papers?month=$month&year=$year";
        
    ?>

<div class="card" style="width: 30rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $title?></h5>
   
    <p class="card-text">
    <?php echo $description?>
    </p>
    <embed src="<?php echo $path;  ?>" width="400" height="200" alt="pdf" pluginspage="http://www.adobe.com/products/acrobat/readstep2.html">

 
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











