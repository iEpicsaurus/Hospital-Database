<!doctype html>

<!-- Created by Aleksandar Kostic on 28 November 2019 for 3319a --->
<!-- This file uses a query to obtain all information available for the doctor that was selected in the previous page. --->

<html>

	<head>

		<title>Selected Doctor Information</title>
		<link rel="stylesheet" type="text/css" href="hospital.css">

	</head>

	<body>

		<h1>List of Information for Selected Doctor</h1>
		<p>Below is all the information available for the doctor that was selected in the previous page.</p>

		<?php
		 	include "connecttodb.php";
		 	$whichDoc = $_POST["choosedoc"];
		 	$query = "SELECT firstname, lastname, licenseno, datelicensed, specialty, hospitalname FROM doctor, hospital WHERE licenseno = " . "'$whichDoc'" . "AND hospworksat = hospitalcode";
		 	$result = mysqli_query($connection, $query);
		 
		 	if (!$result) {
		  		die("Database query failed");
		 	}
		 
		 	echo "<ul>";
		 	while ($row = mysqli_fetch_assoc($result)) {

		  		echo "<li><b>First Name:</b> " . $row["firstname"];
		  		echo "<li><b>Last Name:</b> " . $row["lastname"];
		  		echo "<li><b>License Number:</b> " . $row["licenseno"];
		  		echo "<li><b>Date Licensed:</b> " . $row["datelicensed"];
		  		echo "<li><b>Specialty:</b> " . $row["specialty"];
		  		echo "<li><b>Current Hospital:</b> " . $row["hospitalname"];

		 	}
		 	echo "</ul>";
		 
		 	mysqli_free_result($result);
		 	mysqli_close($connection);
		?>

		<br>

		<form action="http://cs3319.gaul.csd.uwo.ca/vm067/a3aleksandar/hospitals.php">
    		<input type="submit" value="Return to Home"/>
		</form>

	</body>

</html>
