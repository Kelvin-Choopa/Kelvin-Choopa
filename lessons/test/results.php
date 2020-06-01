
<?php
require_once('../../layout/admin/header.php');
require_once('../api/index.php');
$type  = 'pdf';
$files = getQuestions($type);
?>

<div class="card col-md-12">
  <h5 class="card-header"> Test Results </h5>
  <div class="card-body">
    <h5 class="card-title">
    <?php 
     
      if ($_GET['r'] > $_GET['w']) {
        # code...
        echo 'Impressive results I must say :)';


      }else{
        echo 'You can do better next time (:';
      }

    ?> 
    </h5>
    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit ullam dolor fuga rerum qui voluptate ipsa nisi dolorum quisquam! Placeat odit perspiciatis quae maiores eligendi obcaecati tenetur! At, magnam dicta.</p>
    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
  </div>
</div>


<div class="card " style="width: 30rem; ">
  <div class="card-body">
    <h5 class="card-title">Results</h5>

                <div class=" col-md-12 ">
        <canvas id="chart-results" class='chart-' width="400" height="400"></canvas>
            </div>
   
    <p class="card-text">
    <li  class="btn">Total: <span class="text-info"><?php echo $_GET['t']?> </span> </li>
    <li class="btn">Righ Answers: <span class="text-success"><?php echo $_GET['r']?> </span></li>
    <li class="btn">Wrong Answers:  <span class="text-danger"><?php echo $_GET['w']?> </sapn></li>
    <li class="btn">Score: <code> <?php echo $_GET['s']?>% </code> </li>
    </p>
    </div>
    </div>


<?php  if(count($files)):
        $index = 0;
        while($index < count($files) ):
            $row = $files[$index] ;
            $text = $row['text'];          
            $id = $row['id'];
            $a = $row['a'];
            $b = $row['b'];
            $c = $row['c'];
            $d = $row['d'];
            $ans = $row['answer'];

        
    ?>

<div class="card" style="width: 90rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $index+1?></h5>
    <p class="card-text">
    <?php echo $text?>
    </p>
    <?php 
    if($row['type'] === 'multiple-choice'):
    ?>

            <div class="form-check form-check-inline">
  <label class="form-check-label" for="inlineRadio1">
A  
</label>
  <input class="form-check-input" readonly type="radio" name="<?php echo $id?>-question" id="inlineRadio1" value="a">
  <label class="form-check-label" for="inlineRadio1">
  <?php echo $a ?>
  </label>
</div>
<div class="form-check form-check-inline">
  <label class="form-check-label" for="inlineRadio1">
B  
</label>
  <input class="form-check-input" readonly type="radio" name="<?php echo $id?>-question" id="inlineRadio2" value="b">
  <label class="form-check-label" for="inlineRadio2">
  <?php echo $b ?>
  
  </label>
</div>
            <div class="form-check form-check-inline">
              <label class="form-check-label" for="inlineRadio1">
C  
</label>
  <input class="form-check-input" readonly type="radio" name="<?php echo $id?>-question" id="inlineRadio1" value="c">
  <label class="form-check-label" for="inlineRadio1">
  <?php echo $c ?>
  
  </label>
</div>

<div class="form-check form-check-inline">
  <label class="form-check-label" for="d">
D  
</label>
  <input class="form-check-input" readonly type="radio" name="<?php echo $id?>-question" id="inlineRadio2" value="d">
  <label class="form-check-label" for="inlineRadio2">
  
  <?php echo $d ?>
  
  </label>
</div>
    <?php 
    
    endif;
    ?>

        <?php 
    if($row['type'] === 'true-false'):
    ?>
<div class="form-check form-check-inline">
  <label class="form-check-label" for="d">

</label>
  <input class="form-check-input" readonly type="radio" name="<?php echo $id?>-question" id="inlineRadio2" value="d">
  <label class="form-check-label" for="inlineRadio2">
  
True
  
  </label>
</div>

<div class="form-check form-check-inline">
  <label class="form-check-label" for="d">

</label>
  <input class="form-check-input" readonly type="radio" name="<?php echo $id?>-question" id="inlineRadio2" value="d">
  <label class="form-check-label" for="inlineRadio2">
  
False
  
  </label>
</div>

        <?php 
    
    endif;
    ?>


<div class="form-check form-check-inline">
  <label class="form-check-label" for="d">
ANSWER : 
</label>
  <input class="form-check-input" checked readonly type="checkbox"  id="inlineRadio2" value="d">
  <label class="form-check-label" for="inlineRadio2">
  <?php echo $ans ?>
  </label>
</div>
 
  </div>
</div>
        <?php $index++; endwhile;   else:  ?>
<?php  endif  ?>
<?php
require_once('../../layout/admin/footer.php')
?>

<script>
var ctx = document.getElementById('chart-results');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Total', 'Wrong Answers', 'Right Answers',
        
          ],
        datasets: [{
            label: 'Chart Results',
            data: [<?php echo $_GET['t'] ?>, <?php echo $_GET['w'] ?>,<?php echo $_GET['r'] ?>,
              ],
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'green',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255,1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>












