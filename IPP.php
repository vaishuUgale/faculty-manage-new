<?php
session_start();
include("./conn.php");
include("./functions.php");
if (!isset($_SESSION['username'])) {
    echo '<script>window.location.href="login.php"</script>';
  }
  $user_id = $_SESSION['user_id'];

  if($_SERVER['REQUEST_METHOD']   == 'POST')
{
        // success!
             $Author1= $mysqli->real_escape_string($_POST['Author1']);
             $Author2= $mysqli->real_escape_string($_POST['Author2']);
             $PaperTitle= $mysqli->real_escape_string($_POST['PaperTitle']);
             
             $JournalName= $mysqli->real_escape_string($_POST['JournalName']);
             $DOP= $mysqli->real_escape_string($_POST['DOP']);
              $Volume= $mysqli->real_escape_string($_POST['Volume']);
              $Pagenos= $mysqli->real_escape_string($_POST['Pagenos']);
              $DOI= $mysqli->real_escape_string($_POST['DOI']);


 $sql= "INSERT INTO `inpaperpublication`(`Author1`, `Author2`, `PaperTitle`, `JournalName`, `DOP`, `Volume`, `Pagenos`, `DOI`, `inpaperpublication_added_by`,`inpaperpublication_user_id`)
  VALUES('$Author1','$Author2','$PaperTitle','$JournalName','$DOP','$Volume','$Pagenos','$DOI','$user_id','$user_id');";

              if($mysqli->query($sql)== true)
              {
                $last_id = $mysqli->insert_id;
  
                genID($last_id,'inpaperpublication','inpaperpublication_id','inpaper');
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

    <title>International Level Paper Publication</title>
    <link rel="stylesheet" href="firstcss.css">
</head>

<body>
    <!-- <div class="container1">
        <img src="sinhgad-logo-colour-1.png" alt=""> 
    </div> -->
    <div class="box">
        <h1>International Level Paper Publication</h1>
    </div>
    <form action="" method="post">

    <div class="wrapper">
        <div style="height: 820px" class="container">
            <div class="mb-3">
                <label class="form-label">Author 1 :</label>
                <input type="text" class="form-control" name= "Author 1" >
            </div>
            <div class="mb-3">
                <label class="form-label">Author 2 :</label>
                <input type="text" class="form-control" name= "Author 2" >
            </div>
            <div class="mb-3">
                <label class="form-label">Paper Title :</label>
                <input type="text" class="form-control" name= "PaperTitle" >
            </div>
            <div class="mb-3">
                <label class="form-label">Name of the Journal :</label>
                <input type="text" class="form-control" name= "JournalName" >
            </div>
            <div class="mb-3">
                <label class="form-label">Date of Publication :</label><br>
                     <input type="date" class="form-control" name="DOP">
            </div>
            <div class="mb-3">
                <label class="form-label">Volume :</label>
                <input type="text" class="form-control" name= "Volume" >
            </div>
            <div class="mb-3">
                <label class="form-label">Page Nos :</label>
                <input type="text" class="form-control" name= "Pagenos" >
            </div>
            <div class="mb-3">
                <label class="form-label">DOI :</label>
                <input type="text" class="form-control" name= "DIO" >
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