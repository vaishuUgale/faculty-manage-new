
<?php
include '../functions.php';
include '../conn.php';
if (isset($_GET['id'])) {
    $id=$_GET['id'];
    $query=mysqli_query($mysqli,"DELETE FROM `inpaperpublication` WHERE `inpaperpublication`.`inpaperpublication_id` = '$id'");
    if ($query) {
       alert('InterNational Research Paper deleted successfully');
       echo '<script>window.location.href="../resinnat_list.php"</script>';

    }else {
        alert('InterNational Research Paper Not deleted successfully');
        echo '<script>window.location.href="../resinnat_list.php"</script>';
    }
}


?> 