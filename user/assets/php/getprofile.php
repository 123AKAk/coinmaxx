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

$courses = [];
// $courses = new stdClass();
$selectr = "SELECT * from `user` WHERE `id` = ?"; 
$stmt = $conn->prepare($selectr);
$stmt->execute([$userid]);
while($row = $stmt->fetch())
{
    ${'user' . $row['id']} = new stdClass();
    ${'user' . $row['id']}->name = $row["name"];
    ${'user' . $row['id']}->email = $row["email"];
    ${'user' . $row['id']}->amount = $row["amount"];
    ${'user' . $row['id']}->phone = $row["phone"];
    ${'user' . $row['id']}->street = $row["street"];
    ${'user' . $row['id']}->city = $row["city"];
    ${'user' . $row['id']}->state = $row["state"];
    ${'user' . $row['id']}->postalCode = $row["postalCode"];
    ${'user' . $row['id']}->wallet_address = $row["wallet_address"];
    ${'user' . $row['id']}->myRef = $row["myRef"];
    array_push($courses,${'user' . $row['id']});
}
echo json_encode($courses);
    }
