<?php
  session_start();
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
<?php
session_unset();
?>
<div class="btn-group-vertical">
<a href="index.php">
  <button type="button" class="btn btn-primary">Login</button>
</a>  
</div>
</div>
</body>
</html>