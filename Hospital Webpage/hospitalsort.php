<!doctype html>

<!-- Created by Aleksandar Kostic on 28 November 2019 for 3319a --->
<!-- This document uses a query to sort all by hospitals alphabetically. Information of the hospital will also be printed. --->

<html>

	<head>

		<title>Sorted Hospital Information</title>
		<link rel="stylesheet" type="text/css" href="hospital.css">

	</head>

	<body>

		<h1>List of Sorted Hospitals</h1>
		<p>Below is a list of all the hospitals listed alphabetically. Furthermore, information about the hospital (e.g. who the head doctor of the hospital is) will also be presented.</p>

		<?php
			include "connecttodb.php";
		 	$query = "SELECT hospitalname, headdoctor, startdate, firstname, lastname FROM hospital, doctor WHERE hospital.headdoctor=doctor.licenseno ORDER BY hospitalname ASC";
		 	$result = mysqli_query($connection, $query);
		 
		 	if (!$result) {
		  		die("Database query failed");
		 	}
		 
		 	while ($row = mysqli_fetch_assoc($result)) {
		  		echo "<b><u>Hospital</u></b>";
		  		echo "<ul>";
		  		echo "<li><b>Hospital Name:</b> " . $row["hospitalname"];
		  		echo "<li><b>Head Doctor First Name:</b> " . $row["firstname"];
		  		echo "<li><b>Head Doctor Last Name:</b> " . $row["lastname"];
		  		echo "<li><b>Head Doctor Start Date:</b> " . $row["startdate"];
		  		echo "</ul>";

		 	}
		 
		 	mysqli_free_result($result);
		 	mysqli_close($connection);		 
		?>

		<br>

		<form action="http://cs3319.gaul.csd.uwo.ca/vm067/a3aleksandar/hospitals.php">
    		<input type="submit" value="Return to Home"/>
		</form>

	</body>

</html>
