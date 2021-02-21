<!doctype html>

<!-- Created by Aleksandar Kostic on 28 November 2019 for 3319a --->
<!-- This document uses a query to list all the doctors in a sorted manner depending on the choice of the user. Users can then choose a doctor to obtain more information about them on a new page. --->

<html>

	<head>

		<title>Doctor Information</title>
		<link rel="stylesheet" type="text/css" href="hospital.css">

	</head>

	<body>

		<h1>List of Sorted Doctors</h1>
		<p>Below is a list of all the doctors based on the sorting method you selected on the previous page. You may select a doctor in the drop down menu to see all information associated with your selected doctor.</p>

		<?php
			include "connecttodb.php";
			$whichSort = $_POST["picksortingdoc"];
			$query = "SELECT * FROM doctor ORDER BY" . $whichSort;
			$result = mysqli_query($connection, $query);
			
			if (!$result) {
		 		die("Database query failed");
			}
		 
		 	echo "<ul>";
		 	while ($row = mysqli_fetch_assoc($result)) {
		  		echo "<li>" . $row["firstname"] . " " . $row["lastname"];
		 	}
		 	echo "</ul>";

		 	mysqli_free_result($result);
		 	mysqli_close($connection);
		?>

		<form action="getalldoctorinfo.php" method ="post">

			<select name="choosedoc" id="choosedoc">

				<?php
					include "getalldoctors.php"
				?>

			</select>

			<input type="submit" value="Get Doctor Information">

		</form>

		<br>

		<form action="http://cs3319.gaul.csd.uwo.ca/vm067/a3aleksandar/hospitals.php">
    		<input type="submit" value="Return to Home"/>
		</form>

	</body>

</html>
