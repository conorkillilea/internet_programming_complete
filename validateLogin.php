<?php
// Database Details
$servername = 'danu6.it.nuigalway.ie';
$dbusername = 'mydb2046kc';
$dbpassword = 'xi8tuz';
$database = 'mydb2046';

if($_POST)
{
// Set up and Test Connection
$link = mysqli_connect($servername, $dbusername, $dbpassword, $database) or die("Connection Failure");

// username and password sent from form 
$myusername = $_POST['username'];
$mypassword = $_POST['password']; 

// Query the Users table to check authorisation
$sql = "SELECT userid FROM users WHERE username = '{$myusername}' and password = '{$mypassword}'";

// Get results returned from query
$result = $link->query($sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
// Count of rows returned
$count = mysqli_num_rows($result);
      
// If result matched $myusername and $mypassword, table row must be 1 row
if($count == 1) {
	session_start();
	$_SESSION['login'] = $_POST['username'];
	$_SESSION['servername'] = 'danu6.it.nuigalway.ie';
	$_SESSION['dbusername'] = 'mydb2046kc';
	$_SESSION['dbpassword'] = 'xi8tuz';
	$_SESSION['database'] = 'mydb2046'; 
	header("Location: /ckillilea/Assignment7/adminPage.php");
      }else {
       header("Location: /ckillilea/Assignment7/ContactUsForm.php");
      }	  
}
?>