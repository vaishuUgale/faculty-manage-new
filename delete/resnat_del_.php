
<?php
include '../functions.php';
include '../conn.php';
if (isset($_GET['id'])) {
    $id=$_GET['id'];
    $query=mysqli_query($mysqli,"DELETE FROM `npaperpublication` WHERE `npaperpublication`.`npaperpublication_id` = '$id'");
    if ($query) {
       alert('National Research Paper deleted successfully');
       echo '<script>window.location.href="../resnat_list.php"</script>';

    }else {
        alert('National Research Paper Not deleted successfully');
        echo '<script>window.location.href="../resnat_list.php"</script>';
    }
}


?> 