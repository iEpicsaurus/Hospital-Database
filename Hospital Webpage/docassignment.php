<!doctype html>

<!-- Created by Aleksandar Kostic on 28 November 2019 for 3319a --->
<!-- This file uses a query to either add or remove a doctor from the patient's treatment team. If there are any errors (e.g. trying to remove a doctor from a patient who is currently not being treated by that doctor), the respective error messages will be printed. --->

<html>

	<head>

		<title>Patient Treatment Team</title>
		<link rel="stylesheet" type="text/css" href="hospital.css">

	</head>

	<body>

		<h1>Patient Treatment Team</h1>
		<p>Based on your selection on the previous page, the selected doctor has either been added or removed to the patient's treatment team. Confirmation will be shown below; if there are any errors, these will be shown as well.</p>

		<?php
		 	include "connecttodb.php";
		 	$docid = $_POST["selectdoctor"];
		 	$patid = $_POST["selectpatient"];
		 	$action = $_POST["selectaction"];

		 	$resultcheck = mysqli_query($connection, 'SELECT * FROM treats WHERE doctorid = ' . '"' . $docid . '"' . ' AND patientid = ' . $patid);

		 	// Checks if the patient is currently being treated by doctor
		 	if(mysqli_num_rows($resultcheck) == 0) {

		 	 	if ($action == 0) { // Action is insertion, no issues

		 	 		$queryadd = "INSERT INTO treats VALUES (" . $patid . ',' . "'$docid')";
		 	 		$result = mysqli_query($connection, $queryadd);
			 	
			 		if (!$result) {
			  	 		die("Database query error.");
			 		}
			 	
			 		echo "<b>SUCCESS:</b> Doctor has been assigned to the patient.";
			 		echo "<br>"; 	 	

		 	 	}

		 	 	else { // Action is deletion, error as doctor not treating

		 	 		echo "<b>ERROR:</b> Cannot remove this doctor from the selected patient as doctor is not currently treating the patient.";
		 	 		echo "<br>";

		 	 	}

		 	}

		 	else { // Patient is currently being treated by doctor

		 	 	if ($action == 0) { // Action is insertion, issue

 		 	 	 	echo "<b>ERROR:</b> Cannot add this doctor to the selected patient's treatment team as the doctor is already currently treating the patient.";
 		 	 	 	echo "<br>";

	 	 	 	}

	 	 	 	else { // Action is deletion, no issues

	 	 	 		$queryremove = "DELETE FROM treats WHERE doctorid = " . "'$docid'" . ' AND patientid = ' . $patid;
		 	 		$result = mysqli_query($connection, $queryremove);
			 	
			 		if (!$result) {
			  	 		die("Database query error.");
			 		}
			 	
			 		echo "<b>SUCCESS:</b> Doctor has been removed from the patient's treatment team.";
			 		echo "<br>";

	 	 	 	}


		 	}

		 	mysqli_close($connection);
		?>

		<br>

		<form action="http://cs3319.gaul.csd.uwo.ca/vm067/a3aleksandar/hospitals.php">
    		<input type="submit" value="Return to Home"/>
		</form>

	</body>

</html>
