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

$request= $_POST["town"];

$query = "SELECT * FROM local_store WHERE Πόλη LIKE '$request%'";
$result = $conn->query($query);

 if ($result->num_rows > 0) {
 
   while ($row = $result->fetch_assoc()){
	   
	  $data[]=$row;
   }

   echo json_encode($data);
 
 
 
 }
?>



