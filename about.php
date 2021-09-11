<!DOCTYPE html>
<html lang="en">
<head>
    <title>About Us | Poddcast</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<!--Header-->
<?php session_start(); require_once ('Header.php');?>

<div class="jumbotron text-center" style="background-color: #55acee; color: aliceblue">
    <h1 class="display-4">Welcome!</h1>
    <p class="lead">We Specialize in Software Development.</p>
    <p class="container col-md-7 col-sm-12">Poddcast is a project where users can interact with each other with text messages and
        share files with the Poddcast-Universe (we call it Podd-Verse). All you need to do is make
        a FREE account on our site and sign-in and you're good to go</p>
    <p class="lead">
        <div class="input-group col-md-6 col-sm-12" style="margin: auto">
            <input type="email" class="form-control" size="50" placeholder="Email Address" required>
            <div>
                <button type="button" class="btn btn-primary">Subscribe</button>
            </div>
        </div>
    </p>
    <a class="btn btn-info" href="#" role="button">Contact Us</a>
</div>
<div class="container-fluid" style="background-color: aliceblue">
    <div class="container">
        <br><h2 style='font-weight: 100;'>About Company</h2>
        <hr>
        <div class="row">
            <div class="col-sm-5" style="text-align: right">
                <img src="images/ahmad.jpg" width="200" style="border-radius: 150px">
            </div>
            <div class="col-sm-6">
                <h2 style="font-weight: 100">Ahmad</h2>
                <p>
                    Hi! My name is <strong>Muhammad Ahmad</strong> and I'm a Student of BS Software Engineering
                    6th Semester in National Textile University Faiasalabad.
                    I'm very passionate about programming specially Web Application Development.
                    <br>I'm also good with Building <strong>Logics and Algorithms.</strong>
                </p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-7 text-right" >
                <h2 style="font-weight: 100 ">Danyal</h2>
                Hi! My name is <strong>Danyal Ahmad</strong> and I'm a Student of BS Software Engineering
                6th Semester in National Textile University Faiasalabad.
                I'm a programmer so i see this world with a different point of view, A point of view of and <strong>architect</strong>
                <br>I'm also good at <strong>Maths & Problem solving.</strong></p>
            </div>
            <div class="col-sm-5" style="text-align: left">
                <img src="images/danyal.jpg" width="200" style="border-radius: 150px">
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-5" style="text-align: right">
                <img src="images/muneeb.jpg" width="200" style="border-radius: 150px">
            </div>
            <div class="col-sm-7">
                <h2 style="font-weight: 100">Muneeb</h2>
                <p>
                Hi! My name is <strong>Muneeb Rafique</strong> and I'm a Student of BS Software Engineering
                6th Semester in National Textile University Faiasalabad.
                I'm good at designing and Fluent in different languages like <strong>Bangali, Marathi, Hindi & Tamil.</strong>
                <br>I'm also very good with people and management.</p>
            </div>
        </div>
    </div><br>
</div>

<div class="container text-center" style="opacity: 80%">
    <br><h2 style="font-weight: 100">Our Services</h2>
    <hr>
    <div class="row">
        <div class="col-sm-4">
            <i class="fa fa-3x fa-bolt" aria-hidden="true"></i>
            <h4>POWER</h4>
            <p>Lorem ipsum dolor sit amet..</p>
        </div>
        <div class="col-sm-4">
            <i class="fa fa-3x fa-heart" aria-hidden="true"></i>
            <h4>LOVE</h4>
            <p>Lorem ipsum dolor sit amet..</p>
        </div>
        <div class="col-sm-4">
            <i class="fa fa-3x fa-check-circle" aria-hidden="true"></i>
            <h4>JOB DONE</h4>
            <p>Lorem ipsum dolor sit amet..</p>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-sm-4">
            <i class="fa fa-3x fa-leaf" aria-hidden="true"></i>
            <h4>GREEN</h4>
            <p>Lorem ipsum dolor sit amet..</p>
        </div>
        <div class="col-sm-4">
            <i class="fa fa-3x fa-certificate" aria-hidden="true"></i>
            <h4>CERTIFIED</h4>
            <p>Lorem ipsum dolor sit amet..</p>
        </div>
        <div class="col-sm-4">
            <i class="fa fa-3x fa-laptop" aria-hidden="true"></i>
            <h4>HARD WORK</h4>
            <p>Lorem ipsum dolor sit amet..</p>
        </div>
    </div>
    <hr>
</div>

<div class="container text-center">
    <br><h1 style="font-weight: 100">We're Here</h1>
    <hr>
    <img  src="images/map.jpg" width="100%" alt="">
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
