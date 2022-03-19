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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="ProfileStyle.css ?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../bootstrap.css">

    <title>User | Profile</title>
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
                            <li class="nav-item py-2 px-2 activeItem">
                                <a href="Profile.php" class="active">
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
                                    <img src="../icons/Bills.png" alt="" srcset="" class="img-fluid" style="height: 40px; width: 40px; margin-right: 13px;"><span id="bill">Bills</span>
                                </a>
                            </li>
                            <li class="nav-item py-2 px-2">
                                <a href="">
                                    <img src="../icons/feedback.png" alt="" srcset="" class="img-fluid" style="height: 40px; width: 40px; margin-right: 13px;"><span id="feed">Feedback</span>
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
                    <h2 class="py-4 fw-bolder mx-auto text-center" style="font-family: 'Noto Serif', serif;">User Profile</h2>
                    <a href="../logout.php" class="my-3 me-2"><img src="../icons/logout.png" class="img-fluid" style="height: 50px; width: 50px;"></img></a>
                </div>
                <div class="row ps-md-5">
                    <!-- Left Image Part starts -->
                    <div class="col-md-4 col-12">
                        <div class="my-5 ms-5">
                            <div class="card" style="width: 18rem;">
                                <div class="card-header bg-warning">
                                    <h5><?php echo $name ?></h5>
                                </div>
                                <div class="card-body">
                                    <?php 
                                        $query1 = "SELECT * FROM applications WHERE applicant_Uname = '$name'";
                                        $query1run = mysqli_query($conn, $query1);
                                        if (mysqli_num_rows($query1run) > 0) 
                                        {
                                            $query1row = mysqli_fetch_array($query1run);
                                        }
                                    ?>
                                    
                                    <div style="text-align:center"><img src="<?php echo "uploads/" .$query1row['applicant_picture']; ?>" alt="Image" width="100px"></div>
                                </div>
                                <div class="card-footer text-center">
                                    <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa fa-cog" aria-hidden="true"></i>&nbsp; Account Settings</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Left Image Part end -->

                    <!-- Right Part starts -->
                    <div class="col-md-8 col-12">
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" style="font-family: 'Noto Serif', serif;">
                            <div class="row my-5 ms-3 me-5">
                                <div class="col-12">
                                    <label for="Name" class="form-label fw-bold">Name: </label>
                                    <input class="form-control" type="text" name="Name" value="<?php echo $query1row['applicant_name']; ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label for="Gender" class="form-label fw-bold">Gender: </label>
                                    <input class="form-control" type="text" name="Gender" value="<?php echo $query1row['applicant_gender']; ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label for="Contact" class="form-label fw-bold">Contact: </label>
                                    <input class="form-control" type="text" name="Contact" value="<?php echo $query1row['applicant_contact']; ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label for="CNIC" class="form-label fw-bold">CNIC: </label>
                                    <input class="form-control" type="text" name="CNIC" value="<?php echo $query1row['applicant_CNIC']; ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label for="Email" class="form-label fw-bold">Email: </label>
                                    <input class="form-control" type="email" name="Email" value="<?php echo $query1row['applicant_email']; ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label for="Address" class="form-label fw-bold">Address: </label>
                                    <input class="form-control" type="text" name="Address" value="<?php echo $query1row['applicant_address']; ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label for="Address" class="form-label fw-bold">Permanent Address: </label>
                                    <input class="form-control" type="text" name="Address" value="<?php echo $query1row['applicant_pAddress']; ?>" readonly>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Right Part ends -->
                </div>
            </div>
            <!-- Right part Ends -->

            <!-- Settings Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title" id="staticBackdropLabel">Account Settings</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-12">
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" class="needs-validation" method="POST">
                            <div class="row my-5 ms-3 me-5">
                                <div class="col-12">
                                    <label for="UName" class="form-label fw-bold">Name: </label>
                                    <input class="form-control" type="text" name="UName" value="<?php echo $query1row['attendant_Uname']; ?>" readonly>
                                    <div class="valid-feedback">Valid</div>
                                    <div class="invalid-feedback">Please fill out this field!</div>
                                </div>
                                <div class="col-12">
                                    <label for="Email" class="form-label fw-bold">Email: </label>
                                    <input class="form-control" type="email" name="Email" value="<?php echo $query1row['attendant_email']; ?>">
                                    <div class="valid-feedback">Valid</div>
                                    <div class="invalid-feedback">Please fill out this field!</div>
                                </div>
                                <div class="col-12">
                                    <label for="Password" class="form-label fw-bold">Password: </label>
                                    <input type="password" class="form-control validate" name="Password" id="pwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" placeholder="Password" value="<?php echo $query1row['attendant_password']; ?>">
                                    <div class="valid-feedback">Valid</div>
                                    <div class="invalid-feedback">Please fill out this field!</div>
                                </div>
                                <div class="col-12">
                                    <label for="ConfirmPassword" class="form-label fw-bold">Confirm Password: </label>
                                    <input type="password" class="form-control validate" name="ConfirmPassword" id="user_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" placeholder="Confirm Password" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" value="<?php echo $query1row['attendant_password']; ?>">
                                    <div class="valid-feedback">Valid</div>
                                    <div class="invalid-feedback">Please fill out this field!</div>
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">CLOSE</button>
                                <button type="submit" class="btn btn-warning" name="RESET">RESET</button>
                            </div>
                        </form>

                        <?php
                            if (isset($_POST['RESET'])) {
                                $email = $_POST['Email'];
                                if ($_POST['Password'] === $_POST['ConfirmPassword']) 
                                {
                                    $pwd = $_POST['ConfirmPassword'];
                                    $sql1 = "UPDATE attendant SET attendant_email = '{$email}', attendant_password = '{$pwd}' WHERE attendant_id = '$id'";
                                    
                                    if(mysqli_query($conn, $sql1))
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
                                else {
                                    $_SESSION['status'] = "Password does not match!";
                                    $_SESSION['statusCode'] = "error";
                                }
                            }
                        ?>

                    </div>
                </div>
            
                </div>
            </div>
            </div>


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

</body>

</html>