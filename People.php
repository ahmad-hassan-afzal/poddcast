<?php
    session_start();
    require_once ('dbconn.php');
    $db = new dbconn();
    $people = $db->getAllUser();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>People | Poddcast</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/325897fa15.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/bricks.css">
</head>

<body>
<!--Header-->
<?php require_once('Header.php');?>

<div class="container" >
    <?php
    foreach ($people as $person){
        $name = $person['name'];
        $uname = $person['username'];
        $id = $person['user_id'];
        $img = $db->getProfile(array($id));

        echo "<a href='profile.php?id=$id' style='text-decoration: none; color: #666666'>
                <div class='box' style='border-radius: 10px;'>
                    <img src='uploads/$img' alt='profile-pic' class='' style='border-radius: 10px;'>
                    <h2><strong>$name</strong></h2>
                    <p>@ $uname</p>
                </div>
            </a>";
    }
    ?>

</div>


<!--Footer-->
<?php require_once('Footer.php'); ?>
</body>
<script src=" https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>


</html>