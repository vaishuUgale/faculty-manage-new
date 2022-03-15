<?php
session_start();
include("./conn.php");
include("./functions.php");
if (!isset($_SESSION['username'])) {
    echo '<script>window.location.href="login.php"</script>';
}
$workshopatt = $_SESSION['user_id'];
$workshopattADDEDbY = $_SESSION['user_id'];
$UpId = "";
if (isset($_GET["up_id"])) {
    $UpId = $_GET["up_id"];
}

$workshopattVal = "";

$workshopname = "";

$fromdate = "";

$todate = "";

$level = "";
$file = "";
if ($UpId != "") {
    $findSql = "SELECT * FROM wsatt WHERE wsatt_id='$UpId'";
    if (mysqli_num_rows(mysqli_query($mysqli, $findSql)) > 0) {

        $res_find_row = mysqli_fetch_assoc(mysqli_query($mysqli, $findSql));

        $workshopattVal = $res_find_row['workshopatt'];
        $workshopname = $res_find_row['workshopname'];
        $fromdate = $res_find_row['fromdate'];
        $todate = $res_find_row['todate'];
        $level = $res_find_row['level'];
        $file = $res_find_row['wsatt_file'];
    } else {
        alert("No data found");
        echo '<script>window.location.href="home.php"</script>';
    }
}
if ($_SERVER['REQUEST_METHOD']   == 'POST') {
    // success!
    if ($_SESSION['role'] == 'admin') {
        $workshopatt = $mysqli->real_escape_string($_POST['workshopatt']);
    }
    $workshopname = $mysqli->real_escape_string($_POST['workshopname']);
    $fromdate = $mysqli->real_escape_string($_POST['fromdate']);

    $todate = $mysqli->real_escape_string($_POST['todate']);
    $level = $mysqli->real_escape_string($_POST['level']);

    $fileName  =  $_FILES['file']['name'];
    $file_only_name  =  explode(".", $fileName)[0];


    $tempPath  =  $_FILES['file']['tmp_name'];
    $fileSize  =  $_FILES['file']['size'];
    $file_type = $_FILES['file']['type'];
    $file_store = "upload/wrk_attend_doc/";
    $upload_path = "./upload/wrk_attend_doc/";
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION)); // get image extension

    $valid_extensions = array('pdf', 'pptx', 'doc', 'docx');

    if ($UpId == "") {
        if (empty($fileName)) {
            $sql = "INSERT INTO `wsatt`(`workshopatt`, `workshopname`, `fromdate`, `todate`, `level`,`wsatt_added_by`,`wsatt_user_id`) 
   VALUES('$workshopatt','$workshopname','$fromdate','$todate','$level','$workshopattADDEDbY','$workshopatt');";

            if ($mysqli->query($sql) == true) {
                $last_id = $mysqli->insert_id;

                genID($last_id, 'wsatt', 'wsatt_id', 'wsatt');
                alert("success");
                echo '<script>history.back()</script>';
            } else {
                // failed 
                alert("unsuccessful");
            }
        } else {
            if (in_array($fileExt, $valid_extensions)) {
                $t = time();
                $uploader = $file_store . $file_only_name . $workshopatt . $t . '.' . $fileExt;
                move_uploaded_file($tempPath, $uploader);
                $sql = "INSERT INTO `wsatt`(`workshopatt`, `workshopname`, `fromdate`, `todate`, `level`,`wsatt_file`,`wsatt_added_by`,`wsatt_user_id`) 
                VALUES('$workshopatt','$workshopname','$fromdate','$todate','$level','$uploader','$workshopattADDEDbY','$workshopatt');";

                if ($mysqli->query($sql) == true) {
                    $last_id = $mysqli->insert_id;

                    genID($last_id, 'wsatt', 'wsatt_id', 'wsatt');
                    alert("success");
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
            $sql = "UPDATE `wsatt` SET `workshopatt` = '$workshopatt', `workshopname` = '$workshopname', `fromdate` = '$fromdate', `todate` = '$todate', `level` = '$level', `wsatt_user_id` = '$workshopatt' WHERE `wsatt`.`wsatt_id` = '$UpId';";
            if ($mysqli->query($sql) == true) {
                echo '<script>history.back()</script>';

                alert("success");
            } else {
                // failed 
                echo '<script>history.back()</script>';

                alert("unsuccessful");
            }
        }else{
            if (in_array($fileExt, $valid_extensions)) {
                $t = time();
                $uploader = $file_store . $file_only_name . $workshopatt . $t . '.' . $fileExt;
                move_uploaded_file($tempPath, $uploader);
                $sql = "UPDATE `wsatt` SET `workshopatt` = '$workshopatt', `workshopname` = '$workshopname', `fromdate` = '$fromdate',`wsatt_file`='$uploader' ,`todate` = '$todate', `level` = '$level', `wsatt_user_id` = '$workshopatt' WHERE `wsatt`.`wsatt_id` = '$UpId';";
                if ($mysqli->query($sql) == true) {
                    echo '<script>history.back()</script>';
    
                    alert("success");
                } else {
                    // failed 
                    echo '<script>history.back()</script>';
    
                    alert("unsuccessful");
                }
            } else{
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

    <title>Workshop Attended</title>
    <link rel="stylesheet" href="firstcss.css">
</head>

<body>
<?php include('./nav.php') ?>  
    <div class="box">
        <h1>Workshop Attended</h1>
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
                        <select class="form-control" name="workshopatt">
                            <option disabled selected value="def">Select Faculty</option>
                            <?php
                            while ($users = mysqli_fetch_assoc($users_q)) {

                            ?>
                                <option value="<?php echo $users['user_id'] ?>" <?php echo $workshopattVal == $users['user_id'] ? 'selected' : '' ?>><?php echo $users['username'] ?> </option>
                            <?php

                            }
                            ?>
                        </select>
                    <?php

                    } ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">Workshop Name :</label>
                    <input type="text" value="<?php echo $workshopname ?>" class="form-control" name="workshopname" placeholder="Workshop Name">
                </div>
                <div class="mb-3">
                    <label class="form-label">Date :</label><br>
                    <div class="cont">
                        <label class="form-label" id="item1">From</label>
                        <input type="date" value="<?php echo $fromdate ?>" name="fromdate" class="form-control">
                        <label class="form-label" id="item1">To</label>
                        <input type="date" value="<?php echo $todate ?>" name="todate" class="form-control">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Level :</label>
                    <select class="form-control" name="level">
                        <option <?php echo $level == "State" ? 'selected' : '' ?> value="State">State</option>
                        <option <?php echo $level == "National" ? 'selected' : '' ?> value="National">National</option>
                        <option <?php echo $level == "International" ? 'selected' : '' ?> value="International">International</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Work attended Documents (only pdf,ppt,Word file) :</label>
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