<?php 
include('php/connect.php');
$uname =filter_var($_POST['u'], FILTER_SANITIZE_STRING);
$pass =filter_var($_POST['p'], FILTER_SANITIZE_STRING);
$btn =filter_var($_POST['btn'], FILTER_SANITIZE_STRING);
$where =filter_var($_POST['where'], FILTER_SANITIZE_STRING);

// echo $pass."asuodyo";
if(isset($btn)){

    //selecting all the contacts from the user table
    $select = "SELECT * from `admin` where `email`='$uname'"; 
    $res = mysqli_query($conn, $select);
    
    while($row = mysqli_fetch_assoc($res))
    {
        $password = $row['password'];
    }
    if (password_verify($pass,$password)) {
        //selecting all the contacts from the user table
        $select = "SELECT id from `admin` where `email`='$uname' AND `password`='$password'"; 
        $res = mysqli_query($conn, $select);
        
        while($row = mysqli_fetch_assoc($res))
        {
            $id = $row['id'];
        }
        echo $id."this is the id";
        $id = strval(password_hash($id, PASSWORD_DEFAULT)); 
        
        setcookie('bckadmin__90__', $id, time() + (60*60*24*7*31), "/",null,isset($_SERVER["HTTPS"]),true);
        setcookie('_ra___', password_hash('hala',PASSWORD_DEFAULT), time() + (60*60*24*7*31), "/",null,isset($_SERVER["HTTPS"]),true);
        // setcookie( 'UserName', 'Bob', 0, '/forums', 'www.example.com', isset($_SERVER["HTTPS"]), true);
        // check the url
         $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
        if (strpos($url, "backtoschfund") !== false){
            header("Location: https://admin.backtoschfund.com/home");
        }
        else{
            header("Location:./home");
        }
    
        // echo $btn;
    }
    else{
        // echo $password.'<br>';
        echo 'Password is Incorrect';
    }

}
else{
    // echo "asukhduksh";
}
?>  