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

$s_name = $_POST["m_name"];
$s_street = $_POST["m_street"];
$s_number = $_POST["m_num"];
$s_city = $_POST["m_city"];
$s_zip_code = $_POST["m_zip"];
$s_phone_num = $_POST["m_pnum"];
$s_lat = $_POST["m_lat"];
$s_long = $_POST["m_long"];
$s_tr_hub = $_POST["m_tran"];

$new_name = $_POST["new_name"];
$new_street = $_POST["new_street"];
$new_number = $_POST["new_num"];
$new_city = $_POST["new_city"];
$new_zip_code = $_POST["new_zip"];
$new_phone_num = $_POST["new_pnum"];
$new_lat = $_POST["new_lat"];
$new_long = $_POST["new_long"];
$new_tr_hub = $_POST["new_tran"];


$sql = "UPDATE local_store SET Όνομα='$new_name',Πόλη='$new_city', ΤΚ='$new_zip_code', Οδός='$new_street', Αριθμός='$new_number', Γ_Πλάτος='$new_lat', Γ_Μήκος='$new_long', Τηλέφωνο='$new_phone_num', Transit_hub='$new_tr_hub' 
WHERE  Όνομα='$s_name' AND Τηλέφωνο='$s_phone_num'";


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
if ($conn->query($sql) === TRUE) {
    echo " Record updated successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>

</div>




</body>
</html>

