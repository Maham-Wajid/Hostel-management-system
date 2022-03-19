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

    <!-- for icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    
    <!-- for Table styling -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <!-- for data table -->
    <link rel="stylesheet" href="https://code.jquery.com/jquery-3.5.1.js">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js">

        <!-- JQuery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- for font styles 1 -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif&display=swap" rel="stylesheet">

    <!-- for font styles 2 -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="BillStyle.css ?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../bootstrap.css">

    <title>Attendant | Billing Record</title>
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
                            <li class="nav-item py-2 px-2">
                                <a href="Attendance.php">
                                    <img src="../icons/Attendance.png" alt="" srcset="" class="img-fluid" style="height: 40px; width: 40px; margin-right: 13px;"><span id="att">Attendance</span>
                                </a>
                            </li>
                            <li class="nav-item py-2 px-2 activeItem">
                                <a href="Bills.php" class="active">
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
                    <h2 class="py-4 fw-bolder mx-auto text-center" style="font-family: 'Noto Serif', serif;">Bills Records</h2>
                    <a href="../logout.php" class="my-3 me-2"><img src="../icons/logout.png" class="img-fluid" style="height: 50px; width: 50px;"></img></a>
                </div>
                <div class="row ps-md-5">

                <div class="col-12 my-5">
                        <div class="row height d-flex justify-content-center align-items-center">
                            <div class="col-md-8">
                                <div class="search"> <i class="fa fa-search"></i> 
                                    <form class="needs-validation" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                                        <input type="text" class="form-control validate" placeholder="Type user name here." name="SrchUserName" required>
                                        <div class="valid-feedback">Valid</div>
                                        <div class="invalid-feedback">Please fill out this field!</div>
                                        <button class="btn fw-bold btn-warning" name="Search" type="submit">Search</button>
                                    </form> 
                                </div>
                            </div>
                        </div>
                    </div>

                <!-- table starts here -->
                        <div class="my-4 px-4">
                            <div class="table-responsive">
                                <div class="table-wrapper">			
                                    <div class="table-title bg-warning">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h2>Bills <b>Details</b></h2>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-striped mydatatable">
                                        <thead>
                                            <tr class="text-center">
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Type</th>
                                                <th>Payment</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sqlQuery1 = "SELECT * FROM bills";
                                            $runSqlQuery1 = mysqli_query($conn, $sqlQuery1);
                                            while ($rowSqlQuery1 = mysqli_fetch_array($runSqlQuery1)) 
                                            {
                                        ?>
                                                <tr class="text-center">
                                                    <td id="b_id"><?php echo $rowSqlQuery1['bill_id'] ?></td>
                                                    <td><?php echo $rowSqlQuery1['std_name'] ?></td>
                                                    <td><?php echo $rowSqlQuery1['bill_type'] ?></td>
                                                    <td><?php echo $rowSqlQuery1['bill_payment'] ?></td>
                                                    <td>
                                                        <?php
                                                            if($rowSqlQuery1['bill_status'] == 1)
                                                            {
                                                                echo 'Paid';
                                                            }
                                                            else 
                                                            {
                                                                echo 'Not Paid';
                                                            }
                                                        ?>
                                                        <button type="button" class="btn btn-success ms-3 setStatus"><i class="fas fa-edit"></i></button>
                                                    </td>
                                                    
                                                    <td>
                                                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                                                            <a class="btn btn-warning view_btn" href="#"><i class="fa fa-eye"></i></a>
                                                        </form>
                                                    </td>
                                                </tr>
                                        <?php 
                                            }
                                        ?>

                                        <?php
                                            if (isset($_POST['Search'])) 
                                            {
                                                $search = $_POST['SrchUserName'];
                                                $srchQuery = "SELECT * FROM bills WHERE std_name = '{$search}'";
                                                $runSrch = mysqli_query($conn, $srchQuery);
                                                if (mysqli_num_rows($runSrch) > 0) 
                                                {
                                                    while ($row1 = mysqli_fetch_array($runSrch)) 
                                                    {  
                                        ?>
                                                        <tr>
                                                            <td id="b_id"><?php echo $row1['bill_id'] ?></td>
                                                            <td><?php echo $row1['std_name'] ?></td>
                                                            <td><?php echo $row1['bill_type'] ?></td>
                                                            <td><?php echo $rowSqlQuery1['bill_payment'] ?></td>
                                                            <td>
                                                                <?php
                                                                    if($rowSqlQuery1['bill_status'] == 1)
                                                                    {
                                                                        echo 'Paid';
                                                                    }
                                                                    else 
                                                                    {
                                                                        echo 'Not Paid';
                                                                    }
                                                                ?>
                                                                <button type="button" class="btn btn-success ms-3 setStatus"><i class="fas fa-edit"></i></button>
                                                            </td>
                                                            
                                                            <td>
                                                                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                                                                    <a class="btn btn-warning view_btn" href="#"><i class="fa fa-eye"></i></a>
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
                            </div>

                            <!-- View Modal -->
                            <div class="modal fade" id="viewModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ViewModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-warning">
                                            <h5 class="modal-title text-center" id="ViewModalLabel">Bill Detail</h5>
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

                            <!-- Edit Status Modal -->
                    <div class="modal fade" id="StatusModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="StatusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-warning">
                                    <h5 class="modal-title text-center" id="ViewModalLabel">Update Status</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                            <div class="col-12">
                                                <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
                                                    <input type="hidden" name="updatedID" id="ID">
                                                    <label class="form-label">Bill Status</label>
                                                    <select class="form-select" id="Status" aria-label="Default select example" name="billStatus">
                                                        <option selected></option>
                                                        <option value="0">Paid</option>
                                                        <option value="1">Not Paid</option>
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
                                                    $status = $_POST['billStatus'];
                                                    
                                                    $query = "UPDATE bills SET bill_status = '$status' WHERE bill_id = '$id'";
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
                <!-- table ends here -->

                </div>
            </div>
            <!-- Right part Ends -->


        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous">
    </script>

    <!-- jquery link -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- poper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js"></script>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="../Js/sweetAlert.js"></script>

    <script>
        $(document).ready(function () {
        // Activate tooltips
        $('[data-toggle="tooltip"]').tooltip();
        
        // Filter table rows based on searched term
        $("#search").on("keyup", function() {
            var term = $(this).val().toLowerCase();
            $("table tbody tr").each(function(){
                $row = $(this);
                var name = $row.find("td:nth-child(2)").text().toLowerCase();
                console.log(name);
                if(name.search(term) < 0){                
                    $row.hide();
                } else{
                    $row.show();
                }
            });
        });

        $('.view_btn').click(function (e) { 
                e.preventDefault();
                var fee_ID = $(this).closest('tr').find('#b_id').text();
                $.ajax({
                    type: "POST",
                    url: "BillsView.php",
                    data: {
                        'check_viewbtn': true,
                        'B_id': fee_ID,
                    },
                    success: function (response) {
                        $('.Viewed_data').html(response);
                        $('#viewModal').modal('show');
                    }
                });
            });

            $('.setStatus').on('click',function(){
                $('#StatusModal').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                $('#ID').val(data[0]);
                $('#Status').val(data[5]);
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