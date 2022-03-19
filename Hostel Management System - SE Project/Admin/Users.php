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

    <!-- for font family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../bootstrap.css">
    <link rel="stylesheet" href="Users.css ?v=<?php echo time(); ?>">

    <title>Admin | Users Record</title>

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
                    <h2 class="py-4 fw-bolder mx-auto text-center" style="font-family: 'Noto Serif', serif;">Users Record</h2>
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
                        <a href="Users.php"><button class="btn btn-warning fw-bold">Refresh</button></a>
                    </div>

                    <div class="table-responsive col-lg-12 my-5 mx-auto">
                        <table id="dataTableId" class="table table-striped table-hover my-3 px-5">
                            <thead class="bg-warning">
                                <tr class="text-center">
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Password</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                    $conn = mysqli_connect("localhost", "root", "", "hms") or die("Connection failed");

                                    if (isset($_POST['SearchAll'])) 
                                    {
                                        $sql = "SELECT * FROM user";
                                        $res = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_array($res))
                                        {
                                            $ID = $row['user_id'];
                                            $name = $row['user_fname'];
                                            $email = $row['user_email'];
                                            $category = $row['user_category'];
                                            $username = $row['user_name'];
                                            $password = $row['user_password'];
                                    ?>

                                            <tr>
                                                <td><?php echo $ID ?></td>
                                                <td><?php echo $name ?></td>
                                                <td><?php echo $email ?></td>
                                                <td><?php echo $category ?></td>
                                                <td><?php echo $username ?></td>
                                                <td><?php echo $password ?></td>
                                                <td>
                                                    <input type="hidden" class="delete_id_value" value="<?php echo $ID; ?>">
                                                    <a href="javascript:void(0)" class="delete_btn_ajax btn btn-danger deleteBtn">Delete</a>
                                                </td>
                                            </tr>
        
                                    <?php
                                        }
                                    }
                                ?>    
                                
                                <?php
                                    if (isset($_POST['delete_btn_set'])) {
                                        $del_id = $_POST['delete_id'];
                                        $delQuery = "DELETE FROM user WHERE user_id='$del_id'";
                                        $run = mysqli_query($conn, $delQuery);
                                    }
                                ?>

                                <?php
                                    if (isset($_POST['Search'])) 
                                    {
                                        $search = $_POST['SrchUserName'];
                                        $srchQuery = "SELECT * FROM user WHERE user_name = '{$search}'";
                                        $runSrch = mysqli_query($conn, $srchQuery);
                                        if (mysqli_num_rows($runSrch) > 0) 
                                        {
                                            while ($row1 = mysqli_fetch_array($runSrch)) 
                                            {  
                                ?>
                                                <tr>
                                                    <td><?php echo $row1['user_id'] ?></td>
                                                    <td><?php echo $row1['user_fname'] ?></td>
                                                    <td><?php echo $row1['user_email'] ?></td>
                                                    <td><?php echo $row1['user_category'] ?></td>
                                                    <td><?php echo $row1['user_name'] ?></td>
                                                    <td><?php echo $row1['user_password'] ?></td>
                                                    <td>
                                                        <input type="hidden" class="delete_id_value" value="<?php echo $ID; ?>">
                                                        <a href="javascript:void(0)" class="delete_btn_ajax btn btn-danger deleteBtn">Delete</a>
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

    <script src="../Js/sweetAlert.js"></script>
    <script>
        $(document).ready(function () {
            $('.deleteBtn').click(function (e) { 
            e.preventDefault();
            
            var del = $(this).closest("tr").find('.delete_id_value').val();

            swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this data record!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    url: "Users.php",
                    data: {
                        "delete_btn_set": 1,
                        "delete_id": del, 
                    },
                    success: function (response) {
                        swal("data Deleted Successfully!",{
                            icon: "success",
                        });
                        //For wait 1 seconds
                        setTimeout(function() 
                        {
                            location.reload();  //Refresh page
                        }, 1000);
                    }
                });
            } else {
                swal("Your record is safe!", {
                icon: "info",
                });
            }
            });
        });
        });
    </script>

</body>

</html>