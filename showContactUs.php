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
    <title>Contacts</title>
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
<table class = "table_list">
<tr>
<th> # </th>
<th>Category</th>
<th>Name</th>
<th>Question</th>
<th>Email</th>
</tr>
<?php

	$link = mysqli_connect($servername, $dbusername, $dbpassword, $database) or die("Connection Failure");	
	$sql = "SELECT * FROM contact";

	$result = $link->query($sql);
	$number = 1;
	while($row = mysqli_fetch_array($result)) {
		echo "<tr>";
		echo "<td>" . $number . "</td>";
		echo "<td>" . $row['category'] . "</td>";
		echo "<td>" . $row['name'] . "</td>";
		echo "<td>" . $row['question'] . "</td>";
		echo "<td>" . $row['email'] . "</td>";
		echo "</tr>";
		
		$number = $number + 1;
	}
	?>

</table>
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
