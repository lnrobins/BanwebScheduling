<html>
<body>
<?php

/* requires classList, an array of previously added classes, as well as newCRN, an integer CRN
 * for the class to be added.
 * returns 0 if there are conflicts, returns 1 for no conflicts
 */
function conflicts($classList, $newCRN) {

	//connect to the database and set up the query
	$db = new SQLITE3('updated_classes');
        $sql = "select days, time from classes where CRN = " . $newCRN;
	$result = $db->query($sql);

	$row = $result->fetchArray(SQLITE3_ASSOC);
	$time = $row['time'];
	if($time == "TBA") {
		return 1;
	}

	//set up arrays and initialize to the default value
	$mondayTimes = array();
	$mondayTimes = initArray($mondayTimes);

	$tuesdayTimes = array();
	$tuesdayTimes = initArray($tuesdayTimes);

	$wednesdayTimes = array();
	$wednesdayTimes = initArray($wednesdayTimes);

	$thursdayTimes = array();
	$thursdayTimes = initArray($thursdayTimes);

	$fridayTimes = array();
	$fridayTimes = initArray($fridayTimes);

	$times = array( $mondayTimes, $tuesdayTimes, $wednesdayTimes, $thursdayTimes, $fridayTimes );

	//fill in the times taken by previously added classes
	for($x = 0; $x < count($classList); $x++) {
		//connect to the database and set up the query
		$db = new SQLITE3('updated_classes');
        	$sql = "select days, time from classes where CRN = " . $classList[$x];
		$result = $db->query($sql);

		while($row = $result->fetchArray(SQLITE3_ASSOC)) {
			$days = $row['days'];
			$daysArray = str_split($days);
			$time = $row['time'];
			if($time != "TBA") {
				$timeArray = explode("-", $time);

				$startTimeArray = explode(" ", $timeArray[0]);
				$startTime = getTime($startTimeArray);

				$endTimeArray = explode(" ", $timeArray[1]);
				$endTime = getTime($endTimeArray);

				for($i = 0; $i < strlen($days); $i++) {
					switch($daysArray[$i]) {
						case "M":
							$mondayTimes = updateTimes($mondayTimes, $startTime, $endTime);
							break;
						case "T":
							$tuesdayTimes = updateTimes($tuesdayTimes, $startTime, $endTime);
							break;
						case "W":
							$wednesdayTimes = updateTimes($wednesdayTimes, $startTime, $endTime);
							break;
						case "R":
							$thursdayTimes = updateTimes($thursdayTimes, $startTime, $endTime);
							break;
						case "F":
							$fridayTimes = updateTimes($fridayTimes, $startTime, $endTime);
							break;
					}
				}
			}
           	}
	}

	/*attempt to fill in the times for the new class*/

	//connect to the database and set up the query
	$db = new SQLITE3('updated_classes');
        $sql = "select days, time from classes where CRN = " . $newCRN;
	$result = $db->query($sql);

	$row = $result->fetchArray(SQLITE3_ASSOC);
	$days = $row['days'];
	$daysArray = str_split($days);
	$time = $row['time'];
	$timeArray = explode("-", $time);

	$startTimeArray = explode(" ", $timeArray[0]);
	$startTime = getTime($startTimeArray);

	$endTimeArray = explode(" ", $timeArray[1]);
	$endTime = getTime($endTimeArray);

	for($i = 0; $i < strlen($days); $i++) {
		//returns 0 if there is a conflict, otherwise keeps going
		switch($daysArray[$i]) {
			case "M":
				if(checkTimes($mondayTimes, $startTime, $endTime)) {
					$mondayTimes = updateTimes($mondayTimes, $startTime, $endTime);
				} else {
					return 0;
				}
				break;
			case "T":
				if(checkTimes($tuesdayTimes, $startTime, $endTime)) {
					$tuesdayTimes = updateTimes($tuesdayTimes, $startTime, $endTime);
				} else {
					return 0;
				}
				break;
			case "W":
				if(checkTimes($wednesdayTimes, $startTime, $endTime)) {
					$wednesdayTimes = updateTimes($wednesdayTimes, $startTime, $endTime);
				} else {
					return 0;
				}
				break;
			case "R":
				if(checkTimes($thursdayTimes, $startTime, $endTime)) {
					$thursdayTimes = updateTimes($thursdayTimes, $startTime, $endTime);
				} else {
					return 0;
				}
				break;
			case "F":
				if(checkTimes($fridayTimes, $startTime, $endTime)) {
					$fridayTimes = updateTimes($fridayTimes, $startTime, $endTime);	
				} else {
					return 0;
				}
				break;
		}
	}
	
	//no conflicts
	return 1;
}

//notifies if there are any conflicts for new class
function checkTimes($dayArray, $startTime, $endTime) {
	$noConflicts = 1;
	for($i = $startTime; $i < $endTime; $i++) {
		if($dayArray[$i] == 1) {
			$noConflicts = 0;
		}
	}
	return $noConflicts;
}

//updates array entries to non-default value for times that are taken up
function updateTimes($dayArray, $startTime, $endTime) {
	for($i = $startTime; $i < $endTime; $i++) {
		$dayArray[$i] = 1;
	}
	return $dayArray;
}

//returns an integer time between 0 and 96 (e.g. 48 = 12:00 p.m., 52 = 1:00 p.m.)
function getTime($timeArray) {
	$numTime = explode(":", $timeArray[0]);
	$intNumTime = 4 * $numTime[0] + ceil($numTime[1]/15);
	if($numTime[1] == "pm" && $intNumTime != 48) {
		$intNumTime = $intNumTime + 48;
	}
	
	return $intNumTime;
}

//initializes array to a default value
function initArray($array) {
	for($i = 0; $i < 96; $i++) {
		array_unshift($array, 0);
	}
	
	return $array;
}

?>
</body>
</html>