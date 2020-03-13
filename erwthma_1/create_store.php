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

$s_name = $_POST["cr_name"];
$s_street = $_POST["cr_street"];
$s_number = $_POST["cr_num"];
$s_city = $_POST["cr_city"];
$s_zip_code = $_POST["cr_zip"];
$s_phone_num = $_POST["cr_pnum"];
$s_lat = $_POST["cr_lat"];
$s_long = $_POST["cr_long"];
$s_tr_hub = $_POST["cr_tran"];


$sql = "INSERT INTO local_store (Όνομα,Πόλη, ΤΚ, Οδός, Αριθμός, Γ_Πλάτος, Γ_Μήκος, Τηλέφωνο, Transit_hub)
VALUES ('$s_name', '$s_city', '$s_zip_code','$s_street','$s_number', '$s_lat','$s_long','$s_phone_num','$s_tr_hub')";

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
    echo "New record created successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

</div>




</body>
</html>
