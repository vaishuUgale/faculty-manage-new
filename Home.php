<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo '<script>window.location.href="login.php"</script>';
}

?>
<!DOCTYPE html>
<title>COMPUTER DEPARTMENT - Site</title>

<body>
    <link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css" />

    <!-- <link rel="stylesheet" href="form.css" type="text/css"> -->
    <form id='w1' action='w1.php' method='post' accept-charset='UTF-8'>
        <div id="body">
            <div id="header">
                <div class="container">
                    <div id="title">



                        <div class="description">
                            <small></small>
                        </div>
                    </div>
                    <div id="header_image">
                        <div id="menu">
                            <div class="menu_container">
                                <ul>

                                    <li class="page_item page-item-1"><a href="/mit/portal/index.php?r=site/#">FDP</a>
                                        <ul>
                                            <li class="page_item page-item-1"><a href="FDP_Attended.php"> FDP Attended</a></li>
                                            <li class="page_item page-item-1"><a href="fdp_attended_list.php"> FDP Attended List</a></li>
                                            <li class="page_item page-item-2"><a href="FDP_Organized.php">FDP Orgnised</a></li>
                                            <li class="page_item page-item-2"><a href="fdp_organized_list.php">FDP Orgnised List</a></li>
                                        </ul>
                                    </li>


                                    <li class="page_item page-item-2"><a href="form.php">Research Publication</a>
                                        <ul>
                                            <li class="page_item page-item-1"><a href="NPP.php"> National</a></li>
                                            <li class="page_item page-item-1"><a href="resnat_list.php"> National list</a></li>
                                            <li class="page_item page-item-2"><a href="IPP.php">International</a></li>
                                            <li class="page_item page-item-1"><a href="resinnat_list.php"> International list</a></li>
                                        </ul>
                                    </li>

                                    <li class="page_item page-item-1"><a href="/mit/portal/index.php?r=site/#">Workshop</a>
                                        <ul>
                                            <li class="page_item page-item-1">
                                                <a href="Workshop_Attended.php"> Workshop Attended</a>
                                            </li>
                                            <li class="page_item page-item-2">
                                                <a href="WorkshopForStaff.php">Workshop Orgnised For Staff </a>
                                            </li>
                                            <li class="page_item page-item-2">
                                                <a href="WorkshopForStudent.php">Workshop Orgnised For Student </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="page_item page-item-3">
                                        <a href="ConferenceAtt-By.php">Conference</a>
                                    </li>
                                    <li class="page_item page-item-3">
                                        <a href="conference_list.php">Conference attendence List</a>
                                    </li>
                                    <li class="page_item page-item-3">
                                        <a href="GuestLect.php">Guest Lecture</a>
                                    </li>
                                    <li class="page_item page-item-3">
                                        <a href="Guest_lec_list.php">Guest Lecture list</a>
                                    </li>

                                    <li class="page_item page-item-3">
                                        <a href="IV.php">Industrial Visit</a>
                                    </li>
                                    <li class="page_item page-item-3">
                                        <a href="IV_list.php">Industrial Visit list</a>
                                    </li>

                                    <li class="page_item page-item-3"><a href="/mit/portal/index.php?r=site/#">Display</a>
                                        <ul>
                                            <li class="page_item page-item-1">
                                                <a href="Record_Individual.php"> Individual</a>
                                            </li>
                                            <li class="page_item page-item-2">
                                                <a href="record_allstaff.php"> All Staff</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="page_item page-item-3"><a href="signout.php">Signout</a>
                                    </li>


    </form>


</body>

</html>