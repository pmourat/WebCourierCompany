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

</head>

<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2"> 
	 <form action="login.php" method="post">
	   <h1> EMPLOYEE LOGIN</h2>
       <div class="form-group">
        <label for="unm">Username:</label>
        <input type="text" class="form-control" id="unm" placeholder="Enter username" name="unm">
      </div>
      <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
      </div>
	  <div class="form-group"> <!-- prostethike meta-->
	    <!--<a class="btn btn-default" role="button">Submit</a>-->
	    <input id="sub" type="submit" value="Login">
	  </div>
     </form>
	
   </div> 
  </div>
</div>
</body>
</html>