<html>
	<head>
		<title>Php Picture Table Example</title>
	</head>	
	
	<body>
		<h4>Patient Medical records of hospital </h4>
			
		<table border="1">
			
			<tr>
				<td><h2>PatientID</h2></td>
				<td><h2>DoctorId</h2></td>
				<td><h2>Department</h2></td>
				<td><h2>PPSNumber</h2></td>
				<td><h2>HeartRate</h2></td>
				<td><h2>Bloodpressure</h2></td>
				<td><h2>Temprature</h2></td>
				<td><h2>Drug</h2></td>
				<td><h2>Remarks</h2></td>
				<!--<td><h2>Picture_path in File System</h2></td>-->
			</tr>

			<?php			
				
				#$host = "localhost";
				$host = "sarabsingh.cloudapp.net";
				$user = "sarab";
				$password = "sarab";
				$database = "medicalrecords";				
				
				$query = "SELECT PatientID,doctorId,department,PpsNumber,HeartRate,bloodPressure,Temprature,Drug,Remarks from patienthistory";

				$connect = mysqli_connect($host,$user,$password,$database) or die("Problem connecting.");
				$result = mysqli_query($connect,$query) or die("Bad Query.");

				mysqli_close($connect);

				while($row = $result->fetch_array())
				{
				
					echo "<tr>";
					echo "<td><h2>" .$row['PatientID'] . "</h2></td>";
					echo "<td><h2>" .$row['doctorId'] . "</h2></td>";
					echo "<td><h2>" .$row['department'] . "</h2></td>";
					echo "<td><h2>" .$row['PpsNumber'] . "</h2></td>";
					echo "<td><h2>" .$row['HeartRate'] . "</h2></td>";
					echo "<td><h2>" .$row['bloodPressure'] . "</h2></td>";
					echo "<td><h2>" .$row['Temprature'] . "</h2></td>";
					echo "<td><h2>" .$row['Drug'] . "</h2></td>";
					echo "<td><h2>" .$row['Remarks'] . "</h2></td>";
					#echo "<td><h2><img src=image_emp.php?empno=".$row['empno']." width=100 height=100/></h2></td>";
					#echo "<td><h2><img src=".$host1.$row['picture_path'] . " width=100 height=100/></h2></td>";
					# echo "<td><h2><img src=".$row['picture_path'] . " width=100 height=100/></h2></td>";
				    echo "</tr>";
				}
			?>

		<table>
	</body>
</html>