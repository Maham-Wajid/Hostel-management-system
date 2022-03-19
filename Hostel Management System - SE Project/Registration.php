<!-- Database Connection -->
<?php
    if(isset($_POST['Save']))
    {
        // import connection file
        session_start();
        include "config.php";
        
        // saving input data into variables
        $name = $_POST['Name'];
        $mail = $_POST['Email'];
        $category = $_POST['Category'];
        $username = $_POST['Username'];
        if ($_POST['Password'] === $_POST['ConfirmPassword']) 
        {
            $pwd = $_POST['ConfirmPassword'];
            $sql = "SELECT user_name FROM user WHERE user_name = '{$username}'";
            $res = mysqli_query($conn, $sql) or die("query faild");
            
            if(mysqli_num_rows($res) > 0)
            {
                $_SESSION['status'] = "Username already exist!";
                $_SESSION['statusCode'] = "error";
            }
            else {
                $sql1 = "INSERT INTO user(user_fname, user_email, user_category, user_name, user_password) VALUES ('{$name}','{$mail}','{$category}','{$username}','{$pwd}')";
                if(mysqli_query($conn, $sql1))
                {
                    $_SESSION['status'] = "Registered succesfully!";
                    $_SESSION['statusCode'] = "success";
                }
                else {
                    $_SESSION['status'] = "Registration Failed!";
                    $_SESSION['statusCode'] = "error";
                }
            }
        }
        else {
            $_SESSION['status'] = "Password does not match!";
            $_SESSION['statusCode'] = "error";
        }
    }
?>

<!-- page structure -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="RegStyle.css">
    <title>Join Us | Student HMS</title>

</head>

<body>
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
                    <li class="nav-item ">
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
                    <li class="nav-item activeHome mx-1">
                        <a class="nav-link active" href="Registration.php">Join Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">LogIn</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="mainSec">
        <div class="row pt-5 g-0">
            <div class="col-12 pt-3">
                <div class="box1 mx-auto mt-5">
                    <div class="row">
                        <div class="col-md-7 col-12 d-none d-lg-block">
                            <div class="row leftside">
                                <img src="img/templete1.png" alt="templete" srcset="" class="img-fluid">
                                <div class="box2 col-12">
                                    <h2 class="text1 text-responsive display-4 fw-bold text-center">WELCOME</h2>
                                    <p class="text2 text-responsive h5 text-center">Join Us to make a reservation.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-12 text-center">
                            <h2 class="fw-bold pt-3">Registration</h2>
                            <hr class="mx-auto w-75">

                            <form action="<?php $_SERVER['PHP_SELF']; ?>" class="needs-validation" method="POST">
                                <div class="form-group form-check my-4" style="padding-left: 0 !important;">
                            
                                    <!-- Name -->
                                    <input type="text" class="w-75 my-1 validate" id="full_name" placeholder="Full name" name="Name" pattern="[a-zA-Z'-'\s]*" required autocomplete="off">
                                    <div class="valid-feedback">Valid</div>
                                    <div class="invalid-feedback">Please fill out this field!</div>

                                    <!-- Email -->
                                    <input type="email" class="w-75 my-1 validate" name="Email" id="user_mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Email" required autocomplete="off">
                                    <div class="valid-feedback">Valid</div>
                                    <div class="invalid-feedback">Please fill out this field!</div>

                                    <!-- category -->
                                    <select class="w-75 my-1 text-muted validate" aria-label="Default select example" required id="user_category" name="Category">
                                        <option hidden>Student</option>
                                        <option value="University Student">University Student</option>
                                        <option value="Non-University Student">Non-University Student</option>
                                    </select>
                                    <div class="valid-feedback">Valid</div>
                                    <div class="invalid-feedback">Please fill out this field!</div>

                                    <!-- User Name -->
                                    <input type="text" class="w-75 my-1 validate" id="full_name" placeholder="User name" name="Username" required autocomplete="off">
                                    <div class="valid-feedback">Valid</div>
                                    <div class="invalid-feedback">Please fill out this field!</div>

                                    <!-- Password -->
                                    <input type="password" class="w-75 my-1 validate" name="Password" id="pwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" placeholder="Password" required>
                                    <div class="valid-feedback">Valid</div>
                                    <div class="invalid-feedback">Please fill out this field!</div>

                                    <!-- Confirm Password -->
                                    <input type="password" class="w-75 my-1 validate" name="ConfirmPassword" id="user_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" placeholder="Confirm Password" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required>
                                    <div class="valid-feedback">Valid</div>
                                    <div class="invalid-feedback">Please fill out this field!</div>
                            
                                </div>
                                
                                <button type="submit" name="Save" class="btn fw-bold w-75 my-2">Register</button>

                                <p style="font-size: 14px; padding-left: 5px;" class="py-1">Aready have an account? <a href="login.php" target="_self" rel="noopener noreferrer">Sign In</a> here.</p>

                            </form>
                        </div>
                    </div>
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