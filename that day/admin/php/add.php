<?php
include('connect.php');
$uname =filter_var(mysqli_real_escape_string($conn,$_POST['uname']), FILTER_SANITIZE_STRING);
$phone =filter_var(mysqli_real_escape_string($conn,$_POST['phone']), FILTER_SANITIZE_STRING);
$email =filter_var(mysqli_real_escape_string($conn,$_POST['email']), FILTER_SANITIZE_STRING);
$link =filter_var(mysqli_real_escape_string($conn,$_POST['link']), FILTER_SANITIZE_STRING);
 
$squery = "SELECT * from `affiliate_links`";
$select = mysqli_query($conn,$squery);
$r =0;
while($row=mysqli_fetch_assoc($select)){
    $u = $row['name'];
    $p = $row['phone'];
    $e = $row['email'];
    if($u==$uname)
   {
    $r = 1;
   }
   elseif ($p==$phone) {
    $r = 2;
   }
   elseif ($e==$email) {
    $r = 3;
   }
}
//if it is eqaul with anything in the database do not run

if($r ==1)
{
    // echo "user with this name alredy exist";
    echo 2;
    return;
   //   echo $c;
}
else if($r == 2)
{
    // echo "user with this phone number alredy exist";
    echo 3;
    return;
}
else if($r == 3)
{
    // echo "user with this email alredy exist";
    echo 4;
    return;
}
else
{
   $query = "INSERT INTO `affiliate_links`(`link`, `email`, `name`, `phone`) VALUES ('$link','$email','$uname','$phone')";
   $result = mysqli_query($conn,$query);
   if(mysqli_affected_rows($conn)>0){
   echo 1;
    }
    else{
       echo 0;
    }
}
?>