<?php
	header("Access-Control-Allow-Headers: Content-Type");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Origin: *");

	$username = "sarab";
	$password = "sarab";
	$hostname = "sarabsingh.cloudapp.net";
	$database = "medicalrecords";

	$dbhandle = mysqli_connect($hostname ,$username ,$password, $database) or die ("username password is wrong");
	
	$myuserId = $_GET['userId'];
	//$mypassword = $_GET['pass'];

	//$myusername = stripslashes($myusername);
	//$mypassword = stripslashes($mypassword);
	
	//$query = "SELECT * FROM patienthistory WHERE  '{$myuserId} == {doctorId}'";
	$query = "SELECT * FROM patienthistory WHERE doctorId = {$myuserId}";
	$result = mysqli_query($dbhandle, $query);
	$count = mysqli_num_rows ($result);
	$resultarray = array();
	
	if($count>0){
		while ($row = mysqli_fetch_assoc($result)) {
			$resultarray[] = $row;
		}
		
		
		//$query = "SELECT * FROM patienthistory WHERE doctorId = '{$userId}'";
		
		
		
        echo json_encode ($resultarray); 
	}
	else 
		echo'You have No patients Registered Yet';
	
	mysqli_close($dbhandle);