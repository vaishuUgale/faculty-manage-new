<?php
session_start();
include("./conn.php");
include("./functions.php");
if (!isset($_SESSION['username'])) {
    echo '<script>window.location.href="login.php"</script>';
}
$glorg = $_SESSION['user_id'];
$glorgAddedBy = $_SESSION['user_id'];
$UpId = "";
if (isset($_GET["up_id"])) {
    $UpId = $_GET["up_id"];
}

$glorgVal = "";
$glname = "";
$date = "";
$level = "";
$file = "";
if ($UpId != "") {
    $findSql = "SELECT * FROM guestlect WHERE guestlect_id='$UpId'";
    if (mysqli_num_rows(mysqli_query($mysqli, $findSql)) > 0) {

        $res_find_row = mysqli_fetch_assoc(mysqli_query($mysqli, $findSql));

        $glorgVal = $res_find_row['glorg'];
        $glname = $res_find_row['glname'];
        $date = $res_find_row['date'];
        $level = $res_find_row['level'];
        $file = $res_find_row['guestlect_file'];
    } else {
        alert("No data found");
        echo '<script>window.location.href="home.php"</script>';
    }
}
if ($_SERVER['REQUEST_METHOD']   == 'POST') {
    // success!
    if ($_SESSION['role'] == 'admin') {
        $glorg = $mysqli->real_escape_string($_POST['glorg']);
    }
    $glname = $mysqli->real_escape_string($_POST['glname']);
    $date = $mysqli->real_escape_string($_POST['date']);

    $level = $mysqli->real_escape_string($_POST['level']);

    $fileName  =  $_FILES['file']['name'];
    $file_only_name  =  explode(".", $fileName)[0];


    $tempPath  =  $_FILES['file']['tmp_name'];
    $fileSize  =  $_FILES['file']['size'];
    $file_type = $_FILES['file']['type'];
    $file_store = "upload/guest_docs/";
    $upload_path = "./upload/guest_docs/";
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION)); // get image extension

    $valid_extensions = array('pdf', 'pptx', 'doc', 'docx');

    if ($UpId == "") {
        if (empty($fileName)) {
            $sql = "INSERT INTO `guestlect`(`glorg`, `glname`, `date`,`level`, `guestlect_user_id`,`guestlect_added_by`) 
      VALUES('$glorg','$glname','$date','$level','$glorg','$glorgAddedBy');";

            if ($mysqli->query($sql) == true) {
                $last_id = $mysqli->insert_id;

                genID($last_id, 'guestlect', 'guestlect_id', 'guestlect');
                alert("success");
                echo '<script>history.back()</script>';

            } else {
                // failed 

                alert("unsuccessful");
            }
        } else {
            if (in_array($fileExt, $valid_extensions)) {
                $t = time();
                $uploader = $file_store . $file_only_name . $glorg . $t . '.' . $fileExt;
                move_uploaded_file($tempPath, $uploader);
                $sql = "INSERT INTO `guestlect`(`glorg`, `glname`, `date`,`level`,`guestlect_file`, `guestlect_user_id`,`guestlect_added_by`) 
                VALUES('$glorg','$glname','$date','$level','$uploader','$glorg','$glorgAddedBy');";
                if ($mysqli->query($sql) == true) {
                    $last_id = $mysqli->insert_id;

                    genID($last_id, 'guestlect', 'guestlect_id', 'guestlect');
                    alert("success");
                    echo '<script>history.back()</script>';

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
            $sql = "UPDATE `guestlect` SET `glorg` = '$glorg', `glname` = '$glname', `date` = '$date', `level` = '$level', `guestlect_user_id` = '$glorg' WHERE `guestlect`.`guestlect_id` = '$UpId';";
            if ($mysqli->query($sql) == true) {
                echo '<script>history.back()</script>';

                alert("success");
            } else {
                // failed 
               echo '<script>history.back()</script>';
                

                alert("unsuccessful");
            }
        }else{
            $t = time();
            $uploader = $file_store . $file_only_name . $glorg . $t . '.' . $fileExt;
            move_uploaded_file($tempPath, $uploader);
            $sql = "UPDATE `guestlect` SET `glorg` = '$glorg', `glname` = '$glname', `date` = '$date', `level` = '$level',`guestlect_file`='$uploader', `guestlect_user_id` = '$glorg' WHERE `guestlect`.`guestlect_id` = '$UpId';";
            if ($mysqli->query($sql) == true) {
                echo '<script>history.back()</script>';

                alert("success");
            } else {
                // failed 
                echo '<script>history.back()</script>';

                alert("unsuccessful");
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

    <title>Guest Lecture Organised By</title>
    <link rel="stylesheet" href="firstcss.css">
</head>

<body>
<?php include('./nav.php') ?>  
    <div class="box">
        <h1>Guest Lecture Organised By</h1>
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
                        <select class="form-control" name="glorg">
                            <option disabled selected value="def">Select Faculty</option>
                            <?php
                            while ($users = mysqli_fetch_assoc($users_q)) {

                            ?>
                                <option value="<?php echo $users['user_id'] ?>" <?php echo $glorgVal == $users['user_id'] ? 'selected' : '' ?>><?php echo $users['username'] ?> </option>
                            <?php

                            }
                            ?>
                        </select>
                    <?php

                    } ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">Topic Name :</label>
                    <input type="text" value="<?php echo $glname ?>" class="form-control" name="glname" placeholder="Topic Name">
                </div>
                <div class="mb-3">
                    <label class="form-label">Date :</label><br>
                    <input type="date" value="<?php echo $date ?>" class="form-control" name="date">
                </div>
                <div class="mb-3">
                    <label class="form-label">Class :</label>
                    <select class="form-control" name="level">
                        <option <?php echo $level == "SE" ? "selected" : "" ?> value="SE">SE</option>
                        <option <?php echo $level == "TE" ? "selected" : "" ?> value="TE">TE</option>
                        <option <?php echo $level == "BE" ? "selected" : "" ?> value="BE">BE</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Guest lecture Document (only pdf,ppt,Word file) :</label>
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