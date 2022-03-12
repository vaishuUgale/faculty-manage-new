
<?php
include '../functions.php';
include '../conn.php';
if (isset($_GET['id'])) {
    $id=$_GET['id'];
    $query=mysqli_query($mysqli,"DELETE FROM `guestlect` WHERE `guestlect`.`guestlect_id` = '$id'");
    if ($query) {
       alert('Guest Lecture deleted successfully');
       echo '<script>window.location.href="../Guest_lec_list.php"</script>';

    }else {
        alert('Guest Lecture Not deleted successfully');
        echo '<script>window.location.href="../Guest_lec_list.php"</script>';
    }
}


?> 