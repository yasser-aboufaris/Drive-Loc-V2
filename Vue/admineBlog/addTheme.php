<?php
include "../../classes/themes.php";
include "../../classes/conn.php";

// Collect the data from the form
$description = $_POST['description'];
$themeName = $_POST['theme']; // Keep this as the string for the theme name

// Create a themes object
$themes = new themes($conn);

// Call the create method with the correct arguments
$themes->create($themeName, $description);
