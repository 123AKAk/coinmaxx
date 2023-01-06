<?php
$host = "localhost";
$user="coinmaxx_real";
$password = "aS037Z5ssZX3";
$db = "coinmaxx_real";

// $host = "localhost";
// $user="root";
// $password = "";
// $db = "coinmaxx";

//set DSN
$dsn = "mysql:host=$host; dbname=$db";
//create instance
$conn = new PDO($dsn,$user,$password);
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
// $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

?> 