
<?php
include '../functions.php';
include '../conn.php';
if (isset($_GET['id'])) {
    $id=$_GET['id'];
    $query=mysqli_query($mysqli,"DELETE FROM `fdporg` WHERE `fdporg`.`fdporg_id` = '$id'");
    if ($query) {
       alert('FDP Conference deleted successfully');
       echo '<script>window.location.href="../fdp_organized_list.php"</script>';

    }else {
        alert('FDP Conference Not deleted successfully');
        echo '<script>window.location.href="../fdp_organized_list.php"</script>';
    }
}


?> 