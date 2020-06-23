
<?php
require_once('../../layout/admin/header.php');
require_once('../api/index.php');
$type  = 'mp4';
$files = getFiles($type);

?>

<div class="card col-md-12 text-white bg-info mb-3">
  <h5 class="card-header"> Video Resources </h5>
  <div class="card-body">
    <h5 class="card-title">View tutorials that matter</h5>
    <p class="card-text">Check out video tutorials here!.</p>
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

<div class="card" style="width: 30rem;">
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

    <video width="400" height="200" controls>
  <source src="<?php echo $path;  ?>" type="video/mp4">
  <!-- <source src="movie.ogg" type="video/ogg"> -->
Your browser does not support the video tag.
</video>
    <!-- <embed src="<?php echo $path;  ?>" width="400" height="200" alt="pdf" pluginspage="http://www.adobe.com/products/acrobat/readstep2.html"> -->

 
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












