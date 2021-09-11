<?php
    session_start();
    if(!isset($_SESSION["UserID"])) {
        echo "  <script>
                    window.location.href = 'login.php?msg=PleaseLogin';
                </script>";
    }
    require_once ('dbconn.php');
    $db = new dbconn();

    //   Getting All Users Details From database
    $users = $db->getAllUser();  //All Profile

    //   Getting All posts From database
    $posts = $db->getAllPosts(); //All Posts

?>


<!doctype html>
<html lang="en">
<head>
    <title>Home | Poddcast</title>
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
        img, nav{
            -webkit-border-bottom-left-radius: 15px;
            -webkit-border-bottom-right-radius: 15px;
        }
        .nav-link{
            font-size: large;
            font-weight: bolder;
        }
    </style>

</head>

<body style="background-color: #EBF0F5;">

<?php require_once('Header.php'); ?>

<?php
    if(isset($_GET["msg"])){
        if ($_GET["msg"] == "Loggedin"){
            echo "<div class='container'>
                            <div class='alert alert-primary' role='alert'>You're Already Logged-In</div>
                        </div>";
        }
    }
?>

<div class="container"> <!--style="margin-top: -130px;">-->
    <div class="row">
        <div class="col-md-4 col-sm-12 text-center">
        <?php
        foreach ($users as $user) {
            $name = $user[3];
            $username = $user[1];
            $userID = $user[0];
            $profile = $user[8];

            if( $userID != $_SESSION['UserID']) {
                echo "
                <div class='card mb-1'>
                    <div class='card-body'>
                        <div class='row'>
                            <div class='col-2'>
                                <img src='uploads/$profile' width='50px' height='50px' style='border-radius: 100px'>
                            </div>
                            <div class='col-10'>
                                <h4><a href='profile.php?id=$userID'>$name</a></h4>
                                <h6 style='margin-top: -12px; color: #666666;'>@$username</h6>
                            </div>
                        </div>
                    </div>
                </div>";
            }
        }
        ?>

        </div>
        <div class="column col-md-8 col-sm-12">

            <?php
            $index = 0;
            foreach ($posts as $post) {
                $title = $post[1];  // ["post_title"]
                $desc = $post[2];   // ["post_decsription"]
                $userID = $post[3];
                $date_time = explode(' ', $post[4]);
                $date = $date_time[0];
                $name = $db->getName(array($userID));
                $img = $post[5];
                $profile = $db->getProfile(array($userID)); //Profile Photo

                echo "
                    <div class='card mb-2'>
                        <div class='card-body'>
                        <div class='row' '>
                            <div class='col-1'>
                                <img src='uploads/$profile' width='50px' height='50px' style='border-radius: 100px'>
                            </div>
                            <div class='col-11 text-center'>
                                <h4 class='card-title' style='color: #4b4b4b'>$name
                                <span class='lead' style='float: right'>&nbsp;&nbsp;&nbsp; $date_time[1]</span>
                                </h4>
                                <h6 style='margin-top: -12px; color: #4b4b4b;'>@$username</h6>
                            </div>
                        </div> 
                            <hr>
                            <h6 style='color: #3f3f3f;'><b>$title</b></h6>
                            <p class='card-text' style='color: grey;'>$desc</p>
                         </div>"; // End Card Body

                        if ($img != ""){
                            echo "<img src='uploads/$img' class='img-fluid'>";
                        }
                    $index++;
                echo "</div>"; //End Card
            }
            if($posts == null){
                echo "<div class=\"col-12 text-center font-weight-bold\" style=\"color: #c4c4c4; font-size: 32px; top: 120px;\">
                        No Post to show
                      </div>";
            }
            ?>
        </div>
    </div>
</div>

<?php require_once ('Footer.php');?>

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