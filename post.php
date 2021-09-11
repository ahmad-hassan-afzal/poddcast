<?php
    require_once('dbconn.php');
    $db = new dbconn();
    session_start();
    $imgType = 'post';
    $userId = $_SESSION['UserID'];

    $subject = $_POST['subject'];
    $desc = $_POST['description'];

        $fileNameNew = '';

    $file = $_FILES['file'];
    $fileName = $file['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg','jpeg','png');

    if(in_array($fileActualExt,$allowed)){
        if($fileError === 0)
        {
            if($fileSize < 1000000)
            {
                $fileNameNew = uniqid('',true).".".$fileActualExt;
                $fileDestination = 'uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName,$fileDestination);
                $db->addImage(array($fileNameNew, $imgType, $userId));
            }
            else
                echo"<script>alert('File size to big')</script>";
        }
        else
            echo"<script>alert('Please try again later')</script>";
    }
    else
        echo"<script>alert('Only jpg, jpeg, png allowed.')</script>";

    $db->post(array($subject, $desc, $userId, $fileNameNew));


    header("Location:Profile.php?id=$userId");
?>