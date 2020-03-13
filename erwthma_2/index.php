<?php
  session_start();
?>
<?php
if (isset($_SESSION['session_username'])){
  session_unset();
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

ul {
width:100%;
height:50px;
margin: 0px;
border-radius:0px;
}

#master{
 margin-left:545px;
}

}
</style>

</head>

<body>




<ul>
  <p id="master">HERMES COURIER</p><br>
</ul>
<br>

<div id="login">
<form action="login.php" method="post">
  <p id="mp"><i class="fa fa-sign-in"></i> EMPLOYEE LOGIN</p>
  
  <label for="ad_unm">Username:</label>
  
  <input type="text" id="ad_unm" placeholder="Enter username" name="ad_unm"><br>
  
  <label for="ad_pwd">Password:</label>
  
  <input type="password"  id="ad_pwd" placeholder="Enter password" name="ad_pwd"><br>
  
  <input type="submit" id="ad_submit"  name="ad_submit" value="Login">
  
</form>
</div>





</body>
</html>
