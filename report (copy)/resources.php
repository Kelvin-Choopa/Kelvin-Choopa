
<?php
require_once('../layout/admin/header.php');
require_once('./api/index.php');
    $conn = DBCoonect();

$type  = $_GET['type'];
$filter  = isset($_GET['f']) ? $_GET['f']: 'country' ;

$files = getFiles($type,$filter);
// $totalDownloads = $files[1];
$files = $files[0];


?>

<div class="card col-md-12 text-white bg-info mb-3">
  <h5 class="card-header">  Resource Report </h5>
  <!-- <h5 class="card-header"> Downloads (<?php echo $totalDownloads ?>) </h5> -->
  <div class="card-body">
    <h5 class="card-title">Resources</h5>
    <p class="card-text"></p>
          <div class="form-group ">
    <label for="grade">Filter</label>
        <select onchange="filter(event)"  class="form-control" name="grade" aria-describedby="genderHelp" >

  <option value=''> Select  </option>
  <option value='country'> Country </option>
  <option value='district'> District </option>
  <option value='province'> Province </option>

    </select>
  </div>
    <a href="#" class="btn btn-primary">showing report By :<code class='text-default'><?php echo $filter?> </code></a>
  </div>
</div>


<?php  if(count($files)):
        $index = 0;
        while($index < count($files) ):
          $row = $files[$index] ;
            $resource_id = $row['resource_id'];

          $sql = "SELECT * FROM  resources WHERE `id` = '$resource_id' ";
    $results = mysqli_query($conn,$sql) or die(mysqli_error($conn,$sql));
    $row2 = mysqli_fetch_assoc($results);
    $area = $row[$filter];
    
            $title = $row2['title'];
            $id = $row2['id'];
            $downloads = $row2['downloads'];
            $description = $row2['description'];
            $file = ($row2['link']) ;
             $fileStorage =  getFileStoragePath();

            $path = ($fileStorage.$file) ;
           $deletePath = '../api/index.php?delete=true&table=resources&id='.$id;

        
    ?>

<div class="card" style="width: 30rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $title?></h5>
            <h6 class="card-subtitle mb-2 text-muted">
    Downloads :<?php echo $downloads?></h6>
            <h6 class="card-subtitle mb-2 text-muted">
     <?php echo strtoupper($filter) .': '.$area ?></h6>

              <?php
                        if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] == 'admin'):
            
            ?>
           <?php
      endif;
?>
   
    <p class="card-text">
    <?php echo $description?>
    </p>

    <a href="<?php echo $path;  ?>" target='_blank' class="card-link">View </a>
    <hr />
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

  function filter(e) {

    let params = new URLSearchParams(window.location.search)


    const val = e.target.value;
    location.href = location.pathname+'?f='+val+'&type='+params.get('type');
    
  }

</script>

<?php
require_once('../layout/admin/footer.php')
?>












