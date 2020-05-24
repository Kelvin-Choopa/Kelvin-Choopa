
<?php
require_once('../../layout/admin/header.php');
require_once('../api/index.php');
$type  = 'pdf';
$files = getQuestions($type);
?>


<div class="card " style="width: 30rem; ">
  <div class="card-body">
    <h5 class="card-title">Results</h5>
   
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












