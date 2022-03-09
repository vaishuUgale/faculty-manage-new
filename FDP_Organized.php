<?php
session_start();
include("./conn.php");
include("./functions.php");
if (!isset($_SESSION['username'])) {
    echo '<script>window.location.href="login.php"</script>';
}

$FDPOrganizedAdded = $_SESSION['user_id'];
$FDPOrganizedBy = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD']   == 'POST') {
    // success!
    if ($_SESSION['role'] == 'admin') {

        $FDPOrganizedBy = $mysqli->real_escape_string($_POST['FDPOrganizedBy']);
    }

    # code...
    $fdpname = $mysqli->real_escape_string($_POST['fdpname']);

    $fromdate = $mysqli->real_escape_string($_POST['fromdate']);

    $todate = $mysqli->real_escape_string($_POST['todate']);
    $level = $mysqli->real_escape_string($_POST['level']);


    $sql = "INSERT INTO `fdporg`(`fdpname`, `fromdate`, `todate`, `level`,`fdporg_user_id`, `fdporg_added_by`) 
    VALUES('$fdpname','$fromdate','$todate','$level','$FDPOrganizedBy','$FDPOrganizedAdded');";

    if ($mysqli->query($sql) == true) {
        $last_id = $mysqli->insert_id;

        genID($last_id, "fdporg", "fdporg_id", "fdporg");
        alert("success");
    } else {
        // failed 

        alert("unsuccessful");
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

    <title>FDP Organised By</title>
    <link rel="stylesheet" href="firstcss.css">
</head>

<body>
    <!-- <div class="container1">
        <img src="sinhgad-logo-colour-1.png" alt=""> 
    </div> -->
    <div class="box">
        <h1>FDP Organised By</h1>
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
                        <select class="form-control" name="FDPOrganizedBy">
                            <option disabled selected value="def">Select Faculty</option>
                            <?php
                            while ($users = mysqli_fetch_assoc($users_q)) {
                                echo "<option value='" . $users['user_id'] . "'>" . $users['username'] . "</option>";
                            }
                            ?>
                        </select>
                    <?php

                    } ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">FDP Name :</label>
                    <input type="text" class="form-control" name="fdpname" placeholder="FDP Name">
                </div>
                <div class="mb-3">
                    <label class="form-label">Date :</label><br>
                    <div class="cont">
                        <label class="form-label" id="item1">From</label>
                        <input type="date" name="fromdate" class="form-control">
                        <label class="form-label" id="item1">To</label>
                        <input type="date" name="todate" class="form-control">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Level :</label>
                    <select class="form-control" name="level">
                        <option value="State">State</option>
                        <option value="National">National</option>
                        <option value="International">International</option>
                    </select>
                </div>
                <div class="mb-3">
                    <div class="cont-1">
                        <input type="submit" class="form-control" name="Submit" id="input">
                    </div>

                </div>
            </div>
    </form>
    </div>
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