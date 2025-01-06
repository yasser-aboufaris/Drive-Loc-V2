<?php
include "../../classes/autentification.php";
include "../../classes/conn.php";


$login = new Authentification($conn);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $login->login($email , $password);
}