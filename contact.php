<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact Us | Poddcast</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>

<?php session_start(); require_once ('Header.php');?>

<div class="jumbotron text-center" style="background-color: #55acee; color: aliceblue">
    <h1 class="display-4">Welcome!</h1>
    <p class="lead">We Specialize in Software Development.</p>
    <p class="container col-md-7 col-sm-12">Poddcast is a project where users can interact with each other with text messages and
        share files with the Poddcast-Universe (we call it Podd-Verse). All you need to do is make
        a FREE account on our site and sign-in and you're good to go</p>
    <p class="lead">
    <div class="input-group col-md-6 col-sm-12" style="margin: auto">
        <input type="email" class="form-control" size="50" placeholder="Email Address" required >
        <div>
            <button type="button" class="btn btn-primary">Subscribe</button>
        </div>
    </div>
    </p>
    <a class="btn btn-info" href="about.php" role="button">About Us</a>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-7 text-center">
            <h4><i class="fa fa-5x fa-globe" aria-hidden="true"></i></h4>
            <h1 style="font-weight: 100">Podd-Verse</h1>
            <p class="lead">Lets talk about Podd-Verse...</p>
            <p>There is a universe of Poddcast's users that are connected with each others with
                only one thing and that is <strong>Poddcast</strong>. We provide people a platform
                where anyone can share anything and can talk to anyone.
            </p><p class="lead">It's a Public-Broadcast Platform. It's <strong>Poddcast</strong></p>
        </div>
        <div class="form-group col-md-4 col-md-offset-5 align-center">
            <h3>Contact Us</h3>
            <form action="">
                <div class="form-group ">
                    <label for="nme">Name:</label>
                    <input type="text" class="form-control " placeholder="Enter Your Name" name="nme">
                </div>
                <div class="form-group">
                    <label for="eml">Email:</label>
                    <input type="email" class="form-control" placeholder="Enter Your Email" name="eml">
                </div>
                <div class="form-group shadow-textarea">
                    <label for="exampleFormControlTextarea6">Feedback</label>
                    <textarea class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="3" placeholder="Write FeedBack here..."></textarea>
                </div>
                <button type="submit" class="btn btn-info col-12">Submit</button>
            </form>
        </div>
    </div>
</div>

<?php require_once('Footer.php'); ?>
</body>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</html>
