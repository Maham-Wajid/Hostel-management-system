<?php
    ob_start();
    session_start();
    if (!isset($_SESSION['name'])) {
        header("Location: http://localhost/Hospital Management System - SE Project/login.php");
    }
    $conn = mysqli_connect("localhost", "root", "", "hms") or die("Connection failed");
    $name = $_SESSION['name'];
    $sqlId = "SELECT attendant_id FROM attendant WHERE attendant_Uname = '$name'";
    $sqlIdRun = mysqli_query($conn, $sqlId);
    $sqlIdRow = mysqli_fetch_array($sqlIdRun);
    $id = $sqlIdRow['attendant_id'];
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

    <!-- for data tables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">

    <!-- JQuery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="AttendanceStyle.css ?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../bootstrap.css">

    <title>Attendant | Attendence Record</title>
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
                            <li class="nav-item py-2 px-2">
                                <a href="Dashboard.php">
                                    <img src="../icons/Dashboard.png" alt="" srcset="" class="img-fluid" style="height: 40px; width: 40px; margin-right: 13px;"><span id="dashbord">Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-item py-2 px-2">
                                <a href="Profile.php">
                                    <img src="../icons/Profile.png" alt="" srcset="" class="img-fluid" style="height: 40px; width: 40px; margin-right: 13px;"><span id="profile">Profile</span>
                                </a>
                            </li>
                            <li class="nav-item py-2 px-2">
                                <a href="RoomsDetail.php">
                                    <img src="../icons/Student.png" alt="" srcset="" class="img-fluid" style="height: 40px; width: 40px; margin-right: 13px;"><span id="std">Rooms</span>
                                </a>
                            </li>
                            <li class="nav-item py-2 px-2 activeItem">
                                <a href="Attendance.php" class="active">
                                    <img src="../icons/Attendance.png" alt="" srcset="" class="img-fluid" style="height: 40px; width: 40px; margin-right: 13px;"><span id="att">Attendance</span>
                                </a>
                            </li>
                            <li class="nav-item py-2 px-2">
                                <a href="Bills.php">
                                    <img src="../icons/Bills.png" alt="" srcset="" class="img-fluid" style="height: 40px; width: 40px; margin-right: 13px;"><span id="bill">Bills</span>
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
                    <h2 class="py-4 fw-bolder mx-auto text-center" style="font-family: 'Noto Serif', serif;">Attendence Record</h2>
                    <a href="../logout.php" class="my-3 me-2"><img src="../icons/logout.png" class="img-fluid" style="height: 50px; width: 50px;"></img></a>
                </div>

                <div class="row ps-md-5">
                  <div class="col-12 d-flex justify-content-between">

                    <div class="col-md-5 col-12 atndBlock">
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" class="needs-validation" method="POST">
                            <div class="row py-5 me-5">

                                <div class="col-12 py-3">
                                    <label for="Name" class="form-label fw-bold">Name: </label>
                                    <input class="form-control validate" type="text" name="Name" value="" placeholder="User_name" required>
                                    <div class="valid-feedback">Valid</div>
                                    <div class="invalid-feedback">Please fill out this field!</div>
                                </div>

                                <div class="col-12 py-3">
                                    <label for="Date" class="form-label fw-bold">Date: </label>
                                    <input class="form-control validate" type="date" name="Date" value="" required>
                                    <div class="valid-feedback">Valid</div>
                                    <div class="invalid-feedback">Please fill out this field!</div>
                                </div>

                                <div class="col-12 py-3">
                                    <label for="Day" class="form-label fw-bold">Day: </label>
                                    <select class="form-control validate" aria-label="Default select example" required id="day" name="Day">
                                        <option hidden>Day</option>
                                        <option value="Monday">Monday</option>
                                        <option value="Tuesday">Tuesday</option>
                                        <option value="Wednesday">Wednesday</option>
                                        <option value="Thursday">Thursday</option>
                                        <option value="Friday">Friday</option>
                                        <option value="Saturday">Saturday</option>
                                        <option value="Sunday">Sunday</option>
                                    </select>
                                    <div class="valid-feedback">Valid</div>
                                    <div class="invalid-feedback">Please fill out this field!</div>
                                </div>

                                <div class="col-12 py-3">
                                    <label for="Attendance" class="form-label fw-bold">Attendance: </label>
                                    <select class="form-control validate" aria-label="Default select example" required id="attendance" name="Attendance">
                                        <option hidden></option>
                                        <option value="present">Present</option>
                                        <option value="absent">Absent</option>
                                        <option value="leave">Home Leave</option>
                                    </select>
                                    <div class="valid-feedback">Valid</div>
                                    <div class="invalid-feedback">Please fill out this field!</div>
                                </div>

                                <div class="col-12 py-3">
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn" name="Save"><b>Save</b></button>
                                    </div>
                                </div>

                            </div>
                        </form>

                        <?php 
                            if (isset($_POST['Save'])) 
                            {
                                $name = $_POST['Name'];
                                $date = date("y-m-d",strtotime($_POST['Date']));
                                $day = $_POST['Day'];
                                $attendance = $_POST['Attendance'];

                                $Q = "SELECT * FROM applications WHERE applicant_Uname = '$name'";
                                $Qrun = mysqli_query($conn, $Q);
                                $Qrow = mysqli_fetch_array($Qrun);
                                $Name = $Qrow['applicant_name'];

                                $AddSql = "INSERT INTO attendance(stud_name, date, day, attendance) VALUES('{$Name}','{$date}','{$day}','{$attendance}')";

                                if ($AddSqlrun = mysqli_query($conn, $AddSql)) 
                                {
                                    $_SESSION['status'] = "Added succesfully!";
                                    $_SESSION['statusCode'] = "success";
                                }
                                else 
                                {
                                    $_SESSION['status'] = "Adding Failed!";
                                    $_SESSION['statusCode'] = "error";
                                }
                            }
                        ?>

                    </div>

                    <div class="col-md-7 col-12 py-5">
                        <div class="me-3">

                            <form action="<?php $_SERVER['PHP_SELF']; ?>" class="needs-validation" method="POST">
                                <div class="col-12 py-3">
                                    <input class="form-control validate" type="text" name="Name" value="" placeholder="User_name" required>
                                    <div class="valid-feedback">Valid</div>
                                    <div class="invalid-feedback">Please fill out this field!</div>
                                    <button type="submit" class="btn my-3" id="butn1" name="full">Complete Record</button>
                                </div>
                            </form>

                        </div>
                        <div class="table-responsive my-3 py-5">
                        <table id="dataTableId" class="table table-striped table-hover my-3 px-5">
                            <thead class="bg-warning">
                                <tr class="text-center">
                                    <th scope="col">Name</th>
                                    <th scope="col">Room no</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Day</th>
                                    <th scope="col">Attendance</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                    if (isset($_POST['full'])) 
                                    {
                                        $applName = $_POST['Name'];
                                        $query = "SELECT * FROM applications WHERE applicant_Uname = '$applName'";
                                        $queryRun = mysqli_query($conn, $query);
                                        $queryRow = mysqli_fetch_array($queryRun);
                                        $FullName = $queryRow['applicant_name'];
                                        $roomID = $queryRow['room_no'];

                                        $sql = "SELECT * FROM attendance WHERE stud_name = '$FullName'";
                                        $res = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_array($res))
                                        {
                                            $ID = $row['id'];
                                            $name = $row['stud_name'];
                                            $date = $row['date'];
                                            $day = $row['day'];
                                            $attendance = $row['attendance'];

                                            $QRoomName = "SELECT * FROM room WHERE room_id = '$roomID'";
                                            $QRoomNameRun = mysqli_query($conn, $QRoomName);
                                            $QRoomNameRow = mysqli_fetch_array($QRoomNameRun);
                                            $RoomName = $QRoomNameRow['room_name'];
                                    ?>

                                <tr class="text-center">
                                    <td>
                                        <?php echo $name; ?>
                                    </td>
                                    <td>
                                        <?php echo $RoomName; ?>
                                    </td>
                                    <td>
                                        <?php echo $date; ?>
                                    </td>
                                    <td>
                                        <?php echo $day; ?>
                                    </td>
                                    <td>
                                        <?php echo $attendance; ?>
                                    </td>
                                </tr>

                                <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
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

    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

    <script type="text/javascript">
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
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

    <script>
        $(document).ready(function () {
            $('#dataTableId').DataTable(
            {
                "pagingType": "full_numbers",
                "lengthMenue": [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "search record!"
                } 
            }
        );

        });
    </script>

</body>

</html>