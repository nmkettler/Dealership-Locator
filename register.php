<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dealer Locator Sign In</title>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="js/siteFunc.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="https://maps.google.com/maps/api/js?sensor=false"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>

  <body class="coverpage">
            <img src="photos/CDKLogo.png" class="center-block cdkimg" width="315" height="177"/>
    
    <div class="container">
    	<form action="register.php" class="form-signin form_plat" method="POST">            
        <h2 class="form-signin-heading">Registration Page</h2>
        <a href="index.php">Click here to go back</a><br/><br/>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="text" name="username" id="inputEmail" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <input type="submit" class= "btn btn-default" value="Register"/> 
      </form>

    </div> <!-- /container -->

  </body>
</html>

<?php
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$username = mysql_real_escape_string($_POST['username']);
		$password = mysql_real_escape_string($_POST['password']);
		$bool = true;

		mysql_connect("localhost", "root","password") or die (mysql_error()); //connect to server
		mysql_select_db("auth_db") or die ("Cannot connect to DB"); //connect to DB
		$query = mysql_query("SELECT * FROM users"); //Query the users table
		while($row = mysql_fetch_array($query))
		{
			$table_users = $row['username']; //first username row is passed to $table_users until query is finishe
			if($username == $table_users) //checks if there is matching fields
			{
				$bool = false;
				Print '<script>alert("Username has been taken!");</script>';
				Print '<script>window.location.assign("register.php");</script>';
			}
		}
		if ($bool)
		{
			mysql_query("INSERT INTO users (username, password) VALUES ('$username', '$password')"); //Inserts value to table users
			Print '<script>alert("Successfully Registered!");</script>';
			Print '<script>window.location.assign("register.php");</script>';
		}

	}

?>

