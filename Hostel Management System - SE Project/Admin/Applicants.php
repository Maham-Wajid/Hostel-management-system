<?php
    ob_start();
    session_start();
    if (!isset($_SESSION['name'])) {
        header("Location: http://localhost/Hospital Management System - SE Project/login.php");
    }

    $conn = mysqli_connect("localhost", "root", "", "hms") or die("Connection failed");
?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- for icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <!-- for status setting -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

    <!-- for data tables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">

    <!-- JQuery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- for font family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../bootstrap.css">
    <link rel="stylesheet" href="Applicants.css ?v=<?php echo time(); ?>">

    <title>Admin | Applicants Record</title>

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
                        <img src="../img/Logo.png" alt="logo" srcset="" class="img-fluid  my-4 mx-auto d-block" style="width: 50%;">
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
                            <li class="nav-item py-2 px-2">
                                <a href="Profile.php">
                                    <img src="../icons/Profile.png" alt="" srcset="" class="img-fluid"
                                        style="height: 40px; width: 40px; margin-right: 13px;"><span
                                        id="profile">Profile</span>
                                </a>
                            </li>
                            <li class="nav-item py-2 px-2 activeItem">
                                <a href="Applicants.php" class="active">
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
                    <h2 class="py-4 fw-bolder mx-auto text-center" style="font-family: 'Noto Serif', serif;">Applicants Record</h2>
                    <a href="../logout.php" class="my-3 me-2"><img src="../icons/logout.png" class="img-fluid" style="height: 50px; width: 50px;"></img></a>
                </div>

                <div class="row px-5">

                    <div class="col-12 my-5">
                        <div class="row height d-flex justify-content-center align-items-center">
                            <div class="col-md-8">
                                <div class="search"> <i class="fa fa-search"></i> 
                                    <form class="needs-validation" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                                        <input type="text" class="form-control validate" placeholder="Type User name here." name="SrchUserName" required>
                                        <div class="valid-feedback">Valid</div>
                                        <div class="invalid-feedback">Please fill out this field!</div>
                                        <button class="btn fw-bold btn-warning" name="Search" type="submit">Search</button>
                                    </form> 
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="btn1" class="d-grid gap-2 d-flex">
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                            <button class="btn btn-warning fw-bold" name="SearchAll" type="submit">All Records</button>
                        </form>
                        <a href="Applicants.php"><button class="btn btn-warning fw-bold">Refresh</button></a>
                    </div>

                    <div class="table-responsive col-lg-12 my-5 mx-auto">
                        <table id="dataTableId" class="table table-striped table-hover my-3 px-5">
                            <thead class="bg-warning">
                                <tr class="text-center">
                                    <th scope="col">Application_ID</th>
                                    <th scope="col">Applicant_Username</th>
                                    <th scope="col">Applicant_Email</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                    if (isset($_POST['SearchAll'])) 
                                    {
                                        $sql = "SELECT * FROM applications";
                                        $res = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_array($res))
                                        {
                                            $ID = $row['application_id'];
                                            $name = $row['applicant_Uname'];
                                            $email = $row['applicant_email'];
                                    ?>

                                            <tr>
                                                <td id="app_id"><?php echo $ID ?></td>
                                                <td><?php echo $name ?></td>
                                                <td><?php echo $email ?></td>
                                                <td>
                                                    <?php
                                                        if($row['application_status'] == 1)
                                                        {
                                                            echo 'Approved';
                                                        }else {
                                                            echo 'Pending';
                                                        }
                                                    ?>
                                                    <button type="button" class="btn btn-success ms-3 setStatus"><i class="fas fa-edit"></i></button>
                                                </td>
                                                <td class="d-flex justify-content-center">
                                                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                                                        <a class="btn btn-danger view_btn" href="#"><i class="fa fa-eye"></i></a>
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
                                        $search = $_POST['SrchUserName'];
                                        $srchQuery = "SELECT * FROM applications WHERE applicant_Uname = '{$search}'";
                                        $runSrch = mysqli_query($conn, $srchQuery);
                                        if (mysqli_num_rows($runSrch) > 0) 
                                        {
                                            while ($row1 = mysqli_fetch_array($runSrch)) 
                                            {  
                                ?>
                                                <tr>
                                                    <td id="app_id"><?php echo $row1['application_id'] ?></td>
                                                    <td><?php echo $row1['applicant_Uname'] ?></td>
                                                    <td><?php echo $row1['applicant_email'] ?></td>
                                                    <td>
                                                        <?php
                                                        if($row1['application_status'] == 1)
                                                        {
                                                            echo 'Approved';
                                                        }else {
                                                            echo 'Pending';
                                                        }
                                                    ?>
                                                        <button type="button" class="btn btn-success ms-3 setStatus"><i class="fas fa-edit"></i></button>
                                                    </td>
                                                    <td>
                                                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                                                            <a class="btn btn-danger view_btn" href="#"><i class="fa fa-eye"></i></a>
                                                        </form>
                                                    </td>
                                                </tr>
                                <?php
                                            }
                                        }
                                        else 
                                        {
                                ?>
                                                <tr><td colspan="6">No Record Found!</td></tr>
                                <?php
                                        }
                                    }
                                ?>

                            </tbody>
                        </table>
                    </div>

                    <!-- View Modal -->
                    <div class="modal fade" id="viewModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ViewModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-center" id="ViewModalLabel">Applicant's Detail</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="Viewed_data">

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- View modal ends here -->

                    <!-- Edit Status Modal -->
                    <div class="modal fade" id="StatusModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="StatusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-center" id="ViewModalLabel">Update Status</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                            <div class="col-12">
                                                <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
                                                    <input type="hidden" name="updatedID" id="ID">
                                                    <label class="form-label">Application Status</label>
                                                    <select class="form-select" id="Status" aria-label="Default select example" name="ApplicatioStatus">
                                                        <option selected></option>
                                                        <option value="0">Pending</option>
                                                        <option value="1">Approved</option>
                                                    </select>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-warning" name="status">SET</button>
                                                    </div>
                                                </form>
                                            </div>

                                            <?php 
                                                if(isset($_POST['status']))
                                                {
                                                    $id = $_POST['updatedID'];
                                                    $status = $_POST['ApplicatioStatus'];
                                                    
                                                    $query = "UPDATE applications SET application_status = '$status' WHERE application_id = '$id'";
                                                    $runQuery = mysqli_query($conn, $query);
                                                    if($runQuery){
                                                        $_SESSION['status'] = "Updated succesfully!";
                                                        $_SESSION['statusCode'] = "success";
                                                    }else {
                                                        $_SESSION['status'] = "Updation Failed!";
                                                        $_SESSION['statusCode'] = "error";
                                                    }

                                                }
                                            ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Edit status modal ends here -->
                    
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

    <script>
        $(document).ready(function() {
        $('#dataTableId').DataTable(
            {
                "pagingType": "full_numbers",
                "lengthMenue": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
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
                var application_ID = $(this).closest('tr').find('#app_id').text();
                $.ajax({
                    type: "POST",
                    url: "ApplicantsViewCode.php",
                    data: {
                        'check_viewbtn': true,
                        'App_id': application_ID,
                    },
                    success: function (response) {
                        $('.Viewed_data').html(response);
                        $('#viewModal').modal('show');
                    }
                });
            });
        } );
    </script>

    <script>
        $(document).ready(function () {
            $('.setStatus').on('click',function(){
                $('#StatusModal').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                $('#ID').val(data[0]);
                $('#Status').val(data[23]);
            });
        });

    </script>

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