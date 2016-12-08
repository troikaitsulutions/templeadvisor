<?php
	
	if(isset($_POST['currentMonth'],$_POST['currentYear'])) 
		{
			$servername = "localhost";
			$username = "stagingt_root";
			$password = "LmtxGW0)9fsC";
			$dbname = "stagingt_db";
			
			$month = $_POST['currentMonth'];
			$year = $_POST['currentYear'];
			
			//$month = 8;
			//$year = 2016;
			
			$d1 = strtotime('01-'.$month.'-'.$year);
			$d2 = strtotime('30-'.$month.'-'.$year);
			
			//echo date('d-m-Y',$d1);
			//echo date('d-m-Y',$d2);
			
			//echo date('d-m-Y',1471372200);
			
			
			$conn = new mysqli($servername, $username, $password, $dbname);
			
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 

			$sql = "SELECT * FROM  tt_festival where fdate between ".$d1." AND ".$d2;
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				$Dates = array();
				while($row = $result->fetch_assoc()) {
					$Dates[] = date('d',$row["fdate"]);
				}
			}
			
			$conn->close();
			echo implode(",",$Dates);
			
		}

?>