
<?php
include '../functions.php';
include '../conn.php';
if (isset($_GET['id'])) {
    $id=$_GET['id'];
    $query=mysqli_query($mysqli,"DELETE FROM `conatt` WHERE `conatt`.`conatt_id` = '$id'");
    if ($query) {
       alert('Conferrence deleted successfully');
       echo '<script>window.location.href="../conference_list.php"</script>';

    }else {
        alert('Conferrence Not deleted successfully');
        echo '<script>window.location.href="../conference_list.php"</script>';
    }
}


?>