<?php
session_start();
 
if(isset($_SESSION["logged"]) && $_SESSION["logged"] != true){
    header("location: index.html");
    exit;
}
 
require_once "config.php";?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

    <title>Ecommerce</title>

 
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/tooplate-main.css">
    <link rel="stylesheet" href="assets/css/owl.css">

  </head>
  <style>
table, th, td {
  border:2px solid black;
}

</style>

  <body>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
      <div class="container">
        <a class="navbar-brand" href="#"><img src="assets/images/header-logo.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
		 
            <li class="nav-item">
              <a class="nav-link" href="index.html">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="administrator.php">Orders</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="message.php">Message</a>
            </li>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>
			
          </ul>
          
		  
        </div>
      </div>
    </nav>
	<br>
	<br>
	<table style="width:100%">
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Subject</th>
	<th>Message</th>
	
  </tr>
  
 
  <?php
  
 require_once "config.php";
			    $result = mysqli_query($link, "SELECT * FROM contact ORDER BY id DESC;");
				
				 while ($row = mysqli_fetch_array($result))
				 {    echo "<tr>";
					  echo "<td>".$row['NAME']."</td>";
					  echo "<td>".$row['EMAIL']."</td>";
					  echo "<td>".$row['Subject']."</td>";
					  echo "<td>".$row['Message']."</td>";
					 
					 
					
				 echo "</tr>";}?>
				
			
 
</table>
	
  
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0;
      function clearField(t){                  
      if(! cleared[t.id]){                     
          cleared[t.id] = 1; 
          t.value='';         
          t.style.color='#fff';
          }
      }
    </script>


  </body>

</html>
