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

    <link rel="stylesheet" href="BillsStyle.css ?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../bootstrap.css">

    <title>User | Bills</title>
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
                        <img src="../img/Logo.png" alt="logo" srcset=""  class="img-fluid  my-4 mx-auto d-block" style="width: 75%;">
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
                                <a href="">
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
                    <h2 class="py-4 fw-bolder mx-auto text-center" style="font-family: 'Noto Serif', serif;">Billing System</h2>
                    <a href="../logout.php" class="my-3 me-2"><img src="../icons/logout.png" class="img-fluid" style="height: 50px; width: 50px;"></img></a>
                    
                </div>
                <div class="row mx-3">

                <!-- Left -->
                    <div class="col-md-5 col-12 px-4">
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" class="needs-validation" method="POST" style="font-family: 'Noto Serif', serif;" enctype="multipart/form-data">
                            <div class="row py-5 me-5">

                                <div class="form-group py-3">
                                    <label for="Name" class="form-label fw-bold">Name: </label>
                                    <input class="form-control validate" type="text" name="Name" value="" placeholder="Full Name" required>
                                    <div class="valid-feedback">Valid</div>
                                    <div class="invalid-feedback">Please fill out this field!</div>
                                </div>

                                <div class="form-group py-3">
                                    <label for="Attendance" class="form-label fw-bold">Bill Type: </label>
                                    <select class="form-control validate" aria-label="Default select example" required id="type" name="Type">
                                        <option hidden>--Select one--</option>
                                        <option value="present">Allotment</option>
                                        <option value="absent">Mess</option>
                                    </select>
                                    <div class="valid-feedback">Valid</div>
                                    <div class="invalid-feedback">Please fill out this field!</div>
                                </div>

                                <div class="form-group py-3">
                                    <label for="Payment" class="form-label fw-bold">Paid Amount: </label>
                                    <input class="form-control validate" type="number" name="Payment" value="" placeholder="Bill Payment" required>
                                    <div class="valid-feedback">Valid</div>
                                    <div class="invalid-feedback">Please fill out this field!</div>
                                </div>

                                <div class="form-group py-3">
                                    <label class="form-label fw-bold" for="Img">Upload Paid Transcript</label>
                                    <input type="file" class="form-control validate" name="Img" id="img" required>
                                    <div class="valid-feedback">Valid</div>
                                    <div class="invalid-feedback">Please fill out this field!</div>
                                </div>

                                <div class="col-12 py-3">
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-warning" name="Save"><b>Save</b></button>
                                    </div>
                                </div>

                            </div>
                        </form>

                        <?php
                            if (isset($_POST['Save'])) 
                            {
                                $Name = $_POST['Name'];
                                $Userid = $id;
                                $type = $_POST['Type'];
                                $amount = $_POST['Payment'];
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

                                $sql1 = "INSERT INTO bills(std_name, bill_type, bill_payment, bill_img,res_id) VALUE('{$Name}','{$type}','{$amount}','{$destinationFile}','{$Userid}')";
                                
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
                    <!-- Left -->

                    <!-- Right -->

                    <div class="col-md-7 col-12 my-5">
                        <div class="table-responsive my-3 py-5">
                            <table id="dataTableId" class="table table-striped table-hover my-3 px-5">
                                <thead class="bg-warning">
                                    <tr class="text-center">
                                        <th scope="col">Name</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Payment</th>
                                        <th scope="col">Transcript</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                        $sql = "SELECT * FROM bills WHERE res_id = '$id'";
                                        $sqlRun = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($sqlRun) > 0) 
                                        {
                                            foreach ($sqlRun as $sqlRow) 
                                            {
                                            
                                        
                                    ?>

                                    <tr class="text-center">
                                        <td>
                                            <?php echo $sqlRow['std_name']; ?>
                                        </td>
                                        <td>
                                            <?php  echo $sqlRow['bill_type']; ?>
                                        </td>
                                        <td>
                                            <?php  echo $sqlRow['bill_payment']; ?>
                                        </td>
                                        <td>
                                            <img src="<?php  echo "".$sqlRow['bill_img']; ?>" width="100px" alt="image">
                                        </td>
                                        <td>
                                            <?php  echo $sqlRow['bill_status']; ?>
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
                    <!-- Right -->
                        
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