<?php

require_once('dbconn.php');
$db = new dbconn();
    $name = $_POST['fname']." ".$_POST['lname'];
    $uname = $_POST['uname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $about = $_POST['about'];
    $data = array($uname,$password,$name,$email, $phone, $about);
    $db->addUser($data);

    header('Location:login.php?msg=UserCreated');


?>