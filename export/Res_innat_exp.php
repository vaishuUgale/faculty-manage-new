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
$fileName = "InternationalResearchPaperList_".$user_id . date('Y-m-d') . ".xls";

// Column names 
$fields = array('International Paper ID','Author1', 'Author2', 'Paper Title', 'Journal Name','DOP','Volume','Page no','DOI','International Research Paper User', 'Added By');

// Display column names as first row 
$excelData = implode("\t", array_values($fields)) . "\n";

// Fetch records from database 

$sql = "SELECT * FROM `inpaperpublication` WHERE inpaperpublication_user_id='$user_id'";
if (isset($_GET['admin'])) {
    if($_SESSION['role']=='admin') {
    $sql="SELECT * FROM `inpaperpublication`";
    }
  }
$query = $mysqli->query($sql);
if ($query->num_rows > 0) {
    // Output each row of the data 
    while ($row = $query->fetch_assoc()) {
        $lineData = array($row['npaperpublication_id'],$row['Author1'],$row['Author2'], $row['PaperTitle'], $row['JournalName'], $row['DOP'], $row['Volume'],$row['Pagenos'], $row['DOI'], get_Added_Name($row['inpaperpublication_user_id']), get_Added_Name($row['inpaperpublication_added_by']));
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
