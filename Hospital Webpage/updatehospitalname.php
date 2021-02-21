<!doctype html>

<!-- Created by Aleksandar Kostic on 28 November 2019 for 3319a --->
<!-- This document uses a query to update the name of a hospital the user selected on the previous page. --->

<html>

	<head>

		<title>Hospital Update</title>
		<link rel="stylesheet" type="text/css" href="hospital.css">

	</head>

	<body>

		<h1>Hospital Name Update</h1>
		<p>Hospital name will now be updated unless there is an error (if you did not enter a new name in the previous page). You may return to the homepage by clicking "Return to Home" below.</p>

		<?php
			include "connecttodb.php";
			$oldname = $_POST["hospitalname"];
			$newname = $_POST["hospname"];

			if ($newname == "") {

				echo "<b>ERROR:</b> A new hospital name must be entered.";
				echo "<br>";

			}

			else {

				$query = 'UPDATE hospital SET hospitalname="' . $newname . '"' . 'WHERE hospitalcode ="' . $oldname . '"';
				$result = mysqli_query($connection, $query);
			
				if (!$result) {
			 		die("Database query error");
			 	}

			 	echo "<b>SUCCESS:</b> Hospital name successfully updated.";
			 	echo "<br>";

		 	}

		 	mysqli_close($connection);
		?>

		<br>

		<form action="http://cs3319.gaul.csd.uwo.ca/vm067/a3aleksandar/hospitals.php">
    		<input type="submit" value="Return to Home"/>
		</form>

	</body>

</html>
