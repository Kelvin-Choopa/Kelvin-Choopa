
<?php
require_once('../../layout/admin/header.php');
require_once('../api/index.php');
$type  = 'pdf';
$files = getQuestions($type);

?>

<div class="card col-md-12">
  <h5 class="card-header"> IQ Test </h5>
  <div class="card-body">
    <h5 class="card-title">Check your worthy</h5>
    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit ullam dolor fuga rerum qui voluptate ipsa nisi dolorum quisquam! Placeat odit perspiciatis quae maiores eligendi obcaecati tenetur! At, magnam dicta.</p>
    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
  </div>
</div>

<form action="../api/index.php" method="post" enctype="multipart/form-data">
  <input class="" type="hidden" name="test-questions"  value="test-questions">

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
  <input class="form-check-input" type="radio" name="<?php echo $id?>-question" id="inlineRadio1" value="a">
  <label class="form-check-label" for="inlineRadio1">
  <?php echo $a ?>
  </label>
</div>
<div class="form-check form-check-inline">
  <label class="form-check-label" for="inlineRadio1">
B  
</label>
  <input class="form-check-input" type="radio" name="<?php echo $id?>-question" id="inlineRadio2" value="b">
  <label class="form-check-label" for="inlineRadio2">
  <?php echo $b ?>
  
  </label>
</div>
            <div class="form-check form-check-inline">
              <label class="form-check-label" for="inlineRadio1">
C  
</label>
  <input class="form-check-input" type="radio" name="<?php echo $id?>-question" id="inlineRadio1" value="c">
  <label class="form-check-label" for="inlineRadio1">
  <?php echo $c ?>
  
  </label>
</div>
<div class="form-check form-check-inline">
  <label class="form-check-label" for="d">
D  
</label>
  <input class="form-check-input" type="radio" name="<?php echo $id?>-question" id="inlineRadio2" value="d">
  <label class="form-check-label" for="inlineRadio2">
  
  <?php echo $d ?>
  
  </label>
</div>
 
  </div>
</div>

        <?php $index++; endwhile;   else:  ?>

<?php  endif  ?>
<button>  Submit </button>
</form>

<?php
require_once('../../layout/admin/footer.php')

?>












