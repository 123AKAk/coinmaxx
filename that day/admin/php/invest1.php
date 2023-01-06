<?php
include('conn.php');


$courses = [];
// $courses = new stdClass();
$selectr = "SELECT * from `investment`"; 
$stmt = $conn->prepare($selectr);
$stmt->execute();
while($row = $stmt->fetch())
{
    ${'user' . $row['id']} = new stdClass();
    ${'user' . $row['id']}->id = $row["id"];
    ${'user' . $row['id']}->package = $row["package"];
    $selectu = "SELECT * from `user` where `id` = ?"; 

    // this is getting the names
    $stmtu = $conn->prepare($selectu);
    $stmtu->execute([$row["userid"]]);
    if($roww = $stmtu->fetch()){
        ${'user' . $row['id']}->name =  $roww["name"];
     }

    ${'user' . $row['id']}->amount = $row["amount"];
    ${'user' . $row['id']}->date = $row["date"];
    ${'user' . $row['id']}->confirm = $row["confirm"];
    array_push($courses,${'user' . $row['id']});
}
// print_r($courses);
echo json_encode($courses);
?>