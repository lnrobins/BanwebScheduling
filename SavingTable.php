<?php
$db = new SQLITE3('updated_classes');
if(isset($_POST["export"])){
    header('Content-Type:  text/csv; charset=utf-8');
    header('Content-disposition: attachment; filename=CourseCalendar.csv');
    $output = fopen("CourseCalendar.csv", "w");
    fputcsv($output, array('CRN', 'Class Code', 'Course', 'Section', 'Campus', 'Credits', 'Title', 'Days', 'Time', 'Capacity', 'Actual', 'Remaining', 'Instructor', 'Date', 'Location', 'Fee'));
    $query = "SELECT * from schedule";
    $result = $db->query($query);
    while($row = $result->fetchArray(SQLITE3_ASSOC)){
        fputcsv($output, $row);
    }
    fclose($output);
}

header('Location: Home.php');
exit;
?>