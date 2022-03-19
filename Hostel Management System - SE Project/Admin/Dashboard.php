<?php
    session_start();
    if (!isset($_SESSION['name'])) {
        header("Location: http://localhost/Hospital Management System - SE Project/login.php");
    }
?> 
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

    <link rel="stylesheet" href="Dashboard.css">
    <link rel="stylesheet" href="../bootstrap.css">

    <title>Admin | Dashboard</title>
</head>

<body>

    <section class="container-fluid">
        <div class="row">

            <!-- Sidebar column Starts -->
            <div class="col-2" style="padding-left: 0; padding-right: 0; background: linear-gradient(30deg, rgb(243, 198, 114),rgb(241, 177, 58),rgb(246, 203, 123), rgb(251, 168, 14)); box-shadow: 2px 0px 3px silver;">

                <!-- Side navbar starts -->
                <div class="Sidenav" id="side-navbar" style="height: 100vh;">

                    <!-- Logo -->
                    <div class="logo py-2">
                        <img src="../img/Logo.png" alt="logo" srcset=""  class="img-fluid  my-3 mx-auto d-block" style="width: 50%;">
                    </div>

                    <!-- Menue Options Start -->
                     <div class="box">
                        <ul class="navbar-nav mt-3">
                            <li class="nav-item py-2 px-2 activeItem">
                                <a href="Dashboard.php" class="active">
                                    <img src="../icons/Dashboard.png" alt="" srcset="" class="img-fluid"
                                        style="height: 40px; width: 40px; margin-right: 13px;"><span
                                        id="dashbord">Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-item py-2 px-2">
                                <a href="Profile.php">
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
                    <h2 class="py-4 fw-bolder mx-auto text-center" style="font-family: 'Noto Serif', serif;">Admin Dashboard</h2>
                    <a href="../logout.php" class="my-3 me-2"><img src="../icons/logout.png" class="img-fluid" style="height: 50px; width: 50px;"></img></a>
                </div>
                <div class="row ps-md-5">

                    <?php
                        // if(isset($_SESSION['name']))
                        // {
                    ?>
                            <!-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Logged In Successfully!</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div> -->
                    <?php 
                        // }
                    ?>

                    <!-- 1st start-->
                    <div class="gx-md-2 col-xxl-3 col-lg-4 col-md-6 pt-5">
                        <div class="card mx-auto" style="width: 15rem;">
                            <img src="../img/User.png" class="card-img-top" style="height: 172px;" alt="Users">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">Users Records</h5>
                                <p class="card-text">
                                    <?php
                                        $conn = mysqli_connect("localhost", "root", "", "hms") or die("Connection failed");
                                        $sql = "SELECT user_id FROM user ORDER BY user_id";
                                        $res = mysqli_query($conn, $sql);
                                        $rows = mysqli_num_rows($res);
                                        echo $rows;
                                    ?>
                                </p>
                                <a href="Users.php" class="btn btn-primary">Details</a>
                            </div>
                        </div>
                    </div>
                    <!-- 1st end-->

                    <!-- 2nd start-->
                    <div class="gx-2 col-xxl-3 col-lg-4 col-md-6 pt-5">
                        <div class="card mx-auto" style="width: 15rem;">
                            <img src="../img/Residents.png" class="card-img-top" alt="Residents">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">Applicants Record</h5>
                                <p class="card-text">
                                    <?php
                                        $sql1 = "SELECT application_id FROM applications ORDER BY application_id";
                                        $res1 = mysqli_query($conn, $sql1);
                                        $rows1 = mysqli_num_rows($res1);
                                        echo $rows1;
                                    ?>
                                </p>
                                <a href="Applicants.php" class="btn btn-primary">Details</a>
                            </div>
                        </div>
                    </div>
                    <!-- 2nd end-->

                    <!-- 3rd start-->
                    <div class="gx-2 col-xxl-3 col-lg-4 col-md-6 pt-5">
                        <div class="card mx-auto" style="width: 15rem;">
                            <img src="../img/Employee.png" class="card-img-top" style="height: 172px;" alt="Employee">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">Attendants Record</h5>
                                <p class="card-text">
                                    <?php
                                        $sql2 = "SELECT attendant_id FROM attendant ORDER BY attendant_id";
                                        $res2 = mysqli_query($conn, $sql2);
                                        $rows2 = mysqli_num_rows($res2);
                                        echo $rows2;
                                    ?>
                                </p>
                                <a href="Attendants.php" class="btn btn-primary">Details</a>
                            </div>
                        </div>
                    </div>
                    <!-- 3rd end-->

                    <!-- 4th start-->
                    <div class="gx-2 col-xxl-3 col-lg-4 col-md-6 pt-5">
                        <div class="card mx-auto" style="width: 15rem;">
                            <img src="../img/Rooms.png" class="card-img-top" style="height: 172px;" alt="Rooms">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">Rooms Record</h5>
                                <p class="card-text">
                                    <?php
                                        $sql3 = "SELECT room_id FROM room ORDER BY room_id";
                                        $res3 = mysqli_query($conn, $sql3);
                                        $rows3 = mysqli_num_rows($res3);
                                        echo $rows3;
                                    ?>
                                </p>
                                <a href="Rooms.php" class="btn btn-primary">Details</a>
                            </div>
                        </div>
                    </div>
                    <!-- 4th end-->

                    <!-- 5th start-->
                    <div class="gx-2 col-xxl-3 col-lg-4 col-md-6 pt-5">
                        <div class="card mx-auto" style="width: 15rem;">
                            <img src="../img/Bills.png" class="card-img-top" style="height: 172px;" alt="Bills">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">Billing Record</h5>
                                <p class="card-text">
                                    <?php
                                        $sql4 = "SELECT bill_id FROM bills ORDER BY bill_id";
                                        $res4 = mysqli_query($conn, $sql4);
                                        $rows4 = mysqli_num_rows($res4);
                                        echo $rows4;
                                    ?>
                                </p>
                                <a href="Fees.php" class="btn btn-primary">Details</a>
                            </div>
                        </div>
                    </div>
                    <!-- 5th end-->

                    <!-- 6th start-->
                    <div class="gx-2 col-xxl-3 col-lg-4 col-md-6 pt-5">
                        <div class="card mx-auto" style="width: 15rem;">
                            <img src="../img/Bills.png" class="card-img-top" style="height: 172px;" alt="Bills">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">Attendance</h5>
                                <p class="card-text">
                                    <?php
                                        $sql5 = "SELECT id FROM attendance ORDER BY id";
                                        $res5 = mysqli_query($conn, $sql5);
                                        $rows5 = mysqli_num_rows($res5);
                                        echo $rows5;
                                    ?>
                                </p>
                                <a href="Attendance.php" class="btn btn-primary">Details</a>
                            </div>
                        </div>
                    </div>
                    <!-- 6th end-->

                    <!-- 7th start-->
                    <div class="gx-2 col-xxl-3 col-lg-4 col-md-6 pt-5">
                        <div class="card mx-auto" style="width: 15rem;">
                            <img src="../img/Application.jpg" class="card-img-top" style="height: 172px;" alt="Applications">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">Complaints</h5>
                                <p class="card-text">
                                    <?php
                                        $sql6 = "SELECT com_id FROM complaints ORDER BY com_id";
                                        $res6 = mysqli_query($conn, $sql6);
                                        $rows6 = mysqli_num_rows($res6);
                                        echo $rows6;
                                    ?>
                                </p>
                                <a href="Complaints.php" class="btn btn-primary">Details</a>
                            </div>
                        </div>
                    </div>
                    <!-- 7th end-->

                    <!-- 8th start-->
                    <div class="gx-2 col-xxl-3 col-lg-4 col-md-6 pt-5">
                        <div class="card mx-auto" style="width: 15rem;">
                            <img src="../img/feedback.png" class="card-img-top" style="height: 172px;" alt="Applications">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">Comments</h5>
                                <p class="card-text">
                                    <?php
                                        $conn = mysqli_connect("localhost", "root", "", "hms") or die("Connection failed");
                                        $sql8 = "SELECT c_id FROM comments ORDER BY c_id";
                                        $res8 = mysqli_query($conn, $sql8);
                                        $rows8 = mysqli_num_rows($res8);
                                        echo $rows8;
                                    ?>
                                </p>
                                <a href="Comments.php" class="btn btn-primary">Details</a>
                            </div>
                        </div>
                    </div>
                    <!-- 8th end-->

                </div>
            </div>
            <!-- Right part Ends -->


        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous">
    </script>
    <script src="../Js/sweetAlert.js"></script>
    <?php
        if (isset($_SESSION['status']) && $_SESSION['status']!='') 
        {
            ?>
            <script>
                swal({
                        title: "<?php echo $_SESSION['status']; ?>",
                        // text: "You clicked the button!",
                        icon: "<?php echo $_SESSION['statusCode']; ?>",
                        button: "OK",
                    });
            </script>
            <?php
            unset($_SESSION['status']);
        }
    ?>

</body>

</html>