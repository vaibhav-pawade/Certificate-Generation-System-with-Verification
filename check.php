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

if((!$name) || (!$email)||(!$event)){
	header("location:certificate.html?retry=Please re-enter your credentials");
	//echo "<script>
	//alert('Please re-enter your credentials');
	//window.location.href='http://localhost/certificate_adhyaaya/certificate.html';
	//</script>";
}

//Checking if email is registered or not.
$q="select * from participants where name='$name' && email='$email' && event='$event'";

$result=mysqli_query($con,$q);
$num=mysqli_num_rows($result);
if($num>=1){


	//echo "<script>
	//alert(Thank You for participating & Download your certificate !!!');
	//</script>";
	//$_SESSION['name']=$name;
	//header('location:pdf.php');
	require("fpdf/fpdf.php");
	//$name=$_POST['name'];
	//$event=$_POST['event'];
	$pdf=new FPDF('L');

	$pdf->AddPage();
	$pdf->SetTitle("Certificate",True);
	$pdf->Image('certificate.jpg',3,3,291,203);

	$pdf -> SetXY(125,95); 
	$pdf->SetFont("Arial","B","20");
	$pdf->SetTextColor(10,43,73);
	$pdf->Cell(0,10,"$name",0,1,"L");

	$pdf -> SetXY(150,113); 
	$pdf->SetFont("Arial","B","20");
	$pdf->SetTextColor(10,43,73);
	$pdf->Cell(0,10,"$event",0,1,"L");



	include("phpqrcode-master/qrlib.php");
	QRcode::png("THIS CERTIFICATE IS AWARDED TO Ms/Mast. $name FOR SUCCESSFULLY PARTICIPATING IN WORKSHOP/EVENT $event HELD FROM 14th-16th FEB 2019,THE TECHNICAL SYMPOSIUM CONDUCTED BY GOVERNMENT COLLEGE OF ENGINEERING, NAGPUR.","Verify.png","M","10","10");
	$pdf->Image('Verify.png',125,151,45,45);




	$pdf->Output();

}else{
	echo "<script>
	alert('Incorrect name or email or event. OR  You have not participated in that event');
	window.location.href='http://localhost/certificate_adhyaaya/certificate.html';
	</script>";
}

?>
