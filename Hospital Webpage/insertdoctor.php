<!doctype html>

<!-- Created by Aleksandar Kostic on 28 November 2019 for 3319a --->
<!-- This document uses a query to insert a doctor to the database. A license number must be provided or an error message will be printed; if a hospital is not selected, a default one is selected automatically. Furthermore, if a license number already exists in the database, then print an error message as the doctor will not be added (no duplicate keys). --->

<html>

	<head>

		<title>Insert Doctor</title>
		<link rel="stylesheet" type="text/css" href="hospital.css">

	</head>

	<body>

		<h1>Insert Doctor</h1>
		<p>The doctor will be added to the database. Below, all information associated with the doctor that was added to the database is shown for clarity. If no information is shown, an error message will be shown to indicate why the doctor was not added to the database.</p>

		<?php
			include "connecttodb.php";
		 	$firstname = $_POST["fname"];
		 	$lastname = $_POST["lname"];
		 	$licenseno = $_POST["licenseno"];

		 	if ($licenseno == "") {

		 		echo "<p><b>ERROR:</b> A license number must be entered.</p>";

		 	}

		 	else {

			 	$resultlicense = mysqli_query($connection, "SELECT * FROM doctor WHERE licenseno = " . "'$licenseno'");

			 	// Checks if license number already exists in database
			 	if(mysqli_num_rows($resultlicense) > 0) {

			 	 	echo "<p><b>ERROR:</b> Doctor with this license number already exists; doctor not added.</p>";
			 	 	mysqli_free_result($resultlicense);

			 	}

			 	else { // License number doesn't already exist

				 	$datelicensed = $_POST["dateinsert"];
				 	$specialty = $_POST["specialty"];
				 	$hospital = $_POST["pickhospital"];

	 			 	if ($firstname == "" || $lastname == "" || $licenseno == "" || $datelicensed == "yyyy-mm-dd" || $specialty == "") {

	 			 		echo "<b>ERROR:</b> Information missing! Please enter all information when inserting a doctor.";
	 			 		echo "<br>";
	 			 		echo "<br>";

	 			 	}

	 			 	else { // All information present, doctor added

				 		$query = 'INSERT INTO doctor VALUES (' . '"' . $firstname . '",' . '"' . $lastname . '",' . '"' . $licenseno . '",' . '"' . $datelicensed . '",' . '"' . $specialty . '",' . '"' . $hospital . '"' . ')';
				 		$result = mysqli_query($connection, $query);

				 		if (!$result) {

	 			 			echo "<b>ERROR:</b> Information missing! Please enter all information when inserting a doctor.";
	 			 			echo "<br>";
	 			 			echo "<br>";

				 		}

				 		else {
					 
						 	echo "<b><u>Doctor Added</u></b>";
						 	echo "<ul>";
						 	echo "<li><b>First Name:</b> " . $firstname;
						 	echo "<li><b>Last Name:</b> " . $lastname;
						 	echo "<li><b>License Number:</b> " . $licenseno;
						 	echo "<li><b>Date Licensed:</b> " . $datelicensed;
						 	echo "<li><b>Specialty:</b> " . $specialty;
						 	echo "<li><b>Hospital Works At:</b> " . $hospital;
						 	echo "</ul>";

					 	}			 	

				 	}

				}

		 	}

		 	mysqli_close($connection);
		?>

		<form action="http://cs3319.gaul.csd.uwo.ca/vm067/a3aleksandar/hospitals.php">
    		<input type="submit" value="Return to Home"/>
		</form>

	</body>

</html>
