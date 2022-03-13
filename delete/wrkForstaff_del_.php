
<?php
include '../functions.php';
include '../conn.php';
if (isset($_GET['id'])) {
    $id=$_GET['id'];
    $query=mysqli_query($mysqli,"DELETE FROM `wsorg` WHERE `wsorg`.`wsorg_id` = '$id'");
    if ($query) {
       alert('Workshop Attendence For Staff deleted successfully');
       echo '<script>window.location.href="../wrkForStafflist.php"</script>';

    }else {
        alert('Workshop Attendence For Staff Not deleted successfully');
        echo '<script>window.location.href="../wrkForStafflist.php"</script>';
    }
}


?> 