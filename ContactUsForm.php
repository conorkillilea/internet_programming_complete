<?php
//Initial Values - Updated on _POST
$nameError = "";
$questError = "";
$emailError = "";
$name = "";
$email = "";
$question = "";

require ("contactFormValidation.php");

?>

<html>
<head>
    <title>Submit Your Question</title>
    <link rel="stylesheet" type="text/css" href="styles.css"/>
	<script src="formVerifications.js" type="text/javascript"></script>
</head>
<body>

<!--Taken out to run Server Side Validation : onsubmit="return validateForm()"-->

<div class = "form-group">
	<form name = "questionForm" class = "basic-grey" method="post" action="ContactUsForm.php" >
	    <h1>Contact Form 
        <span>Please fill all the texts in the fields.</span>
		</h1>
		
		<center><span class="redText"><?php echo htmlspecialchars($nameError);?></span></center>
		<label>
        <span>Name : </span>
        <input id="customername" type="text" name="customername" placeholder = "Your Full Name (Min 10 Char)" value="<?php echo htmlspecialchars($name);?>" required />
		</label>
		
		<center><span class="redText"><?php echo htmlspecialchars($emailError);?></span></center>
		<label>
        <span>Email :</span>
        <input id="email" type="text" name="email" placeholder = "name@email.com" value="<?php echo htmlspecialchars($email);?>" required/>
		</label>
		
		<center><span class="redText"><?php echo htmlspecialchars($questError);?></span></center>
		<label>
        <span>Question :</span>
        <textarea id="question" name="question" placeholder = "Question" ><?php echo htmlspecialchars($question);?></textarea>
		</label> 
		
		
		<label>
        <span>Category :</span>
						<select name="Category" required>
							<option value="">--Select--</option>
							<option value="Sales">Sales</option>
							<option value="Returns">Returns</option>
							<option value="Shipping">Shipping</option>
							<option value="Trips">Trips</option>
							<option value="Weekly Cycles">Weekly Cycles</option>
							<option value="Workshop">Workshop</option>
							<option value="Other">Other</option>
						</select>	
		</label>  	
		<label>
        <span>&nbsp;</span> 
		<input type = "submit" class = "button" name = "questionsubmit" value = "Submit"/>
		</label>
		</form>
</div>
<div class = "form-group">
		<form name = "loginForm" class = "basic-grey" method="post" action="validateLogin.php" >
	    <h1>Show Contacts
        <span>Enter Admin Details to view Admin Page</span>
		</h1>
		<label>
        <span>User Name : </span>
        <input id="username" type="text" name="username" placeholder = "username" required />
		</label>
		<label>
        <span>Password :</span>
        <input id="password" type="password" name="password" placeholder = "password" required/>
		</label>
		<span>&nbsp;</span>
		<span>&nbsp;</span>
		<label>
		<span>&nbsp;</span>
		<input type = "submit" class = "button" name = "loginsubmit" value = "Login"/>
		</label>
		</form>
</div>
</body>
</html>
