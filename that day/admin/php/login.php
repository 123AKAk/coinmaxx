<?php 
include('connect.php');
 
    $uname =filter_var(mysqli_real_escape_string($conn,$_POST['uname']), FILTER_SANITIZE_STRING);
    $password =filter_var(mysqli_real_escape_string($conn,$_POST['pass']), FILTER_SANITIZE_STRING);
    # code...
    $query = "SELECT * From `admin` where `email` = '$uname'";
    $result = mysqli_query($conn,$query);
    if($row = mysqli_fetch_assoc($result)){
        $pass = $row['password'];
        if (password_verify($password,$pass)) {
            echo 1;
        }
        else{

            echo 'Password is Incorrect';
            // echo $pass;
        }
    }
    else{
        echo 'Username is Incorrect';
    }

        // echo '<br>uname: '. $uname;
        // echo '<br>pass: '. $password;
        
?>
