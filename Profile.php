<?php
    session_start();
    if(!isset($_SESSION["UserID"])) {
        echo "  <script>
                    window.location.href = 'login.php?msg=PleaseLogin';
                </script>";
    }
    if(isset($_GET["msg"])) {
        if ($_GET["msg"] == "Loggedin") {
            echo "<div class='container'>
                        <div class='alert alert-primary' role='alert'>You're Already Logged-In</div>
                    </div>";
        }
    }
    require_once ('dbconn.php');
    $db = new dbconn();

    //   Getting User Details From database

    //  Temporary - When home page and navbar is ready link this page with _GET['UserID'] Only
    $user_details = $db->getUser(array($_SESSION['UserID']));//My Profile

    if(isset($_GET["id"])){
        $user_details = $db->getUser(array($_GET["id"])); //Someone's profile
    }
    $id = $user_details['user_id'];
    $name = $user_details['name'];
    $username = $user_details['username'];
    $about = $user_details['about'];
    $cover = $user_details['cover'];
    $profile = $user_details['profile'];

//   Getting All posts From database
    $posts = $db->getAllUserPosts(array($id)); // My all Posts

?>


<!doctype html>
<html lang="en">
<head>
    <title>Profile | Poddcast</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/325897fa15.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/profile-style.css">
    <style>
        .card,
        .container textarea{
            border-radius: 15px;
        }
        .form-control{
            border-radius-: 20px;
        }
        img, nav{
            -webkit-border-bottom-left-radius: 15px;
            -webkit-border-bottom-right-radius: 15px;
            -moz-border-radius-bottomleft: 15px;
            -moz-border-radius-bottomright: 15px;
        }
        .nav-link{
            font-size: large;
            font-weight: bolder;
        }
    </style>
</head>

<body style="background-color: #EBF0F5; color: #4b4b4b;">

<!--Page Navbar-->

<div class="container-fluid" style="background-color: white; position: fixed; z-index: 999">
    <?php require_once('Header.php');?>
</div>

<!--Profile Navbar-->

    <div class="container">
        <div>
            <div class="img-container" style="background-image: url('uploads/<?php echo $cover; ?>');">
            </div>
            <div class="dp-container m-auto" style="z-index: 99">
                <img src="uploads/<?php echo $profile; ?>" class="img-fluid" alt="" >
            </div>
        </div>
        <nav class="navbar navbar-expand-md bg-white navbar-light nav-options">

            <a class="navbar-brand"><?php echo $user_details['name']; ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item" style="font-weight: 700;">
                <a class="nav-link" href="Photos.php?id=<?php echo $_GET['id'];?>" style="font-size: 20px; font-weight: 700">
                    <i class="fa fa-camera" aria-hidden="true"></i> Photos</a>

                </li>
                    <?php
                    $rcvr_id = $_GET["id"];
                        if($rcvr_id != $_SESSION['UserID']){
                            echo "
                <li class='nav-item' style='font-weight: 700;'>
                    <a class='nav-link' href='Message.php?Sender=$id&Receiver=$rcvr_id' style='font-size: 20px; font-weight: 700'>
                    <i class='fa fa-comments-o' aria-hidden='true'></i> Messages</a>
                </li>";
                        }
                    ?>
                <li>
                    <div class="dropdown">
                        <a class="dropdown-toggle nav-link" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-2x fa-ellipsis-h" aria-hidden="true"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="list-style-type: none;">
                            <a class="nav-link" href="logout.php" style="color: #666666; font-weight: bold">Logout</a>
                            <a class="nav-link" href="about.php" style="color: #666666;list-style-type: none; font-weight: bold">About Us</a>
                        </div>
                    </div>

                </li>
            </ul>
            </div>
        </nav>
    </div>

<!--Update Profile-->

    <div class="container mb-3" style="margin-top: -130px;">
        <?php
        if($_GET['id'] == $_SESSION['UserID']) {
            if ($profile == "user.png" || $cover == "img.png") {
                echo "<div>
                        <div class='alert alert-info' role='alert'> Update Your Profile</div>
                    </div>";
                echo "<div class='row'>";
                if ($profile == "user.png") {
                    echo "
            <form action='addImage.php?type=profile&id=$id' class='col-6' method='post' enctype='multipart/form-data'>
                <div class='input-group'>
                    <div class='custom-file'>
                        <input type='file' class='custom-file-input' id='inputGroupFile04' name='file'>
                        <label class='custom-file-label' for='inputGroupFile04'>Choose Profile Image</label>
                    </div>
                    <div class='input-group-append'>
                        <button class='btn btn-outline-secondary' type='submit' name='submit'>Upload</button>
                    </div>
                </div>
            </form>
            ";
                }
                if ($cover == "img.png") {
                    echo "
            <form action='addImage.php?type=cover&id=$id' class='col-6' method='post' enctype='multipart/form-data'>
                <div class='input-group'>
                    <div class='custom-file'>
                        <input type='file' class='custom-file-input' id='inputGroupFile04' name='file'>
                        <label class='custom-file-label' for='inputGroupFile04'>Choose Cover Image</label>
                    </div>
                    <div class='input-group-append'>
                        <button class='btn btn-outline-secondary' type='submit' name='submit'>Upload</button>
                    </div>
                </div>
            </form>
            ";
                }
                echo '</div>';
            }
        }
        ?>
    </div>

    <div class="container" >
            <div class="row">

<!--About-->
                <div class="col-md-4 col-sm-12">
                    <div class="card text-center" style="margin-bottom: 15px;">
                        <div class="card-body">
                            <h4 class="card-title">
                                <i class="fa fa-user" aria-hidden="true"></i> Profile Info</h4>
                            <hr>
                            <h6 style="color: #3f3f3f;"><b>About</b></h6>
                            <p class="card-text" style="color: grey;">
                                <?php echo $user_details['about']; ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="column col-md-8 col-sm-12">

<!--Create Posts-->
                    <?php
                    if($_GET['id'] == $_SESSION['UserID']){
                        echo "
                    <div class='card' style='margin-bottom: 15px;'>
                        <div class='card-body'>
                            <form action=\"post.php\" method=\"post\" enctype='multipart/form-data'>
                                <h4 class='card-title'>
                                    <i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i>
                                    Write Post</h4>
                                <hr>
                                <input type=\"text\" style=\"border-radius: 20px;\" class=\"form-control\" name=\"subject\" placeholder=\"Post Subject\" required>

                                <div class=\"form-group shadow-textarea mt-3\">
                                    <textarea class=\"form-control z-depth-1\" id=\"exampleFormControlTextarea6\" name=\"description\" rows=\"4\" placeholder=\"What's On Your mind\" required></textarea>
                                </div>
                                <hr>
                                <div class=\"row\">
                                <div class=\"col-md-11\">
                                    <div class='input-group'>
                                        <div class='custom-file'>
                                            <input type='file' class='custom-file-input' id='inputGroupFile04' name='file'>
                                            <label class='custom-file-label' for='inputGroupFile04'>Browse Image</label>
                                        </div>
                                    </div>
                                </div>
                                <div class=\"col-md-1\">
                                    <button class='btn btn-info' style=\"float: right\" type=\"submit\">
                                        Post</button>
                                </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    ";
                    }

                    ?>
<!--User's All Posts-->
                    <?php
                    foreach ($posts as $post) {
                        $title = $post[1];  // ["post_title"]
                        $desc = $post[2];   // ["post_decsription"]
                        $imgName = $post[5]; // ["img_Name"]
                        $date_time = explode(' ', $post[4]);

                        echo "
                        <div class='card mb-2'>
                             <div class='card-body'>
                                 <h4 class='card-title'>
                                     <img src='uploads/$profile' width='40px' height='40px' style='border-radius: 150px'>
                                     $name 
                                     <span class='lead' style='float: right'>&nbsp;&nbsp;&nbsp; $date_time[1]</span>
                                 </h4>
                                 
                                <hr>
                                <h6 style='color: #3f3f3f;'><b>$title</b></h6>
                                <p class='card-text' style='color: grey;'>$desc</p>
                             </div>";
                        if ($imgName != ""){
                            echo "<img src='uploads/$imgName' class='img-fluid'>";
                        }
                        echo "</div>";
                    }
                    if($posts == null){
                        echo "<h3 class='text-center bold mt-5' style='color: #838383; font-weight: bolder'>No Post to show</h3>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

<!--Footer-->
    <?php require_once('Footer.php');?>
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