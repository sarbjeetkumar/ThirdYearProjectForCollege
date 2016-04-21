
			<?php			
				header("Access-Control-Allow-Headers: Content-Type");
				header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
				header("Access-Control-Allow-Origin: *");

			$username = "sarab";
			$password = "sarab";
			$hostname = "sarabsingh.cloudapp.net";
			$database = "medicalrecords";			
				
				$query = "SELECT PatientID,doctorId,patientName,doctorName,department,ppsNumber,heartRate,temprature,bloodPressure,drug,remarks from patienthistory";

				$connect = mysqli_connect($hostname,$username,$password,$database) or die("Problem connecting.");
				$result = mysqli_query($connect,$query) or die("Bad Query.");

				mysqli_close($connect);
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

			?>

	