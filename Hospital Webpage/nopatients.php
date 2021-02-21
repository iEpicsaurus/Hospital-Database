<!doctype html>

<!-- Created by Aleksandar Kostic on 28 November 2019 for 3319a --->
<!-- This file uses a query to list all doctors currently not treating patients. If no results are in the list, this means all doctors are currently treating patients. --->

<html>

	<head>

		<title>Doctors Without Patients</title>
		<link rel="stylesheet" type="text/css" href="hospital.css">

	</head>

	<body>

		<h1>Doctors Without Patients</h1>
		<p>Below, the full names of doctors who are not currently treating any patients are listed:</p>

		<?php
			include "connecttodb.php";

		 	$result = mysqli_query($connection, "SELECT firstname, lastname FROM doctor WHERE licenseno NOT IN(SELECT doctorid FROM treats)");

	 	 	if (!$result) {
	  	  		die("Database query error.");
	 	 	}

		 	echo "<ul>";
		 	while ($row = mysqli_fetch_assoc($result)) {

		  		echo "<li>" . $row["firstname"] . " " . $row["lastname"];

		 	}
		 	echo "</ul>";
		 	echo "<i>NOTE: If no doctors are shown in the list, it means all doctors currently have patients.</i>";
		 	echo "<br>";
		 
		 	mysqli_free_result($result);
		 	mysqli_close($connection);
		?>

		<br>

		<form action="http://cs3319.gaul.csd.uwo.ca/vm067/a3aleksandar/hospitals.php">
    		<input type="submit" value="Return to Home"/>
		</form>

	</body>

</html>
