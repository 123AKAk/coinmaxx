<?php
include("connect.php");

function update($paramid){
    include("connect.php");
    if (isset($_COOKIE['_b_90_s_'])) {
        $userid = $_COOKIE['_b_90_s_'];
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

    $sql = "UPDATE `user` SET  `identity`=? WHERE `id` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$paramid,$userid]);
    echo 1;// this means that averything is set
}

$sql = "SELECT * FROM `user`";
$stmt = $conn->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll();

foreach ($users as $i) {
    $id = $i["id"] ;
}
$numlength = strlen((string)$id);
// $id = $id + 1;
if ($numlength == 1) {
    $identity = "BS-000".$id;
    update($identity);
     echo 1;
}
else if ($numlength == 2) {
    $identity = "BS-00".$id;
    update($identity);
     echo 1;
}
else if ($numlength == 3) {
    $identity = "BS-0".$id;
    update($identity);
     echo 1;
}
else if ($numlength == 4) {
    $identity = "BS-".$id;
    update($identity);
     echo 1;
}
else{
    echo "error";
}
