<?php
session_start();

if (!(isset($_SESSION['login']) && $_SESSION['login'] != ''))
{
	header("Location: /ckillilea/Assignment7/ContactUsForm.php");
}

$servername = $_SESSION['servername'];
$dbusername = $_SESSION['dbusername'];
$dbpassword = $_SESSION['dbpassword'];
$database =	$_SESSION['database']; 

?>

<html>
<head>
    <title>Admin Pages</title>
    <link rel="stylesheet" type="text/css" href="styles.css"/>
	<link rel="stylesheet" type="text/css" href="listingstyle.css"/>
</head>
<body>

<div id = "header" style="position:relative; text-align:center">
	<img src = "images/Logo1.png" width = "500" height = "145" >
		<h1 style="color:#66b2ff; font-size:20px;">Grupetto Cycling &copy </h1>
	</div>
</body>

<ul class="tabs  primary-nav">
    <li class="tabs__item">
        <a href="http://danu6.it.nuigalway.ie/ckillilea/Assignment7/showContactUs.php" class="tabs__link">Contacts</a>
    </li>
    <li class="tabs__item">
        <a href="http://danu6.it.nuigalway.ie/ckillilea/Assignment7/editStock.php" class="tabs__link">Stock</a>
    </li>
</ul>
<hr>
</html>
