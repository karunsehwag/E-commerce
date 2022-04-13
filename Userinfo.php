<?php 

if(isset($_POST['submit']))
{
$name=$_POST['name'];
$dob=$_POST['dob'];
$email= $_POST['email'];
$pno=$_POST['pno'];
$pin=$_POST['pin'];
$address=$_POST['address'];

echo $name;

require_once "config.php";

if(!$link)
{die("connection failed:".mysqli_connect_error());
}  
$sql="INSERT INTO `userdata`( `NAME`, `DOB`,`EMAIL`,`PHONE`,`PINCODE`,`ADDRESS` ) VALUES ('$name','$dob','$email','$pno','$pin','$address')";


if (mysqli_query($link,  $sql))
{     session_start();
                            
                            
                            $_SESSION["log"] = true;
							$_SESSION["phone"] = $pno;
							$_SESSION["rname"]=$name;
                            header("location: register.php");
}
}
?>