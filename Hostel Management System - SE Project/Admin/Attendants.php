<?php
    ob_start();
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "hms") or die("Connection failed");
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

    <!-- for icons -->
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

    <link rel="stylesheet" href="Attendants.css ?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../bootstrap.css ?v=<?php echo time(); ?>">

    <title>Admin | Room Attendants</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <style>
    body {
        color: #566787;
        background: #f5f5f5;
        font-family: 'Varela Round', sans-serif;
        font-size: 13px;
    }
    .table-responsive {
        margin: 30px 0;
    }
    .table-wrapper {
        background: #fff;
        padding: 20px 25px;
        border-radius: 3px;
        min-width: 1000px;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
    .table-title {        
        padding-bottom: 15px;
        background: #435d7d;
        color: #fff;
        padding: 16px 30px;
        min-width: 100%;
        margin: -20px -25px 10px;
        border-radius: 3px 3px 0 0;
    }
    .table-title h2 {
        margin: 5px 0 0;
        font-size: 24px;
    }
    .table-title .btn-group {
        float: right;
    }
    .table-title .btn {
        color: #fff;
        float: right;
        font-size: 13px;
        border: none;
        min-width: 50px;
        border-radius: 2px;
        border: none;
        outline: none !important;
        margin-left: 10px;
    }
    .table-title .btn i {
        float: left;
        font-size: 21px;
        margin-right: 5px;
    }
    .table-title .btn span {
        float: left;
        margin-top: 2px;
    }
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
        padding: 12px 15px;
        vertical-align: middle;
    }
    table.table tr th:first-child {
        width: 60px;
    }
    table.table tr th:last-child {
        width: 100px;
    }
    table.table-striped tbody tr:nth-of-type(odd) {
        background-color: #fcfcfc;
    }
    table.table-striped.table-hover tbody tr:hover {
        background: #f5f5f5;
    }
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }	
    table.table td:last-child i {
        opacity: 0.9;
        font-size: 22px;
        margin: 0 5px;
    }
    table.table td a {
        font-weight: bold;
        color: #566787;
        display: inline-block;
        text-decoration: none;
        outline: none !important;
    }
    table.table td a:hover {
        color: #2196F3;
    }
    table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #F44336;
    }
    table.table td i {
        font-size: 19px;
    }
    table.table .avatar {
        border-radius: 50%;
        vertical-align: middle;
        margin-right: 10px;
    }
    .pagination {
        float: right;
        margin: 0 0 5px;
    }
    .pagination li a {
        border: none;
        font-size: 13px;
        min-width: 30px;
        min-height: 30px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 2px !important;
        text-align: center;
        padding: 0 6px;
    }
    .pagination li a:hover {
        color: #666;
    }	
    .pagination li.active a, .pagination li.active a.page-link {
        background: #03A9F4;
    }
    .pagination li.active a:hover {        
        background: #0397d6;
    }
    .pagination li.disabled i {
        color: #ccc;
    }
    .pagination li i {
        font-size: 16px;
        padding-top: 6px
    }
    .hint-text {
        float: left;
        margin-top: 10px;
        font-size: 13px;
    }    
    /* Custom checkbox */
    .custom-checkbox {
        position: relative;
    }
    .custom-checkbox input[type="checkbox"] {    
        opacity: 0;
        position: absolute;
        margin: 5px 0 0 3px;
        z-index: 9;
    }
    .custom-checkbox label:before{
        width: 18px;
        height: 18px;
    }
    .custom-checkbox label:before {
        content: '';
        margin-right: 10px;
        display: inline-block;
        vertical-align: text-top;
        background: white;
        border: 1px solid #bbb;
        border-radius: 2px;
        box-sizing: border-box;
        z-index: 2;
    }
    .custom-checkbox input[type="checkbox"]:checked + label:after {
        content: '';
        position: absolute;
        left: 6px;
        top: 3px;
        width: 6px;
        height: 11px;
        border: solid #000;
        border-width: 0 3px 3px 0;
        transform: inherit;
        z-index: 3;
        transform: rotateZ(45deg);
    }
    .custom-checkbox input[type="checkbox"]:checked + label:before {
        border-color: #03A9F4;
        background: #03A9F4;
    }
    .custom-checkbox input[type="checkbox"]:checked + label:after {
        border-color: #fff;
    }
    .custom-checkbox input[type="checkbox"]:disabled + label:before {
        color: #b8b8b8;
        cursor: auto;
        box-shadow: none;
        background: #ddd;
    }
    /* Modal styles */
    .modal .modal-dialog {
        max-width: 400px;
    }
    .modal .modal-header, .modal .modal-body, .modal .modal-footer {
        padding: 20px 30px;
    }
    .modal .modal-content {
        border-radius: 3px;
        font-size: 14px;
    }
    .modal .modal-footer {
        background: #ecf0f1;
        border-radius: 0 0 3px 3px;
    }
    .modal .modal-title {
        display: inline-block;
    }
    .modal .form-control {
        border-radius: 2px;
        box-shadow: none;
        border-color: #dddddd;
    }
    .modal textarea.form-control {
        resize: vertical;
    }
    .modal .btn {
        border-radius: 2px;
        min-width: 100px;
    }	
    .modal form label {
        font-weight: normal;
    }	
    </style>
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
                            <li class="nav-item py-2 px-2">
                                <a href="Applicants.php">
                                    <img src="../icons/Student.png" alt="" srcset="" class="img-fluid"
                                        style="height: 40px; width: 40px; margin-right: 13px;"><span
                                        id="std">Applicants</span>
                                </a>
                            </li>
                            <li class="nav-item py-2 px-2 activeItem">
                                <a href="Attendants.php" class="active">
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
                    <h2 class="py-4 fw-bolder mx-auto text-center" style="font-family: 'Noto Serif', serif;">Attendants Record</h2>
                    <a href="../logout.php" class="my-3 me-2"><img src="../icons/logout.png" class="img-fluid" style="height: 50px; width: 50px;"></img></a>
                </div>
                <div class="row ps-md-2">

                    <!-- Search bar starts -->
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

                    <?php
                        if (isset($_POST['Search'])) 
                        {
                            $search = $_POST['SrchUserName'];
                            $srchQuery = "SELECT * FROM attendant WHERE attendant_Uname = '{$search}'";
                            $runSrch = mysqli_query($conn, $srchQuery);
                            if (mysqli_num_rows($runSrch) > 0) 
                            {
                                while ($rowSrch = mysqli_fetch_array($runSrch)) 
                                {  
                    ?>
                                    <tr>
                                        <td>
                                            <span class="custom-checkbox">
                                                <input type="checkbox" id="checkbox1" name="options[]" value="1">
                                                <label for="checkbox1"></label>
                                            </span>
                                        </td>
                                        <td id="att_id"><?php echo $rowSrch['attendant_id'] ?></td>
                                        <td><?php echo $rowSrch['attendant_name'] ?></td>
                                        <td><?php echo $rowSrch['attendant_contact'] ?></td>
                                        <td><?php echo $rowSrch['attendant_email'] ?></td>
                                        <td><?php echo $rowSrch['attendant_address'] ?></td>       
                                        <td>
                                            <a class="view_btn" href="#"><i class="fa fa-eye material-icons" data-toggle="tooltip" title="View"></i></a>

                                            <!-- <a name="EditBtn" data-id="<?php //echo $rowSqlQuery1['attendant_id']; ?>" onclick="$('#dataid').val($(this).data('id')); $('#UpdateModal').modal('show');"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a> -->
                                                        
                                            <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
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

                    <!-- Search bar ends -->

                    <div class="container-xl my-3">
                        <div class="table-responsive table-bordered">
                            <div class="table-wrapper">
                                <div class="table-title bg-warning">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h2>Manage <b>Attendants</b></h2>
                                        </div>
                                        <div class="col-sm-6">
                                            <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>
                                            <!-- <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						 -->
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>
                                                <span class="custom-checkbox">
                                                    <input type="checkbox" id="selectAll">
                                                    <label for="selectAll"></label>
                                                </span>
                                            </th>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th colspan="2" class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sqlQuery1 = "SELECT * FROM attendant";
                                            $runSqlQuery1 = mysqli_query($conn, $sqlQuery1);
                                            while ($rowSqlQuery1 = mysqli_fetch_array($runSqlQuery1)) 
                                            {
                                        ?>
                                                <tr>
                                                    <td>
                                                        <span class="custom-checkbox">
                                                            <input type="checkbox" id="checkbox1" name="options[]" value="1">
                                                            <label for="checkbox1"></label>
                                                        </span>
                                                    </td>
                                                    <td id="att_id"><?php echo $rowSqlQuery1['attendant_id'] ?></td>
                                                    <td><?php echo $rowSqlQuery1['attendant_name'] ?></td>
                                                    <td><?php echo $rowSqlQuery1['attendant_contact'] ?></td>
                                                    <td><?php echo $rowSqlQuery1['attendant_email'] ?></td>
                                                    <td><?php echo $rowSqlQuery1['attendant_address'] ?></td>
                                                    
                                                    <td class="d-flex justify-content-center">
                                                        <a class="view_btn" href="#"><i class="fa fa-eye material-icons" data-toggle="tooltip" title="View"></i></a>

                                                        <!-- <a name="EditBtn" data-id="<?php //echo $rowSqlQuery1['attendant_id']; ?>" onclick="$('#dataid').val($(this).data('id')); $('#UpdateModal').modal('show');"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a> -->
                                                        
                                                        <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                                    </td>
                                                </tr>
                                        <?php 
                                            }
                                        ?>
                                        
                                    </tbody>
                                </table>
                                <div class="clearfix">
                                    <div class="hint-text">Showing <b>2</b> out of <b>2</b> entries</div>
                                    <ul class="pagination">
                                        <li class="page-item disabled"><a href="#">Previous</a></li>
                                        <li class="page-item active"><a href="#" class="page-link">1</a></li>
                                        <!-- <li class="page-item"><a href="#" class="page-link">2</a></li>
                                        <li class="page-item"><a href="#" class="page-link">3</a></li>
                                        <li class="page-item"><a href="#" class="page-link">4</a></li>
                                        <li class="page-item"><a href="#" class="page-link">5</a></li> -->
                                        <li class="page-item"><a href="#" class="page-link">Next</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>        
                    </div>

                    <!-- View Modal -->
                    <div class="modal fade" id="viewModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ViewModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
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

                    <!-- Add Modal HTML -->
                    <div class="modal fade" id="addEmployeeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ViewModalLabel" aria-hidden="true">
                        <div class="modal-dialog" style="max-width: 50%;" role="document">
                            <div class="modal-content">
                                    <div class="modal-header">						
                                        <h4 class="modal-title">Add New  Rooms Attendant</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">	
                                        <form action="<?php $_SERVER['PHP_SELF']; ?>" class="needs-validation" method="POST" enctype="multipart/form-data">		
                                        
                                            <div class="form-group">
                                                <label class="form-label" for="att_name">Name</label>
                                                <input type="text" class="form-control validate" name="attName" id="att_name" pattern="[a-zA-Z'-'\s]*" title="should contain oly alphabetes" placeholder="Name" required>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please fill out this field!</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="att_gender">Gender</label>
                                                <input type="text" class="form-control validate" name="attGender" id="att_gender" placeholder="Gender" required>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please fill out this field!</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="att_phone">Phone</label>
                                                <input type="text" class="form-control validate" name="attPhone" id="att_phone" pattern="[0-9]{4}-[0-9]{7}" placeholder="Phone number (xxxx-xxxxxxx)" required>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please fill out this field!</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="att_DOB">Date of Birth</label>
                                                <input type="date" class="form-control validate" name="attDOB" id="att_DOB" required>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please fill out this field!</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="att_CNIC">CNIC</label>
                                                <input type="text" class="form-control validate" name="attCNIC" id="att_CNIC" pattern="[0-9]{5}-[0-9]{7}-[0-9]{1}" placeholder="CNIC (xxxxx-xxxxxxx-x)" required>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please fill out this field!</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="att_email">Email</label>
                                                <input type="email" class="form-control validate" name="attEmail" id="att_email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="proper email format" placeholder="Email Address" required>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please fill out this field!</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="att_address">Address</label>
                                                <textarea class="form-control validate" name="attAddress" id="att_address" placeholder="Address" required></textarea>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please fill out this field!</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="att_pAddress">Permanent Address</label>
                                                <textarea class="form-control validate" name="attpAddress" id="att_pAddress" placeholder="Permanent Address" required></textarea>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please fill out this field!</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="att_Img">Upload Image</label>
                                                <input type="file" class="form-control validate" name="attImg" id="att_Img" required>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please fill out this field!</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="att_Uname">User Name</label>
                                                <input type="text" class="form-control validate" name="attUname" id="att_Uname" placeholder="User Name" required>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please fill out this field!</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="att_pwd">Password</label>
                                                <input type="password" class="form-control validate" name="attPwd" id="att_pwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" placeholder="Password" required>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please fill out this field!</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="att_Cpwd">Confirm Password</label>
                                                <input type="password" class="form-control validate" name="attCPwd" id="att_Cpwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" placeholder="Confirm Password" required>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please fill out this field!</div>
                                            </div>

                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="ADD">ADD</button>
                                            </div>
                                            </form>

                                            <?php
                                            if (isset($_POST['ADD'])) 
                                            {

                                                $AttName = $_POST['attName'];
                                                $AttGender = $_POST['attGender'];
                                                $AttPhone = $_POST['attPhone'];
                                                $AttDOB = date("y-m-d",strtotime($_POST['attDOB']));
                                                $AttCNIC = $_POST['attCNIC'];
                                                $AttEmail = $_POST['attEmail'];
                                                $AttAddress = $_POST['attAddress'];
                                                $AttpAddress = $_POST['attpAddress'];
                                                $AttImg = $_FILES['attImg'];

                                                $fileName = $AttImg['name'];
                                                $fileError = $AttImg['error'];
                                                $filetmp = $AttImg['tmp_name'];
                                                $fileExt = explode('.',$fileName);
                                                $fileCheck = strtolower(end($fileExt));
                                                $fileExtStore = array('png', 'jpg', 'jpeg');

                                                $AttUname = $_POST['attUname'];

                                                if ($_POST['attCPwd'] === $_POST['attPwd']) 
                                                {
                                                    $AttPassword = $_POST['attCPwd'];
                                                    $getUsernameSql = "SELECT attendant_Uname FROM attendant WHERE  attendant_Uname = '$AttUname'";
                                                    $getUsernameSqlRun = mysqli_query($conn, $getUsernameSql);
                                                    $getUsernameSqlRow = mysqli_num_rows($getUsernameSqlRun);
                                                    if ($getUsernameSqlRow > 0) 
                                                    {
                                                        $_SESSION['status'] = "Username already exist!";
                                                        $_SESSION['statusCode'] = "error";
                                                    }
                                                    else 
                                                    {
                                                        if (in_array($fileCheck, $fileExtStore)) 
                                                        {
                                                            $destinationFile = 'upload/'.$fileName;
                                                            move_uploaded_file($filetmp,$destinationFile);

                                                            $AddSql = "INSERT INTO attendant(attendant_name, attendant_gender, attendant_contact, attendant_DOB, attendant_CNIC, attendant_email, attendant_address, attendant_pAddress,attendant_picture, attendant_Uname, attendant_password) VALUES('$AttName','$AttGender',' $AttPhone','$AttDOB','$AttCNIC','$AttEmail','$AttAddress','$AttpAddress','$destinationFile','$AttUname','$AttPassword')";

                                                            $AddSqlrun = mysqli_query($conn, $AddSql);
                                                            if ($AddSqlrun) 
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
                                                        else 
                                                        {
                                                            $_SESSION['status'] = "Only (png, jpg, jpeg) formats are allowed!";
                                                            $_SESSION['statusCode'] = "error";
                                                        }
                                                    }
                                                }
                                                else 
                                                {
                                                    $_SESSION['status'] = "Password does not match!";
                                                    $_SESSION['statusCode'] = "error";
                                                }
                                            }
                                        ?>                    
                                    </div>
                                    <!-- modal body ends here! -->
                            </div>
                        </div>
                    </div>
                    <!-- Edit Modal HTML -->
                    <div class="modal fade" id="UpdateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="UpdateModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">						
                                    <h4 class="modal-title">Edit Employee</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                
                                <div class="modal-body">	
                                    <form action="<?php $_SERVER['PHP_SELF']; ?>" class="needs-validation" method="POST">	

                                            <input type="text" name="dataid" id="dataid" value="">

                                            <?php
                                            if (isset($_REQUEST['EditBtn'])) {
                                                $edit_Id = $_POST['dataid'];
                                                $editSql = "SELECT * FROM attendant WHERE attendant_id = '$edit_Id'";
                                                $editSqlRun = mysqli_query($conn, $edit_Id);
                                                $editSqlRow = mysqli_fetch_array($editSqlRun);
                                                $id = $editSqlRow['attendant_id'];
                                                echo    $name = $editSqlRow['attendant_name'];
                                                echo    $gender = $editSqlRow['attendant_gender'];
                                                echo    $phone = $editSqlRow['attendant_contact'];
                                                echo    $dob = $editSqlRow['attendant_DOB'];
                                                echo    $cnic = $editSqlRow['attendant_CNIC'];
                                                echo    $email = $editSqlRow['attendant_email'];
                                                echo    $address = $editSqlRow['attendant_address'];
                                                echo    $paddress = $editSqlRow['attendant_pAddress'];
                                                echo    $uname = $editSqlRow['attendant_Uname'];
                                                echo    $pwd = $editSqlRow['attendant_password'];
                                            }
                                        ?>

                                            <div class="form-group">
                                                <label class="form-label" for="a_name">Name</label>
                                                <input type="text" class="form-control validate" name="A_Name" id="a_name" pattern="[a-zA-Z'-'\s]*" title="should contain oly alphabetes" placeholder="Name" value="<?php echo $name ?>" required>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please fill out this field!</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="a_gender">Gender</label>
                                                <input type="text" class="form-control validate" name="A_Gender" id="a_gender" placeholder="Gender" value="<?php  ?>" required>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please fill out this field!</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="a_phone">Phone</label>
                                                <input type="text" class="form-control validate" name="A_Phone" id="a_phone" pattern="[0-9]{4}-[0-9]{7}" placeholder="Phone number (xxxx-xxxxxxx)" value="<?php  ?>" required>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please fill out this field!</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="a_DOB">Date of Birth</label>
                                                <input type="date" class="form-control validate" name="A_DOB" id="a_DOB" value="<?php  ?>" required>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please fill out this field!</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="a_CNIC">CNIC</label>
                                                <input type="text" class="form-control validate" name="A_CNIC" id="a_CNIC" pattern="[0-9]{5}-[0-9]{7}-[0-9]{1}" placeholder="CNIC (xxxxx-xxxxxxx-x)" value="<?php  ?>" required>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please fill out this field!</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="a_email">Email</label>
                                                <input type="email" class="form-control validate" name="A_Email" id="a_email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="proper email format" placeholder="Email Address" value="<?php  ?>" required>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please fill out this field!</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="a_address">Address</label>
                                                <textarea class="form-control validate" name="A_Address" id="a_address" placeholder="Address" value="<?php  ?>" required></textarea>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please fill out this field!</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="a_pAddress">Permanent Address</label>
                                                <textarea class="form-control validate" name="A_pAddress" id="a_pAddress" placeholder="Permanent Address" value="<?php  ?>" required></textarea>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please fill out this field!</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="a_Img">Upload Image</label>
                                                <input type="file" class="form-control validate" name="A_Img" id="a_Img" required>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please fill out this field!</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="a_Uname">User Name</label>
                                                <input type="text" class="form-control validate" name="A_Uname" id="a_Uname" placeholder="User Name" value="<?php  ?>" readonly>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please fill out this field!</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="a_pwd">Password</label>
                                                <input type="password" class="form-control validate" name="A_Pwd" id="a_pwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" placeholder="Password" value="<?php  ?>" required>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please fill out this field!</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="a_Cpwd">Confirm Password</label>
                                                <input type="password" class="form-control validate" name="A_CPwd" id="a_Cpwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" placeholder="Confirm Password" required>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please fill out this field!</div>
                                            </div>
                                            
                                        
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="EDIT">RESET</button>
                                        </div>
                                    </form>	
                                	
                                    <?php
                                            if (isset($_POST['EDIT'])) 
                                            {
                                                $Id = $_POST['A_Edit_ID'];
                                                $Name = $_POST['A_Name'];
                                                $Gender = $_POST['A_Gender'];
                                                $Phone = $_POST['A_Phone'];
                                                $DOB = date("y-m-d",strtotime($_POST['A_DOB']));
                                                $CNIC = $_POST['A_CNIC'];
                                                $Email = $_POST['A_Email'];
                                                $Address = $_POST['A_Address'];
                                                $pAddress = $_POST['A_pAddress'];
                                                $Img = $_FILES['A_Img'];

                                                $fileName1 = $Img['name'];
                                                $fileError1 = $Img['error'];
                                                $filetmp1 = $Img['tmp_name'];
                                                $fileExt1 = explode('.',$fileName1);
                                                $fileCheck1 = strtolower(end($fileExt1));
                                                $fileExtStore1 = array('png', 'jpg', 'jpeg');

                                                $Uname = $_POST['A_Uname'];

                                                if ($_POST['A_CPwd'] === $_POST['A_Pwd']) 
                                                {
                                                    $Password = $_POST['A_CPwd'];
                                                    if (in_array($fileCheck1, $fileExtStore1)) 
                                                        {
                                                            $destinationFile1 = 'upload/'.$fileName1;
                                                            move_uploaded_file($filetmp1,$destinationFile1);

                                                            $UpdateSql = "UPDATE attendant SET attendant_name = '$Name', attendant_gender = '$Gender', attendant_contact = ' $Phone', attendant_DOB = '$DOB', attendant_CNIC = '$CNIC', attendant_email = '$Email', attendant_address = '$Address', attendant_pAddress = '$pAddress',attendant_picture = '$destinationFile1', attendant_password = '$Password' WHERE attendant_id = '$Id' ";

                                                            $$UpdateSqlrun = mysqli_query($conn, $UpdateSql);
                                                            if ($UpdateSqlrun) 
                                                            {
                                                                $_SESSION['status'] = "Updated succesfully!";
                                                                $_SESSION['statusCode'] = "success";
                                                            }
                                                            else 
                                                            {
                                                                $_SESSION['status'] = "Updation Failed!";
                                                                $_SESSION['statusCode'] = "error";
                                                            }
                                                        }
                                                        else 
                                                        {
                                                            $_SESSION['status'] = "Only (png, jpg, jpeg) formats are allowed!";
                                                            $_SESSION['statusCode'] = "error";
                                                        }
                                                }
                                                else 
                                                {
                                                    $_SESSION['status'] = "Password does not match!";
                                                    $_SESSION['statusCode'] = "error";
                                                }
                                            }
                                        ?>		
                                </div>
                                    
                            </div>
                        </div>
                    </div>
                    <!-- Delete Modal HTML -->
                    <div id="deleteEmployeeModal" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form>
                                    <div class="modal-header">						
                                        <h4 class="modal-title">Delete Employee</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">					
                                        <p>Are you sure you want to delete these Records?</p>
                                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                        <input type="submit" class="btn btn-danger" value="Delete">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Right part Ends -->


        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous">
    </script>
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
    $(document).ready(function(){
        // Activate tooltip
        $('[data-toggle="tooltip"]').tooltip();
        
        // Select/Deselect checkboxes
        var checkbox = $('table tbody input[type="checkbox"]');
        $("#selectAll").click(function(){
            if(this.checked){
                checkbox.each(function(){
                    this.checked = true;                        
                });
            } else{
                checkbox.each(function(){
                    this.checked = false;                        
                });
            } 
        });
        checkbox.click(function(){
            if(!this.checked){
                $("#selectAll").prop("checked", false);
            }
        });

        // for view
        $('.view_btn').click(function (e) 
        { 
                e.preventDefault();
                var attendant_ID = $(this).closest('tr').find('#att_id').text();
                $.ajax({
                    type: "POST",
                    url: "AttendantView.php",
                    data: {
                        'check_viewbtn': true,
                        'Att_id': attendant_ID,
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