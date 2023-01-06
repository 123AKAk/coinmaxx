<?php
include("connect.php");
$email = $_POST['email'];
$password = $_POST['password']; 
$name = $_POST['name'];
$ssn = $_POST['ssn'];
$front = file_get_contents($_FILES['front']['tmp_name']);
$back = file_get_contents($_FILES['back']['tmp_name']);

// check if the email used is in the database already
$sql = "SELECT * FROM `user` WHERE `email` = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$email]);
$users = $stmt->fetchAll();

$error_handling = 1;// used to collect data about a certain error in the app
foreach ($users as $i) {
    if ($i["email"] == $email) {
        $error_handling = 2;
        break;
    }
}


// checking the errors
if ($error_handling == 1) {   
    $sql = "INSERT INTO `user`(`name`, `email`, `password`, `ssn`, `D_L_front`, `D_L_back`,`amount`) VALUES (?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $newpass = password_hash($password, PASSWORD_DEFAULT);
    $stmt->execute([$name,$email,$newpass,$ssn,$front,$back,"0"]);
    
 
    echo 1;// this means that averything is set
}
elseif ($error_handling == 2) {
    echo 2;// this means that the email has been used before
}
elseif ($error_handling == 3) {
    echo 3;// this means that the phone has been used before
}
elseif ($error_handling == 4) {
    echo 4;// this means the auth does notv exist
}
else {
    echo 0;// this is an unseen error
}