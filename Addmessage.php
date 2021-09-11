<?php
    require_once("dbconn.php");
    $db = new dbconn();
    session_start();
    $usrid = $_SESSION['UserID'];
    $rcvrid = $_GET['Receiver'];
    $msg = $_GET["message"];
    if($msg != ''){
        $data = array($msg,$usrid,$usrid,$rcvrid);
        $db->send_message($data);
    }
    header("location:Message.php?Sender=$usrid&Receiver=$rcvrid#bottom");

?>
