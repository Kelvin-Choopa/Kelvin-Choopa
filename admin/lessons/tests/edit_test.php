
<?php
require_once('../../../layout/admin/header.php');
require_once('./api.php');
$id = $_GET['id'];
$row = getQuestion($id);

            $text = $row['text'];
            $id = $row['id'];
            $a = $row['a'];
            $b = $row['b'];
            $c = $row['c'];
            $d = $row['d'];
            $answer = $row['answer'];
            $level = $row['level'];
            $type = $row['type'];

?>


<div class="card col-md-12">
  <h5 class="card-header"> Edit Test Questions </h5>
  <div class="card-body">
    <h5 class="card-title">Help student do online test</h5>
    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit ullam dolor fuga rerum qui voluptate ipsa nisi dolorum quisquam! Placeat odit perspiciatis quae maiores eligendi obcaecati tenetur! At, magnam dicta.</p>
    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
  </div>
</div>

<?php

if ($type == 'true-false') {

  require_once('edit_true_false.php');



}elseif ($type == 'one-word') {
  require_once('edit_one_word.php');
  
  # code...
}elseif ($type == 'multiple-choice') {
  # code...
  require_once('edit_multiple_choice.php');


}



?>







         






























<?php
require_once('../../../layout/admin/footer.php')
?>
