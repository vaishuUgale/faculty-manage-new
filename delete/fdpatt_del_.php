
<?php
include '../functions.php';
include '../conn.php';
if (isset($_GET['id'])) {
    $id=$_GET['id'];
    $query=mysqli_query($mysqli,"DELETE FROM `fdpatt` WHERE `fdpatt`.`fdpatt_id` = '$id'");
    if ($query) {
       alert('FDP Attendence deleted successfully');
       echo '<script>window.location.href="../fdp_attended_list.php"</script>';

    }else {
        alert('FDP Attendence  Not deleted successfully');
        echo '<script>window.location.href="../fdp_attended_list.php"</script>';
    }
}


?>