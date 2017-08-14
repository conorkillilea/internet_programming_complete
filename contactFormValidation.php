<?php
//Initialise
$name = "";
$email = "";
$question = "";
$nameError = "";
$questError = "";
$emailError = "";
$emailCheck = true;

// To Test Email
$findAt = '@';
$findDot = '.';

// Email Fields
$to = 'conorkillilea@gmail.com';
$subject = '';
$message = ''; 

$servername = 'danu6.it.nuigalway.ie';
$username = 'mydb2046kc';
$password = 'xi8tuz';
$database = 'mydb2046';

// If POSTed
if($_POST)
{
	// Set Values to POSTed values
	$name = $_POST['customername'];
	$email = $_POST['email'];
	$question = $_POST['question'];
	$subject = $_POST['Category'];
	// Format Email
	$message = 'Message From: ' . $_POST['customername'] . "\n\n" . 'Email: ' . $_POST['email'] . "\n\n" . 'Question: ' . $_POST['question'];
	{
		// Check Name & Question Length
		if (strlen($name) < 10)
		{
			$name = $_POST['customername'];
			$nameError = "Error, must be min 10 Characters in Length";
		}

		if (strlen($question) < 25)
		{
			$question = $_POST['question'];
			$questError = "Error, must be min 25 Characters in Length";
		}
	}
	
	// Check Email Length
	if((strlen($email) < 10))
	{
		$email = $_POST['email'];
		$emailError = "Error, must be min 10 Characters in Length";
		$emailCheck = false;
	}
	
	// Else Search for Required Characters
	else
	{
		// First Check for @
		$exists = (strpos($email, $findAt));
		if(($exists == false))
		{
			$email = $_POST['email'];
			$emailError = "Must include @";
			$emailCheck = false;
		}

		// Then Check for .
		if($exists == true)
		{
			$exists = (strpos($email, $findDot));
			if(($exists == false))
			{
				$email = $_POST['email'];
				$emailError = "Must include .";
				$emailCheck = false;
			}
			
			// Set to Valid
			else
			{
				$emailCheck = true;
			}
		}
	}
	
	// If all in Order - Send Email & Reset Values.
	if((strlen($question) > 25) && (strlen($name) > 10) && ($emailCheck == true))
	{
		mail($to, $subject, $message);
		
		// Set up and Test Connection
		$link = mysqli_connect($servername, $username, $password, $database) or die("Connection Failure");
		// SQL Query to INSERT data
		$sql = "INSERT INTO contact (question, name, email, category) VALUES ('{$question}', '{$name}', '{$email}', '{$subject}')";
		
		$link->query($sql);
	
		$name = "";
		$question = "";
		$email = "";
	}
}
?>

