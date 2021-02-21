<?php

	// Created by Aleksandar Kostic on 28 November 2019 for 3319a
	// This file connects to the database.

	$dbhost = "localhost";
	$dbuser= "root";
	$dbpass = "cs3319";
	$dbname = "akostic2assign2db";
	$connection = mysqli_connect($dbhost, $dbuser,$dbpass,$dbname);

	if (mysqli_connect_errno()) {
   		
   		die("Database connection failed :" .
   		mysqli_connect_error() . " (" . mysqli_connect_errno() . ")" );

	}
?>
