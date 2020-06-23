
<?php
require_once('../../layout/admin/header.php');
require_once('../api/index.php');
$type  = 'pdf';
$rows = getResults($type);
?>

<div class='col-md-12'>
  <h5 class="card-header"> Students Results </h5>

</div>


<?php  if(count($rows)):
        $index = 0;
      
        while($index < count($rows) ):
            $row = $rows[$index] ;
            $right = $row['right'];          
            $wrong = $row['wrong'];
            $total = $row['total'];
            $comment = $row['comment'];
            $score = $row['score'];
            $name = $row['name'];
            $country = $row['country'];
            $province = $row['province'];
            $district = $row['district'];
            $date = $row['date'];
        
    ?>

    <div class="card text-white bg-secondary mb-3" style="width: 30rem; ">
  <div class="card-body">
    <h5 class="card-title">
    <span class='btn <?php echo $comment === 'fail' ? 'btn-danger' : 'btn-success'  ?>'>
<?php echo $comment ?>
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

    <li  class="btn">Total Question: <h4 class="text-info"><?php echo $total ?> </h4> </li>
    <li class="btn">Correct : <h4 class="text-info"><?php echo $right?> </h4></li>
    <li class="btn">Failed :  <h4 class="text-info"><?php echo $wrong?> </h4></li>
    <li class="btn">Percent: <h2> <?php echo $score ?> </h2> </li>
    </p>
    </div>
    </div>


        <?php $index++; endwhile;   else:  ?>
<?php  endif  ?>
<?php
require_once('../../layout/admin/footer.php')
?>












