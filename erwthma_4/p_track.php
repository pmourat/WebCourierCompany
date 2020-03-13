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

$request= $_POST["trn"];

$query = "SELECT * FROM locations WHERE tracking_number='$request'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
   while ($r= $result->fetch_assoc()){ 
	  echo $r["location"]."<br>";
   }
 }

 
 
 
 $query1 = "SELECT * FROM package WHERE trn='$request'";
$result1 = $conn->query($query1);



$row = $result1->fetch_array(MYSQLI_ASSOC);

if ($result1->num_rows > 0) {

  echo "geia";
  
  if ($row["status"]=="pending") {
	  
	  $apot=$row["Τοποθεσία"];
      $q = "SELECT Γ_Πλάτος,Γ_Μήκος FROM transit_hub WHERE Πόλη='$apot'";
      $res = $conn->query($q);
      if ($res->num_rows > 0) {
	     $r = $res->fetch_array(MYSQLI_ASSOC);
	     $platos=$r["Γ_Πλάτος"];
	     $mhkos=$r["Γ_Μήκος"];
	     //echo $platos;
	     //echo $mhkos;
      }
  }
  else if ($row["status"]=="delivered"){
	  
	  $apot=$row["Local_dest"];
	  $q = "SELECT Γ_Πλάτος,Γ_Μήκος FROM local_store WHERE Όνομα='$apot'";
	  $res = $conn->query($q);
      if ($res->num_rows > 0) {
	     $r = $res->fetch_array(MYSQLI_ASSOC);
	     $platos=$r["Γ_Πλάτος"];
	     $mhkos=$r["Γ_Μήκος"];
	    echo $platos;
	    echo $mhkos;
      }
  }
  else {
	  echo "i apostoli den exei ksekinisei";
  }
 
  
  
 }
 
 
?>
