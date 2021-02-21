<!doctype html>

<!-- Created by Aleksandar Kostic on 28 November 2019 for 3319a --->
<!-- This file uses a query to delete a the doctor after the confirmation was recieved. If "No" was selected in the confirmation, print that nothing has been done. --->

<html>

	<head>

		<title>Delete Doctor Confirmation</title>
		<link rel="stylesheet" type="text/css" href="hospital.css">

	</head>

	<body>

		<h1>Delete Doctor</h1>
		<p>You are seeing this page as you have either selected either "Yes" or "No" in the confirmation dropdown menu on the previous page.</p>

		<?php
			include "connecttodb.php";
		 	$confirm = $_POST["deletedoctorconfirm"];

		 	if ($confirm == 0) { // Confirmation is "Yes"

			 	$doctor = $_POST['doctor'];
			 	$query = 'DELETE FROM doctor WHERE licenseno = ' . '"' . $doctor . '"';
			 	$result = mysqli_query($connection, $query);
			 
			 	if (!$result) {
			  		die("Database query error");
			 	}
			 
			 	echo "<b>ACTION:</b> Doctor successfully deleted.";
			 	echo "<br>";

		 }

		 	else { // Confirmation is "No"

		 		echo "<b>ACTION:</b> No further action taken as 'No' was selected as the confirmation on the previous page.";

		 	}

		 	mysqli_close($connection);
		?>

		<br>
		<br>

		<form action="http://cs3319.gaul.csd.uwo.ca/vm067/a3aleksandar/hospitals.php">
    		<input type="submit" value="Return to Home"/>
		</form>

	</body>

</html>
