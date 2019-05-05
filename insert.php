
<!DOCTYPE html>
<html>
<head>
	<title>Insert participant</title>
</head>
<body><center>
	<form action="in.php" method="POST">
		<h3>Enter the details of participate </h3>
		Name(Uppercase):<input type="text" name="name" required pattern='^[A-Za-z\s]+' ><br><br>
		Event:<select name="event">
							<option>Please choose</option>
							<option>AVISHKAR</option>
							<option>BORN PSYCHOS</option>
							<option>BRIDGEWARS</option>
							<option>Code-Hunt</option>
							<option>CRICBASH</option>
							<option>RAVIC</option>
							<option>RESPAWN</option>
							<option>ROBO SOCCER</option>
							<option>VIRTUAL PLACEMENT</option>
							<option>Stargaze</option>
							<option>IC Engine</option>
							<option>WORKFLOW</option>
							<option>Enactus 2.0</option>
							<option>Total Station</option>
            </select><br><br>
            Email:<input type="email" name="email" placeholder="email"><br><br>
            <input type="submit" name="submit"><br><br>

	</form>
	<a href="http://localhost/certificate_adhyaaya/certificate.html"><button>Certificate</button></a>
</center>
</body>
</html>