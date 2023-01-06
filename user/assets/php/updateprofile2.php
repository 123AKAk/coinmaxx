<?php
include("connect.php");
$wallet = $_POST["wallet"];

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

    $sql = "UPDATE `user` SET `wallet_address`=? WHERE `id` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$wallet,$userid]);
    echo 1;// this means that averything is set


