<?php
	session_start();
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);

	mysql_connect("localhost", "root", "password") or die (mysql_error()); //connect to server
	mysql_select_db("auth_db") or die ("Cannot connect to db");
	$query = mysql_query("SELECT * FROM users WHERE username='$username'"); //query users table if there are matching rows equal to $username
	$exists = mysql_num_rows($query); //checks if username exists
	$table_users = "";
	$table_password = "";

	if($exists > 0) //If there are no returning rows or no existing usernames
	{
		while ($row = mysql_fetch_assoc($query)) //display all rows from query
		{
			$table_users = $row['username']; //first username row is passed onto $table_users and so on till query finishes
			$table_password = $row['password'];
		}
		if(($username == $table_users) && ($password == $table_password)) //checks if there is matching fields
		{	
			if($password == $table_password)
			{
				$_SESSION['user'] = $username; //set username in session. Serves as a global variable
				header("location: index.php");//redirects user to authenticated homepage
			}
		}else
		{
			Print '<script>alert("Incorrect Password!");</script>';
			Print '<script>window.location.assign("login.php");</script>';
		}
	}else
	{
		Print '<script>alert("Incorrect Username!");</script>';
		Print '<script>window.location.assign("login.php");</script>';
	}
?>