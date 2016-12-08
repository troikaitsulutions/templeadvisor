<?php
	
	if(isset($_POST['currentMonth'],$_POST['currentYear'], $_POST['currentDay'])) 
		{
			$servername = "localhost";
			$username = "stagingt_root";
			$password = "LmtxGW0)9fsC";
			$dbname = "stagingt_db";
			
			$day = $_POST['currentDay'];
			$month = $_POST['currentMonth'];
			$year = $_POST['currentYear'];
			
			//$day = 18;
			//$month = 8;
			//$year = 2016;
			
			$d1 = strtotime($year.'-'.$month.'-'.$day);
			
			$conn = new mysqli($servername, $username, $password, $dbname);
			
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 

			$sql = "SELECT * FROM  tt_festival";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				$Dates = '<div class="post-content">
                                <div class="blog-infinite">';
				
				
				while($row = $result->fetch_assoc()) {
					
				$db_date = 	strtotime(date("d-m-Y",$row["fdate"]));
				$sdate = strtotime(date('d-m-Y',$d1));
				
				$Religion = '';
				$Deity = '';
				$Temple = '';
				
				if( $db_date == $sdate ) 
					{	
									$Dates .= '<div class="post">
                                        <div class="post-content-wrapper">
                                           
                                            <div class="details">
                                                <h2 class="entry-title">'.$row["name"].'</h2>
                                                <div class="excerpt-container">
                                                    <p>'.$row["comment"].'</p><br>
													
                                                </div>
                                                <div class="post-meta">
                                                    <div class="entry-action">
                                                        <a href="#" class="button entry-comment btn-small"><i class="soap-icon-calendar-1"></i><span>'.date("d-m-Y",$row["fdate"]).'</span></a>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>';
					}
				}
			}
			
			$conn->close();
			$Dates .= '</div></div>';
			echo $Dates;
			
		}

?>