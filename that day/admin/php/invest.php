<?php
include('conn.php');
$id = $_GET['i'];

$courses = [];
// $courses = new stdClass();
$selectr = "SELECT * from `investment` WHERE `userid` = ?"; 
$stmt = $conn->prepare($selectr);
$stmt->execute([$id]);
while($row = $stmt->fetch())
{
    ${'user' . $row['id']} = new stdClass();
    ${'user' . $row['id']}->id = $row["id"];
    ${'user' . $row['id']}->package = $row["package"];
    ${'user' . $row['id']}->amount = $row["amount"];
    ${'user' . $row['id']}->date = $row["date"];
    ${'user' . $row['id']}->confirm = $row["confirm"];
    array_push($courses,${'user' . $row['id']});
}
// print_r($courses);
echo json_encode($courses);
?>