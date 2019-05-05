<?php

session_start();

//Connect to server.
$con=mysqli_connect('localhost','root');
if(!$con){
	die("Server Connection Failed" . mysqli_error($con));
}


//Connect to database.
$db=mysqli_select_db($con,'adhyaaya');
if(!$db){
	die("Database Connection Failed" . mysqli_error($db));
}


$name=$_POST['name'];
$email=$_POST['email'];
$event=$_POST['event'];


$q="INSERT INTO `participants`(`name`, `email`, `event`) VALUES ($name,$email,$event)";

$result=mysqli_query($con,$q);
if(!$result){
	echo "<script>
	alert('Successfully entered details');
	window.location.href='http://localhost/certificate_adhyaaya/insert.php';
	</script>";
}else{
	echo "<script>
	alert('Not Successfully.Please try again');
	window.location.href='http://localhost/certificate_adhyaaya/insert.php';
	</script>";
}