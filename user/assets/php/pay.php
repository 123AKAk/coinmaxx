<?php
include("connect.php");
if (isset($_COOKIE['cn_mmx'])) {
    $userid = $_COOKIE['cn_mmx'];
    $selectr = "SELECT * from `user`";  
    $stmt = $conn->prepare($selectr);
    $stmt->execute();
        while($row = $stmt->fetch())
        {
            $id = $row['id'];
            if (password_verify($id,$userid)) {
                $userid = $id; 
            break;
            }
          
            
        }
     $error_handling = 1;// used to collect data about a certain error in the app
    $i = $_GET['i'];
    $a = $_GET['a'];
     $sql = "INSERT INTO `investment`(`userid`, `package`,`amount`,confirm) VALUES (?,?,?,?)";
     $stmt = $conn->prepare($sql);
     $newpass = password_hash($password, PASSWORD_DEFAULT);
     $stmt->execute([$userid,$i,$a,0]);
    
     echo 1;// this means that averything is set
    }
