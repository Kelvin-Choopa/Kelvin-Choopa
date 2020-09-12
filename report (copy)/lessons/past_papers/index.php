
<?php
require_once('../../layout/admin/header.php');
require_once('../api/index.php');
$type  = 'past_papers';
$files = getPastPapers();


$months = ['N/A','Jan','Feb','March',"April","May","June","July","Aug","Sep","Oct","Nov","Dec"];



?>


   
<!-- // text-white bg-info mb-3 -->
<div class="card col-md-12 text-white bg-info mb-3">
  <h5 class="card-header">Past Papers</h5>
  <div class="card-body">
    <h5 class="card-title">It takes one shot to exel</h5>
    <p class="card-text">Check out what has been written in the past to prepare for the future.</p>
    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
  </div>
</div>



<?php  if(count($files)):
        $index = 0;
        while($index < count($files) ):
            $row = $files[$index] ;
            $title = $row['title'];
            $id = $row['id'];
            $downloads = $row['downloads'];
            $description = $row['description'];
            $file = ($row['link']) ;
             $fileStorage =  getFileStoragePath();

            $path = ($fileStorage.$file) ;


           $month = $row['month'];
           $year = $row['year'];
          $editPath = '/comp_test/utils/upload/edit_past_paper.php?id='.$id;
          $deletePath = '../api/index.php?delete=true&table=past_papers&id='.$id;

           $markSchemaLink = "/comp_test/lessons/mark_schema?month=$month&year=$year";
        
    ?>

<div class="card " style="width: 30rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $title?></h5>
      <code> Year : <?php echo  $year; ?> </code>
   <code> Month : <?php echo $months[$month] ?> </code>
    <p class="card-text">
    <?php echo $description?>
    </p>
    <embed src="<?php echo $path;  ?>" width="400" height="200" alt="pdf" pluginspage="http://www.adobe.com/products/acrobat/readstep2.html">


 
    <a href="<?php echo $markSchemaLink?>" class="card-link">View Mark Schema </a>

 
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
   table:'past_papers',
   
  },
  function(data, status){
    location.reload()
  });

  }

</script>




<?php
require_once('../../layout/admin/footer.php')

?>


  











