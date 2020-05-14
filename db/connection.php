<?php

    require_once (__DIR__.'/index.php');
    
    function DBCoonect(Type $var = null)
    {
        $DB = new DB();
        # code...
        return $DB->connect2DB();

        
    }


?>