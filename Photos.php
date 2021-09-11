<?php
session_start();
require_once ('dbconn.php');
$db = new dbconn();

$id = $_GET['id'];
$posts = $db->getAllUserPosts(array($id));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Photos | Poddcast</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/325897fa15.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/bricks.css">
</head>

<body>
<!--Header-->
<?php require_once('Header.php');?>


<div class="container">
    <?php
    foreach ($posts as $post){
        $title = $post[1];  // ["post_title"]
        $desc = $post[2];   // ["post_decsription"]
        $img = $post[5];

        echo "<div class='box' style='border-radius: 10px'>
                            <img src='uploads/$img' style='border-radius: 5px'>
                            <h2>$title</h2>
                            <p>$desc</p>
                        </div>";
    }
    if($posts == null){
        echo "<h3 style='color: #838383; font-weight: bolder'>No Photos to show</h3>";
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