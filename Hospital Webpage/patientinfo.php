<!doctype html>

<!-- Created by Aleksandar Kostic on 28 November 2019 for 3319a --->
<!-- This document uses a query to list the patient associated with the OHIP number provided in the previous page with doctors that are treating that patient. If no patient is associated to the provided OHIP number, an error message is printed. --->

<html>

	<head>

		<title>Patient Information</title>
		<link rel="stylesheet" type="text/css" href="hospital.css">

	</head>

	<body>

		<h1>Patient Information</h1>
		<p>Below is all the information associated with the patient whose OHIP number was entered in the previous page. If the OHIP number you entered is not associated with a patient, an error message will be shown.</p>

		<?php
			include "connecttodb.php";
			$ohipno = $_POST["ohip"];
			$querynumber = 'SELECT * FROM patient WHERE ohipno = ' . '"' . $ohipno . '"';
			$resultnumber = mysqli_query($connection, $querynumber);
		
			// Checks if OHIP number exists in database
			if(mysqli_num_rows($resultnumber) == 0) {

		 		echo "<p><b>ERROR:</b> There is no patient associated with the OHIP number that was entered.</p>";
		 		mysqli_free_result($resultnumber);

			}

		 	else {

				$query = 'SELECT patient.firstname, patient.lastname, doctor.firstname, doctor.lastname FROM patient, doctor, treats WHERE doctor.licenseno=treats.doctorid AND patient.ohipno=treats.patientid AND patient.ohipno=' . '"' . $ohipno . '"';
				$result = mysqli_query($connection, $query);
				
				if (!$result) {
			 		die("Database query error");
			 	}
			 
			 	$row = mysqli_fetch_array($result); // Gets first result
			 	echo "<b><u>Patient Information:</u></b>";
		 	 	echo "<br>";
			 	echo "<ul>";
			 	echo "<li><b>Patient First Name:</b> " . $row[0];
			 	echo "<li><b>Patient Last Name:</b> " . $row[1];
			 	echo "</ul>";

			 	echo "<b><u>Doctor Treating Patient:</u></b>";
				echo "<br>";
			 	echo "<ul>";
			 	echo "<li><b>Doctor First Name:</b> " . $row[2];
			 	echo "<li><b>Doctor Last Name:</b> " . $row[3];
			 	echo "</ul>";

			 	// Deals with subsequent results; doesn't print name again
			 	while ($row = mysqli_fetch_array($result)) { 

				 	echo "<b><u>Doctor Treating Patient:</u></b>";
				 	echo "<br>";
				 	echo "<ul>";
				 	echo "<li><b>Doctor First Name:</b> " . $row[2];
				 	echo "<li><b>Doctor Last Name:</b> " . $row[3];
				 	echo "</ul>";

			 	}

			 mysqli_free_result($result);
	
		 }

		 mysqli_close($connection);
		?>

		<br>

		<form action="http://cs3319.gaul.csd.uwo.ca/vm067/a3aleksandar/hospitals.php">
    		<input type="submit" value="Return to Home"/>
		</form>

	</body>

</html>
