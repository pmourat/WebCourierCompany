<?php
session_start();
?>
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
 // echo "Connected successfully  ";
 $num=$_POST["trn"];
 
 if (isset($_SESSION['session_username']) && !empty($_SESSION['session_username'])) {
 
 $unm=$_SESSION['session_username'];
 $query = "SELECT * FROM local_employee WHERE username='$unm'";
 $res = $conn->query($query);
 $row = $res->fetch_array(MYSQLI_ASSOC);
 $apot=$row["local_store"];


 $q = "SELECT * FROM local_store WHERE Όνομα='$apot'";
 $result = $conn->query($q);
 if ($result->num_rows > 0) {
	//echo "geia";
 }
 $r = $result->fetch_array(MYSQLI_ASSOC);
 $apotelesma=$r["Πόλη"];

 $sql = "UPDATE package SET status='delivered',Τοποθεσία='$apotelesma' WHERE  trn='$num' ";
 }
?>

	

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">

<link rel="stylesheet" type="text/css" href="menu_style.css">
<link href='https://fonts.googleapis.com/css?family=Poiret One' rel='stylesheet'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
#msg{
	margin-top:80px;
	font-size:18px;
	font-family:"Poiret One";
	color:white;
	font-style:italic;
}
</style>
</head>

<body>



<ul>
  <p id="master">HERMES COURIER</p><br>
  <li><a href="home.html"><i class="fa fa-home"></i> Home</a></li>
  <li><a href="new_order.html"><i class="fa fa-map-pin"></i> New Order</a>
  
 
  </li>
  <li><a href="track_order.html"><i class="fa fa-user-circle"></i> Track Order</a>
 
   </li>
  <li><a href="delivery_conf.html"><i class="fa fa-user-circle-o"></i> Delivery Confirmation</a>
 
  </li>
  <li><a href="index.php"><i class="fa fa-sign-out"></i> Logout</a></li>
 
  
</ul>
<br>

<div id="msg">
<?php
if ($conn->query($sql) === TRUE) {
	
	echo "Record updated successfully!";
	
  }
  
$conn->close();
?>

</div>


</body>
</html>


