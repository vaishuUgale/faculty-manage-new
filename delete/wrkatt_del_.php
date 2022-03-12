
<?php
include '../functions.php';
include '../conn.php';
if (isset($_GET['id'])) {
    $id=$_GET['id'];
    $query=mysqli_query($mysqli,"DELETE FROM `wsatt` WHERE `wsatt`.`wsatt_id` = '$id'");
    if ($query) {
       alert('Workshop Attendence deleted successfully');
       echo '<script>window.location.href="../wrkattendlist.php"</script>';

    }else {
        alert('Workshop Attendence Not deleted successfully');
        echo '<script>window.location.href="../wrkattendlist.php"</script>';
    }
}


?> 