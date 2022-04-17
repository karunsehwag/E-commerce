<?php
session_start();
 $name=$_SESSION['name'];
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] != true){
    header("location: index.html");
    exit;

}
 
// Include config file
require_once "config.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text],input[type=number]  {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>

</head>
<body>

<h2>Checkout Form</h2>
<p>Please Enter your details <?php echo $name; ?></p>
<div class="row">
  <div class="col-75">
    <div class="container">
      <form>
      
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="name"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="name" name="name" placeholder="">
			<label><i class="fa fa-money"></i> Amount</label>
            <input type="number" id="amt" name="amt" placeholder="">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="">
			<label for="pno"><i class="fa fa-phone"></i> Phone</label>
            <input type="text" id="pno" name="pno" placeholder="">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="">
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="">

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="NY">
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="10001">
              </div>
            </div>
          </div>

       
          
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
        <input type="button" class="btn" name="btn" value="pay now" onclick="Pay()"/>
      </form>
<script>
function Pay(){
       var name=jQuery('#name').val();
	   var amt=jQuery('#amt').val();
var options = {
    "key": "rzp_test_I1OKPa6usESFAr", // Enter the Key ID generated from the Dashboard
    "amount": amt*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "E-commerce",
    "description": "Test Transaction",
    "image": "https://example.com/your_logo",
    
    "handler": function (response){
       console.log(response);
    }
};
var rzp1 = new Razorpay(options);
    rzp1.open();
   

}
</script>
    </div>
  </div>

  <div class="col-25">
    <div class="container">
      <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>1</b></span></h4>
      <p><a href="#">Product 1</a> <span class="price">1500</span></p>
      <hr>
      <p>Total <span class="price" style="color:black"><b>1500</b></span></p>
    </div>
  </div>
</div>

</body>
</html>
