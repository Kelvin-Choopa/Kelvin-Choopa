<?php

require_once(__DIR__.'/home/index.php');


require_once(__DIR__.'/db/connection.php');


$conn = DBCoonect();
 
$sql  = "INSERT INTO Customers (CustomerName, ContactName, Address, City, PostalCode, Country)
VALUES ('Cardinal', 'Tom B. Erichsen', 'Skagen 21', 'Stavanger', '4006', 'Norway');"

?>
