<?php
session_start();
    if(isset($_SESSION["UserID"])) {
        header("Location:profile.php?msg=Loggedin");
    }
    if(isset($_GET["msg"])){
//        if ($_GET["msg"] == "PleaseLogin"){
//            echo "<div class='container'>
//                        <div class=\"alert alert-warning\" role=\"alert\">
//                        <strong>Please Login First</strong></div>
//                    </div>";
//        }
        if ($_GET["msg"] == "EnterEmailPass"){
            echo "<div class='container'>
                        <div class=\"alert alert-warning\" role=\"alert\"> 
                        <strong>Sign-Up Failed:</strong> Please Enter Email & Password to Create Account</div>
                    </div>";
        }
        if ($_GET["msg"] == "LoginFailed"){
            echo "<div class='container'>
                        <div class=\"alert alert-danger\" role=\"alert\"> 
                        <strong>Login Failed:</strong> Please Enter Valid Username/Password</div>
                    </div>";
        }
        if ($_GET["msg"] == "MatchPasswords"){
            echo "<div class='container'>
                        <div class=\"alert alert-danger\" role=\"alert\"> 
                        <strong>Login Failed:</strong> Your passwords do not match. Please type carefully.</div>
                    </div>";
        }
        if ($_GET["msg"] == "UserCreated"){
            echo "<div class='container'>
                        <div class=\"alert alert-success\" role=\"alert\"> 
                        <strong>User Created Successfuly</strong> You can Login to your account</div>
                    </div>";
        }
    }
?>

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">

</head>

<body style="background-image: url('images/bg-signup.png');">
    <div class="container col-8" style="background-color: white; margin: 80px auto; padding: 50px;">
        <h1 class="text-center" style="font-weight: 900; font-size: 52px;">The Poddcast</h1>
        <div class="row m-auto" >
            <div class="col-md-6 col-sm-12" style="border-right: lightgrey 1px solid">
                <div class="card-body">
                    <form class="container m-auto" action="auth_user.php" method="post">
                        <h5 class="card-title text-center">Sign in</h5>
                        <hr>
                        <input name="uname" class="form-control" placeholder="Username" required>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                        <div class="custom-control custom-checkbox" style="left: 10px; bottom: 5px;">
                            <input type="checkbox" class="custom-control-input" id="customCheck" name="remeberMe" CHECKED>
                            <label class="custom-control-label" for="customCheck">Keep me signed in</label>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Login</button>
                        <h5 class="card-title text-center">Login using</h5>
                        <hr>
                        <div style="width: 150px; margin: auto">
                            <button class="btn social" style="background-color: #32508e;">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </button>
                            <button class="btn social" style="background-color: #55acee;">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </button>
                            <button class="btn social" style="background-color: #dd4b39;">
                                <i class="fa fa-google" aria-hidden="true"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-6 col-sm-12" style="float: left;">
                <div class="card-body">
                    <form class="container m-auto" action="Signup.php" method="post">
                        <h5 class="card-title text-center">Create Account</h5>
                        <hr>
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                        <input type="password" class="form-control" name="confirmPass" placeholder="Re-enter password" required>

                        <button class="btn btn-primary" type="submit">Sign up</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</html>