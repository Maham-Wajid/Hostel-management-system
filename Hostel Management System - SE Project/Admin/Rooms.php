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

    <!-- for icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <!-- for data tables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">

    <!-- JQuery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- font family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../bootstrap.css">
    <link rel="stylesheet" href="Rooms.css ?v=<?php echo time(); ?>">

    <title>Admin | Rooms Record</title>
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
                        <img src="../img/Logo.png" alt="logo" srcset="" class="img-fluid  my-4 mx-auto d-block"
                            style="width: 50%;">
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
                            <li class="nav-item py-2 px-2">
                                <a href="Attendants.php">
                                    <img src="../icons/Employee.jpg" alt="" srcset="" class="img-fluid"
                                        style="height: 40px; width: 40px; margin-right: 13px;"><span
                                        id="emp">Room Attendants</span>
                                </a>
                            </li>
                            <li class="nav-item py-2 px-2 activeItem">
                                <a href="Rooms.php" class="active">
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
                    <h2 class="py-4 fw-bolder mx-auto text-center" style="font-family: 'Noto Serif', serif;">Rooms Record</h2>
                    <a href="../logout.php" class="my-3 me-2"><img src="../icons/logout.png" class="img-fluid" style="height: 50px; width: 50px;"></img></a>
                </div>
                <div class="row ps-md-5 pe-md-1 ps-3 pe-3">

                    <div class="col-12 my-5">
                        <div class="row height d-flex justify-content-center align-items-center">
                            <div class="col-md-8">
                                <div class="search"> <i class="fa fa-search"></i>
                                    <form class="needs-validation" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                                        <input type="text" class="form-control validate" placeholder="Search User Record."
                                            name="SrchRoomName" required>
                                        <div class="valid-feedback">Valid</div>
                                        <div class="invalid-feedback">Please fill out this field!</div>
                                        <button class="btn fw-bold btn-warning" name="Search" type="submit">Search</button>
                    
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-grid gap-2 d-flex">
                        
                        <button id="btn1" type="button" class="btn btn-warning fw-bold" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Add Room</button>
                        
                        <!-- ADD Data Modal -->
                        <div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title fw-bold" id="exampleModalLabel">Add Room</h3>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <form action="<?php $_SERVER['PHP_SELF']; ?>" class="needs-validation" method="POST">

                                            <!-- Name -->
                                            <div class="mb-3">
                                                <input type="text" name="RoomName" class="form-control validate" id="room-name" placeholder="Room Name" required autocomplete="off">
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please fill out this field!</div>
                                            </div>

                                            <!-- type -->
                                            <div class="mb-3">
                                                <select class="text-muted form-control validate" aria-label="Default select example" required id="room_type" name="RoomType">
                                                    <option hidden>Room Type</option>
                                                    <option value="Normal">Normal Room</option>
                                                    <option value="AC">AC Room</option>
                                                    <option value="Cooler">Cooler Room</option>
                                                </select>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please fill out this field!</div>
                                            </div>

                                            <!-- Beds -->
                                            <div class="mb-3">
                                                <input type="number" name="RoomBeds" class="form-control validate" id="room-beds" placeholder="Room Beds" required autocomplete="off">
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please fill out this field!</div>
                                            </div>

                                            <!-- Total Seats -->
                                            <div class="mb-3">
                                                <input type="number" name="RoomSeats" class="form-control validate" id="room-seats" placeholder="Total Room Seats" required autocomplete="off">
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please fill out this field!</div>
                                            </div>

                                            <!-- Alloted Seats -->
                                            <div class="mb-3">
                                                <input type="number" name="AllotedSeats" class="form-control validate" id="room-allotedSeats" placeholder="Alloted Room Seats" required autocomplete="off">
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please fill out this field!</div>
                                            </div>

                                            <?php
                                                $getAttendantSql = "SELECT * FROM attendant";
                                                $getAttendantSqlRun = mysqli_query($conn, $getAttendantSql);
                                            ?>

                                            <!-- Room attendant -->
                                            <div class="mb-3">
                                                <select class="text-muted form-control validate" aria-label="Default select example" required id="room_attendant" name="RoomAttendant">
                                                    <?php while ($getAttendantSqlRow = mysqli_fetch_array($getAttendantSqlRun)):; ?>
                                                    <option value="<?php echo $getAttendantSqlRow[0]; ?>"><?php echo $getAttendantSqlRow[10]; ?></option>
                                                    <?php endwhile; ?>
                                                </select>
                                            </div>
                                            
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" name="ADD">ADD Room</button>
                                            </div>
                                        </form>

                                        <?php
                                            if (isset($_POST['ADD'])) {

                                                $roomName = $_POST['RoomName'];
                                                $roomType = $_POST['RoomType'];
                                                $roomBeds = $_POST['RoomBeds'];
                                                $roomSeats = $_POST['RoomSeats'];
                                                $roomAllotedSeats = $_POST['AllotedSeats'];
                                                $roomVacancy = ($roomSeats - $roomAllotedSeats);
                                                $roomAttendant = $_POST['RoomAttendant']; 

                                                $AddSql = "INSERT INTO room(room_name, room_type, room_beds, room_space, room_people, room_vacancy, room_attendant) VALUES('{$roomName}','{$roomType}','{$roomBeds}','{$roomSeats}','{$roomAllotedSeats}','{$roomVacancy}', '{$roomAttendant}')";

                                                $AddSqlrun = mysqli_query($conn, $AddSql);
                                                if ($AddSqlrun) {
                                                    $_SESSION['status'] = "Added succesfully!";
                                                    $_SESSION['statusCode'] = "success";
                                                }
                                                else {
                                                    $_SESSION['status'] = "Adding Failed!";
                                                    $_SESSION['statusCode'] = "error";
                                                }
                                            }
                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ADD modal end -->

                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                            <button id="btn2" class="btn btn-warning fw-bold" name="SearchAll" type="submit">All Records</button>
                        </form>

                        <a href="Rooms.php"><button id="btn3" class="btn btn-warning fw-bold">Refresh</button></a>
                    </div>

                    <div class="table-responsive col-lg-12 my-5 mx-auto">
                        <table id="dataTableId" class="table table-striped table-hover my-3 px-5">
                            <thead class="bg-warning">
                                <tr class="text-center">
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Total Beds</th>
                                    <th scope="col">Total Seats</th>
                                    <th scope="col">Alloted Seats</th>
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
                                                $beds = $row['room_beds'];
                                                $seats = $row['room_space'];
                                                $alloted = $row['room_people'];
                                                $vacancy = $row['room_vacancy'];
                                ?>
                    
                                <tr>
                                    <td>
                                        <?php echo $ID ?>
                                    </td>
                                    <td>
                                        <?php echo $name ?>
                                    </td>
                                    <td>
                                        <?php echo $type ?>
                                    </td>
                                    <td>
                                        <?php echo $beds ?>
                                    </td>
                                    <td>
                                        <?php echo $seats ?>
                                    </td>
                                    <td>
                                        <?php echo $alloted ?>
                                    </td>
                                    <td>
                                        <?php echo $vacancy ?>
                                    </td>
                                    <td>
                                        <form action= "<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                                            <a class="btn btn-warning Editbtn" href="#"><i class="fas fa-edit"></i></a>
                                            <input type="hidden" class="delete_id_value" value="<?php echo $ID; ?>">
                                            <a class="delete_btn_ajax btn btn-danger deleteBtn" href="javascript:void(0)"><i class="fa fa-trash"></i></a>
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
                                        $search = $_POST['SrchRoomName'];
                                        $srchQuery = "SELECT * FROM room WHERE room_name = '{$search}'";
                                        $runSrch = mysqli_query($conn, $srchQuery);
                                        if (mysqli_num_rows($runSrch) > 0) 
                                        {
                                        while ($row1 = mysqli_fetch_array($runSrch)) 
                                        {  
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $row1['room_id'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row1['room_name'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row1['room_type'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row1['room_beds'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row1['room_space'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row1['room_people'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row1['room_vacancy'] ?>
                                    </td>
                                    <td>
                                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                                            <a class="btn btn-warning Editbtn" href="#"><i class="fas fa-edit"></i></a>
                                            <a class="delete_btn_ajax btn btn-danger deleteBtn" href="javascript:void(0)"><i class="fa fa-trash"></i></a>
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
                    
                            </tbody>
                        </table>
                    </div>  

                    <!-- #############################################################################################3 -->

                    <!-- Update Data modal -->
                    <div class="modal fade" id="UpdateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="UpdateModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title fw-bold" id="exampleModalLabel">Update Room Details</h3>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <form action="<?php $_SERVER['PHP_SELF']; ?>" class="needs-validation" method="POST">

                                            <input type="hidden" name="R_Edit_ID" id="r_id">

                                            <!-- Name -->
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Room Name: </label>
                                                <input type="text" name="R_Name" class="form-control validate" id="r_name" placeholder="Room Name" required autocomplete="off">
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please fill out this field!</div>
                                            </div>

                                            <!-- type -->
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Room Type: </label>
                                                <select class="text-muted form-control validate" aria-label="Default select example" required id="r_type" name="R_Type">
                                                    <option hidden>Room Type</option>
                                                    <option value="Normal">Normal Room</option>
                                                    <option value="AC">AC Room</option>
                                                    <option value="Cooler">Cooler Room</option>
                                                </select>
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please fill out this field!</div>
                                            </div>

                                            <!-- Beds -->
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Available Beds: </label>
                                                <input type="text" name="R_Beds" class="form-control validate" id="r_beds" placeholder="Room Beds" required autocomplete="off">
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please fill out this field!</div>
                                            </div>

                                            <!-- Total Seats -->
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Total Seats: </label>
                                                <input type="text" name="R_Seats" class="form-control validate" id="r_seats" placeholder="Total Room Seats" required autocomplete="off">
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please fill out this field!</div>
                                            </div>

                                            <!-- Alloted Seats -->
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Alloted Seats: </label>
                                                <input type="text" name="R_allotedSeats" class="form-control validate" id="r_allotedSeats" placeholder="Alloted Room Seats" required autocomplete="off">
                                                <div class="valid-feedback">Valid</div>
                                                <div class="invalid-feedback">Please fill out this field!</div>
                                            </div>
                                            
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" name="EDIT">RESET</button>
                                            </div>
                                        </form>

                                        <?php
                                            if (isset($_POST['EDIT'])) {

                                                $rId = $_POST['R_Edit_ID'];
                                                $rName = $_POST['R_Name'];
                                                $rType = $_POST['R_Type'];
                                                $rBeds = $_POST['R_Beds'];
                                                $rSeats = $_POST['R_Seats'];
                                                $rAllotedSeats = $_POST['R_allotedSeats'];
                                                $rVacancy = ($rSeats - $rAllotedSeats);

                                                $UpdateSql = "UPDATE room SET room_name='$rName', room_type='$rType', room_beds='$rBeds', room_space='$rSeats', room_people='$rAllotedSeats', room_vacancy='$rVacancy' WHERE room_id = '$rId' ";

                                                $UpdateSqlrun = mysqli_query($conn, $UpdateSql);
                                                if ($UpdateSqlrun) {
                                                    $_SESSION['status'] = "Updated succesfully!";
                                                    $_SESSION['statusCode'] = "success";
                                                }
                                                else {
                                                    $_SESSION['status'] = "Updation Failed!";
                                                    $_SESSION['statusCode'] = "error";
                                                }
                                            }
                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- Update modal ends -->
                    <!-- ############################################################################################## -->

                    <!-- Delete Code -->
                    <?php
                        if (isset($_POST['delete_btn_set'])) 
                        {
                            $del_id = $_POST['delete_id'];
                            $delQuery = "DELETE FROM room WHERE room_id='$del_id'";
                            $run = mysqli_query($conn, $delQuery);
                        }
                    ?>

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

        $('.Editbtn').on('click',function(){
            $('#UpdateModal').modal('show');
            $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                $('#r_id').val(data[0]);
                $('#r_name').val(data[1]);
                $('#r_type').val(data[2]);
                $('#r_beds').val(data[3]);
                $('#r_seats').val(data[4]);
                $('#r_allotedSeats').val(data[5]);
        });

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
                    url: "Rooms.php",
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

        } );
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