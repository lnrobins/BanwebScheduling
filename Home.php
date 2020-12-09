<!DOCTYPE html>
<html>
<link rel="stylesheet" href="HPstyle.css">
<body>

	<!-- Top black bar that houses the image and Title font -->
	<div class="header"> 
		<img src="https://www.mtu.edu/mtu_resources/images/download-central/logos/husky-icon/thumb.png" style="width:250px;height:100px;float:left;">
		<h1 style="color:gold; font-family:Tahoma">Michigan Technological University Class Scheduler</h1>
	</div>

	<div class="slimHeader">

	</div>

	<?php 
	$db = new SQLITE3('updated_classes');
	$newcrn = $_GET['crn'];
$sql = "SELECT * from classes where CRN ='" . $newcrn . "'";	// added lines 30, 33-53
$result = $db->query($sql);										// edited line 31 to be $newcrn instead of $_GET['crn']

while($row=$result->fetchArray(SQLITE3_ASSOC)){
	$updd = "INSERT INTO schedule values('" . $row['CRN'] . "', '" . $row['subject'] . "', '" . $row['course'] . "', '" . $row['section'] . "', '" . $row['campus'] . "', '" . $row['credits'] . "', '" . $row['title'] . "', '" . $row['days'] . "', '" . $row['time'] . "', '" . $row['capacity'] . "', '" . $row['actual'] . "', '" . $row['remaining'] . "', '" . $row['instructor'] . "', '" . $row['date'] . "', '" . $row['location'] . "', '" . $row['fee'] . "')";
	$addclass = $db->query($updd);
}
$sqls = "SELECT * from schedule";
$schedres = $db->query($sqls);	

include 'conflictNotification.php';
function am($row, $day, $time,$period){

	if( $row['time'] != "TBA" ) {
		
		$times = $row['time'];
		
		$timeArray = explode("-", $times);
		$startTimeArray = explode(" ", $timeArray[0]);
		$startTime = getTime($startTimeArray);
		$startTime = floor($startTime/4);

		$endTimeArray = explode(" ", $timeArray[1]);
		$periods = explode(" ", $timeArray[1]);
		$p2 = explode(" ", $timeArray[0]);
		$endTime = getTime($endTimeArray);
		$endTime = ceil($endTime/4);		
		$arr = str_split($row['days']);
		for($i = 0; $i< sizeof($arr); $i++){
			$classList = array();

			if(conflicts($classList, $row['CRN']) && $arr[$i] == $day && $time >= $startTime && $time < $endTime && ($period == $periods[1] || $period == $p2[1]) ){
				echo $row['title'];
				echo " ";
				echo $row['instructor'];
				echo " ";
				echo $row['time'];
			}
		}
	}
}

function pm($row, $day, $time,$period){

	if( $row['time'] != "TBA" ) {
		
		$times = $row['time'];
		$timeArray = explode("-", $times);
		$startTimeArray = explode(" ", $timeArray[0]);
		$startTime = getTime($startTimeArray);
		$startTime = floor($startTime/4);

		$endTimeArray = explode(" ", $timeArray[1]);
		$periods = explode(" ", $timeArray[1]);
		$p2 = explode(" ", $timeArray[0]);
		$endTime = getTime($endTimeArray);
		$endTime = ceil($endTime/4);		
		
		$arr = str_split($row['days']);
		for($i = 0; $i< sizeof($arr); $i++){
			$classList = array();

			if(conflicts($classList, $row['CRN']) && $arr[$i] == $day && $time >= $startTime && $time < $endTime && ($period == $periods[1] || $period == $p2[1]) ){
				echo $row['title'];
				echo " ";
				echo $row['instructor'];
				echo " ";
				echo $row['time'];
			}
		}
	}
}


echo"<table>";

echo "<tr>";
echo "<th width='220'>Time</th>";
echo "<th width='400'>Sunday</th>";
echo "<th width='400'>Monday</th>";
echo "<th width='400'>Tuesday</th>";
echo "<th width='400'>Wednesday</th>";
echo "<th width='400'>Thursday</th>";
echo "<th width='400'>Friday</th>";
echo "<th width='400'>Saturday</th>";
echo "</tr>";

echo "<tr>";
echo "<td>6:00 AM</td>";
echo "<td></td>";

echo "<td>";


while($row=$schedres->fetchArray(SQLITE3_ASSOC)){	
	am($row, "M", 6,"am");		
}
echo"</td>";

echo "<td>";	

while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	am($row, "T", 6,"am");	
}
echo"</td>";

echo "<td>";
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	am($row,"W", 6,"am");	
}
echo"</td>";

echo "<td>";	    
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	am($row, "R", 6,"am");	
}
echo"</td>";

echo "<td>";	
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	am($row, "F", 6,"am");	
}
echo"</td>";

echo "<td>";
echo"</td>";

echo "</tr>";

echo "<tr>";
echo "<td>7:00 AM</td>";
echo "<td></td>";

echo "<td>";
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	am($row, "M", 7,"am");	
}
echo"</td>";

echo "<td>";	
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	am($row, "T", 7,"am");	
}
echo"</td>";

echo "<td>";
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	am($row,"W", 7,"am");	
}
echo"</td>";

echo "<td>";	    
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	am($row, "R", 7,"am");	
}
echo"</td>";

echo "<td>";	
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	am($row, "F", 7,"am");	
}
echo"</td>";

echo "<td>";
echo"</td>";

echo "</tr>";

echo "<tr>";
echo "<td>8:00 AM</td>";
echo "<td></td>";

echo "<td>";
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	am($row, "M", 8,"am");	
}
echo"</td>";

echo "<td>";	
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	am($row, "T", 8,"am");	
}
echo"</td>";

echo "<td>";
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	am($row,"W", 8,"am");	
}
echo"</td>";

echo "<td>";	    
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	am($row, "R", 8,"am");	
}
echo"</td>";

echo "<td>";	
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	am($row, "F", 8,"am");	
}
echo"</td>";

echo "<td>";
echo"</td>";

echo "</tr>";


echo "<tr>";
echo "<td>9:00 AM</td>";
echo "<td></td>";

echo "<td>";
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	am($row, "M", 9,"am");	
}
echo"</td>";

echo "<td>";	
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	am($row, "T", 9,"am");	
}
echo"</td>";

echo "<td>";
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	am($row,"W", 9,"am");	
}
echo"</td>";

echo "<td>";	    
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	am($row, "R", 9,"am");	
}
echo"</td>";

echo "<td>";	
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	am($row, "F", 9,"am");	
}
echo"</td>";

echo "<td>";
echo"</td>";

echo "</tr>";


echo "<tr>";
echo "<td>10:00 AM</td>";
echo "<td></td>";

echo "<td>";
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	am($row, "M", 10,"am");	
}
echo"</td>";

echo "<td>";	
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	am($row, "T", 10,"am");	
}
echo"</td>";

echo "<td>";
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	am($row,"W", 10,"am");	
}
echo"</td>";

echo "<td>";	    
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	am($row, "R", 10,"am");	
}
echo"</td>";

echo "<td>";	
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	am($row, "F", 10,"am");	
}
echo"</td>";

echo "<td>";
echo"</td>";

echo "</tr>";


echo "<tr>";
echo "<td>11:00 AM</td>";
echo "<td></td>";

echo "<td>";
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	am($row, "M", 11,"am");	
}
echo"</td>";

echo "<td>";	
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	am($row, "T", 11,"am");	
}
echo"</td>";

echo "<td>";
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	am($row,"W", 11,"am");	
}
echo"</td>";

echo "<td>";	    
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	am($row, "R", 11,"am");	
}
echo"</td>";

echo "<td>";	
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	am($row, "F", 11,"am");	
}
echo"</td>";

echo "<td>";
echo"</td>";

echo "</tr>";



echo "<tr>";
echo "<td>12:00 PM</td>";
echo "<td></td>";

echo "<td>";
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row, "M", 12,"pm");	
}
echo"</td>";

echo "<td>";	
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row, "T", 12,"pm");	
}
echo"</td>";

echo "<td>";
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row,"W", 12,"pm");	
}
echo"</td>";

echo "<td>";	    
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row, "R", 12,"pm");	
}
echo"</td>";

echo "<td>";	
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row, "F", 12,"pm");	
}
echo"</td>";

echo "<td>";
echo"</td>";

echo "</tr>";


echo "<tr>";
echo "<td>1:00 PM</td>";
echo "<td></td>";

echo "<td>";
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row, "M", 1,"pm");	
}
echo"</td>";

echo "<td>";	
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row, "T", 1,"pm");	
}
echo"</td>";

echo "<td>";
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row,"W", 1,"pm");	
}
echo"</td>";

echo "<td>";	    
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row, "R", 1,"pm");	
}
echo"</td>";

echo "<td>";	
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row, "F", 1,"pm");	
}
echo"</td>";

echo "<td>";
echo"</td>";

echo "</tr>";



echo "<tr>";
echo "<td>2:00 PM</td>";
echo "<td></td>";

echo "<td>";
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row, "M", 2,"pm");	
}
echo"</td>";

echo "<td>";	
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row, "T", 2,"pm");	
}
echo"</td>";

echo "<td>";
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row,"W", 2,"pm");	
}
echo"</td>";

echo "<td>";	    
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row, "R", 2,"pm");	
}
echo"</td>";

echo "<td>";	
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row, "F", 2,"pm");	
}
echo"</td>";

echo "<td>";
echo"</td>";

echo "</tr>";




echo "<tr>";
echo "<td>3:00 PM</td>";
echo "<td></td>";

echo "<td>";
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row, "M", 3,"pm");	
}
echo"</td>";

echo "<td>";	
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row, "T", 3,"pm");	
}
echo"</td>";

echo "<td>";
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row,"W", 3,"pm");	
}
echo"</td>";

echo "<td>";	    
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row, "R", 3,"pm");	
}
echo"</td>";

echo "<td>";	
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row, "F", 3,"pm");	
}
echo"</td>";

echo "<td>";
echo"</td>";

echo "</tr>";	




echo "<tr>";
echo "<td>4:00 PM</td>";
echo "<td></td>";

echo "<td>";
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row, "M", 4,"pm");	
}
echo"</td>";

echo "<td>";	
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row, "T", 4,"pm");	
}
echo"</td>";

echo "<td>";
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row,"W", 4,"pm");	
}
echo"</td>";

echo "<td>";	    
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row, "R", 4,"pm");	
}
echo"</td>";

echo "<td>";	
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row, "F", 4,"pm");	
}
echo"</td>";

echo "<td>";
echo"</td>";

echo "</tr>";



echo "<tr>";
echo "<td>5:00 PM</td>";
echo "<td></td>";

echo "<td>";
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row, "M", 5,"pm");	
}
echo"</td>";

echo "<td>";	
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row, "T", 5,"pm");	
}
echo"</td>";

echo "<td>";
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row,"W", 5,"pm");	
}
echo"</td>";

echo "<td>";	    
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row, "R", 5,"pm");	
}
echo"</td>";

echo "<td>";	
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row, "F", 5,"pm");	
}
echo"</td>";

echo "<td>";
echo"</td>";

echo "</tr>";


echo "<tr>";
echo "<td>6:00 PM</td>";
echo "<td></td>";

echo "<td>";
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row, "M", 6,"pm");	
}
echo"</td>";

echo "<td>";	
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row, "T", 6,"pm");	
}
echo"</td>";

echo "<td>";
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row,"W", 6,"pm");	
}
echo"</td>";

echo "<td>";	    
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row, "R", 6,"pm");	
}
echo"</td>";

echo "<td>";	
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row, "F", 6,"pm");	
}
echo"</td>";

echo "<td>";
echo"</td>";

echo "</tr>";



echo "<tr>";
echo "<td>7:00 PM</td>";
echo "<td></td>";

echo "<td>";
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row, "M", 7,"pm");	
}
echo"</td>";

echo "<td>";	
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row, "T", 7,"pm");	
}
echo"</td>";

echo "<td>";
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row,"W", 7,"pm");	
}
echo"</td>";

echo "<td>";	    
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row, "R", 7,"pm");	
}
echo"</td>";

echo "<td>";	
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row, "F", 7,"pm");	
}
echo"</td>";

echo "<td>";
echo"</td>";

echo "</tr>";


echo "<tr>";
echo "<td>8:00 PM</td>";
echo "<td></td>";

echo "<td>";
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row, "M", 8,"pm");	
}
echo"</td>";

echo "<td>";	
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row, "T", 8,"pm");	
}
echo"</td>";

echo "<td>";
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row,"W", 8,"pm");	
}
echo"</td>";

echo "<td>";	    
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row, "R", 8,"pm");	
}
echo"</td>";

echo "<td>";	
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row, "F", 8,"pm");	
}
echo"</td>";

echo "<td>";
echo"</td>";

echo "</tr>";


echo "<tr>";
echo "<td>9:00 PM</td>";
echo "<td></td>";

echo "<td>";
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row, "M", 9,"pm");	
}
echo"</td>";

echo "<td>";	
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row, "T", 9,"pm");	
}
echo"</td>";

echo "<td>";
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row,"W", 9,"pm");	
}
echo"</td>";

echo "<td>";	    
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row, "R", 9,"pm");	
}
echo"</td>";

echo "<td>";	
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row, "F", 9,"pm");	
}
echo"</td>";

echo "<td>";
echo"</td>";

echo "</tr>";


echo "<tr>";
echo "<td>10:00 PM</td>";
echo "<td></td>";

echo "<td>";
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row, "M", 10,"pm");	
}
echo"</td>";

echo "<td>";	
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row, "T", 10,"pm");	
}
echo"</td>";

echo "<td>";
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row,"W", 10,"pm");	
}
echo"</td>";

echo "<td>";	    
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row, "R", 10,"pm");	
}
echo"</td>";

echo "<td>";	
while($row=$schedres->fetchArray(SQLITE3_ASSOC)){
	pm($row, "F", 10,"pm");	
}
echo"</td>";

echo "<td>";
echo"</td>";

echo "</tr>";

echo"</div>";
?>

<br>
<br>
<bv>
	<br>
	<br>
	<br>
	<bv>
		<br>
		<br>
		<br>
		<bv>
			<br>
			<br>
			<br>
			<bv>
				<br>
				<br>
				<br>
				<bv>
					<br>
					<br>
					<br>
					<bv>
						<br>
						<br> <!-- Spacing for formatting -->
						<br>
						<bv>
							<br>
							<br>
							<br>
							<bv>
								<br>
								<br>
								<br>
								<bv>
									<br>
									<br>
									<br>
									<bv>
										<br>
										<br>
										<br>
										<bv>
											<br>
											<br>
											<br>
											<bv>
												<br>
												<br>
												<br>
												<bv>
													<br>
													<br>
													<br>
													<bv>
														<br>
														<br>
														<br>
														<br>
														<br>
														<bv>
															<br>
															<br>
															<br>
															<bv>
																<br>
																<br>
																<br>
																<bv>
																	<br>
																	<br>
																	<br>
																	<bv>
																		<br>
																		<br>
																		<br>
																		<bv>
																			<br>
																			<br> <!-- Spacing for formatting -->
																			<br>

																			<div style="float:left;">
																			</div>

																			<form action='names.php'> 
																				<div style="float:left";>
																					<label for='names' style='margin-left: 22%'>Search by Class Name <br>
																						<input type='text' id='names' name='names' style='margin-left: 22%'>
																						<input type='submit' value='Search'>
																					</div>
																				</form>


																				<form action='instructors.php'>
																					<div style="float:left";>
																						<label for='instructors' style='margin-left: 22%'>Search by Instructor <br>
																							<input type='text' id='instructors' name='instructors' style='margin-left: 22%'>
																							<input type='submit' value='Search'>
																						</div>
																					</form>


																					<form action='crn.php'>
																						<div style="float:left";>
																							<label for='crn' style='margin-left: 22%'>Search by CRN <br>
																								<input type='text' id='crn' name='crn' style='margin-left: 22%'>
																								<input type='submit' value='Search'>

																							</div>
																						</form>

																						<form method="post" action='SavingTable.php'>
																							<input type='submit' name='export' value='Export Course Information' style='margin-left: 12.5%'>
																						</div>
																					</form>																

																					<form action='reset.php'>
																						<div style="float:left";>
																							<input type='submit' value='Clear Calendar' style='margin-left: 12.5%'>
																						</form>
																						<br>
																						<br>
																						<br>

																						<form action="mastertable.php" method="get">     
																							<button name="button" class="button" value="ACC" type="submit">Accounting</button>
																							<button name="button" class="button" value="AF" type="submit">Air Force</button>
																							<button name="button" class="button" value="AR" type="submit">Army ROTC</button>
																							<button name="button" class="button" value="ATM" type="submit">Atmospheric Science</button>
																							<button name="button" class="button" value="BMB" type="submit">Biochem & Modular Biology</button>
																							<button name="button" class="button" value="BL" type="submit">Biological Sciences</button>
																							<button name="button" class="button" value="BE" type="submit">Biomedical Engineering</button>
																							<button name="button" class="button" value="BUS" type="submit">Buisness</button>
																							<button name="button" class="button" value="BA" type="submit">Buisness Administration</button>
																							<button name="button" class="button" value="CM" type="submit">Chemical Engineering</button>
																							<button name="button" class="button" value="CH" type="submit">Chemistry</button>
																							<button name="button" class="button" value="CEE" type="submit">Civil & Environmental Engineering</button>
																							<button name="button" class="button" value="CSE" type="submit">Computational Science & Engineering</button>
																							<button name="button" class="button" value="CS" type="submit">Computer Science</button>
																							<button name="button" class="button" value="CMG" type="submit">Construction Management</button>
																							<button name="button" class="button" value="EC" type="submit">Economics</button>
																							<button name="button" class="button" value="ED" type="submit">Education</button>
																							<button name="button" class="button" value="EE" type="submit">Electrical & Computer Engineering</button>
																							<button name="button" class="button" value="EET" type="submit">Electrical Engineering Technology</button>
																							<button name="button" class="button" value="ENG" type="submit">Engineering Fundamentals</button>
																							<button name="button" class="button" value="ENT" type="submit">Enterprise</button>
																							<button name="button" class="button" value="FIN" type="submit">Finance</button>
																							<button name="button" class="button" value="FW" type="submit">Forest Resources & Envirenmental Science</button>
																							<button name="button" class="button" value="GE" type="submit">Geology & Mining Engineering Science</button>
																							<button name="button" class="button" value="HU" type="submit">Humanities</button>
																							<button name="button" class="button" value="KIP" type="submit">Kinesiology & Integratice Physiology</button>
																							<button name="button" class="button" value="MGT" type="submit">Management</button>
																							<button name="button" class="button" value="MIS" type="submit">Management Information Systems</button>
																							<button name="button" class="button" value="MKT" type="submit">Marketing</button>
																							<button name="button" class="button" value="MSE" type="submit">Material Science & Engineering</button>
																							<button name="button" class="button" value="MA" type="submit">Mathematical Sciences</button>
																							<button name="button" class="button" value="MEEM" type="submit">Mechanical Engineering - Engineering Mechanics</button>
																							<button name="button" class="button" value="MET" type="submit">Mechanical Engineering Technology</button>
																							<button name="button" class="button" value="OSM" type="submit">Operations & Supply Chain Management</button>
																							<button name="button" class="button" value="HON" type="submit">Palvis Honors</button>
																							<button name="button" class="button" value="PE" type="submit">Physical Education</button>
																							<button name="button" style="padding-left:2.5%; padding-right:2.5%" class="button" value="PH" type="submit">Physics</button>
																							<button name="button" class="button" value="PSY" type="submit">Physcology</button>
																							<button name="button" class="button" value="SA" type="submit">Sciences and Arts</button>
																							<button name="button" class="button" value="SS" type="submit">Social Services</button>
																							<button name="button" class="button" value="SU" type="submit">Surveying</button>
																							<button name="button" class="button" value="SAT" type="submit">System Administration Technology</button>
																							<button name="button" class="button" value="UN" type="submit">University Wide</button>
																							<button name="button" class="button" value="FA" type="submit">Visual Performing Arts</button>
																						</form> 

																						<br>
																						<br>

																						<!-- Black bar along the bottom for style -->
																						<div class="footer">
																						</div>

																					</body>
																					</html>