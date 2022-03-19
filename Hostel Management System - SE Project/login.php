<?php
    ob_start();
    session_start();
    include "config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="LogInStyle.css">
    <title>Log In | Student HMS</title>

    <style>
        .bg-image {
            background-image: url('img/14.jpg');
            width: 100%;
            background-position: center;
            background-attachment: fixed;
            background-size: cover;

        }
    </style>

</head>

<body class="bg-image">
    <!-- navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Student Hostel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="gallery.html">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Registration.php">Join Us</a>
                    </li>
                    <li class="nav-item activeHome mx-1">
                        <a class="nav-link active" href="login.php">LogIn</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="container-fluid">
        <div class="row">
            <div class="col-12 pt-5">
                <div class="Box mx-auto">

                    <!-- Heading Starts -->
                    <p class="display-5 text-center fw-bold"
                        style="font-family: 'Merriweather', serif; text-shadow: 2px 1px white;">Sign In</p>
                    <hr class="mx-auto w-75 shadow-sm">
                    <!-- Heading Ends -->

                    <!-- Sig In Form Starts -->
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" class="needs-validation">
                        <div class="form-group form-check">

                            <!-- Username -->
                            <span id="User" class="fa fa-user fa-2x"></span>
                            <input type="text" placeholder="Username" class="py-2 text-start" name="Username" required autocomplete="off">
                            <div class="valid-feedback">Valid</div>
                            <div class="invalid-feedback">Please fill out this field!</div><br>

                            <!-- Password -->
                            <span id="Lock" class="fa fa-lock fa-2x"></span>
                            <input type="password" placeholder="Password" class="py-2 text-start mt-4" name="Password" required autocomplete="off"><div class="valid-feedback">Valid</div>
                            <div class="invalid-feedback">Please fill out this field!</div>

                            <!-- Category -->
                            <select class="py-2 mt-4 validate" aria-label="Default select example" required id="user_category" name="Role">
                                <option hidden>Role</option>
                                <option value="admin">Admin</option>
                                <option value="attendant">Attendant</option>
                                <option value="user">User</option>
                            </select>
                            <div class="valid-feedback">Valid</div>
                            <div class="invalid-feedback">Please fill out this field!</div>

                            <!-- Forget password -->
                            <p class="text-start fw-bold" id="text1">Forget Password? <a href="RstPwd.html"
                                    target="_blank" rel="noopener noreferrer">Click here.</a></p>

                            <!-- Button  -->
                            <a href="#" target="_self" rel="noopener noreferrer">
                                <div class="d-grid col-9 mx-3">
                                    <button class="btn" type="submit" id="btn1" name="login">LOGIN</button>
                                </div>
                            </a>

                            <!-- other login options -->
                            <p class="fw-bold" style="font-size: 18px;">Or Don't have any account?<a href="Registration.php"
                                    target="_blank" rel="noopener noreferrer" id="OptLink"> SignUp Now</a></p>
                        </div>
                    </form>
                    <!-- Sig In Form Ends -->
                    <br><br>
                    <!-- php link -->
                    <?php
                        if (isset($_POST['login'])) {
                            $username = $_POST['Username'];
                            $password = $_POST['Password'];
                        
                            if ($_POST['Role'] == 'admin') 
                            {
                                $sql1 = "SELECT admin_Uname,admin_password FROM admin WHERE admin_Uname = '{$username}'AND admin_password = '{$password}' ";
                                $res = mysqli_query($conn, $sql1) or die("query failed!");
                                $row = mysqli_fetch_array($res);

                                
                                if ($row['admin_Uname'] == $username && $row['admin_password'] == $password) 
                                {
                                    $_SESSION['name'] = $username;
                                    header('Location: http://localhost/Hospital Management System - SE Project/Admin/Dashboard.php');
                                    ob_end_flush();
                                }
                                else{
                                    $_SESSION['status'] = "Wrong Username or Password!";
                                    $_SESSION['statusCode'] = "error";
                                }
                            }
                            elseif ($_POST['Role'] == 'user') 
                            {
                                $sql2 = "SELECT user_name,user_password FROM user WHERE user_name = '{$username}' AND user_password = '{$password}'";
                                $res2 = mysqli_query($conn, $sql2) or die("query failed!");
                                $row2 = mysqli_fetch_array($res2);

                                if ($row2['user_name'] == $username && $row2['user_password'] == $password) 
                                {
                                    $_SESSION['name'] = $username;
                                    header('Location: http://localhost/Hospital Management System - SE Project/Users/Dashboard.php');
                                    ob_end_flush();
                                }
                                else{
                                    $_SESSION['status'] = "Wrong Username or Password!";
                                    $_SESSION['statusCode'] = "error";
                                }
                            }
                            elseif ($_POST['Role'] == 'attendant') 
                            {
                                $sql3 = "SELECT attendant_Uname,attendant_password FROM attendant WHERE attendant_Uname = '{$username}' AND attendant_password = '{$password}'";
                                $res3 = mysqli_query($conn, $sql3) or die("query failed!");
                                $row3 = mysqli_fetch_array($res3);

                                if ($row3['attendant_Uname'] == $username && $row3['attendant_password'] == $password) 
                                {
                                    $_SESSION['name'] = $username;
                                    header('Location: http://localhost/Hospital Management System - SE Project/Attendant/Dashboard.php');
                                    ob_end_flush();
                                }
                                else{
                                    $_SESSION['status'] = "Wrong Username or Password!";
                                    $_SESSION['statusCode'] = "error";
                                }
                            }
                        }
                    ?>

                </div>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <script type="text/javascript">
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
    <script src="Js/sweetAlert.js"></script>
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