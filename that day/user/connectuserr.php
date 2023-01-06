<?php 
include('./assets/php/connect.php');
$uname =filter_var($_POST['u'], FILTER_SANITIZE_STRING);
$pass =filter_var($_POST['p'], FILTER_SANITIZE_STRING);
$btn =filter_var($_POST['btn'], FILTER_SANITIZE_STRING);
$where =filter_var($_POST['where'], FILTER_SANITIZE_STRING);

// echo $pass."asuodyo";
if(isset($btn)){

    //selecting all the contacts from the user table
    $select = "SELECT * from `user` where `email`=?"; 
    $stmt = $conn->prepare($select);
    $stmt->execute([$uname]);
    $row = $stmt->fetch();
    if ($row == true) {
        $password = $row['password'];
    }
    
    if (password_verify($pass,$password)) {
        //selecting all the contacts from the user table
        $select = "SELECT `id`from `user` where `email`=? AND `password`=?"; 
        $stmt = $conn->prepare($select);
        $stmt->execute([$uname,$password]);
        $row = $stmt->fetch();
        if ($row == true) {
            $id = $row['id'];
        }
        else {
            echo "boyoyo<br>";
        }
        
        // echo $id."this is the id";
        $id = strval(password_hash($id, PASSWORD_DEFAULT)); 
        
        setcookie('cn_mmx', $id, time() + (60*60*24*7*31), "/",null,isset($_SERVER["HTTPS"]),true);
        setcookie('_booobs___', password_hash('boobs',PASSWORD_DEFAULT), time() + (60*60*24*7*31), "/",null,isset($_SERVER["HTTPS"]),true);

        // check the url
         $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
        if (strpos($url, "backtoschfund") !== false){
            header("Location: https://dashboard.backtoschfund.com/connectuser.php?u=$uname&p=$pass&btn=$btn");
        }
        else{
            header("Location:./dashboard-v2.html");
        }
    
        // echo $btn;
    }
    else{
        // header("Location:./");
        // echo $password.'<br>';
        // echo $pass.'<br>';
        echo 'Password is Incorrect';
    }

}
else{
    header("Location:./");

}
?>  