<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Control Panel</title>
<link rel="stylesheet" type="text/css" href="menu.css">
<link href='https://fonts.googleapis.com/css?family=Poiret One' rel='stylesheet'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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


//transit hubs
$sql= "SELECT Γ_Πλάτος FROM transit_hub ";
$result = $conn->query($sql);
$array = array();
$index=0;
if (is_object($result) && $result->num_rows > 0) {
    //echo "yparxei eggrafh";
	while ($row = $result->fetch_array(MYSQLI_ASSOC)){
	$array[$index]=$row["Γ_Πλάτος"];
	$index++;
	}
}

$sql1= "SELECT Γ_Μήκος FROM transit_hub ";
$res = $conn->query($sql1);
$array1 = array();
$in=0;
if (is_object($res) && $res->num_rows > 0) {
    //echo "yparxei eggrafh";
	while ($row = $res->fetch_array(MYSQLI_ASSOC)){
	$array1[$in]=$row["Γ_Μήκος"];
	$in++;
	}
}


$sql2= "SELECT Όνομα FROM transit_hub ";
$apotelesma = $conn->query($sql2);
$array2 = array();
$y=0;
if (is_object($apotelesma) && $apotelesma->num_rows > 0) {
    //echo "yparxei eggrafh";
	while ($row = $apotelesma->fetch_array(MYSQLI_ASSOC)){
	$array2[$y]=$row["Όνομα"];
	$y++;
	}
}


$sql3= "SELECT Οδός FROM transit_hub ";
$ap = $conn->query($sql3);
$array3 = array();
$x=0;
if (is_object($ap) && $ap->num_rows > 0) {
    //echo "yparxei eggrafh";
	while ($row = $ap->fetch_array(MYSQLI_ASSOC)){
	$array3[$x]=$row["Οδός"];
	$x++;
	}
}

$sql4= "SELECT Αριθμός FROM transit_hub ";
$apot = $conn->query($sql4);
$array4 = array();
$z=0;
if (is_object($apot) && $apot->num_rows > 0) {
    //echo "yparxei eggrafh";
	while ($row = $apot->fetch_array(MYSQLI_ASSOC)){
	$array4[$z]=$row["Αριθμός"];
	$z++;
	}
}

$sql5= "SELECT Τηλέφωνο FROM transit_hub ";
$a = $conn->query($sql5);
$array5 = array();
$w=0;
if (is_object($a) && $a->num_rows > 0) {
   // echo "yparxei eggrafh";
	while ($row = $a->fetch_array(MYSQLI_ASSOC)){
	$array5[$w]=$row["Τηλέφωνο"];
	$w++;
	}
}



//local stores 

$s1= "SELECT Γ_Πλάτος FROM local_store ";
$r1 = $conn->query($s1);
$ar_platos = array();
$i_platos=0;
if (is_object($r1) && $r1->num_rows > 0) {
    //echo "yparxei eggrafh";
	while ($row = $r1->fetch_array(MYSQLI_ASSOC)){
	$ar_platos[$i_platos]=$row["Γ_Πλάτος"];
	$i_platos++;
	}
}

$s2= "SELECT Γ_Μήκος FROM local_store ";
$r2 = $conn->query($s2);
$ar_mhkos = array();
$i_mhkos=0;
if (is_object($r2) && $r2->num_rows > 0) {
   // echo "yparxei eggrafh";
	while ($row = $r2->fetch_array(MYSQLI_ASSOC)){
	$ar_mhkos[$i_mhkos]=$row["Γ_Μήκος"];
	$i_mhkos++;
	}
}


$s3= "SELECT Όνομα FROM local_store ";
$r3 = $conn->query($s3);
$ar_onoma = array();
$i_onoma=0;
if (is_object($r3) && $r3->num_rows > 0) {
    //echo "yparxei eggrafh";
	while ($row = $r3->fetch_array(MYSQLI_ASSOC)){
	$ar_onoma[$i_onoma]=$row["Όνομα"];
	$i_onoma++;
	}
}


$s4= "SELECT Οδός FROM local_store ";
$r4 = $conn->query($s4);
$ar_odos = array();
$i_odos=0;
if (is_object($r4) && $r4->num_rows > 0) {
    //echo "yparxei eggrafh";
	while ($row = $r4->fetch_array(MYSQLI_ASSOC)){
	$ar_odos[$i_odos]=$row["Οδός"];
	$i_odos++;
	}
}

$s5= "SELECT Αριθμός FROM local_store ";
$r5 = $conn->query($s5);
$ar_arithmos = array();
$i_arithmos=0;
if (is_object($r5) && $r5->num_rows > 0) {
    //echo "yparxei eggrafh";
	while ($row = $r5->fetch_array(MYSQLI_ASSOC)){
	$ar_arithmos[$i_arithmos]=$row["Αριθμός"];
	$i_arithmos++;
	}
}

$s6= "SELECT Τηλέφωνο FROM local_store ";
$r6 = $conn->query($s6);
$ar_tilefwno = array();
$i_til=0;
if (is_object($r6) && $r6->num_rows > 0) {
    //echo "yparxei eggrafh";
	while ($row = $r6->fetch_array(MYSQLI_ASSOC)){
	$ar_tilefwno[$i_til]=$row["Τηλέφωνο"];
	$i_til++;
	}
}



$conn->close();
?>

<style>
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



<div id="map"  style="width:800px; height:500px; margin:120px auto;"></div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDV8XerR6qhJwHCUYWmzitbiME_A-4y2Tg"></script>
<script>
//transit hubs
 platos=[];
 mhkos=[];
 onoma=[];
 odos=[];
 arithmos=[];
 thlefwno=[];
 //local stores
 l_platos=[];
 l_mhkos=[];
 l_onoma=[];
 l_odos=[];
 l_arithmos=[];
 l_thlefwno=[];
 
 //transit hubs
<?php foreach($array as $x => $value) { ?>
     platos.push('<?php echo $value; ?>');
	 
<?php }?>

<?php foreach($array1 as $x => $value) { ?>
     mhkos.push('<?php echo $value; ?>');
	 
<?php }?>

<?php foreach($array2 as $x => $value) { ?>
     onoma.push('<?php echo $value; ?>');
	 
<?php }?>

<?php foreach($array3 as $x => $value) { ?>
     odos.push('<?php echo $value; ?>');
	 
<?php }?>

<?php foreach($array4 as $x => $value) { ?>
     arithmos.push('<?php echo $value; ?>');
	 
<?php }?>

<?php foreach($array5 as $x => $value) { ?>
     thlefwno.push('<?php echo $value; ?>');
	 
<?php }?>

//local stores

<?php foreach($ar_platos as $x => $value) { ?>
     l_platos.push('<?php echo $value; ?>');
	 
<?php }?>

<?php foreach($ar_mhkos as $x => $value) { ?>
     l_mhkos.push('<?php echo $value; ?>');
	 
<?php }?>

<?php foreach($ar_onoma as $x => $value) { ?>
     l_onoma.push('<?php echo $value; ?>');
	 
<?php }?>

<?php foreach($ar_odos as $x => $value) { ?>
     l_odos.push('<?php echo $value; ?>');
	 
<?php }?>

<?php foreach($ar_arithmos as $x => $value) { ?>
     l_arithmos.push('<?php echo $value; ?>');
	 
<?php }?>

<?php foreach($ar_tilefwno as $x => $value) { ?>
     l_thlefwno.push('<?php echo $value; ?>');
	 
<?php }?>

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 6,
      center: new google.maps.LatLng(39.479966, 22.540245),
      
    });

    var infowindow = new google.maps.InfoWindow();

    var mark,marker, i;
	

    for (i = 0; i < platos.length; i++) { 
	//transit hubs
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(platos[i], mhkos[i]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(onoma[i]+ '<br>'+odos[i]+' '+arithmos[i]+ '<br>'+thlefwno[i]);
          infowindow.open(map, marker);
        }
      })(marker, i));
	  
	  //local stores
	  
	  mark = new google.maps.Marker({
		  icon:'http://maps.google.com/mapfiles/ms/icons/blue-dot.png',
        position: new google.maps.LatLng(l_platos[i], l_mhkos[i]),
        map: map
      });

      google.maps.event.addListener(mark, 'click', (function(mark, i) {
        return function() {
          infowindow.setContent(l_onoma[i]+ '<br>'+l_odos[i]+' '+l_arithmos[i]+ '<br>'+l_thlefwno[i]);
          infowindow.open(map, mark);
        }
      })(mark, i));
	  
    }


</script>




</body>
</html>