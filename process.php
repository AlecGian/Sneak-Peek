<?php

include 'dbconnect.php';

?>

<!DOCTYPE html>

<html lang="en">
	<head>
	<title>Sneak Peek</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="SneakPeek/css/body.css">
	</head>


	<body data-spy="scroll" data-target="#navbarResponsive">

<!-- Start Home -->
<div id="home">

 <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <!-- Brand/logo -->
    <a class="navbar-brand" href="#"><img src="SneakPeek/assets/SneakPeek.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#home">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#nike">Nike</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#adidas">Adidas</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#air-jordan">Air Jordan</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#cart">Cart</a>
                </li>
            </ul>

        
        </div>
	</nav>
	<br />
	<br />
<?php	



$con = mysqli_connect('localhost', 'root', '', 'spdb');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$u_name = $_POST["firstname"]; 
	$u_last = $_POST["lastname"];
    $u_email = $_POST["email"];
    $u_address = $_POST["address"];
	
	//print output text
	print "Hello " . $u_name . "! We have received your Order ";
    print "We will contact you very soon!";
   
if ($_SERVER["REQUEST_METHOD"] == "POST") {//Check it is comming from a form

	
	$u_name = filter_var($_POST["firstname"], FILTER_SANITIZE_STRING); //set PHP variables like this so we can use them anywhere in code below
	$u_email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
	$u_address = filter_var($_POST["address"], FILTER_SANITIZE_STRING);
    
    
	$query = "INSERT INTO customer (firstname, lastname, email, 
	     address) VALUES (" . " '" . $_POST['firstname'] . 
	  "', '" . $_POST['lastname']. "', '" . $_POST['email'] . "', '" . $_POST['address'] . "')";
	
	
	
 
}

}

?>
	</body>
</html>

