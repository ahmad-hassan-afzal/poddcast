<?php

class dbconn
{
    private $dbcon;
    function __construct()
    {
        $this->dbcon = new PDO("mysql: host=localhost;dbname=poddcast", "root", "");
        if(!$this->dbcon){
            die("Connection failed.");
        }
    }
//   Functions Related to Users + [Profile + Cover]
    public function Auth_User($userData){
        try{
            $st = $this->dbcon->prepare("SELECT user_id FROM `users` WHERE `username` LIKE ? AND password LIKE ?");
            $st->execute($userData);
            if($st->rowCount() > 0){
                $row = $st->fetch(); // 1st column of 1st row
                return $row[0];
            } else {
                return false;
            }
        }
        catch (Exception $ex){
            echo $ex;
        }
    }
    public function addUser($data)
    {
        try{
            $st = $this->dbcon->prepare("INSERT INTO `users` (`username`, `password`, `name`, `email`, `phone`, `about`) VALUES (?, ?, ?, ?, ?, ?)");
            $st->execute($data);
            if($st->rowCount()){
                return 1;
            }
            else{
                return 0;
            }
        }
        catch (Exception $ex){
            echo $ex;
        }
    }
    public function getUser($id){
        try{
            $st = $this->dbcon->prepare("SELECT * FROM `users` WHERE `user_id` = ?");
            $st->execute($id);
            return $st->fetch(); // 1st row
        }
        catch (Exception $ex){
            echo $ex;
        }
    }
    public function getAllUser(){
        try{
            $st = $this->dbcon->prepare("SELECT * FROM `users`");
            $st->execute();
            return $st->fetchAll();
        }
        catch (Exception $ex){
            echo $ex;
        }
    }
    public function getName($user_id){
        try{
            $st = $this->dbcon->prepare("SELECT name FROM `users` where user_id = ?");
            $st->execute($user_id);
            return $st->fetch()[0];
        }
        catch (Exception $ex){
            echo $ex;
        }
    }

//   Functions Related to Posts
    public function getAllUserPosts($userId){
        try{
            $st = $this->dbcon->prepare("SELECT * FROM `posts` WHERE `user_id` = ? ORDER BY `posts`.`post_time` DESC");
            $st->execute($userId);
            return $st->fetchAll();
        }
        catch (Exception $ex){
            echo $ex;
        }
    }
    public function getAllPosts(){
        try{
            $st = $this->dbcon->prepare("SELECT * FROM `posts` ORDER BY `posts`.`post_time` DESC");
            $st->execute();
            return $st->fetchAll();
        }
        catch (Exception $ex){
            echo $ex;
        }
    }
    public function post($data){
//        data = array(title, desc, userID, imgName)
        try{
            $st = $this->dbcon->prepare("INSERT INTO `posts` (`post_title`, `post_description`, `user_id`, `imgName`) VALUES (?, ?, ?, ?)");
            $st->execute($data);
        }
        catch (Exception $ex){
            echo $ex;
        }
    }

//   Functions Related to Images
    public function addImage($data)
    {
        $imgName = $data[0];
        $imgType = $data[1];
        $userID = $data[2];
        $query = "";

        if( $imgType == 'profile'){
            $query = "UPDATE `users` SET `profile` = '$imgName' WHERE `users`.`user_id` = $userID;";
        } elseif( $imgType == 'cover'){
            $query = "UPDATE `users` SET `cover` = '$imgName' WHERE `users`.`user_id` = $userID;";
        } elseif( $imgType == 'post'){
            $query = "INSERT INTO imgs (`imgName`) VALUES(?)";
        }
        $st = $this->dbcon->prepare($query);
        $st->execute(array($imgName));
    }
    public function getProfile($user_id){
        try{
            $st = $this->dbcon->prepare("SELECT profile FROM `users` where user_id = ?");
            $st->execute($user_id);
            return $st->fetch()[0];
        }
        catch (Exception $ex){
            echo $ex;
        }
    }
    public function getCover($user_id){
        try{
            $st = $this->dbcon->prepare("SELECT cover FROM `users` where user_id = ?");
            $st->execute($user_id);
            return $st->fetch()[0];
        }
        catch (Exception $ex){
            echo $ex;
        }
    }

//   Functions Related to Messages
    public function send_message($data){
        try{
            $st = $this->dbcon->prepare('INSERT INTO `inbox` ( `message`, `status`, `user_id`, `receiver_id`) VALUES (?, ?, ?, ?)');
            $st->execute($data);
            if ($st->rowCount() > 0) {
                header("location:Message.php");
            }
            else {
                return false;
            }
        }
        catch (Exception $ex) {
            echo $ex;
        }
    }
    public function get_messages($userid,$rcvrid)
    {
        try {
            $st = $this->dbcon->prepare("select * from inbox Where (user_id=$userid AND receiver_id=$rcvrid) OR (user_id=$rcvrid AND receiver_id=$userid) ORDER BY Created_at ASC ;");
            $st->execute(array($userid,$rcvrid));
            if ($st->rowCount() > 0) {
                $row = $st->fetchAll();
                return $row;
            }
            else {
                return false;
            }
        } catch (Exception $ex) {
            echo $ex;
        }
    }
}
?>