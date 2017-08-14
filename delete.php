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

// Set up and Test Connection
$link = mysqli_connect($servername, $dbusername, $dbpassword, $database) or die("Connection Failure");

$productid = $_GET['id'];

// Select the Row
$sql = "SELECT * FROM salestock WHERE productid = '{$productid}'";

// Get results returned from query
$result = $link->query($sql);
$row = mysqli_fetch_array($result)
//if($link->query($sql) === TRUE)
?>

<html>
<head>
    <title>Submit Your Question</title>
    <link rel="stylesheet" type="text/css" href="styles.css"/>
	<script src="formVerifications.js" type="text/javascript"></script>
</head>
<body>

<div class = "form-group">
	<form name = "questionForm" class = "basic-grey" method="post" action = "deleterecord.php" >
	    <h1 class = "redtext">Delete Form 
        <span class = "redtext">Are you sure you wish to Delete?</span>
		</h1>

		<label>
        <span>Product ID : </span>
        <input id="productid" type="text" name="productid" value="<?php echo($row['productid']);?>" required/>
		</label>
		<label>
        <span>Product Name : </span>
        <input id="productname" type="text" name="productname" value="<?php echo($row['productname']);?>" required/>
		</label>
		<label>
        <span>Product Price : </span>
        <input id="price" type="text" name="price" value="<?php echo($row['price']);?>" required />
		</label>
		<label>
        <span>No In Stock : </span>
        <input id="stocklevel" type="text" name="stocklevel" value="<?php echo($row['stocklevel']);?>" required />
		</label>
		<label>
        <span>Description : </span>
        <input id="description" type="text" name="description" value="<?php echo($row['description']);?>" required />
		</label>
		<label>
        <span>Image Path : </span>
        <input id="image" type="text" name="image" value="<?php echo($row['image']);?>" required />
		</label>

		<label>
        <span>&nbsp;</span> 
		<input type = "submit" class = "button" name = "deletesubmit" id="deletesubmit" value = "Delete" />
		<a href="http://danu6.it.nuigalway.ie/ckillilea/Assignment7/editStock.php" class="button">Cancel</a>
		</label>
		</form>
</div>
</body>
</html>



