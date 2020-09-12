
<?php
require_once('../../layout/admin/header.php');
require_once('../api/index.php');
$type  = 'mark_schema';
$files = getMarkSchema();

$months = ['N/A','Jan','Feb','March',"April","May","June","July","Aug","Sep","Oct","Nov","Dec"];


?>

<div class="card col-md-12 text-white bg-info mb-3">
  <h5 class="card-header">Mark Schemas</h5>
  <div class="card-body">
    <h5 class="card-title">It takes one shot to exel</h5>
    <p class="card-text">Check out how to answer exam question from the marking Key.</p>
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
            $id = $row['id'];

             $fileStorage =  getFileStoragePath();

            $path = ($fileStorage.$file) ;

           $month = $row['month'];
           $year = $row['year'];
            $editPath = '/comp_test/utils/upload/edit_mark_schema.php?id='.$id;
          $deletePath = '../api/index.php?delete=true&table=mark_schema&id='.$id;


// lessons/past_papers/
           $pastPaperLink = "/comp_test/lessons/past_papers?month=$month&year=$year";
        
    ?>

<div class="card" style="width: 30rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $title?></h5>

          <code> Year : <?php echo  $year; ?> </code>
   <code> Month : <?php echo $months[$month] ?> </code>
   
    <p class="card-text">
    <?php echo $description?>
    </p>
    <embed src="<?php echo $path;  ?>" width="400" height="200" alt="pdf" pluginspage="http://www.adobe.com/products/acrobat/readstep2.html">


    <a href="<?php echo $pastPaperLink?>" class="card-link">View Past Paper </a>
 
    <a href="<?php echo $path;  ?>" target='_blank' class="card-link">View </a>
    <a onclick="setDownloadCounter(event,<?php echo $id ?>)"  href="<?php echo $path;  ?>" target='_blank' class="card-link download" download>Download </a>

            <?php
                        if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] == 'admin'):
            
            ?>
    <a href="<?php echo $editPath;  ?>"  class="card-link" >Edit </a>
    <a href="<?php echo $deletePath;  ?>"  class="text-danger card-link delete" >Delete </a>


           <?php
      endif;
?>
 

    <hr />
        <h6 class="card-subtitle mb-2 text-muted">
    Downloads :<?php echo $downloads?></h6>
  </div>
</div>



        <?php $index++; endwhile;   else:  ?>


<?php  endif  ?>

     <script>

  function setDownloadCounter(e,id){

   $.post("../api/index.php",
  {
   id,
   setDownload:true,
   table:'mark_schema'
 
  },
  function(data, status){
    location.reload()
  });

  }

</script>



<?php
require_once('../../layout/admin/footer.php')

?>












