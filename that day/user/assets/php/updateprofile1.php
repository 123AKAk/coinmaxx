<?php
include("connect.php");
$street = $_POST["street"];
$city = $_POST["city"];
$state = $_POST["state"];
$postalCode = $_POST["postalCode"];
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

    $sql = "UPDATE `user` SET `street`=?,`city`=?,`state`=?,`postalCode`=? WHERE `id` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$street,$city,$state,$postalCode,$userid]);
    echo 1;// this means that averything is set


