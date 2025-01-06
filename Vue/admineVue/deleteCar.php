<?php

include "../../classes/conn.php"; 
include "../../classes/cars.php" ;

$id=$_GET['id'];
$car->delete($id);