<html>
<link rel="stylesheet" href="phpStyles.css">
<body>
<?php
$db = new SQLITE3('updated_classes');
$sql = "SELECT * from classes where CRN ='" . $_GET['crn'] . "'";
$result = $db->query($sql);

echo "<form action='Home.php'><br><br><br><br> <br><br><br><br> <br><br><br><br>&nbsp&nbsp<label for='crn'>CRN: <input type'text' id='crn' name='crn'> <input type='submit' name='Add Course'>";
echo "<table>";
echo "<tableborder='1'>";
echo "<tr>";
echo "<th>CRN</th>";
echo "<th>Subject</th>";
echo "<th>Course</th>";
echo "<th>Section</th>";
echo "<th>Campus</th>";
echo "<th>Credits</th>";
echo "<th>Title</th>";
echo "<th>Days</th>";
echo "<th>Time</th>";
echo "<th>Capacity</th>";
echo "<th>Actual</th>";
echo "<th>Remaining</th>";
echo "<th>Instructor</th>";
echo "<th>Date</th>";
echo "<th>Location</th>";
echo "<th>Fee</th>";
echo "</tr>";
echo "</br>";
while($row=$result->fetchArray(SQLITE3_ASSOC)){	 	
	echo "<tr>";
	echo "<td>";
	echo $row['CRN'];
	echo "</td>";
	echo "<td>";
	echo $row['subject'];
	echo "</td>";
	echo "<td>";
	echo $row['course'];
	echo "</td>";
	echo "<td>";
	echo $row['section'];
	echo "</td>";
	echo "<td>";
	echo $row['campus'];
	echo "</td>";
	echo "<td>";
	echo $row['credits'];
	echo "</td>";
	echo "<td>";
	echo $row['title'];
	echo "</td>";
	echo "<td>";
	echo $row['days'];
	echo "</td>";
	echo "<td>";
	echo $row['time'];
	echo "</td>";
	echo "<td>";
	echo $row['capacity'];
	echo "</td>";
	echo "<td>";
	echo $row['actual'];
	echo "</td>";
	echo "<td>";
	echo $row['remaining'];
	echo "</td>";
	echo "<td>";
	echo $row['instructor'];
	echo "</td>";
	echo "<td>";
	echo $row['date'];
	echo "</td>";
	echo "<td>";
	echo $row['location'];
	echo "</td>";
	echo "<td>";
	echo $row['fee'];
	echo "</td>";
	echo "</tr>";
}
	echo "</br>";
	echo "</br>";
	echo "</br>";
	echo "</br>";
	echo "</br>";
	echo "</br>";
	echo "</br>";
	echo "</br>";
	echo "</br>";
	echo "</br>";
	echo "</br>";
	echo "</br>";
	echo "</br>";

	echo "</table>";
?>
<body style="background-color:white;">

	<div class="header">
	  <img src="https://www.mtu.edu/mtu_resources/images/download-central/logos/husky-icon/thumb.png" style="width:250px;height:100px;float:left;">
	  <h1 style="color:gold; font-family:Tahoma">Michigan Technological University Courses</h1>
	</div>

	<div class="slimHeader">
	</div>

</body>
</html>