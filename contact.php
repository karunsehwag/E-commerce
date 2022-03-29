<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text],input[type=date],input[type=email],input[type=PHONE], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus,input[type=date]:focus ,input[type=email]:focus, input[type=password]:focus,input[type=PHONE]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>




<form>
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="Name"><b>Name</b></label>
	
    <input type="text" name="name" placeholder="Enter Name" id="name" required>
	
    <label for="DOB"><b>Date Of Birth</b></label>
    <input type="date" name="DOB" placeholder="Date of Birth" id="DOB" required>
	
    <label for="email"><b>EMAIL ID</b></label>
    <input type="email" name="email" placeholder="Please enter email id" id="email" required>
	
	<label for="pno"><b>PHONE NO</b></label>
    <input type="PHONE" name="PHONE" placeholder="Please enter Phone No" id="email" required>
	
    <label for="address"><b>Enter Address</b></label>
    <input type="text" placeholder="Please Enter address" name="address" id="address" required>
    <hr>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <button type="submit" name="submit" class="registerbtn">Register</button>
  </div>
  
  <div class="container signin">
    <p>Already have an account? <a href="login.php">Login</a>.</p>
  </div>
</form>


<?php 
if(isset($_POST['submit']))
{
	



$name=$_POST['name'];
$sname=$_POST['sname'];

$dob=$_POST['dob'];
$email    = $_POST['email'];
$pno=$_POST['pno'];



require_once "config.php";

if(!$link)
{die("connection failed:".mysqli_connect_error());
}  
$sql="INSERT INTO `userdata`( `NAME`, `SCHOLAR`, `DOB`, `PHONE`, `EMAIL`) VALUES ('$name', '$sname', '$dob', '$pno', '$email')";


if (mysqli_query($link,  $sql))
{     session_start();
                            
                            // Store data in session variables
                            $_SESSION["log"] = true;
							 $_SESSION["nam"]=$name;
							
							   $_SESSION["snam"]=$sname;                            
                            
                            // Redirect user to welcome page
                            header("location: register.php");
}
}
?> 
</body>
</html>

               
                       
          