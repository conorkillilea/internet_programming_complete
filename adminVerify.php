<?php
   
$servername = 'danu6.it.nuigalway.ie';
$dbusername = 'mydb2046kc';
$dbpassword = 'xi8tuz';
$database = 'mydb2046';  

if($_POST)
{
// Set up and Test Connection
$link = mysqli_connect($servername, $dbusername, $dbpassword, $database) or die("Connection Failure");

$myusername = $_POST['username'];
$mypassword = $_POST['password']; 
	  
$sql = "SELECT userid FROM users WHERE username = '{$myusername}' and password = '{$mypassword}'";

$result = $link->query($sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

$count = mysqli_num_rows($result);
      
// If result matched $myusername and $mypassword, table row must be 1 row
if($count == 1) {
	$_SESSION['username'] = $myusername;
	$_SESSION['username'] = $mypassword;
	
	header("Location: /ckillilea/Assignment7/adminPage.php");
      }else {
       header("Location: /ckillilea/Assignment7/ContactUsForm.php");
      }	  
}
//$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>