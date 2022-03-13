<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">RMD Faculty</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="./Home.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        FDP
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="./FDP_Attended.php">FDP Attended</a></li>
                        <li><a class="dropdown-item" href="./fdp_attended_list.php">FDP Attended List</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="./FDP_Organized.php">FDP Organised</a></li>
                        <li><a class="dropdown-item" href="./fdp_organized_list.php">FDP Organised List</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Research Publications
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="./NPP.php">National</a></li>
                        <li><a class="dropdown-item" href="./resnat_list.php">National List</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="./IPP.php">International</a></li>
                        <li><a class="dropdown-item" href="./resinnat_list.php">International List</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Workshop
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="./Workshop_Attended.php">Workshop Attended</a></li>
                        <li><a class="dropdown-item" href="./wrkattendlist.php">Workshop Attended List</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="./WorkshopForStaff.php">Workshop Organised for Staff</a></li>
                        <li><a class="dropdown-item" href="./wrkForStafflist.php">Workshop Organised List</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="./WorkshopForStudent.php">Workshop Organised for Students</a></li>
                        <li><a class="dropdown-item" href="./wrkForStudlist.php">Workshop Student List</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        More Options
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="./ConferenceAtt-By.php">Conferencen</a></li>
                        <li><a class="dropdown-item" href="./conference_list.php">Conference attendence List</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="./GuestLect.php">Guest Lecture</a></li>
                        <li><a class="dropdown-item" href="./Guest_lec_list.php">Guest Lecture List</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="./IV.php">Industrial visit</a></li>
                        <li><a class="dropdown-item" href="./IV_list.php">Industrial visit List</a></li>
                    </ul>
                </li>
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Display
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="./">All Staff</a></li>
                        <li><a class="dropdown-item" href="./">Individual</a></li>
                    </ul>
                </li> -->

            </ul>
            <form class="d-flex">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $_SESSION['username']; ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="./signout.php">Signout</a></li>
                        </ul>
                    </li>
                </ul>
            </form>
        </div>
    </div>
</nav>