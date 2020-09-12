
<?php
require_once('../layout/admin/header.php');
require_once('./api/index.php');
$rows = getUsers();
?>

<div class='col-md-12'>
  <h5 class="card-header"> Students (<?php echo count($rows)?>)  </h5>

</div>


<?php  if(count($rows)):
        $index = 0;
      
        while($index < count($rows) ):
            $row = $rows[$index] ;
            $name = $row['name'];
            $country = $row['country'];
            $province = $row['province'];
            $district = $row['district'];
            $date = $row['created_at'];
            $grade = $row['grade'];
        
    ?>

    <div class="card text-white bg-secondary mb-3" style="width: 30rem; ">
  <div class="card-body">
    <h5 class="card-title">
    <span class='btn btn-success'  >
<?php echo $grade ?>
    </span>
    </h5>

    <p class="card-text">
   <div class='row'>
 <h6 class='col-md-6'> <?php echo $name  ?>  </h6>
    <h6 class='disabled text-default align-right' disabled> <?php echo $date  ?>  </h6>
    <h6 class='col-md-6'> <?php echo $province  ?>  </h6>
    <h6 class='col-md-6'> <?php echo $district  ?>  </h6>
    <h6 class='col-md-6'> <?php echo $country  ?>  </h6>
          </div>

    <li  class="btn">Total Question: <h4 class="text-info"><?php echo '' ?> </h4> </li>

    </p>
    </div>
    </div>


        <?php $index++; endwhile;   else:  ?>
<?php  endif  ?>
<?php
require_once('../layout/admin/footer.php')
?>
