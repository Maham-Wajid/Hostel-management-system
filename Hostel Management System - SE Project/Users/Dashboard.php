<?php
    session_start();
    if (!isset($_SESSION['name'])) {
        header("Location: http://localhost/Hospital Management System - SE Project/login.php");
    }
    $conn = mysqli_connect("localhost", "root", "", "hms") or die("Connection failed");
    $name = $_SESSION['name'];
    $sqlId = "SELECT user_id FROM user WHERE user_name = '$name'";
    $sqlIdRun = mysqli_query($conn, $sqlId);
    $sqlIdRow = mysqli_fetch_array($sqlIdRun);
    $id = $sqlIdRow['user_id'];
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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="DashboardStyle.css ?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../bootstrap.css">

    <title>User | Dashboard</title>
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
                        <img src="../img/Logo.png" alt="logo" srcset=""  class="img-fluid  my-4 mx-auto d-block" style="width: 50%;">
                    </div>

                    <!-- Menue Options Start -->
                    <div class="box">
                        <ul class="navbar-nav mt-3">
                            <li class="nav-item py-2 px-2 activeItem">
                                <a href="Dashboard.php" class="active">
                                    <img src="../icons/Dashboard.png" alt="" srcset="" class="img-fluid" style="height: 40px; width: 40px; margin-right: 13px;"><span id="dashbord">Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-item py-2 px-2">
                                <a href="Profile.php">
                                    <img src="../icons/Profile.png" alt="" srcset="" class="img-fluid" style="height: 40px; width: 40px; margin-right: 13px;"><span id="profile">Profile</span>
                                </a>
                            </li>
                            <li class="nav-item py-2 px-2">
                                <a href="Forms.php">
                                    <img src="../icons/forms.jpg" alt="" srcset="" class="img-fluid" style="height: 40px; width: 40px; margin-right: 13px;"><span id="form">Forms</span>
                                </a>
                            </li>
                            <li class="nav-item py-2 px-2">
                                <a href="Bills.php">
                                    <img src="../icons/Bills.png" alt="" srcset="" class="img-fluid" style="height: 40px; width: 40px; margin-right: 13px;"><span id="bill">Billing</span>
                                </a>
                            </li>
                            <li class="nav-item py-2 px-2">
                                <a href="Profile.php">
                                    <img src="../icons/settings.png" alt="" srcset="" class="img-fluid" style="height: 40px; width: 40px; margin-right: 13px;"><span id="setting">Settings</span>
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
                    <h2 class="py-4 fw-bolder mx-auto text-center" style="font-family: 'Noto Serif', serif;">User Dashboard</h2>
                    <a href="../logout.php" class="my-3 me-2"><img src="../icons/logout.png" class="img-fluid" style="height: 50px; width: 50px;"></img></a>
                    
                </div>
                <div class="row ps-md-5">

                    <!-- cards start -->
                    <!-- 1st Total -->
                    <div class="gx-md-2 col-4 pt-5">
                        <div class="card mb-3 fw-bold" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4 ps-2">
                                    <img src="../icons/application1.png" class="img-fluid rounded-start ms-5 my-2" style="height: 70px; width: 70px;" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <?php 
                                                // $sql1 = "SELECT "
                                            ?>
                                        </h5>
                                        <p class="card-text">Total Applications</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 2nd Submitted -->
                    <div class="gx-md-2 col-4 pt-5">
                        <div class="card mb-3 fw-bold" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4 ps-2">
                                    <img src="../icons/application2.png" class="img-fluid rounded-start ms-5 my-2" style="height: 70px; width: 70px;" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">0</h5>
                                        <p class="card-text">Submitted Applications</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 3rd Approved -->
                    <div class="gx-md-2 col-4 pt-5">
                        <div class="card mb-3 fw-bold" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4 ps-2">
                                    <img src="../icons/application3.png" class="img-fluid rounded-start ms-5 my-2" style="height: 70px; width: 70px;" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">0</h5>
                                        <p class="card-text">Approved Applications</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- cards End -->

                    <!-- Table starts -->
                    <div class="py-5">
                        <div class="card">
                            <div class="card-header fw-bold">
                                My Applications
                            </div>
                            <div class="card-body">
                                <div class="table-responsive col-lg-12 mx-auto">
                                    <table id="dataTableId" class="table">
                                        <thead>
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Application ID</th>
                                            <th scope="col">Application Type</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                            <th scope="col">Download</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Table ends -->

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

    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

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
        } );
    </script>

</body>

</html>