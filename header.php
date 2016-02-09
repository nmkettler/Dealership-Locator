
<!DOCTYPE html>
<?php include('config.php') ?>



  <?php 
  session_start(); 
  if(!isset($_SESSION['user'])) { 
      header("Location: login.php"); 
} 
?>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dealership Location</title>

    <!-- Bootstrap core CSS -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="https://maps.google.com/maps/api/js?sensor=false"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">

  </head>

  <body onload="load()">
    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="navba">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <a href="index.php" class="pull-left"><img src="photos/CDKLogo.png" id="logo" width="230" height="134"></a>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="index.php" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-home" id="homebtn"></i></a>
            </li>
            <li>
              <a href="adddealership.php" role="button" aria-haspopup="true" aria-expanded="false">Add Dealership</a>             
            </li>
            <li>
              <a href="logout.php" role="button" aria-haspopup="true" aria-expanded="false">Logout</a>             
            </li>
          </ul>
        </div>
        <!--/.nav-collapse -->
      </div>
    </nav>