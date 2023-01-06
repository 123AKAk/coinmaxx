<?php
include("connect.php");
$email = $_POST['email'];
$password = $_POST['password']; 

$error_handling = 1;// used to collect data about a certain error in the app

$sql = "SELECT * FROM `user` WHERE `email` = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$email]);
$row = $stmt->fetch();
if ($row == true) {
    if (!password_verify($password,$row["password"])) {
        $error_handling = 3;
    }   
}
else{
    $error_handling = 2;
}

if ($email == "0") {
    $error_handling = 4;
}
elseif ($email == "1") {
    $error_handling = 5;

}

// checking the errors
if ($error_handling == 1) {   
    echo 1;// this means that averything is set
}
elseif ($error_handling == 2) {
    echo 2;// this means that the email is wrong
}
elseif ($error_handling == 3) {
    echo 3;// this means the password is wrong
}
elseif ($error_handling == 4) {
    echo 4;// this means the person has not paid
}
elseif ($error_handling == 5) {
    echo 5;// this means the person has paid but it has not been processed yet
}
else {
    echo 0;// this is an unseen error
}