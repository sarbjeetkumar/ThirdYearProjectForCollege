<?php
	header("Access-Control-Allow-Headers: Content-Type");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Origin: *");

	$username = "sarab";
	$password = "sarab";
	$hostname = "sarabsingh.cloudapp.net";
	$database = "medicalrecords";

	$dbhandle = mysqli_connect($hostname ,$username ,$password, $database) or die ("username password is wrong");
	
	$myusername = $_GET['user'];
	$mypassword = $_GET['pass'];

	//$myusername = stripslashes($myusername);
	//$mypassword = stripslashes($mypassword);
	
	$query = "SELECT * FROM users WHERE username = '{$myusername}' AND Password = '{$mypassword}'";
	$result = mysqli_query($dbhandle, $query);
	$count = mysqli_num_rows ($result);
	$resultarray = array();
	
	if($count > 0){
		$rowUser = $result->fetch_array();
		if ($rowUser ['userType'] == 'Doctor'){
			$querySelect = "SELECT * from patienthistory where doctorId = '{$rowUser ['userId']}'";
			$result = mysqli_query($dbhandle, $querySelect) or die("Bad Query");
			
			$str = "[";
			
			while($row = $result->fetch_array())
			{
			
				$str .= "{";
				$str.="\"Patient\":{";
				$str.="\"PatientID\":\"" . $row['PatientID'] . "\",";
				$str.="\"doctorId\":\"" . $row['doctorId'] . "\",";
				$str.="\"patientName\":\"" . $row['patientName'] . "\",";
				$str.="\"doctorName\":\"" . $row['doctorName'] . "\",";
				$str.="\"department\":\"" . $row['department'] . "\",";
				$str.="\"ppsNumber\":\"" . $row['ppsNumber'] . "\",";
				$str.="\"heartRate\":\"" . $row['heartRate'] . "\",";
				$str.="\"temprature\":\"" . $row['temprature'] . "\",";
				$str.="\"bloodPressure\":\"" . $row['bloodPressure'] . "\",";
				$str.="\"drug\":\"" . $row['drug'] . "\",";
				$str.="\"remarks\":\"" . $row['remarks'] . "\"";
				$str .= "}";
				$str .= "},";

			}
			
			
			$str = substr_replace($str,"",-1);
			$str .= "]";
			echo $str;
			
		}
		else if ($rowUser ['userType'] == 'Nurse')
		{
			$querySelect = "SELECT * from patienthistory";
			$result = mysqli_query($dbhandle, $querySelect) or die ("Bad Query");
			
			$str = "[";
			
			while($row = $result->fetch_array())
			{
			
				$str .= "{";
				$str.="\"Patient\":{";
				$str.="\"PatientID\":\"" . $row['PatientID'] . "\",";
				$str.="\"doctorId\":\"" . $row['doctorId'] . "\",";
				$str.="\"patientName\":\"" . $row['patientName'] . "\",";
				$str.="\"doctorName\":\"" . $row['doctorName'] . "\",";
				$str.="\"department\":\"" . $row['department'] . "\",";
				$str.="\"ppsNumber\":\"" . $row['ppsNumber'] . "\",";
				$str.="\"heartRate\":\"" . $row['heartRate'] . "\",";
				$str.="\"temprature\":\"" . $row['temprature'] . "\",";
				$str.="\"bloodPressure\":\"" . $row['bloodPressure'] . "\",";
				$str.="\"drug\":\"" . $row['drug'] . "\",";
				$str.="\"remarks\":\"" . $row['remarks'] . "\"";
				$str .= "}";
				$str .= "},";
			}
			
			
			$str = substr_replace($str,"",-1);
			$str .= "]";
			echo $str;
		}
	}
	else 
		echo 'Username and a password is incorrect';
	
	mysqli_close($dbhandle);
?>