
<?php 
require_once "config.php";
if(isset($_POST['payment_id']))
{
$payment_id=$_POST['payment_id'];
$name= $_POST['name'];
$amt=$_POST['amt'];
$pno=$_POST['pno'];
$address=$_POST['address'];
$zip=$_POST['zip'];
$city=$_POST['city'];
$status='complete';


require_once "config.php";

if(!$link)
{die("connection failed:".mysqli_connect_error());
}  
mysqli_query($link,"insert into payment(name,amount,payment_status,payment_id,Phone,Address,Pincode,City) values('$name','$amt','$status','$payment_id','$pno','$address','$zip','$city')");
}
?>