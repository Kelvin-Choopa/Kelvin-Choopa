
<?php

class DB {

    public function connect2DB(Type $var = null)
    {
        # code...
        $mysqliConnection = new mysqli("localhost","root","","comp_test");
    
    // Check connection
    if ($mysqliConnection -> connect_errno) {
      echo "Failed to connect to MySQL: " . $mysqliConnection ->connect_error;
      exit();
    }
    return $mysqliConnection;
    }

}