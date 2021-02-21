<!doctype html>

<!-- Created by Aleksandar Kostic on 28 November 2019 for 3319a --->
<!-- This file deals with the initial landing site for the central hospital database. All specifications/points listed in the assignment are accessible through the individual sections on this page. --->

<html>

	<head>

		<title>Central Hospital Database</title>
		<link rel="stylesheet" type="text/css" href="hospital.css">

	</head>

	<header>

		<h1>Central Hospital Database</h1>

	</header>

	<body>

		<!-- POINT 1: Sorted Doctors -->

		<h2>Sorted Doctor Information</h2>
		<p>You may select whether to sort doctors by last name or by first name in either ascending or descending order. This can be accomplished selecting the sorting type in the drop down menu and then clicking the "Get Doctors" button to the side.</p>

		<form action="getdoctorssorted.php" method ="post">

			<select name="picksortingdoc" id="picksortingdoc">

				<option value=" firstname ASC">First Name, Ascending</option>
				<option value=" firstname DESC">First Name, Descending</option>
				<option value=" lastname ASC">Last Name, Ascending</option>
				<option value=" lastname DESC">Last Name, Descending</option>

			</select>

			<input type="submit" value="Get Doctors">

		</form>
		<br>

		<!-- POINT 2: Doctors and License Dates -->

		<h2>Doctors Licensed Before Input Date</h2>
		<p>You may enter a date in the form YYYY-MM-DD to be shown a list of doctors licensed before this date by clicking the "Get Doctors" button to the side.</p>

		<form action="getdoctorsbefore.php" method="post">

 			Date: <input name="date" type="date">
 			
 			<input type="submit" value="Get Doctors">

		</form>
		<br>

		<!-- POINT 3: Inserting New Doctors -->

		<h2>Insert Doctor</h2>
		<p>You will be able to insert a doctor into the Central Hospital Database by entering information in the textboxes below. Furthermore, you must select a hospital for the doctor to work at - if none is selected by you, a default one will be selected.</p>

		<form action="insertdoctor.php" method="post">

 			First Name: <input name="fname" type="text" maxlength="20"><br>
 			Last Name: <input name="lname" type="text" maxlength="20"><br>
 			License Number: <input name="licenseno" type="text" maxlength="4" size="4"><br>
 			Date Licensed: <input name="dateinsert" type="date" maxlength="8"><br>
 			Specialty: <input name="specialty" type="text" maxlength="30"><br>

 			Hospital Employed At:
 			<select name="pickhospital" id="pickhospital">

				<?php 
					include "getallhospitals.php";
				?>

 			</select>
 			
 			<br><br>

 			<input type="submit" value="Insert Doctor">

		</form>
		<br>

		<!-- POINT 4: Deleting Doctors -->

		<h2>Delete Doctor</h2>
		<p>You will be able to delete a doctor from the Central Hospital Database by selecting their name from the drop down menu. You will be prompted to confirm their deletion if they are currently treating a patient.</p>

		<form action="deletedoctor.php" method ="post">

			<select name="deletedoctor" id="deletedoctor">

				<?php
					include "getalldoctors.php";
				?>

			</select>

			<input type="submit" value="Delete Doctor">

		</form>
		<br>

		<!-- POINT 5: Updating Hospital Names -->

		<h2>Update Hospital Name</h2>
		<p>You will be able to update a hospital's name below. Select a hospital you would like to update from the dropdown menu below and then enter the new name of the hospital.</p>

		<form action="updatehospitalname.php" method ="post">

 			Current Hospital Name:
			<select name="hospitalname" id="hospitalname">

				<?php 
					include "getallhospitals.php";
				?>

			</select>
			<br>

 			New Hospital Name: <input name="hospname" type="text" maxlength="20">

 			<br><br>	

			<input type="submit" value="Update Name">

		</form>
		<br>

		<!-- POINT 6: Listing Hospital Names Alphabetically -->

		<h2>Listing Hospitals Alphabetically</h2>
		<p>By clicking "See Hospitals" you will be taken to a new page where the hospitals will be sorted by name alphabetically. Furthermore, information about these hospitals will be presented on the page.</p>

		<form action="hospitalsort.php" method ="post">

			<input type="submit" value="See Hospitals">

		</form>
		<br>		

		<!-- POINT 7: Patient Information -->

		<h2>Patient Information</h2>
		<p>You may enter a nine-digit OHIP number associated with a patient to obtain all information of that patient. After you enter an OHIP number, click the "See Patient Information" button.</p>

		<form action="patientinfo.php" method ="post">

			OHIP Number: <input name="ohip" type="number">	

			<input type="submit" value="See Patient Information">

		</form>
		<br>

		<!-- POINT 8: Assigning Doctors to Patients -->

		<h2>Assigning Doctors to Patients</h2>
		<p>Below, you will be able to assign a doctor to treat a patient or to remove a doctor from the patient's treatment team. To do so, you must select the patient and doctor from the drop down menus below and you must also choose whether to assign the doctor to the patient or to remove the doctor from the patient's team. Once ready, click on the "Issue Directive" button.</p>

		<form action="docassignment.php" method ="post">

			Select Doctor:
			<select name="selectdoctor" id="selectdoctor">

				<?php
					include "getalldoctors.php";
				?>

			</select>

			<br>

			Select Patient:
			<select name="selectpatient" id="selectpatient">

				<?php
					include "getallpatients.php";
				?>

			</select>

			<br>

			Select Action:
			<select name="selectaction" id="selectaction">

				<option value="0">Assign</option>
				<option value="1">Remove</option>

			</select>

			<br>
			<br>

			<input type="submit" value="Issue Directive">

		</form>
		<br>

		<!-- POINT 9: Doctors Without Patients -->

		<h2>Doctors Without Patients</h2>
		<p>By clicking "See Doctors" you will be taken to a new page where doctors who are currently not treating any patients will be listed.</p>

		<form action="nopatients.php" method ="post">

			<input type="submit" value="See Doctors">

		</form>
		<br>

	</body>

	<footer>

		<p>Copyright Aleksandar Kostic | 2019</p>

	</footer>

</html>
