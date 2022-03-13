
<?php
include '../functions.php';
include '../conn.php';
if (isset($_GET['id'])) {
    $id=$_GET['id'];
    $query=mysqli_query($mysqli,"DELETE FROM `wsorgfstud` WHERE `wsorgfstud`.`wsorgfstud_id` = '$id'");
    if ($query) {
       alert('Workshop Attendence For Student deleted successfully');
       echo '<script>window.location.href="../wrkForStudlist.php"</script>';

    }else {
        alert('Workshop Attendence For Student Not deleted successfully');
        echo '<script>window.location.href="../wrkForStudlist.php"</script>';
    }
}


?> 