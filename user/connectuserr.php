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
            $mainname = $row['name'];
        }
        else {
            echo "boyoyo<br>";
        }
        
        // email here
        // email here
        $name = "CoinMaxx";
        $to = $uname;  
        $subject = "Welcome to CoinMaxx";
        $from = "info@coinmaxx.online";  
        $headers = "From: $from"; 
        // $headers = 'MIME-Version: 1.0'."\r\n";
        //$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
        
        //$text = Template::get_contents("confirm-mail.html", array('name' => $name, 'email' => $from, 'subject' => $subject, 'messages' => $message));
        $text  = 'Welcome to CoinMaxx Investment Platform
       
        CoinMaxx is a crypto mining company committed to delivering exceptional results, focused on being one step ahead. We are building a Mining platform for the long-term, setting up the standard to change the fortune of future generations to come
        
        Click https://coinmaxx.online/user/dashboard-v2.html to access your account';
        echo '<pre>';
        echo $text;
        echo '<pre>';
        
        $mail = @mail($to, $subject, $text, $headers); 
        if($mail) {
          echo "<p>Mail Sent.</p>"; 
        }
        else {
          echo "<p>Mail Fault.</p>"; 
        }
        // email end here
        // email end here
        
        
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