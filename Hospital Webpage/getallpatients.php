<?php

	// Created by Aleksandar Kostic on 28 November 2019 for 3319a
	// This file uses a query to obtain all patients currently in the database; this is used for the dropdown menu for patients.

	include "connecttodb.php";
 	$query = "SELECT * FROM patient";
 	$result = mysqli_query($connection,$query);
 	
 	if (!$result) {
  		die("Databases query failed.");
 	}
 
 	while ($row = mysqli_fetch_assoc($result)) {
  		
  		echo "<option value='" . $row["ohipno"] ."'>".$row["firstname"] ." " . $row["lastname"] . "</option>";

 	}

 	mysqli_free_result($result);
 	mysqli_close($connection);
?>
