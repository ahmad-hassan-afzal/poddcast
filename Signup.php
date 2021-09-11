<?php

    $email = $_POST["email"];
    $pass = $_POST["password"];
    $confirmpass = $_POST["confirmPass"];

    if ($pass != $confirmpass) {
        header("Location:login.php?msg=MatchPasswords");
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body style="background-image: url('images/bg-signup.png') ">

<div class="container col-md-8 mt-5 pt-5" style="background-color: white;">
    <div class="sub-container" style="@media (max-width: 768px;) { width: 100%; }">
        <h1 class="text-center" style="font-weight: 900; font-size: 52px;">Poddcast</h1>

        <form action="addUser.php" method="POST" style="margin-top: 20px;">

            <div class="input-group mb-3">
                <div class="input-group-prepend hidden-sm">
                    <span class="input-group-text">Name</span>
                </div>
                <input class="form-control col-md-6 col-sm-12" type="text" placeholder="First Name" name="fname">
                <input class="form-control col-md-6 col-sm-12" type="text" placeholder="Last Name" name="lname">
            </div>
            <?php
            if(isset($email) && isset($pass)){
                echo "<input class='form-control' type='email' placeholder='Email' name='email' value='$email'>
               <input class='form-control' type='password' placeholder='Password' name='password' value='$pass'>";
            }
            else{
                header("Location:login.php?msg=EnterEmailPass");
            }
            ?>
            <div class="input-group mb-3">
                <div class="input-group-prepend"><span class="input-group-text">@</span></div>
                <input class="form-control" type="text" placeholder="Username" name="uname" value="<?php echo strstr($email, '@', true);?>">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend"><span class="input-group-text">
                    <i class="fa fa-phone" aria-hidden="true"></i></span></div>
                <input class="form-control" type="text" placeholder="Phone" name="phone">
            </div>
            <div class="form-group shadow-textarea mt-3">
            <textarea class="form-control z-depth-1" id="exampleFormControlTextarea6" name="about" rows="2"
                      placeholder="Write Something About You" required></textarea>
            </div>

            <button class="btn btn-primary mb-5" type="submit" name="submit">Submit</button>
        </form>
    </div>
</div>
<?php require_once('Footer.php');?>
</body>


















<!--    <div class="container-fluid">-->
<!--        <div class="container" style="height: 660px; width: 1050px; background-color: #ebf0f5;">-->
<!--            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 bg-img">-->
<!--                <img src="images/bg_signup_m.png" />-->
<!--            </div>-->
<!--            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">-->
<!--                <form class="sign-up" action="addImage.php" method="post">-->
<!--                    <h1 class="text-center" style="font-weight: 900; font-size: 48px;">The Poddcast-->
<!--                    </h1>-->
<!--                    <hr>-->
<!--                    <h5 class="text-center">Sign Up</h5>-->
<!--                    <input type="text" class="form-control" placeholder="Name" required>-->
<!--                    <input type="uname" class="form-control" placeholder="Username" required>-->
<!--                    <input type="email" class="form-control" placeholder="Email" required>-->
<!--                    <input type="password" class="form-control" placeholder="Password" required>-->
<!--                    <input type="password" class="form-control" placeholder="Re-enter password" required>-->
<!---->
<!--                    <div class="custom-file" style="border-radius: 30px; margin-bottom: 10px;">-->
<!--                        <input type="file" class="custom-file-input" name="image" id="image">-->
<!--                        <label class="custom-file-label" for="image">Choose </label>-->
<!--                    </div>-->
<!--                    <div class="custom-control custom-checkbox"-->
<!--                        style="margin-bottom: 10px; margin-left: 10px; margin-top: -5px;">-->
<!--                        <input type="checkbox" class="custom-control-input" id="customCheck">-->
<!--                        <label class="custom-control-label small_text" for="customCheck">-->
<!--                            Keep me signed in</label>-->
<!--                    </div>-->
<!--                    <button type="submit" name="insert" id="insert" class="btn btn-primary">Sign up</button>-->
<!--                    <a href="login.php" class="btn btn-outline-primary">Log In</a>-->
<!--                    <p id="privacyTerms" class="small_text">-->
<!--                        By signing up, you agree to our <a href="#">terms of use</a>, <a href="#">privacy-->
<!--                            policy</a>, <a href="#">and cookie policy</a>.-->
<!--                    </p>-->
<!--                </form>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->

<script>
    $(document).ready(function(){
        $('#insert').click(function(){
            var image_name = $('#image').val();
            if(image_name == '')
            {
                alert("Please Select Image");
                return false;
            }
            else
            {
                var extension = $('#image').val().split('.').pop().toLowerCase();
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
                {
                    alert('Invalid Image File');
                    $('#image').val('');
                    return false;
                }
            }
        });
    });
</script>

</body>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</html>




















