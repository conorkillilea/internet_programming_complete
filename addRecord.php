<?php
session_start();

if (!(isset($_SESSION['login']) && $_SESSION['login'] != ''))
{
	header("Location: /ckillilea/Assignment7/ContactUsForm.php");
}
if($_POST){
$servername = $_SESSION['servername'];
$dbusername = $_SESSION['dbusername'];
$dbpassword = $_SESSION['dbpassword'];
$database =	$_SESSION['database']; 

// Set up and Test Connection
$link = mysqli_connect($servername, $dbusername, $dbpassword, $database) or die("Connection Failure");

$productname = $_POST['productname'];
$price = $_POST['price'];
$stock = $_POST['stocklevel'];
$desc = $_POST['description'];
$image = $_POST['image'];

// Update the Details
$sql = "INSERT INTO salestock (productname, price, stocklevel, description, image) VALUES ('{$productname}', '{$price}', '{$stock}', '{$desc}', '{$image}')";
$link->query($sql);
header("Location: /ckillilea/Assignment7/editStock.php");
}
?>