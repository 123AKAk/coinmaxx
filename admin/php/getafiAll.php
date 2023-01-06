<?php
include('connect.php');
$userid = $_COOKIE['bckadmin__90__'];
    $link = "";
    $email = "";
    $name = "";
    $phone = "";
$select = "SELECT * FROM `affiliate_links`"; 
$res = mysqli_query($conn, $select);
while($row = mysqli_fetch_assoc($res))
{
    $link .= $row['link']."|";
    $email .= $row['email']."|";
    $name .= $row['name']."|";
    $phone .= $row['phone']."|";
    
}
echo $link.','.$email.','.$name.','.$phone;
?>