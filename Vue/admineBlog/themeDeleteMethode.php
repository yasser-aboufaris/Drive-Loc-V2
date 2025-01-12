<?php
// Assuming you have a database connection file
include "../../classes/themes.php";
include "../../classes/conn.php";

$id= $_GET['id'];
$theme = new themes($conn);
$theme->delete($id);