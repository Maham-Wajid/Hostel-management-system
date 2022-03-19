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

    <link rel="stylesheet" href="RoomStyle.css ?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../bootstrap.css">

    <title>Attendant | Rooms Details</title>
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
                            <li class="nav-item py-2 px-2 activeItem">
                                <a href="RoomsDetail.php" class="active">
                                    <img src="../icons/Student.png" alt="" srcset="" class="img-fluid" style="height: 40px; width: 40px; margin-right: 13px;"><span id="std">Rooms</span>
                                </a>
                            </li>
                            <li class="nav-item py-2 px-2">
                                <a href="Attendance.php">
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
                    <h2 class="py-4 fw-bolder mx-auto text-center" style="font-family: 'Noto Serif', serif;">Rooms Details</h2>
                    <a href="../logout.php" class="my-3 me-2"><img src="../icons/logout.png" class="img-fluid" style="height: 50px; width: 50px;"></img></a>
                </div>

                <div class="row ps-md-5">
                   <div class="col-12 my-5">
                        <div class="row height d-flex justify-content-center align-items-center">
                            <div class="col-md-8">
                                <div class="search"> <i class="fa fa-search"></i>
                                    <form class="needs-validation" action="<?php $_SERVER['PHP_SELF']; ?>"
                                        method="POST">
                                        <input type="text" class="form-control validate"
                                            placeholder="Search User Record." name="SrchId" required>
                                        <div class="valid-feedback">Valid</div>
                                        <div class="invalid-feedback">Please fill out this field!</div>
                                        <button class="btn fw-bold btn-warning" name="Search"
                                            type="submit">Search</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="btn1" class="d-grid gap-2 d-flex">
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                            <button class="btn btn-warning fw-bold" name="SearchAll" type="submit">All Records</button>
                        </form>
                        <a href="Comments.php"><button class="btn btn-warning fw-bold">Refresh</button></a>
                    </div>

                    <div class="table-responsive col-lg-12 my-3 mx-auto">
                        <table id="dataTableId" class="table table-striped table-hover my-3 px-5">
                            <thead class="bg-warning">
                                <tr class="text-center">
                                    <th scope="col">ID</th>
                                    <th scope="col">Room Name</th>
                                    <th scope="col">Room Type</th>
                                    <th scope="col">Current Residents</th>
                                    <th scope="col">Vacancy</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                    if (isset($_POST['SearchAll'])) 
                                    {
                                        $sql = "SELECT * FROM room";
                                        $res = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_array($res))
                                        {
                                            $ID = $row['room_id'];
                                            $name = $row['room_name'];
                                            $type = $row['room_type'];

                                            $count = "SELECT application_id FROM applications WHERE room_no = '$ID'";
                                            $countRun = mysqli_query($conn, $count);
                                            $countRow = mysqli_num_rows($countRun);
                                            $noOfResidents = $countRow;

                                            $vacancy = $row['room_space'] - $noOfResidents;
                                    ?>

                                <tr class="text-center">
                                    <td id="r_id">
                                        <?php echo $ID; ?>
                                    </td>
                                    <td>
                                        <?php echo $name; ?>
                                    </td>
                                    <td>
                                        <?php echo $type; ?>
                                    </td>
                                    <td>
                                        <?php echo $noOfResidents; ?>
                                    </td>
                                    <td>
                                        <?php echo $vacancy; ?>
                                    </td>
                                    <td class="d-flex justify-content-center">
                                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                                            <a class="btn btn-warning view_btn" href="#"><i class="fa fa-eye"></i>&nbsp;Details</a>
                                        </form>
                                    </td>
                                </tr>

                                <?php
                                        }
                                    }
                                ?>

                                <?php
                                    if (isset($_POST['Search'])) 
                                    {
                                        $search = $_POST['SrchId'];
                                        $srchQuery = "SELECT * FROM room WHERE room_name = '{$search}'";
                                        $runSrch = mysqli_query($conn, $srchQuery);
                                        if (mysqli_num_rows($runSrch) > 0) 
                                        {
                                            while ($row1 = mysqli_fetch_array($runSrch)) 
                                            {  
                                                $count = "SELECT application_id FROM applications WHERE room_no = '$ID'";
                                                $countRun = mysqli_query($conn, $count);
                                                $countRow = mysqli_num_rows($countRun);
                                                $noOfResidents = $countRow;

                                                $vacancy = $row1['room_space'] - $noOfResidents;
                                ?>
                                <tr class="text-center">
                                    <td id="r_id">
                                        <?php echo $row1['room_id'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row1['room_name'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row1['room_type'] ?>
                                    </td>
                                    <td>
                                        <?php echo $noOfResidents ?>
                                    </td>
                                    <td>
                                        <?php echo $vacancy ?>
                                    </td>
                                    <td>
                                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                                            <a class="btn btn-warning view_btn" href="#"><i class="fa fa-eye"></i>&nbsp;Details</a>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                                            }
                                        }
                                        else 
                                        {
                                ?>
                                <tr>
                                    <td colspan="6">No Record Found!</td>
                                </tr>
                                <?php
                                        }
                                    }
                                ?>

                                <?php
                                    if (isset($_POST['delete_btn_set'])) {
                                        $del_id = $_POST['delete_id'];
                                        $delQuery = "DELETE FROM comments WHERE c_id='$del_id'";
                                        $run = mysqli_query($conn, $delQuery);
                                    }
                                ?>

                            </tbody>
                        </table>
                    </div>

                    <!-- View Modal -->
                    <div class="modal fade" id="viewModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ViewModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header bg-warning">
                                    <h5 class="modal-title text-center" id="ViewModalLabel">Applicant's Detail</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="Viewed_data">

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- View modal ends here -->

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

        $('.view_btn').click(function (e) { 
                e.preventDefault();
                var r_ID = $(this).closest('tr').find('#r_id').text();
                $.ajax({
                    type: "POST",
                    url: "RoomDetailsView.php",
                    data: {
                        'viewbtn': true,
                        'r_Id': r_ID,
                    },
                    success: function (response) {
                        $('.Viewed_data').html(response);
                        $('#viewModal').modal('show');
                    }
                });
            });

        });
    </script>

</body>

</html>