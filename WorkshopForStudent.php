<?php
session_start();
include("./conn.php");
include("./functions.php");
if (!isset($_SESSION['username'])) {
    echo '<script>window.location.href="login.php"</script>';
}

$workshoporg = $_SESSION['user_id'];
$workshoporgAddedBy = $_SESSION['user_id'];


$UpId = "";
if (isset($_GET["up_id"])) {
    $UpId = $_GET["up_id"];
}

$workshoporgVal = "";

$workshopname = "";

$fromdate = "";

$todate = "";

$level = "";
if ($UpId != "") {
    $findSql = "SELECT * FROM  wsorgfstud WHERE  wsorgfstud_id='$UpId'";
    if (mysqli_num_rows(mysqli_query($mysqli, $findSql)) > 0) {

        $res_find_row = mysqli_fetch_assoc(mysqli_query($mysqli, $findSql));

        $workshoporgVal = $res_find_row['workshoporg'];
        $workshopname = $res_find_row['workshopname'];
        $fromdate = $res_find_row['fromdate'];
        $todate = $res_find_row['todate'];
        $level = $res_find_row['level'];
    } else {
        alert("No data found");
        echo '<script>window.location.href="home.php"</script>';
    }
}
if ($_SERVER['REQUEST_METHOD']   == 'POST') {
    // success!
    if ($_SESSION['role'] == 'admin') {
        $workshoporg = $mysqli->real_escape_string($_POST['workshoporg']);
    }
    $workshopname = $mysqli->real_escape_string($_POST['workshopname']);
    $fromdate = $mysqli->real_escape_string($_POST['fromdate']);

    $todate = $mysqli->real_escape_string($_POST['todate']);
    $level = $mysqli->real_escape_string($_POST['level']);

    if ($UpId == "") {
        $sql = "INSERT INTO `wsorgfstud`(`workshoporg`, `workshopname`, `fromdate`, `todate`, `level`,`wsorgfstud_added_by`, `wsorgfstud_user_id`) 
 VALUES('$workshoporg','$workshopname','$fromdate','$todate','$level','$workshoporgAddedBy','$workshoporg');";

        if ($mysqli->query($sql) == true) {
            $last_id = $mysqli->insert_id;

            genID($last_id, 'wsorgfstud', 'wsorgfstud_id', 'wsorgfstud');
            alert("success");
        } else {
            // failed 

            alert("Unsuccessful");
        }
    } else {
        $sql = "UPDATE `wsorgfstud` SET `workshoporg` = '$workshoporg', `workshopname` = '$workshopname', `fromdate` = '$fromdate', `todate` = '$todate', `level` = '$level', `wsorgfstud_user_id` = '$workshoporg' WHERE `wsorgfstud`.`wsorgfstud_id` = '$UpId';";
        if ($mysqli->query($sql) == true) {
            echo '<script>history.back()</script>';

            alert("success");
        } else {
            // failed 
           echo $sql;
            alert("unsuccessful");
            // echo '<script>history.back()</script>';

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

    <title>Workshop Organised for Student</title>
    <link rel="stylesheet" href="firstcss.css">
</head>

<body>
    <!-- <div class="container1">
        <img src="sinhgad-logo-colour-1.png" alt=""> 
    </div> -->
    <div class="box">
        <h1>Workshop Organised for Student</h1>
    </div>
    <form action="" method="post">
        <div class="wrapper">
            <div class="container">
            <div class="mb-3">
                    <?php
                    if ($_SESSION['role'] == 'admin') {
                        $users_q = mysqli_query($mysqli, "select * from users");

                    ?>
                        <label class="form-label">Name of Faculty :</label>
                        <select class="form-control" name="workshoporg">
                            <option disabled selected value="def">Select Faculty</option>
                            <?php
                            while ($users = mysqli_fetch_assoc($users_q)) {

                                ?>
                                    <option value="<?php echo $users['user_id'] ?>" <?php echo $workshoporgVal == $users['user_id'] ? 'selected' : '' ?>><?php echo $users['username'] ?> </option>
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
                        <input type="date"value="<?php echo $fromdate ?>" name="fromdate" class="form-control">
                        <label class="form-label" id="item1">To</label>
                        <input type="date" value="<?php echo $todate ?>" name="todate" class="form-control">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Class :</label>
                    <select class="form-control" name="level">
                    <option <?php echo $level=="SE"?"selected":"" ?> value="SE">SE</option>
                        <option <?php echo $level=="TE"?"selected":"" ?> value="TE">TE</option>
                        <option <?php echo $level=="BE"?"selected":"" ?> value="BE">BE</option>
                    </select>
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