<?php
   
$servername = 'danu6.it.nuigalway.ie';
$dbusername = 'mydb2046kc';
$dbpassword = 'xi8tuz';
$database = 'mydb2046';
$login = '';
$pass = '';
$Error = '';
   
   
if($_POST) {
// username and password sent from form 
	 
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
	//document.getElementById("proceed").disabled = false;
	header("Location: /ckillilea/Assignment7/showContactUs.php");
	$login = "Successful";
      }else {
         $Error = "Your Login Name or Password is invalid";
      }
   }
?>

<html>
<head>
    <title>Log In</title>
    <link rel="stylesheet" type="text/css" href="styles.css"/>
</head>
<body>

<div class = "form-group">
	<form name = "loginForm" class = "basic-grey" method="post" >
	    <h1>Login
        <span>Must Log In to view Contacts</span>
		</h1>
		<label>
		<center><span class="redText"><?php echo htmlspecialchars($Error);?></span></center>
		</label>
		<label>
        <span>User Name : </span>
        <input id="username" type="text" name="username" placeholder = "username" value="<?php echo htmlspecialchars($login);?>"required />
		</label>
		<label>
        <span>Password :</span>
        <input id="password" type="password" name="password" placeholder = "password" value="<?php echo htmlspecialchars($pass);?>" required/>
		</label>
		<label>
        <span>&nbsp;</span> 
		<input type = "submit" class = "button" name = "questionsubmit" value = "Submit"/>
		</label>
		

	</form>
</div>

</body>
</html>
