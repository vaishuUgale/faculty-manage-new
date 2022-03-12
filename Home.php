<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo '<script>window.location.href="login.php"</script>';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="home.css">
</head>

<body>

    <div class="main">
        <div class="content">
            <h2>FDP</h2>
        </div>
        <div class="main1">
            <div class="allboxes">
                <div class="box">
                    <a href="./FDP_Attended.php">
                        <div class="icons">
                            <img src="page (2).png" alt="">
                        </div>
                        <div class="icons">
                            <p>FDP Attended</p>
                        </div>
                    </a>
                </div>
                <div class="box">
                    <a href="./fdp_attended_list.php">

                        <div class="icons">
                            <img src="table (1).png" alt="">
                        </div>
                        <div class="icons">
                            <p>FDP Attended List</p>
                        </div>
                    </a>
                </div>
                <div class="box">
                    <a href="./FDP_Organized.php">
                        <div class="icons">
                            <img src="page (1).png" alt="">
                        </div>
                        <div class="icons">
                            <p>FDP Organised</p>
                        </div>
                    </a>
                </div>
                <div class="box">
                    <a href="./fdp_organized_list.php">
                        <div class="icons">
                            <img src="table (1).png" alt="">
                        </div>
                        <div class="icons">
                            <p>FDP Organised List</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="main">
        <div class="content">
            <h2>Research Publication</h2>
        </div>
        <div class="main1">
            <div class="allboxes">
                <div class="box">
                    <a href="./NPP.php">
                        <div class="icons">
                            <img src="page (1).png" alt="">
                        </div>
                        <div class="icons">
                            <p>National</p>
                        </div>
                    </a>
                </div>
                <div class="box">
                    <a href="./resnat_list.php">
                        <div class="icons">
                            <img src="table (1).png" alt="">
                        </div>
                        <div class="icons">
                            <p>National List</p>
                        </div>
                    </a>
                </div>
                <div class="box">
                    <a href="./IPP.php">
                        <div class="icons">
                            <img src="page (1).png" alt="">
                        </div>
                        <div class="icons">
                            <p>International</p>
                        </div>
                    </a>
                </div>
                <div class="box">
                    <a href="./resinnat_list.php">
                        <div class="icons">
                            <img src="table (1).png" alt="">
                        </div>
                        <div class="icons">
                            <p>International List</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="main">
        <div class="content">
            <h2>Workshop</h2>
        </div>
        <div class="main1">
            <div class="allboxes">
                <div class="box">
                    <a href="./Workshop_Attended.php">
                        <div class="icons">
                            <img src="page (1).png" alt="">
                        </div>
                        <div class="icons">
                            <p>Workshop Attended</p>
                        </div>
                    </a>
                </div>
                <div class="box">
                    <a href="./WorkshopForStudent.php">
                        <div class="icons">
                            <img src="page (1).png" alt="">
                        </div>
                        <div class="icons">
                            <p>Workshop Organised for student</p>
                        </div>
                    </a>
                </div>
                <div class="box">
                    <a href="./WorkshopForStaff.php">
                        <div class="icons">
                            <img src="page (1).png" alt="">
                        </div>
                        <div class="icons">
                            <p>Workshop Organised for Staff</p>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>
    <div class="main">

        <div class="main1">
            <div class="allboxes">
                <div class="box">
                    <a href="./wrkattendlist.php">
                        <div class="icons">
                            <img src="table (1).png" alt="">
                        </div>
                        <div class="icons">
                            <p>Workshop Attended List</p>
                        </div>
                    </a>
                </div>
              
                <div class="box">
                    <a href="./wrkForStudlist.php">
                        <div class="icons">
                            <img src="table (1).png" alt="">
                        </div>
                        <div class="icons">
                            <p>Workshop Student List</p>
                        </div>
                    </a>
                </div>
                <div class="box">
                    <a href="./wrkForStafflist.php">
                        <div class="icons">
                            <img src="table (1).png" alt="">
                        </div>
                        <div class="icons">
                            <p>Workshop Organised  List</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="main">
        <div class="content">
            <h2>Many More Options</h2>
        </div>
        <div class="main1">
            <div class="allboxes">
                <div class="box">
                    <a href="./ConferenceAtt-By.php">
                        <div class="icons">
                            <img src="presentation.png" alt="">
                        </div>
                        <div class="icons">
                            <p>Conference</p>
                        </div>
                    </a>
                </div>
                <div class="box">
                    <a href="./conference_list.php">
                        <div class="icons">
                            <img src="table (1).png" alt="">
                        </div>
                        <div class="icons">
                            <p>Conference attendence List</p>
                        </div>
                    </a>
                </div>
                <div class="box">
                    <a href="./GuestLect.php">
                        <div class="icons">
                            <img src="lecture.png" alt="">
                        </div>
                        <div class="icons">
                            <p>Guest Lecture</p>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>
    <div class="main">

        <div class="main1">
            <div class="allboxes">
                <div class="box">
                    <a href="./Guest_lec_list.php">
                        <div class="icons">
                            <img src="table (1).png" alt="">
                        </div>
                        <div class="icons">
                            <p>Guest Lecture List</p>
                        </div>
                    </a>
                </div>
                <div class="box">
                    <a href="./IV.php">
                        <div class="icons">
                            <img src="table (1).png" alt="">
                        </div>
                        <div class="icons">
                            <p>Industrial Visit</p>
                        </div>
                    </a>
                </div>
                <div class="box">
                    <a href="./IV_list.php">
                        <div class="icons">
                            <img src="table (1).png" alt="">
                        </div>
                        <div class="icons">
                            <p>Industrial Visit List</p>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>

    <div class="main">
        <div class="content">
            <h2>Display</h2>
        </div>
        <div class="main1">
            <div class="allboxes">
                <div class="box">
                    <div class="icons">
                        <img src="table (1).png" alt="">
                    </div>
                    <div class="icons">
                        <p>Individual</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icons">
                        <img src="table (1).png" alt="">
                    </div>
                    <div class="icons">
                        <p>All Staff</p>
                    </div>
                </div>
                <div class="box">
                    <a href="./signout.php">
                    <div class="icons">
                        <img src="table (1).png" alt="">
                    </div>
                    <div class="icons">
                        <p>Signout</p>
                    </div>
                    </a>
                </div>






</body>

</html>