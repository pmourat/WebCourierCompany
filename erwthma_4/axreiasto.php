<?php
 
$servername = "localhost";
$username = "root";
$password = "";
$db = "hermes_courier";

// Create 
$conn = new mysqli($servername, $username, $password, $db);

mysqli_set_charset($conn,"utf8");


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully  ";





$sql2 = "INSERT INTO locations VALUES ('2017-08-30 21:54:00','TH1501101833KA','Αθήνα')";
$result = $conn->query($sql2);



 
?>



