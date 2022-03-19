<?php
ob_start();
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

        <!-- JQuery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="FormsStyle.css ?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../bootstrap.css">

    <title>User | Forms</title>
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
                    <h2 class="py-4 fw-bolder mx-auto text-center" style="font-family: 'Noto Serif', serif;">User Forms</h2>
                    <a href="../logout.php" class="my-3 me-2"><img src="../icons/logout.png" class="img-fluid" style="height: 50px; width: 50px;"></img></a>
                    
                </div>
                <div class="row ps-md-5">
                    <!-- left part -->
                    <div class="col-6">
                        <div class="my-3 heading">
                            <h2 style="font-family: 'Noto Serif', serif;" class="fw-bold shadow-sm p-3 mb-5 bg-body rounded">Allotment Application</h2>
                        </div>
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" class="needs-validation" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="Type" value="allotment">
                        <div class="card my-3 mx-2">
                                <h5 class="card-header">Details</h5>
                                <div class="card-body">
                                    <p class="card-text">
                                            <div class="form-group form-check" style="padding-left: 0 !important;">
                                        
                                                <!-- Name -->
                                                <input type="text" class="form-control mt-1 validate" id="full_name" placeholder="Name" name="Name" pattern="[a-zA-Z'-'\s]*" required>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please fill out this field!</div>

                                                <!-- Gender -->
                                                <select class="form-control my-1 text-muted validate" aria-label="Default select example" required id="gender" name="Gender">
                                                    <option hidden>Gender</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                    <option value="other">Other</option>
                                                </select>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please fill out this field!</div>

                                                <!-- contact -->
                                                <input type="text" class="form-control mt-1 validate" id="contact" placeholder="Phone number (xxxx-xxxxxxx)" name="Contact" pattern="[0-9]{4}-[0-9]{7}" required autocomplete="off">
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please fill out this field!</div>

                                                <!-- Email -->
                                                <input type="email" class="form-control my-1 validate" name="Email" id="user_mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Email" required>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please fill out this field!</div>

                                                <!-- CNIC -->
                                                <input type="text" class="form-control my-1 validate" name="CNIC" id="cnic" pattern="[0-9]{5}-[0-9]{7}-[0-9]{1}" placeholder="CNIC (xxxxx-xxxxxxx-x)" required>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please fill out this field!</div>

                                                <!-- address -->
                                                <input class="form-control my-1 validate" name="Address" id="address" placeholder="Address" required>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please fill out this field!</div>

                                                <!-- Permanent Address -->
                                                <input class="form-control my-1 validate" name="pAddress" id="pAddress" placeholder="Permanent Address" required>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please fill out this field!</div>

                                                <!-- Picture -->
                                                <label class="form-label" for="att_Img">Upload Image</label>
                                                <input type="file" class="form-control validate" name="Img" id="img" required>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please fill out this field!</div>
                                        
                                            </div>
                                    </p>
                                </div>
                        </div>
                        <div class="card my-3 mx-2">
                            <h5 class="card-header">Guardian Details</h5>
                            <div class="card-body">
                                <div class="form-group form-check" style="padding-left: 0 !important;">
                                    <!-- Name -->
                                    <input type="text" class="form-control mt-1 validate" id="g_name" placeholder="Guardian Name" name="GName" pattern="[a-zA-Z'-'\s]*" required autocomplete="off">
                                    <div class="valid-feedback">Valid</div>
                                    <div class="invalid-feedback">Please fill out this field!</div>

                                    <!-- Relation -->
                                    <input type="text" class="form-control mt-1 validate" id="g_relation" placeholder="Guardian Relation" name="GRelation" required autocomplete="off">
                                    <div class="valid-feedback">Valid</div>
                                    <div class="invalid-feedback">Please fill out this field!</div>

                                    <!-- CNIC -->
                                    <input type="text" class="form-control my-1 validate" name="GCNIC" id="GCNIC" pattern="[0-9]{5}-[0-9]{7}-[0-9]{1}" placeholder="Guardian CNIC (xxxxx-xxxxxxx-x)" required>
                                    <div class="valid-feedback">Valid</div>
                                    <div class="invalid-feedback">Please fill out this field!</div>

                                    <!-- contact -->
                                    <input type="" class="form-control mt-1 validate" id="gcontact" placeholder="Guardian Contact (xxxx-xxxxxxx)" name="GContact" pattern="[0-9]{4}-[0-9]{7}" required autocomplete="off">
                                    <div class="valid-feedback">Valid</div>
                                    <div class="invalid-feedback">Please fill out this field!</div>
                                </div>
                            </div>
                        </div>
                        <div class="card my-3 mx-2">
                            <h5 class="card-header">Emergency Contact Details</h5>
                            <div class="card-body">
                                <div class="form-group form-check" style="padding-left: 0 !important;">
                                    <!-- Relation -->
                                    <input type="text" class="form-control mt-1 validate" id="e_relation" placeholder="Emergency Relation" name="ERelation" required autocomplete="off">
                                    <div class="valid-feedback">Valid</div>
                                    <div class="invalid-feedback">Please fill out this field!</div>

                                    <!--Energency contact -->
                                    <input type="" class="form-control mt-1 validate" id="e_contact" placeholder="Emergency Contact" name="EContact" pattern="[0-9]{4}-[0-9]{7}" required autocomplete="off">
                                    <div class="valid-feedback">Valid</div>
                                    <div class="invalid-feedback">Please fill out this field!</div>
                                </div>
                            </div>
                        </div>
                        <div class="card my-3 mx-2">
                            <h5 class="card-header">Category</h5>
                            <div class="card-body">

                                <select class="form-control my-1 validate" aria-label="Default select example" id="category" name="Category">
                                    <option hidden>Category</option>
                                    <option value="University Student">University Student</option>
                                    <option value="Non-University Student">Non-University Student</option>
                                </select>

                                <input type="text" class="form-control mt-1 validate" id="redgNo" placeholder="Redgistration Number" name="RedgNo" autocomplete="off">

                                <input type="text" class="form-control mt-1 validate" id="dept" placeholder="Department" name="Dept" autocomplete="off">

                                <input type="text" class="form-control mt-1 validate" id="semester" placeholder="Semester" name="Semester" autocomplete="off">

                                <input type="text" class="form-control mt-1 validate" id="gpa" placeholder="GPA" name="GPA" autocomplete="off">

                                <input type="text" class="form-control mt-1 validate" id="cgpa" placeholder="CGPA" name="CGPA" autocomplete="off">

                                <input type="text" class="form-control mt-1 validate" id="batch" placeholder="Batch/Session" name="Batch" autocomplete="off">

                            </div>
                        </div>
                        <div class="my-2 d-flex justify-content-center">
                            <button type="submit" class="btn btn-warning" name="SAVE" style="font-family: 'Noto Serif', serif;">Apply</button>
                        </div>
                        </form>

                        <?php
                            if (isset($_POST['SAVE'])) {
                                $Name = $_POST['Name'];
                                $Username = $name;
                                $Gender = $_POST['Gender'];
                                $Phone = $_POST['Contact'];
                                $Email = $_POST['Email'];
                                $CNIC = $_POST['CNIC'];
                                $Address = $_POST['Address'];
                                $Paddress = $_POST['pAddress'];
                                $Img = $_FILES['Img'];

                                $fileName = $Img['name'];
                                $fileError = $Img['error'];
                                $filetmp = $Img['tmp_name'];
                                $fileExt = explode('.',$fileName);
                                $fileCheck = strtolower(end($fileExt));
                                $fileExtStore = array('png', 'jpg', 'jpeg');

                                if (in_array($fileCheck, $fileExtStore)) 
                                {
                                    $destinationFile = '../Admin/upload/'.$fileName;
                                    move_uploaded_file($filetmp,$destinationFile);
                                }
                                else 
                                {
                                    $_SESSION['status'] = "Only (png, jpg, jpeg) formats are allowed!";
                                    $_SESSION['statusCode'] = "error";
                                }

                                $GName = $_POST['GName'];
                                $GRelation = $_POST['GRelation'];
                                $GCNIC = $_POST['GCNIC'];
                                $GContact = $_POST['GContact'];

                                $ERelation = $_POST['ERelation'];
                                $EContact = $_POST['EContact'];

                                $Category = $_POST['Category'];
                                $RedgNo = $_POST['RedgNo'];
                                $Dept = $_POST['Dept'];
                                $Semester = $_POST['Semester'];
                                $GPA = $_POST['GPA'];
                                $CGPA = $_POST['CGPA'];
                                $Batch = $_POST['Batch'];
                                $Type = $_POST['Type'];
                                

                                $sql1 = "INSERT INTO applications(applicant_name, applicant_Uname, applicant_gender, applicant_contact, applicant_email, applicant_CNIC, applicant_address, applicant_pAddress, applicant_picture, applicant_gardName, applicant_gardRelation, applicant_gardCNIC, applicant_gardContact, applicant_emergencyRelation, applicant_emergencyContact, applicant_category, applicant_redgNo, applicant_department, applicant_semester, applicant_GPA, applicant_CGPA, applicant_batch, application_type) VALUE('{$Name}','{$Username}','{$Gender}','{$Phone}','{$Email}','{$CNIC}','{$Address}','{$Paddress}','{$destinationFile}','{$GName}','{$GRelation}','{$GCNIC}','{$GContact}','{$ERelation}','{$EContact}','{$Category}','{$RedgNo}','{$Dept}','{$Semester}','{$GPA}','{$CGPA}','{$Batch}','{$Type}')";
                                
                                if ($sql1run = mysqli_query($conn, $sql1)) 
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
                    <!-- right part -->
                    <div class="col-6">
                        <div class="my-3 heading">
                            <h2 style="font-family: 'Noto Serif', serif;" class="fw-bold shadow-sm p-3 mb-5 bg-body rounded">Mess Application</h2>
                        </div>
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" class="needs-validation" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="Type" value="mess">
                        <div class="card my-3 mx-2">
                                <h5 class="card-header">Personal Details</h5>
                                <div class="card-body">
                                    <p class="card-text">
                                            <div class="form-group form-check" style="padding-left: 0 !important;">
                                        
                                                <!-- Name -->
                                                <input type="text" class="form-control mt-1 validate" id="full_name" placeholder="Name" name="name" pattern="[a-zA-Z'-'\s]*" required>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please fill out this field!</div>

                                                <!-- contact -->
                                                <input type="text" class="form-control mt-1 validate" id="contact" placeholder="Phone number (xxxx-xxxxxxx)" name="phone" pattern="[0-9]{4}-[0-9]{7}" required autocomplete="off">
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please fill out this field!</div>

                                                <!-- Email -->
                                                <input type="email" class="form-control my-1 validate" name="email" id="user_mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Email" required>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please fill out this field!</div>

                                                <!-- Room name -->
                                                <input class="form-control my-1 validate" name="RoomName" id="roomName" placeholder="Room name" required>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please fill out this field!</div>
                                        
                                            </div>
                                    </p>
                                </div>
                        </div>
                        
                        <div class="my-2 d-flex justify-content-center">
                            <button type="submit" class="btn btn-warning" name="Apply" style="font-family: 'Noto Serif', serif;">SAVE</button>
                        </div>
                        </form>

                        <?php
                            if (isset($_POST['Apply'])) {
                                $Name = $_POST['name'];
                                $Username = $name;
                                $Phone = $_POST['Phone'];
                                $Email = $_POST['email'];
                                $RoomName = $_POST['RoomName'];
                                $findID = "SELECT * FROM room WHERE room_name = '$RoomName'";
                                $findIDrun = mysqli_query($conn, $findID) or die("query Failed");
                                $findIDrow = mysqli_fetch_array($findIDrun);
                                $ID = $findIDrow['room_id'];
                                $Type = $_POST['mess'];

                                $sql1 = "INSERT INTO applications(applicant_name, applicant_Uname, applicant_contact, applicant_email,application_type, room_no) VALUE('{$Name}','{$Username}','{$Phone}','{$Email}','{$Type}','{$ID}')";
                                
                                if ($sql1run = mysqli_query($conn, $sql1)) 
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
                    </div>

                </div>
            </div>
            <!-- Right part Ends -->
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

    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

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