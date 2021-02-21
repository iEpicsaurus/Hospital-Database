<!doctype html>

<!-- Created by Aleksandar Kostic on 28 November 2019 for 3319a --->
<!-- This document uses a query to obtain and print all information available for doctors that were licensed before the input date from the previous page. --->

<html>

	<head>

		<title>Doctors Before Date</title>
		<link rel="stylesheet" type="text/css" href="hospital.css">

	</head>

	<body>

		<h1>List of Information for Doctors Licensed Before Date</h1>
		<p>Below is all the information available for the doctors that were licensed before the input date put in the previous page.</p>

		<?php
			include "connecttodb.php";
		 	$date = $_POST["date"];
		 	$query = "SELECT * FROM doctor WHERE datelicensed < " . "'$date'";
		 	$result = mysqli_query($connection, $query);
		 
		 	if (!$result) {
		  		die("Database query failed");
		 	}
		 
		 	while ($row = mysqli_fetch_assoc($result)) {

		  		echo "<b><u>Doctor</u></b>";
		  		echo "<ul>";
		  		echo "<li><b>First Name:</b> " . $row["firstname"];
		  		echo "<li><b>Last Name:</b> " . $row["lastname"];
		  		echo "<li><b>Date Licensed:</b> " . $row["datelicensed"];
		  		echo "<li><b>Specialty:</b> " . $row["specialty"];
		  		echo "</ul>";

		 	}
		 
		 	mysqli_free_result($result);
		 	mysqli_close($connection);		 
		?>

		<hr>

		<p><i>NOTE: If no doctors are listed above, this means that no doctors were licensed before the selected date.</i></p>

		<form action="http://cs3319.gaul.csd.uwo.ca/vm067/a3aleksandar/hospitals.php">
    		<input type="submit" value="Return to Home"/>
		</form>

	</body>

</html>
