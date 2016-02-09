<?php include('header.php');

<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "password", "dealer_loc");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$name = mysqli_real_escape_string($link, $_POST['name_of']);
$address = mysqli_real_escape_string($link, $_POST['address_of']);
$lat = mysqli_real_escape_string($link, $_POST['latitude']);
$lng = mysqli_real_escape_string($link, $_POST['longtitude']);
$type = mysqli_real_escape_string($link, $_POST['type_of']);

 
// attempt insert query execution
$sql = "INSERT INTO markers (name, address, lat, lng, type) VALUES ('$name', '$address', '$lat', '$lng', '$type')";
if(mysqli_query($link, $sql)){
    header("Location:thankyou.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>

<?php include('footer.php') ?>