<?php
include('connect.php');
$id = $_GET['i'];
$amount = "";
$type_of_transaction = "";
$date = "";


$select = "SELECT * from `transaction_history` where `userid`  = $id"; 
$res = mysqli_query($conn, $select);
while($row = mysqli_fetch_assoc($res))
{
    $amount .= $row['amount']."|";
    $type_of_transaction .= $row['type_of_transaction']."|";
    $date .= $row['date']."|";
   
}


$select = "SELECT * from `user` where `id`  = $id"; 
$res = mysqli_query($conn, $select);
while($row = mysqli_fetch_assoc($res))
{
    $user = $row['fname'];
   
}

echo $amount.','.$type_of_transaction.','.$date.','. $user;
?>