<?php
    $userData = array($_POST["uname"], $_POST["password"]);
    require_once("dbconn.php");
    $db = new dbconn();
    $uid = $db->Auth_User($userData);

    if ($uid === false) {
        header("Location:login.php?msg=LoginFailed");
    } else {
        session_start();
        $_SESSION["UserID"] = $uid;
        header("Location:index.php");
    }
?>