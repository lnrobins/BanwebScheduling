<html>
<body>
<?php
$db = new SQLITE3('updated_classes');
$sql = "SELECT * from classes where subject = 'ENG'";
$result = $db->query($sql);
echo "<form action='Home.html'><br><br><br><br> <br><br><br><br> <br><br><br><br>&nbsp&nbsp<label for='crn'>CRN: <input type'text' id='crn' name='crn'> <input type='submit' name='Add Course'>";
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
	echo "</br>";
}
	echo "</table>";
?>
<body style="background-color:white;">

	<div class="header">
	  <img src="https://www.mtu.edu/mtu_resources/images/download-central/logos/husky-icon/thumb.png" style="width:250px;height:100px;float:left;">
	  <h1 style="color:gold; font-family:Tahoma">Michigan Technological University Calendar</h1>
	</div>

	<div class="topNavBar">
	<a class="active" href="Home.html"style="font-family:Arial;">Home</a>
	  <a href="Calendar.html"style="font-family:Arial">Calendar</a>
	  <a href="CourseList.html"style="font-family:Arial">Course List</a>
	  <a href="About.html"style="font-family:Arial">About</a>
	</div>
	

	<style>
	/*Removes white margins around the edges*/
	html, body {
	    margin: 0;
	    padding: 0;
	}

	.preHeader {
	  border: 25px solid #F4D03F;
	  background-color: #F4D03F;
	  position: relative;
	}

	.header {
	  border: 15px solid black;
	  background-color: black;
	  padding-left: 0px;
	  padding-bottom: 15px;
	  position: relative;
	  bottom: 9295px;
	}


	/* Style the navigation menu */
	.topNavBar {
	  width: 100%;
	  background-color: #292828;
	  overflow: auto;
	  position: relative;
	  bottom: 9295px;
	}

	/* Navigation links */
	.topNavBar a {
	  float: left;
	  padding: 12px;
	  color: white;
	  text-decoration: none;
	  font-size: 17px;
	  width: 23.7%; /* Four equal-width links. If you have two links, use 50%, and 33.33% for three links, etc.. */
	  text-align: center; /* If you want the text to be centered */
	}

	/* Add a background color on mouse-over */
	.topNavBar a:hover {
	  background-color: #ddd ;
	  color: black;
	}

	/* Style the current/active link /// Remove this for uniforminty*/
	.topNavBar a.active {
	  background-color: #292828;
	}

	/* Add responsiveness - on screens less than 500px, make the navigation links appear on top of each other, instead of next to each other */
	@media screen and (max-width: 500px) {
	  .topNavBar a {
	    float: none;
	    display: block;
	    width: 100%;
	    text-align: left;
	  }
	}

	.footer {
	  border: 22px solid black;
	  background-color: black;
	}

	td, th{
	 border: 1px solid #dddddd;
	 text-align: center;
	 padding: 8px;
	 align: center;
	}
	
	table{
	 position: relative; 
	 top:-1450px; 
	 left:80px; 
	 width: 80%;
	}

	}

	
	</style>
</body>
</html>