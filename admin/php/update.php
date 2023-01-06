<?php
include("conn.php");
$id = $_GET['id'];

$sql = "UPDATE `investment` SET `confirm`=? WHERE `id` = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([1,$id]);
echo 1;// this means that averything is set


$sql = "SELECT * FROM `investment`  WHERE `id` = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);
if($row = $stmt->fetch())
{
  $userid = $row["userid"];
  $amount = $row["amount"];
}

$sql = "UPDATE `user` SET `amount`= `amount` + ? WHERE `id` = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([(int)$amount,$userid]);

echo 1;// this means that averything is set


