<?php
include "../../classes/autentification.php";
include "../../classes/conn.php";
$signUP = new Authentification($conn);
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $name=$_POST['userName'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $password_Confirm=$_POST['confirm_password'];
    if($password==$password_Confirm)
    $signUP->sign_up($email,$name,$password);
    header('../admineVue/');
}
else{
    echo"check password confirmation";
}
