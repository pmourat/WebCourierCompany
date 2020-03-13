<?php
session_start();
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "hermes_courier";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);
mysqli_set_charset($conn,"utf8");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";


if (isset($_SESSION['session_username']) && !empty($_SESSION['session_username'])) {
$s_fname = $_POST["cr_fnm"];
$s_lname = $_POST["cr_lnm"];
$s_unm = $_POST["cr_unm"];
$s_pwd = $_POST["cr_pwd"];
$s_hub = $_POST["cr_hub"];




}


?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Control Panel</title>
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
  <li><a href="local_store.html"><i class="fa fa-map-pin"></i> Local Store</a>
  
 
  </li>
  <li><a href="local_employee.html"><i class="fa fa-user-circle"></i> L. Employee</a>
 
   </li>
  <li><a href="transit_employee.html"><i class="fa fa-user-circle-o"></i> T. Employee</a>
 
  </li>
  <li><a href="index.php"><i class="fa fa-sign-out"></i> Logout</a></li>
 
  
</ul>
<br>

<div id="msg">
<?php

$query="SELECT username FROM transit_employee WHERE username='$s_unm'";
$result=$conn->query($query);
if ($result->num_rows > 0) {
	echo "Username already exists!";
}
else {
$sql = "INSERT INTO transit_employee (username,password,όνομα,επίθετο, transit_hub) VALUES ('$s_unm','$s_pwd','$s_fname','$s_lname','$s_hub')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}
$conn->close();
?>

</div>




</body>
</html>