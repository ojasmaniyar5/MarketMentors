<?php
$n = $_POST['email'];
$p = $_POST['pass'];

$conn = mysqli_connect('localhost','root','','stockmarket');
if(!$conn)
	die(mysqli_connect_error($conn));
$q = mysqli_query($conn,"Select * from signup where email='$n' and pass='$p'");

$r = mysqli_fetch_row($q);
if(empty($r))
	echo "<center><h1>FAILED TO LOGIN...!!</h1></center>";
	
else{
	echo "LOGGED IN Successfully!!";	
	header('LOCATION:home.html');
}
?>



<!DOCTYPE html>
<html>
<head>

<style type="text/css">
	button.zoom1{
  padding: 5px;

  transition: transform .2s;
  background-color: #e7e7e7; color: black;
  margin: 0 auto;
border-radius: 8px;
  display: inline-block;
}

body{
  background: linear-gradient(to right, hsl(222, 100%, 61%), #FF416C);
	background: -webkit-linear-gradient(to right, hsl(222, 100%, 61%), hsl(222, 100%, 61%));
}

.zoom1:hover {
  -ms-transform: scale(1.5); /* IE 9 */
  -webkit-transform: scale(1.5); /* Safari 3-8 */
  transform: scale(1.5); 
}
</style>
</head>
<body>
<center><h1>Incorrect Username Or Password</h1></center>
 <center><br><h3><button class="zoom1"><a href='index.html'>Back To Home</a></button></h3><center>
</body>
</html>