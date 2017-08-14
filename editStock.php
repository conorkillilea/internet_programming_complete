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
    <title>Stock</title>
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
<form method = "post" action = "edit.php">
<table class = "table_list">
<tr>
<th> ID </th>
<th>Name</th>
<th>Price</th>
<th>Amount</th>
<th>Description</th>
<th>Image</th>
<th><a href="http://danu6.it.nuigalway.ie/ckillilea/Assignment7/addRecord.html" class="editbutton">Add Stock</a></th>
</tr>
<?php

	$link = mysqli_connect($servername, $dbusername, $dbpassword, $database) or die("Connection Failure");	
	$sql = "SELECT * FROM salestock";
	$id = '';

	$result = $link->query($sql);
	while($row = mysqli_fetch_array($result)) { 
	$id = $row['productid'];
		echo "<tr>";
		echo "<td>" . $row['productid'] . "</td>";
		echo "<td>" . $row['productname'] . "</td>";
		echo "<td>" . $row['price'] . "</td>";
		echo "<td>" . $row['stocklevel'] . "</td>";
		echo "<td>" . $row['description'] . "</td>";
		echo "<td> <img src='stockimages/".$row['image']."'</td>";
		echo "<td> <a href = 'http://danu6.it.nuigalway.ie/ckillilea/Assignment7/edit.php?id=".$row['productid']. "'> Edit </a> </td>";
		echo "<td> <a href = 'http://danu6.it.nuigalway.ie/ckillilea/Assignment7/delete.php?id=".$row['productid']. "'> Delete </a> </td>";
		echo "</tr>";
	}
	?>
</table>
</form>
<ul class="tabs  primary-nav">
    <li class="tabs__item">
<a href="http://danu6.it.nuigalway.ie/ckillilea/Assignment7/ContactUsForm.php" class="tabs__link">Back to Contact Form</a>
</li>
</ul>
</body>
<? 
session_destroy();
?>
</html>
