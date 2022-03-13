<?php
// Load the database configuration file 
session_start();
if (!isset($_SESSION['username'])) {
    echo '<script>window.location.href="../login.php"</script>';
}
include '../conn.php';
include '../functions.php';

// Filter the excel data 
function filterData(&$str)
{
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if (strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
}

// Excel file name for download 
$user_id = $_SESSION['user_id'];
$fileName = "WorkshopForStudentList_".$user_id . date('Y-m-d') . ".xls";

// Column names 
$fields = array('Workshop ID','Organiser', 'Workshop Name','Start Date', 'End date', 'Level', 'Workshop student File Name', 'Attendee User', 'Added By');

// Display column names as first row 
$excelData = implode("\t", array_values($fields)) . "\n";

// Fetch records from database 

$sql = "SELECT * FROM `wsorgfstud` WHERE wsorgfstud_user_id='$user_id'";
if (isset($_GET['admin'])) {
    if($_SESSION['role']=='admin') {
    $sql="SELECT * FROM `wsorgfstud`";
    }
  }
$query = $mysqli->query($sql);
if ($query->num_rows > 0) {
    // Output each row of the data 
    while ($row = $query->fetch_assoc()) {
        $lineData = array($row['wsorgfstud_id'],$row['workshoporg'],$row['workshopname'], $row['fromdate'], $row['todate'], $row['level'], $row['wsorgfstud_file'], get_Added_Name($row['wsorgfstud_user_id']), get_Added_Name($row['wsorgfstud_added_by']));
        array_walk($lineData, 'filterData');
        $excelData .= implode("\t", array_values($lineData)) . "\n";
    }
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"$fileName\"");

    // Render excel data 
    echo $excelData;

    exit;
} else {
    alert("No Data Available");
    echo '<script>window.location.href="../home.php"</script>';

} 
 
// Headers for download 
