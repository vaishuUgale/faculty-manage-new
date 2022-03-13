
<?php
include '../functions.php';
include '../conn.php';
if (isset($_GET['id'])) {
    $id=$_GET['id'];
    $query=mysqli_query($mysqli,"DELETE FROM `iv` WHERE `iv`.`iv_id` = '$id'");
    if ($query) {
       alert('Industrial Visit deleted successfully');
       echo '<script>window.location.href="../iv_list.php"</script>';

    }else {
        alert('Industrial Visit Not deleted successfully');
        echo '<script>window.location.href="../iv_list.php"</script>';
    }
}


?> 