<?php
    require_once('dbconn.php');
    $db = new dbconn();
    session_start();
    $usrid = $_SESSION['UserID'];
    $rcvrid = $_GET['Receiver'];

    $messages = $db->get_messages($usrid,$rcvrid);  // we will put it in linked inbox

    $rcvr_details = $db->getUser(array($rcvrid));

    $rcvr_profile = $rcvr_details[8]; //  ['profile']

    $users = $db->getAllUser();  //All Profile

?>

<html>
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Messages | Poddcast</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        @media (max-width:767px)
        {
            .hidden-xs{display:none!important}
        }
        .message{
            border-radius:15px;
            height: 30px;
            margin: 2px 5px;
            clear: both;
            padding: 5px 10px;
            font: 16px sans-serif;
        }
        ::-webkit-scrollbar {
            width: 5px;
        }
        ::-webkit-scrollbar-track {
            background: #a3a3a3;
        }
        ::-webkit-scrollbar-thumb {
            background: #e2e2e2;
            border-radius: 5px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #b1b1b1;
        }
    </style>

</head>
<body>

    <div class="row" style="height: 100%;">

        <div class="hidden-xs col-md-3 text-center" style="overflow-y: scroll; height: 100%; max-height: 100%; background-image: url('images/bg-people.png');">

            <div>
                <a href="Profile.php?id=<?php echo $usrid; ?>">
                    <img src='uploads/<?php echo $db->getProfile(array($usrid))?>' width='50px' height='50px' style='border-radius: 100px; margin-top: -20px'>
                </a>
                <span style="color: #325d80; font-size: 40px;"> | </span>
                <span style="color: #325d80; font-size: 40px; font-weight: bold">
                    <i class='fa fa-globe' aria-hidden='true'></i> Discover
                </span>
                <hr color="#325d80">
            </div>

            <?php
            foreach ($users as $user) {
                $name = $user[3];
                $username = $user[1];
                $userID = $user[0];

                $profile = $user[8];
                if( $usrid!=$userID) {
                    echo "
                        <div class='card mb-1 mx-3'>
                            <div class='card-body'>
                                <div class='row'>
                                    <div class='col-2'>
                                        <img src='uploads/$profile' width='50px' height='50px' style='border-radius: 100px'>
                                    </div>
                                    <div class='col-10'>
                                        <h5 class='mt-2 ml-1'><a href='Message.php?Sender=$usrid&Receiver=$userID' style='color: #3f3f3f'>
                                        $name</a></h5>
                                        <h6 style='margin-top: -12px; color: #666666;'>@$username</h6>
                                    </div>
                                </div>
                            </div>
                        </div>";
                }
            }
            ?>

        </div>

        <div class="col-md-9" style="background-image: url('images/bg-msgs.jpg');">
            <div class="col-10 mx-auto">
                <div class="mainnav mt-2" style="color: #666666;">
                <img src="uploads/<?php echo $rcvr_profile;?>" width="50" height="50" class="rounded-circle"
                            style="overflow: hidden; border: #666666 2px solid">
                    <h3 style="display: inline-block; color: #4b4b4b"> &nbsp; <?php echo $rcvr_details['name'];?></h3>
                    <a class="btn btn-outline-secondary rounded" href="Profile.php?id=<?php echo $rcvrid;?>" style="float: right; margin-top: 10px">
                        <strong>Visit Profile</strong>
                    </a>
                    <h6 style="margin-top: -20px; margin-left: 60px; color: #4b4b4b"> &nbsp; @<?php echo $rcvr_details['username'];?></h6>
                    <hr color="lightgrey">
                </div>
                <div style="overflow-y: scroll; height: 65vh; max-height: 65vh; border-radius: 5px; scroll-behavior: smooth">
                    <?php
                    if($messages==false){
                        echo "<p style='text-align: center; color: #838383; font:35px Monotype Corsiva; margin-top:35px'>
                                    <strong>No Messages</strong></p>";
                    }
                    else{
                        foreach($messages as $message){
                            if($message[2]==$rcvrid){
                                echo"<span class='message' style='float:left;background-color:dodgerblue; color: aliceblue'>$message[1]</span><br>";
                            }
                            elseif ($message[2]==$usrid){
                                echo"<span class='message' style='float:right;background-color:white; border: solid darkgrey 1px; color: #333'>$message[1]</span><br>";
                            }
                            else
                                echo "<p style='align-items: center ;color: black; font:18px italic Calibri Light;'>No Messages</p>";
                        }
                    }
                    ?>
                    <div id="bottom"></div>
                </div>
                    <div style="margin-top: 10px">
                        <a href="#bottom" class="btn btn-secondary" style="border-radius: 25px">
                            <i class="fa fa-angle-double-down" aria-hidden="true"></i>
                        </a>
                        <form action="Addmessage.php" method="get">
                            <div class="typing form-inline " style="margin-top: 10px ;">
                                <input type="text"  class="form-control" placeholder="Type your message" name="message" style="border-radius: 25px 0px 0px 25px; width: 93%; height: 40px; border: 1px solid cadetblue;">
                                <input type="hidden" class="form-control-plaintext" name="Receiver" value="<?php echo $rcvrid?>">
                                <button type="submit" class="btn btn-lg btn-outline-info" style="border-radius: 0px 25px 25px 0px; height: 40px; width: 7%">
                                    <i class="fa fa-paper-plane" aria-hidden="true" style="margin-left: -8px"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

    </div>

</body>
</html>
