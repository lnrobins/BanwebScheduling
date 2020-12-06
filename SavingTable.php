<?php
header('Content-Type: application/force-download');
header('Content-disposition: attachment; filename=CourseCalendar.csv');
header("Pragma: ");
header("Cache-Control: ");
echo $_REQUEST['datatodisplay'];
?>