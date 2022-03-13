<?php
session_start();
include("./conn.php");
include("./functions.php");
if (!isset($_SESSION['username'])) {
    echo '<script>window.location.href="login.php"</script>';
}
$FDPAttended = $_SESSION['user_id'];
$FDPAttendedAdded = $_SESSION['user_id'];
$UpId = "";
if (isset($_GET["up_id"])) {
    $UpId = $_GET["up_id"];
}
$FDPAttendeddVal = "";

$fdpname = "";

$fromdate = "";

$todate = "";

$level = "";
$file = "";
if ($UpId != "") {
    echo "sc";
    $findSql = "SELECT * FROM fdpatt WHERE fdpatt_id='$UpId'";
    if (mysqli_num_rows(mysqli_query($mysqli, $findSql)) > 0) {

        $res_find_row = mysqli_fetch_assoc(mysqli_query($mysqli, $findSql));
        $FDPAttendeddVal = $res_find_row['fdpatt_user_id'];

        $fdpname = $res_find_row['fdpname'];

        $fromdate = $res_find_row['fromdate'];

        $todate = $res_find_row['todate'];

        $level = $res_find_row['level'];
        $file = $res_find_row['fdpatt_file'];
    } else {
        alert("No data found");
        echo '<script>window.location.href="home.php"</script>';
    }
}

if ($_SERVER['REQUEST_METHOD']   == 'POST') {
    // success!
    if ($_SESSION['role'] == 'admin') {
        $FDPAttended = $mysqli->real_escape_string($_POST['FDPAttended']);
    }
    $fdpname = $mysqli->real_escape_string($_POST['fdpname']);
    $fromdate = $mysqli->real_escape_string($_POST['fromdate']);

    $todate = $mysqli->real_escape_string($_POST['todate']);
    $level = $mysqli->real_escape_string($_POST['level']);


    $fileName  =  $_FILES['file']['name'];
    $file_only_name  =  explode(".", $fileName)[0];


    $tempPath  =  $_FILES['file']['tmp_name'];
    $fileSize  =  $_FILES['file']['size'];
    $file_type = $_FILES['file']['type'];
    $file_store = "upload/fdp_attend/";
    $upload_path = "./upload/fdp_attend/";
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION)); // get image extension

    $valid_extensions = array('pdf', 'pptx', 'doc', 'docx');

    if ($UpId == "") {

        if (empty($fileName)) {
            $sql = "INSERT INTO `fdpatt`(`FDPAttended`, `fdpname`, `fromdate`, `todate`, `level`,`fdpatt_user_id`,`fdpatt_added_by`) 
            VALUES('$FDPAttended','$fdpname','$fromdate','$todate','$level','$FDPAttended','$FDPAttendedAdded');";

            if ($mysqli->query($sql) == true) {
                $last_id = $mysqli->insert_id;
                genID($last_id, "fdpatt", "fdpatt_id", "FDPAttended");
                alert("success");
                // echo '<script>history.back()</script>';
            } else {
                // failed 

                alert("unsuccessful");
            }
        } else {
            if (in_array($fileExt, $valid_extensions)) {
                $t = time();
                $uploader = $file_store . $file_only_name . $FDPAttended . $t . '.' . $fileExt;
                move_uploaded_file($tempPath, $uploader); // move file from system temporary path to our upload folder path 

                $sql = "INSERT INTO `fdpatt`(`FDPAttended`, `fdpname`, `fromdate`, `todate`, `level`,`fdpatt_user_id`,`fdpatt_added_by`,`fdpatt_file`) 
                VALUES('$FDPAttended','$fdpname','$fromdate','$todate','$level','$FDPAttended','$FDPAttendedAdded','$uploader');";

                if ($mysqli->query($sql) == true) {
                    $last_id = $mysqli->insert_id;
                    genID($last_id, "fdpatt", "fdpatt_id", "FDPAttended");
                    alert("success");
                    // echo '<script>history.back()</script>';
                } else {
                    // failed 

                    alert("unsuccessful");
                }
            } else {
                alert("Please Provide valid file");
            }
        }
    } else {
        if (empty($fileName)) {
            $sql = "UPDATE `fdpatt` SET `FDPAttended` = '$FDPAttended', `fdpname` = '$fdpname', `fromdate` = '$fromdate', `todate` = '$todate', `level` = '$level', `fdpatt_user_id` = '$FDPAttended' WHERE `fdpatt`.`fdpatt_id` ='$UpId';";
            if ($mysqli->query($sql) == true) {
                // echo '<script>history.back()</script>';

                alert("success");
            } else {
                // failed 

                alert("unsuccessful");
            }
        } else {
            if (in_array($fileExt, $valid_extensions)) {
                $t = time();
                $uploader = $file_store . $file_only_name . $FDPAttended . $t . '.' . $fileExt;
                move_uploaded_file($tempPath, $uploader); // move file from system temporary path to our upload folder path 

            $sql = "UPDATE `fdpatt` SET `FDPAttended` = '$FDPAttended', `fdpname` = '$fdpname', `fromdate` = '$fromdate', `todate` = '$todate', `level` = '$level', `fdpatt_file` = '$uploader', `fdpatt_user_id` = '$FDPAttended' WHERE `fdpatt`.`fdpatt_id` ='$UpId';";

                if ($mysqli->query($sql) == true) {
                    $last_id = $mysqli->insert_id;
                    genID($last_id, "fdpatt", "fdpatt_id", "FDPAttended");
                    alert("success");
                    // echo '<script>history.back()</script>';
                } else {
                    // failed 

                    alert("unsuccessful");
                }
            } else {
                alert("Please Provide valid file");
            }
        }
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>FDP Attended By</title>
    <link rel="stylesheet" href="firstcss.css">
</head>

<body>
<?php include('./nav.php') ?>  


    <div class="box">
        <h1>FDP Attended By</h1>
    </div>
    <form action="" method="post" enctype="multipart/form-data">

        <div class="wrapper">
            <div class="container">
                <div class="mb-3">
                    <?php
                    if ($_SESSION['role'] == 'admin') {
                        $users_q = mysqli_query($mysqli, "select * from users");

                    ?>
                        <label class="form-label">Name of Faculty :</label>
                        <select class="form-control" name="FDPAttended">
                            <option disabled selected value="def">Select Faculty</option>
                            <?php
                            while ($users = mysqli_fetch_assoc($users_q)) {

                            ?>
                                <option value="<?php echo $users['user_id'] ?>" <?php echo $FDPAttendeddVal == $users['user_id'] ? 'selected' : '' ?>><?php echo $users['username'] ?> </option>
                            <?php

                            }
                            ?>
                        </select>
                    <?php

                    } ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">FDP Name :</label>
                    <input type="text" class="form-control" value="<?php echo $fdpname; ?>" name="fdpname" placeholder="FDP Name">
                </div>
                <div class="mb-3">
                    <label class="form-label">Date :</label><br>
                    <div class="cont">
                        <label class="form-label" id="item1">From</label>
                        <input type="date" value="<?php echo $fromdate; ?>" name="fromdate" class="form-control">
                        <label class="form-label" id="item1">To</label>
                        <input type="date" value="<?php echo $todate; ?>" name="todate" class="form-control">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Level :</label>
                    <?php echo $level ?>
                    <select class="form-control" name="level">
                        <option <?php echo $level == "State" ? 'selected' : '' ?> value="State">State</option>
                        <option <?php echo $level == "National" ? 'selected' : '' ?> value="National">National</option>
                        <option <?php echo $level == "International" ? 'selected' : '' ?> value="International">International</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">FDP Documents (only pdf,ppt,Word file) :</label>
                    <input type="file" class="form-control file" name="file" placeholder="FDP Files">
                    <?php
                    if ($file != "") {
                    ?>
                        <a href="<?php echo $file  ?>" target="_blank" class="btn btn-primary">Show file</a>
                    <?php
                    }
                    ?>
                </div>

                <div class="mb-3">
                    <div class="cont-1">
                        <input type="submit" class="form-control" name="Submit" id="input">
                    </div>

                </div>
            </div>
        </div>
    </form>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>