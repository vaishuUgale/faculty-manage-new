<?php
session_start();
include("./conn.php");
include("./functions.php");
if (!isset($_SESSION['username'])) {
    echo '<script>window.location.href="login.php"</script>';
  }
  $glorg=$_SESSION['user_id'];
  $glorgAddedBy=$_SESSION['user_id'];

  if($_SERVER['REQUEST_METHOD']   == 'POST')
  {
          // success!
          if ($_SESSION['role'] == 'admin') {
               $glorg= $mysqli->real_escape_string($_POST['glorg']);
          }
               $glname= $mysqli->real_escape_string($_POST['glname']);
               $date= $mysqli->real_escape_string($_POST['date']);
               
               $level= $mysqli->real_escape_string($_POST['level']);
                
  
   $sql= "INSERT INTO `guestlect`(`glorg`, `glname`, `date`,`level`, `guestlect_user_id`,`guestlect_added_by`) 
   VALUES('$glorg','$glname','$date','$level','$glorg','$glorgAddedBy');";
  
                if($mysqli->query($sql)== true)
                {
                  $last_id = $mysqli->insert_id;
  
                  genID($last_id,'guestlect','guestlect_id','guestlect');
                  alert("success"); 
                }
  
               else {
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Guest Lecture Organised By</title>
    <link rel="stylesheet" href="firstcss.css">
</head>

<body>
    <!-- <div class="container1">
        <img src="sinhgad-logo-colour-1.png" alt=""> 
    </div> -->
    <div class="box">
        <h1>Guest Lecture Organised By</h1>
    </div>
    <form action="" method="post">

    <div class="wrapper">
        <div style="height: 490px" class="container">
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
                            echo "<option value='" . $users['user_id'] . "'>" . $users['username'] . "</option>";
                        }
                        ?>
                    </select>
                <?php

                } ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Topic Name :</label>
                <input type="text" class="form-control" name= "glname" placeholder="Topic Name">
            </div>
            <div class="mb-3">
                <label class="form-label">Date :</label><br>
                <input type="date" class="form-control" name="date">
            </div>
            <div class="mb-3">
                <label class="form-label">Class :</label>
                    <select class="form-control" name="level">
                    <option value="SE">SE</option>
                    <option value="TE">TE</option>
                    <option value="BE">BE</option>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>