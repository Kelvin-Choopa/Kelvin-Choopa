
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
    <p class="card-text">Get the best illustration here!.</p>
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
           $deletePath = '../api/index.php?delete=true&table=resources&id='.$id;

        
           
    ?>

<div class="card " style="width: 30rem; ">
  <div class="card-body">
    <h5 class="card-title"><?php echo $title?></h5>


              <?php
                        if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] == 'admin'):
            
            ?>
    <a href="<?php echo $deletePath;  ?>"  class="text-danger card-link delete" >Delete </a>

    

           <?php
      endif;
?>
    
   
    <p class="card-text">
    <?php echo $description?>
    </p>

<img src="<?php echo $path;  ?>" class="img-fluid" alt="Responsive image">


 
    <a href="<?php echo $path;  ?>" target='_blank' class="card-link">View </a>
    <a onclick="setDownloadCounter(event,<?php echo $id ?>)"  href="<?php echo $path;  ?>" target='_blank' class="card-link download" download>Download </a>

    
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
   table:'resources'
  },
  function(data, status){
    location.reload()
  });

  }

</script>



<?php
require_once('../../layout/admin/footer.php')

?>












