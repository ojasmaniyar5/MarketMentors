<?php
$sever ="localhost";
$username ="root";
$password ="";
$dbname ="stockmarket";

//connection create.
$con = mysqli_connect("localhost", "root","","stockmarket");

//connection check.
if(!$con)
{
	die("not connected: ".mysqli_connect_error());
}

//insert data.
$name = $_POST['names'];
$email =$_POST['email'];
$password = $_POST["pass"];

//insert into table.
$sql = "INSERT INTO signup(names, email, pass) VALUES ('$name','$email','$password')";

//Final Result.
$result = mysqli_query($con, $sql);
if ($result)
{
	echo "<br><br><br><center><h2>Account Created Successfully.</h2></center><br><br>";
}
else
{
	echo "<br><br><br><h3>Account failed To Create</h3><br><br>".mysqli_error($con);
}
?>
<html>
<body>
<center><h1>Incorrect Username Or Password</h1></center>
 <center><br><h3><button class="zoom1"><a href='index.html'>Back To Home</a></button></h3><center>
</body>
</html>