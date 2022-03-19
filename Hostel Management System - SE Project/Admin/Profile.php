<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="Profile.css">
    <link rel="stylesheet" href="../bootstrap.css">

    <title>Admin | Dashboard</title>
</head>

<body>

    <section class="container-fluid">
        <div class="row">

            <!-- Sidebar column Starts -->
            <div class="col-2"
                style="padding-left: 0; padding-right: 0; background: linear-gradient(30deg, rgb(243, 198, 114),rgb(241, 177, 58),rgb(246, 203, 123), rgb(251, 168, 14)); box-shadow: 2px 0px 3px silver;">

                <!-- Side navbar starts -->
                <div class="Sidenav" id="side-navbar" style="height: 100vh;">

                    <!-- Logo -->
                    <div class="logo py-2">
                        <img src="../img/Logo.png" alt="logo" srcset="" class="img-fluid  my-4 mx-auto d-block"
                            style="width: 50%;">
                    </div>

                    <!-- Menue Options Start -->
                     <div class="box">
                        <ul class="navbar-nav mt-3">
                            <li class="nav-item py-2 px-2">
                                <a href="Dashboard.php">
                                    <img src="../icons/Dashboard.png" alt="" srcset="" class="img-fluid"
                                        style="height: 40px; width: 40px; margin-right: 13px;"><span
                                        id="dashbord">Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-item py-2 px-2 activeItem">
                                <a href="Profile.php" class="active">
                                    <img src="../icons/Profile.png" alt="" srcset="" class="img-fluid"
                                        style="height: 40px; width: 40px; margin-right: 13px;"><span
                                        id="profile">Profile</span>
                                </a>
                            </li>
                            <li class="nav-item py-2 px-2">
                                <a href="Applicants.php">
                                    <img src="../icons/Student.png" alt="" srcset="" class="img-fluid"
                                        style="height: 40px; width: 40px; margin-right: 13px;"><span
                                        id="std">Applicants</span>
                                </a>
                            </li>
                            <li class="nav-item py-2 px-2">
                                <a href="Attendants.php">
                                    <img src="../icons/Employee.jpg" alt="" srcset="" class="img-fluid"
                                        style="height: 40px; width: 40px; margin-right: 13px;"><span
                                        id="emp">Room Attendants</span>
                                </a>
                            </li>
                            <li class="nav-item py-2 px-2">
                                <a href="Rooms.php">
                                    <img src="../icons/Rooms.png" alt="" srcset="" class="img-fluid"
                                        style="height: 40px; width: 40px; margin-right: 13px;"><span
                                        id="room">Rooms</span>
                                </a>
                            </li>
                            <li class="nav-item py-2 px-2">
                                <a href="Attendance.php">
                                    <img src="../icons/Attendance.png" alt="" srcset="" class="img-fluid"
                                        style="height: 40px; width: 40px; margin-right: 13px;"><span
                                        id="att">Attendance</span>
                                </a>
                            </li>
                            <li class="nav-item py-2 px-2">
                                <a href="Fees.php">
                                    <img src="../icons/Bills.png" alt="" srcset="" class="img-fluid"
                                        style="height: 40px; width: 40px; margin-right: 13px;"><span
                                        id="bill">Bills</span>
                                </a>
                            </li>
                            <li class="nav-item py-2 px-2">
                                <a href="Profile.php">
                                    <img src="../icons/settings.png" alt="" srcset="" class="img-fluid" style="height: 40px; width: 40px; margin-right: 13px;"><span id="fee">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- Menue Options Ends -->
                </div>
                <!-- Side navbar ends  -->
            </div>
            <!-- Sidebar column ends -->

            <!-- Right part Start -->
            <div class="col-10" style="padding-left: 0; padding-right: 0;">
                <div class="nav shadow-sm">
                    <h2 class="py-4 fw-bolder mx-auto text-center" style="font-family: 'Noto Serif', serif;">Admin Profile</h2>
                    <a href="../logout.php" class="my-3 me-2"><img src="../icons/logout.png" class="img-fluid" style="height: 50px; width: 50px;"></img></a>
                </div>
                <div class="row ps-md-5">
                    <div class="col-12">
                        <div class="box1 mx-auto my-5">
                            <div id="profileImg" class=" pt-4">
                                <img src="../img/Profile.png" alt="" srcset="" class="img-fluid mx-auto d-block" style="height: 150px; width: 150px;">
                            </div>
                        
                            <form action="" method="post" class="mt-5">
                            <?php

                                $conn = mysqli_connect("localhost", "root", "", "hms") or die("Connection failed");

                                $sql = "SELECT * FROM admin";
                                $res = mysqli_query($conn, $sql) or die("Query Unseccessful");
                                if(mysqli_num_rows($res)>0){
                            ?>
                                <table class="my-4 mx-auto">
                                    <?php

                                        while($row = mysqli_fetch_assoc($res)) {
                                    ?>
                                    <tr class="">
                                        <td><label for="Name" class="fw-bold">Name: </label></td>
                                        <td><input type="text" name="Name" value="<?php echo $row['admin_name']; ?>" readonly></td>
                                    </tr>
                                    <tr>
                                        <td><label for="Gender" class="fw-bold">Gender: </label></td>
                                        <td><input type="text" name="Gender" value="<?php echo $row['admin_gender']; ?>" readonly></td>
                                    </tr>
                                    <tr>
                                        <td><label for="Contact" class="fw-bold">Contact: </label></td>
                                        <td><input type="text" name="Contact" value="<?php echo $row['admin_contact']; ?>" readonly></td>
                                    </tr>
                                    <tr>
                                        <td><label for="Email" class="fw-bold">Email: </label></td>
                                        <td><input type="email" name="Email" value="<?php echo $row['admin_email']; ?>" readonly></td>
                                    </tr>
                                    <tr>
                                        <td><label for="CNIC" class="fw-bold">CNIC: </label></td>
                                        <td><input type="text" name="CNIC" value="<?php echo $row['admin_CNIC']; ?>" readonly></td>
                                    </tr>
                                    <tr>
                                        <td><label for="Designation" class="fw-bold">Desgination: </label></td>
                                        <td><input type="text" name="Desgination" value="<?php echo $row['admin_designation']; ?>" readonly></td>
                                    </tr>
                                    <tr>
                                        <td><label for="Address" class="fw-bold">Address: </label></td>
                                        <td><input type="text" name="Address" value="<?php echo $row['admin_address']; ?>" readonly></td>
                                    </tr>
                                    <?php } ?>
                                </table>
                            <?php } ?>
                            </form>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Right part Ends -->
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>

</html>