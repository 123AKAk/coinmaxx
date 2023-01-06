<?php
include("connect.php");
$selectr = "SELECT * from `investment`"; 
$stmt = $conn->prepare($selectr);
$stmt->execute();
    while($row = $stmt->fetch())
    {
        $amount = $row['amount'];
        $userid = $row['userid'];
        $confirm = $row['confirm'];
        if ($amount == 500 && $confirm == 1) {
            $daily = (10/100) * 500;
        }
        elseif ($amount == 2500 && $confirm == 1) {
            $daily = (15/100) * 2500;
        }
        elseif ($amount == 5000 && $confirm == 1) {
            $daily = (20/100) * 5000;
        }
        elseif ($amount == 1000 && $confirm == 1) {
            $daily = (8.5/100) * 1000;
        }
        elseif ($amount == 3000 && $confirm == 1) {
            $daily = (10.5/100) * 3000;
        }
        elseif ($amount == 7000 && $confirm == 1) {
            $daily = (15.5/100) * 7000;
        }

        $sql = "UPDATE `user` SET `amount`= `amount` + ? WHERE `id` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$daily,$userid]);
        echo 1;// this means that averything is set
    }



