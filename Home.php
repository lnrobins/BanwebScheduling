


<!DOCTYPE html>
<html>
<link rel="stylesheet" href="style.css">
<body>

	<!-- Top black bar that houses the image and Title font -->
	<div class="header"> 
	<img src="https://www.mtu.edu/mtu_resources/images/download-central/logos/husky-icon/thumb.png" style="width:250px;height:100px;float:left;">
	  <h1 style="color:gold; font-family:Tahoma">Michigan Technological University Class Scheduler</h1>
	</div>


	<!-- Top navigation bar that houses the buttons -->
	<div class="topNavBar">
	  <a class="active" href="Home.php"style="font-family:Arial;">Home</a>
	  <a href="Calendar.html"style="font-family:Arial">Calendar</a>
	  <a href="CourseList.html"style="font-family:Arial">Course List</a>
	  <a href="About.html"style="font-family:Arial">About</a>
	</div>

		
	<!-- Table for Weekly View Scheduler -->
	<div class= "Class Scheduler">
		<!--<h2 style="font-family:Tahoma"; >Class Scheduler</h2>-->
<?php 
$db = new SQLITE3('updated_classes');
$sql = "SELECT * from classes where CRN ='" . $_GET['crn'] . "'";
$result = $db->query($sql);

include 'conflictNotification.php';

function day($row, $day, $time){
	
	if( $row['time'] != "TBA" ) {
		
		$times = $row['time'];

		$timeArray = explode("-", $times);

		$startTimeArray = explode(" ", $timeArray[0]);
		$startTime = getTime($startTimeArray);
		$startTime = floor($startTime/4);

		$endTimeArray = explode(" ", $timeArray[1]);
		$endTime = getTime($endTimeArray);
		$endTime = ceil($endTime/4);		

		$arr = str_split($row['days']);
		for($i = 0; $i< sizeof($arr); $i++){
			$classList = array();
			if(conflicts($classList, $row['CRN']) && $arr[$i] == $day && $time >= $startTime && $time < $endTime ){
				echo $row['CRN'];
				echo " ";
				echo $row['section'];
				echo " ";
				echo $row['credits'];
				echo " ";
				echo $row['title'];
				echo " ";
				echo $row['instructor'];
				echo " ";
				echo $row['date'];
				echo " ";
				echo $row['location'];
			}
		}
	}
}

echo"<table>";
	

	echo "<tr>";
	echo "<th>Time</th>";
	echo "<th>Sunday</th>";
	echo "<th>Monday</th>";
	echo "<th>Tuesday</th>";
	echo "<th>Wednesday</th>";
	echo "<th>Thursday</th>";
	echo "<th>Friday</th>";
	echo "<th>Saturday</th>";
	echo "</tr>";
	
	echo "<tr>";
		echo "<td>6:00 AM</td>";
		echo "<td></td>";
		
		echo "<td>";
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "M", 6);	
		}
		echo"</td>";

		echo "<td>";	
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "T", 6);	
		}
		echo"</td>";

		echo "<td>";
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row,"W", 6);	
		}
		echo"</td>";

		echo "<td>";	    
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "R", 6);	
		}
		echo"</td>";

		echo "<td>";	
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "F", 6);	
		}
		echo"</td>";

		echo "<td>";
		echo"</td>";
		
	echo "</tr>";
	
	echo "<tr>";
		echo "<td>7:00 AM</td>";
		echo "<td></td>";
		
		echo "<td>";
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "M", 7);	
		}
		echo"</td>";

		echo "<td>";	
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "T", 7);	
		}
		echo"</td>";

		echo "<td>";
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row,"W", 7);	
		}
		echo"</td>";

		echo "<td>";	    
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "R", 7);	
		}
		echo"</td>";

		echo "<td>";	
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "F", 7);	
		}
		echo"</td>";

		echo "<td>";
		echo"</td>";
		
	echo "</tr>";

	echo "<tr>";
		echo "<td>8:00 AM</td>";
		echo "<td></td>";
		
		echo "<td>";
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "M", 8);	
		}
		echo"</td>";

		echo "<td>";	
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "T", 8);	
		}
		echo"</td>";

		echo "<td>";
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row,"W", 8);	
		}
		echo"</td>";

		echo "<td>";	    
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "R", 8);	
		}
		echo"</td>";

		echo "<td>";	
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "F", 8);	
		}
		echo"</td>";

		echo "<td>";
		echo"</td>";
		
	echo "</tr>";

	echo "<tr>";
		echo "<td>9:00 AM</td>";
		echo "<td></td>";
		
		echo "<td>";
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "M", 9);	
		}
		echo"</td>";

		echo "<td>";	
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "T", 9);	
		}
		echo"</td>";

		echo "<td>";
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row,"W", 9);	
		}
		echo"</td>";

		echo "<td>";	    
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "R", 9);	
		}
		echo"</td>";

		echo "<td>";	
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "F", 9);	
		}
		echo"</td>";

		echo "<td>";
		echo"</td>";
		
	echo "</tr>";

	echo "<tr>";
		echo "<td>10:00 AM</td>";
		echo "<td></td>";
		
		echo "<td>";
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "M", 10);	
		}
		echo"</td>";

		echo "<td>";	
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "T", 10);	
		}
		echo"</td>";

		echo "<td>";
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row,"W", 10);	
		}
		echo"</td>";

		echo "<td>";	    
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "R", 10);	
		}
		echo"</td>";

		echo "<td>";	
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "F", 10);	
		}
		echo"</td>";

		echo "<td>";
		echo"</td>";
		
	echo "</tr>";

	echo "<tr>";
		echo "<td>11:00 AM</td>";
		echo "<td></td>";
		
		echo "<td>";
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "M", 11);	
		}
		echo"</td>";

		echo "<td>";	
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "T", 11);	
		}
		echo"</td>";

		echo "<td>";
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row,"W", 11);	
		}
		echo"</td>";

		echo "<td>";	    
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "R", 11);	
		}
		echo"</td>";

		echo "<td>";	
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "F", 11);	
		}
		echo"</td>";

		echo "<td>";
		echo"</td>";
		
	echo "</tr>";

	echo "<tr>";
		echo "<td>12:00 PM</td>";
		echo "<td></td>";
		
		echo "<td>";
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "M", 12);	
		}
		echo"</td>";

		echo "<td>";	
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "T", 12);	
		}
		echo"</td>";

		echo "<td>";
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row,"W", 12);	
		}
		echo"</td>";

		echo "<td>";	    
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "R", 12);	
		}
		echo"</td>";

		echo "<td>";	
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "F", 12);	
		}
		echo"</td>";

		echo "<td>";
		echo"</td>";
		
	echo "</tr>";

	echo "<tr>";
		echo "<td>1:00 PM</td>";
		echo "<td></td>";
		
		echo "<td>";
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "M", 13);	
		}
		echo"</td>";

		echo "<td>";	
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "T", 13);	
		}
		echo"</td>";

		echo "<td>";
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row,"W", 13);	
		}
		echo"</td>";

		echo "<td>";	    
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "R", 13);	
		}
		echo"</td>";

		echo "<td>";	
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "F", 13);	
		}
		echo"</td>";

		echo "<td>";
		echo"</td>";
		
	echo "</tr>";

	echo "<tr>";
		echo "<td>2:00 PM</td>";
		echo "<td></td>";
		
		echo "<td>";
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "M", 14);	
		}
		echo"</td>";

		echo "<td>";	
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "T", 14);	
		}
		echo"</td>";

		echo "<td>";
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row,"W", 14);	
		}
		echo"</td>";

		echo "<td>";	    
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "R", 14);	
		}
		echo"</td>";

		echo "<td>";	
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "F", 14);	
		}
		echo"</td>";

		echo "<td>";
		echo"</td>";
		
	echo "</tr>";

	echo "<tr>";
		echo "<td>3:00 PM</td>";
		echo "<td></td>";
		
		echo "<td>";
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "M", 15);	
		}
		echo"</td>";

		echo "<td>";	
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "T", 15);	
		}
		echo"</td>";

		echo "<td>";
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row,"W", 15);	
		}
		echo"</td>";

		echo "<td>";	    
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "R", 15);	
		}
		echo"</td>";

		echo "<td>";	
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "F", 15);	
		}
		echo"</td>";

		echo "<td>";
		echo"</td>";
		
	echo "</tr>";	

	echo "<tr>";
		echo "<td>4:00 PM</td>";
		echo "<td></td>";
		
		echo "<td>";
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "M", 16);	
		}
		echo"</td>";

		echo "<td>";	
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "T", 16);	
		}
		echo"</td>";

		echo "<td>";
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row,"W", 16);	
		}
		echo"</td>";

		echo "<td>";	    
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "R", 16);	
		}
		echo"</td>";

		echo "<td>";	
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "F", 16);	
		}
		echo"</td>";

		echo "<td>";
		echo"</td>";
		
	echo "</tr>";

	echo "<tr>";
		echo "<td>5:00 PM</td>";
		echo "<td></td>";
		
		echo "<td>";
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "M", 17);	
		}
		echo"</td>";

		echo "<td>";	
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "T", 17);	
		}
		echo"</td>";

		echo "<td>";
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row,"W", 17);	
		}
		echo"</td>";

		echo "<td>";	    
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "R", 17);	
		}
		echo"</td>";

		echo "<td>";	
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "F", 17);	
		}
		echo"</td>";

		echo "<td>";
		echo"</td>";
		
	echo "</tr>";

	echo "<tr>";
		echo "<td>6:00 PM</td>";
		echo "<td></td>";
		
		echo "<td>";
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "M", 18);	
		}
		echo"</td>";

		echo "<td>";	
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "T", 18);	
		}
		echo"</td>";

		echo "<td>";
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row,"W", 18);	
		}
		echo"</td>";

		echo "<td>";	    
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "R", 18);	
		}
		echo"</td>";

		echo "<td>";	
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "F", 18);	
		}
		echo"</td>";

		echo "<td>";
		echo"</td>";
		
	echo "</tr>";

	echo "<tr>";
		echo "<td>7:00 PM</td>";
		echo "<td></td>";
		
		echo "<td>";
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "M", 19);	
		}
		echo"</td>";

		echo "<td>";	
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "T", 19);	
		}
		echo"</td>";

		echo "<td>";
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row,"W", 19);	
		}
		echo"</td>";

		echo "<td>";	    
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "R", 19);	
		}
		echo"</td>";

		echo "<td>";	
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "F", 19);	
		}
		echo"</td>";

		echo "<td>";
		echo"</td>";
		
	echo "</tr>";

	echo "<tr>";
		echo "<td>8:00 PM</td>";
		echo "<td></td>";
		
		echo "<td>";
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "M", 20);	
		}
		echo"</td>";

		echo "<td>";	
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "T", 20);	
		}
		echo"</td>";

		echo "<td>";
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row,"W", 20);	
		}
		echo"</td>";

		echo "<td>";	    
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "R", 20);	
		}
		echo"</td>";

		echo "<td>";	
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "F", 20);	
		}
		echo"</td>";

		echo "<td>";
		echo"</td>";
		
	echo "</tr>";

	echo "<tr>";
		echo "<td>9:00 PM</td>";
		echo "<td></td>";
		
		echo "<td>";
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "M", 21);	
		}
		echo"</td>";

		echo "<td>";	
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "T", 21);	
		}
		echo"</td>";

		echo "<td>";
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row,"W", 21);	
		}
		echo"</td>";

		echo "<td>";	    
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "R", 21);	
		}
		echo"</td>";

		echo "<td>";	
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "F", 21);	
		}
		echo"</td>";

		echo "<td>";
		echo"</td>";
		
	echo "</tr>";

	echo "<tr>";
		echo "<td>10:00 PM</td>";
		echo "<td></td>";
		
		echo "<td>";
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "M", 22);	
		}
		echo"</td>";

		echo "<td>";	
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "T", 22);	
		}
		echo"</td>";

		echo "<td>";
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row,"W", 22);	
		}
		echo"</td>";

		echo "<td>";	    
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "R", 22);	
		}
		echo"</td>";

		echo "<td>";	
		while($row=$result->fetchArray(SQLITE3_ASSOC)){
			day($row, "F", 22);	
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
	<br>
	<br>
	<bv>
	<br>
	<br> <!-- Spacing for formatting -->
	<br>
	
	<br>

	<div style="float:left;">
		<!--&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;-->
	</div>

	<form action='names.php'> 
		<div style="float:left";>
		<label for='names' style='margin-left: 5%'>Search by Class Name <br>
		<input type='text' id='names' name='names' style='margin-left: 5%'>
		<input type='submit' value='Search'>
		<!--&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;-->	
		</div>
	</form>


	<form action='instructors.php'>
		<div style="float:left";>
		<label for='instructors' style='margin-left: 5%'>Search by Instructor <br>
		<input type='text' id='instructors' name='instructors' style='margin-left: 5%'>
		<input type='submit' value='Search'>
		<!--&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;-->
		</div>
	</form>


	<form action='crn.php'>
		<div style="float:left";>
		<label for='crn' style='margin-left: 5%'>Search by CRN <br>
		<input type='text' id='crn' name='crn' style='margin-left: 5%'>
		<input type='submit' value='Search'>
		
		</div>
	</form>

<form action=''>
		<input type='submit' value='Reset'>
		<session_unset()>
		</div>
	</form>

	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
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
        <br>
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
        <br>
        <button name="button" class="button" value="PH" type="submit">Physics</button>
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