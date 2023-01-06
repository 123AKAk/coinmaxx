<?php
include("conn.php");

$courses = [];
// $courses = new stdClass();
$selectr = "SELECT * from `user` "; 
$stmt = $conn->prepare($selectr);
$stmt->execute();
while($row = $stmt->fetch())
{
    ${'user' . $row['id']} = new stdClass();
    ${'user' . $row['id']}->id = $row["id"];
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
    // ${'user' . $row['id']}->D_L_back = $row["D_L_back"];
    // ${'user' . $row['id']}->D_L_front = $row["D_L_front"];
    ${'user' . $row['id']}->ssn = $row["ssn"];
    array_push($courses,${'user' . $row['id']});
}
// print_r($courses);
echo json_encode($courses);