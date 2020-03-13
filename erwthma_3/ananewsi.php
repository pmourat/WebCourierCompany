<?php
session_start();
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
if (isset($_SESSION['session_username'])){

$qr = $_POST["res"];
$qr1 = strip_tags($qr);
$var_value=$_SESSION['loc'];
$time=$_POST["time"];

$sql= "UPDATE package SET Τοποθεσία='$var_value',status='pending' WHERE trn='$qr1'";
$result = $conn->query($sql);
if (is_object($result) && $result->num_rows > 0) {
    //echo "yparxei eggrafh";
}
if ($conn->query($sql) === TRUE){
	echo "record updated successfully<br>";
} else {
	echo "error updating records";
}


$query="INSERT INTO locations (date,tracking_number,location) VALUES ('$time','$qr1','$var_value')";
if ($conn->query($query) === TRUE){
	echo "Record created successfully<br>";
} else {
	echo "error updating records";
}


}
$conn->close();

?>

<!DOCTYPE html>
<html>
<head>
  <title>Transit Hub</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="file:///C:/wamp64/www/sample/erwthma_2/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Poiret One' rel='stylesheet'>
  <link rel="stylesheet" type="text/css" href="style1.css">
  <style>
     .btn-group-vertical{
		 float:left;
	     padding: 40px;
         width:300px;
	     height:400px;
		 color:white;
		 border-radius:8px;
		 font-family:  'Poiret One';
		
    }
  </style>
</head>
<body>
<div class="btn-group-vertical">
<a href="logout.php">
  <button type="button" class="btn btn-primary">Log out</button>
</a>  
</div>
</div>
</body>
</html>