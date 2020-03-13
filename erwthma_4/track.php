<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Control Panel</title>
<link rel="stylesheet" type="text/css" href="menu.css">
<link href='https://fonts.googleapis.com/css?family=Poiret One' rel='stylesheet'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDV8XerR6qhJwHCUYWmzitbiME_A-4y2Tg"></script>

<style>
#map{
	
	margin-top:-205px;
	margin-left:400px;
	
}

#lista{
	
	margin-top:30px;
	margin-right:600px;
	margin-left:30px;
	font-style:italic;
	color:white;
	font-family: "Times New Roman";
}
#mnm{
    
    margin-top:78px;
	margin-right:600px;
	margin-left:10px;
	font-style:italic;
	color:white;
	text-decoration:none;
	font-family: "Times New Roman";
}

#ola{
	display:inline-block;
}

#m2{
	margin-left:10px;
	font-style:italic;
	color:white;
	text-decoration:none;
	font-family: "Times New Roman";
}

.navbar navbar-inverse {
	background-color:rgba(45, 45, 125, 0.48);
	font-family:  'Poiret One';
	color:white;	
}
.navbar-header {
	
	font-family:  'Poiret One';
	color:white;	
}
.nav navbar-nav {
	background-color:rgba(45, 45, 125, 0.48);
	font-family:  'Poiret One';
	color:white;	
}
.container-fluid {
	background-color:rgba(45, 45, 125, 0.48);
	font-family:  'Poiret One';
	color:white;	
}

</style>
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



$query1 = "SELECT * FROM package WHERE trn='$request'";
$result1 = $conn->query($query1);



$row = $result1->fetch_array(MYSQLI_ASSOC);

if ($result1->num_rows > 0) {

  
  
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
	    //echo $platos;
	     //echo $mhkos;
      }
  }
  else {
	  echo "i apostoli den exei ksekinisei";
  }
 
  
  
 }

 
?>



</head>

<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Hermes Courier</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="parcel_tracking.html"><i class="fa fa-envelope-o"></i> Parcel Tracking</a></li>
      <li><a href="map.php"><i class="fa fa-dot-circle-o"></i> Branch Locations</a></li>
      <li><a href="store_locator.html"><i class="fa fa-map-pin"></i> Nearest Store Locator</a></li> 
    </ul>
  </div>
</nav>

<br>
<br>
<div id="ola">
<p id="mnm">Το πακέτο έχει περάσει από τις εξής τοποθεσίες:</p>
<div id="lista">

<?php 
$query = "SELECT * FROM locations WHERE tracking_number='$request'";
$result = $conn->query($query);
if ($result->num_rows > 0) {
   while ($r= $result->fetch_assoc()){ 
	  echo $r["location"]."<br>";
   }
 }

?>
</div>
<br>
<p id="m2">Η τρέχουσα τοποθεσία του πακέτου <br>εμφανίζεται στον χάρτη!</p>

<div id="map" class="container-fluid" style="width:700px;height:460px"></div>
</div>

<script>

var valp=<?php echo $platos; ?>;
var valm=<?php echo $mhkos; ?>;


    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 6,
      center: new google.maps.LatLng(39.479966, 22.540245),
      
    });

    

    var mark;
                   mark = new google.maps.Marker({
                     position: new google.maps.LatLng(valp,valm),
                     map: map
                   });

      

</script>


</body>
</html>

