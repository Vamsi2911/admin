<div class="sidebar" data-background-color="black" data-active-color="danger">

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    Veda 2018
                </a>
            </div>

            <ul class="nav">

        <?php if ($_SESSION['hostel_login']!="true") {

                if ($_SESSION['username']=="thub") { ?>
                <li>
                    <a href="admin_dashboard.php">
                        <i class="ti-home"></i>
                        <p>Admin Dashboard</p>
                    </a>
                </li>
                <?php } ?>
                <li>
                    <a href="dashboard.php">
                        <i class="ti-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="about_dept.php">
                        <i class="ti-bell"></i>
                        <p>About Department</p>
                    </a>
                </li>
                <li>
                    <a href="ordinators.php">
                        <i class="ti-user"></i>
                        <p> Dept. Co-Ordinator </p>
                    </a>
                </li>
                <li>
                    <a href="events.php">
                        <i class="ti-view-list-alt"></i>
                        <p> Events </p>
                    </a>
                </li>
                <li>
                    <a href="coordinator.php">
                        <i class="ti-user"></i>
                        <p>Event Co-Ordinators</p>
                    </a>
                </li>
                <li>
                    <a href="student_registration.php">
                        <i class="ti-pencil-alt"></i>
                        <p>Student Registrations</p>
                    </a>
                </li>
                <?php
                    if($_SESSION['username']=="thub") { ?>
                        <li>
                            <a href="registration.php">
                                <i class="ti-user"></i>
                                <p>Register User</p>
                            </a>
                        </li>
                    <?php }
                    else { ?>
                    <?php }
                ?>

        <?php
            }
            else if ($_SESSION['hostel_login']=="true") {
        ?>
            <!--- - - - - - - - - - - - - -
                Hostel Login  Links
            - - - - - - - - - - - - - - - -->

                        <li>
                            <a href="hostel_dashboard.php">
                                <i class="ti-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li>
                            <a href="hostel_registered_students.php">
                                <i class="ti-clip"></i>
                                <p>Pre-Registered Students</p>
                            </a>
                        </li>
                        <li>
                            <a href="hostel_accommodation.php">
                                <i class="ti-notepad"></i>
                                <p>Accommodation</p>
                            </a>
                        </li>
                        <li>
                            <a href="hostel_accommodation_students.php">
                                <i class="ti-user"></i>
                                <p>Students</p>
                            </a>
                        </li>
        <?php
            }
        ?>

                <li>
                    <a href="helpline.php">
                        <i class="ti-mobile"></i>
                        <p>Help Line</p>
                    </a>
                </li>

                <li>
                    <a href="change_pwd.php">
                        <i class="ti-settings"></i>
                        <p>Change Password</p>
                    </a>
                </li>              
               
                <li>
                    <a href="logout.php">
                        <i class="ti-export"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>