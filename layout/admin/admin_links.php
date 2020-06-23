        
     <?php
     
     require_once(__DIR__.'../../../db/connection.php');

    $conn = DBCoonect();

     $sql = "SELECT * FROM test_results  ";

        $results = mysqli_query($conn,$sql);  
        $total  = mysqli_num_rows($results);
     
     ?>


  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Manage Resources
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/comp_test/utils/upload">PDF</a>
          <a class="dropdown-item" href="/comp_test/utils/upload/">Video</a>
          <a class="dropdown-item" href="/comp_test/utils/upload/">Illustrations</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/comp_test/admin/lessons/tests/create.php">Create Tests</a>
          <!-- <a class="dropdown-item" href="/comp_test/admin/lessons/tests/create_answer.php">Create Answer</a> -->
        </div>
      </li>

                <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Manage Past Papers
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/comp_test/utils/upload/past_papers.php">Past Papers</a>
          <a class="dropdown-item" href="/comp_test/utils/upload/mark_schema.php">Mark Schema</a>
 
        </div>
      </li>

          <li class="nav-item">
          <a class=" btn btn-info text-" href="/comp_test/lessons/test/all_results.php">


<!-- <button type="button" class="btn btn-info btn-small"  style='color:white'> -->
   <span class="badge badge-light"> Results: <?php echo   $total  ?></span>
<!-- </button> -->
</a>
          </li>
