<?php
include("connect.php");
$email = $_POST['email'];
$phone = $_POST['phone']; 
$name = $_POST['name'];

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
        }

    $sql = "UPDATE `user` SET `name`=?,`email`=?,`phone`=? WHERE `id` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$name,$email,$phone,$userid]);
    echo 1;// this means that averything is set


