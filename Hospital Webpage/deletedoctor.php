<!doctype html>

<!-- Created by Aleksandar Kostic on 28 November 2019 for 3319a --->
<!-- This file uses a query delete a doctor from the database. If the selected doctor is currently treating a patient, confirmation will be required before proceeding. --->

<html>

	<head>

		<title>Delete Doctor</title>
		<link rel="stylesheet" type="text/css" href="hospital.css">

	</head>

	<body>

		<h1>Delete Doctor</h1>
		<p>If the doctor selected is a currently treating a patient, a message will be shown on the screen and a confirmation will be required before deleting them. The confirmation is done by selecting "Yes" in the drop down menu. You can change your mind by selecting "No" in the drop down menu or by clicking "Return to Home" further below.</p>

		<?php
		 	include "connecttodb.php";
		 	$doctor = $_POST["deletedoctor"];
		 	$querytreats = 'SELECT * FROM treats WHERE doctorid = ' . '"' . $doctor . '"';
		 	$resulttreating = mysqli_query($connection, $querytreats);

		 	// Determines if doctor is currently treating patients
		 	if(mysqli_num_rows($resulttreating) > 0) {

		 	 	echo "<p><b>WARNING:</b> Selected doctor is currently treating a patient. Deletion confirmation needed below by either selecting 'Yes' or 'No' from the dropdown menu. Alternatively, you may return home by reading below.</p>";
			 	mysqli_free_result($resulttreating);

			 	echo '<form action="deletedoctorconfirm.php" method ="post">

			 		<input type="hidden" name="doctor" value=' . $doctor . '>

			 		<select name="deletedoctorconfirm" id="deletedoctorconfirm">

						<option value="0">Yes</option>
						<option value="1">No</option>

					</select>

					<input type="submit" value="Delete Doctor">

 			 		</form>';

		 	}

		 	else { // If doctor not treating patients, delete

			 	$query = 'DELETE FROM doctor WHERE licenseno = ' . '"' . $doctor . '"';
			 	$result = mysqli_query($connection, $query);
			 
			 	if (!$result) {
			  		die("Database query error");
			 	}
			 
			 	echo "<b>SUCCESS:</b> Doctor successfully deleted.";
			 	echo "<br>";
	
		 	}

		 	mysqli_close($connection);
		?>

		<br>
		<hr>

		<p>To return home, you may do so by clicking on the "Return to Home" button below.</p>

		<form action="http://cs3319.gaul.csd.uwo.ca/vm067/a3aleksandar/hospitals.php">
    		<input type="submit" value="Return to Home"/>
		</form>

	</body>

</html>
