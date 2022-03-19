<?php
    if (isset($_POST['Submit'])) {
        session_start();
        include 'config.php';
        $name = $_POST['Name'];
        $mail = $_POST['Email'];
        $message = $_POST['Message'];
        $sql = "INSERT INTO comments(c_name,c_email,c_message) VALUES('{$name}','{$mail}','{$message}')";
        $sqlrun = mysqli_query($conn, $sql);
        if ($sqlrun) {
            $_SESSION['status'] = "Submitted succesfully!";
            $_SESSION['statusCode'] = "success";
        }
        else 
        {
            $_SESSION['status'] = "Submittion Failed!";
            $_SESSION['statusCode'] = "error";
        }
    }
?>
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
    <link rel="stylesheet" href="contactStyle.css ?v=<?php echo time(); ?>">
    <title>Contact Us | Student HMS</title>

    <style>
        .bg-image{
            background: url('img/1.jpg');
            height: 100vh;
            width: 100%;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }
    </style>

</head>

<body>
    <!-- navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
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
                    <li class="nav-item activeHome mx-1">
                        <a class="nav-link active" href="contact.html">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Registration.php">Join Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">LogIn</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="container-fluid bg-image">
        <div class="row">
            <div class="col-12">
                <div class="box1 mt-4">
                    <div class="row">
                        <h1 class="py-2 fw-bold">Contact Us</h1>
                        <p class="">You can contact us by sending your message <br> and can also give us feeback about our hostel system.</p>
                    </div>
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" class="Form py-4 text-white needs-validation" method="POST">
                        <table>
                            <tr>
                                <td><label for="" class="fName">Name: </label></td>
                                <td><input type="text" name="Name" id="name" placeholder="Enter your name." class="w-100" required autocomplete="off">
                                <div class="valid-feedback">Valid</div>
                                <div class="invalid-feedback">Please fill out this field!</div></td>
                            </tr>
                            
                            <tr>
                                <td><label for="" class="mail mt-3">Email: </label></td>
                                <td><input type="email" name="Email" id="email" placeholder="Enter your Email." class="mt-3 w-100" required autocomplete="off">
                                <div class="valid-feedback">Valid</div>
                                <div class="invalid-feedback">Please fill out this field!</div></td>
                            </tr>
                            
                            <tr>
                                <td><label for="" class="msg mt-3">Message: </label></td>
                                <td><textarea name="Message" id="Msg" cols="30" rows="10" placeholder="Type your message here." class="mt-3 w-100" required autocomplete="off"></textarea>
                                <div class="valid-feedback">Valid</div>
                                <div class="invalid-feedback">Please fill out this field!</div></td>
                            </tr>

                        </table>
                        <div class="row my-3">
                            <div class="col-12">
                                <button type="submit" name="Submit" class="" id="btn1">Submit</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </section>

    <!-- marquee tag -->
    <div class="container-fluid m-0">
        <div class="row">
            <marquee width="100%" direction="left" height="40px">
                <p class="py-2 fw-bold" style="text-shadow: none;">Providing the best place for students to live with ease
                    and comfort in safe and secure environment.</p>
            </marquee>
        </div>
    </div>

    <!-- footer section  -->
    <footer class="container-fluid">
        <div class="row"
            style="background: url('img/footer.png'); height: 50vh; background-repeat: no-repeat; background-size: 100%;">

            <!-- location columns  -->
            <!-- <div class="col-4 location">
                <h2 class="fw-bold text-responsive"><span><img src="icons/location.png" alt="" srcset=""
                            style="height: 30px; width: 30px;" class="me-3"></span>Location</h2>
                <p class="text-responsive text-start">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Excepturi, cupiditate?</p>
            </div> -->

            <!-- contacts  -->
            <div class="col-12">
                <div class="row mt-5 Icons">
                    <div class="col-3"></div>
                    <div class="col-2">
                        <img src="icons/facebook.png" alt="" srcset="" style="height: 50px; width: 90px;"
                            class="mx-auto" data-bs-toggle="tooltip" data-bs-placement="bottom"
                            title="Contact Us on Facebook!">
                    </div>
                    <div class="col-2">
                        <img src="icons/twitter.png" alt="" srcset="" style="height: 60px; width: 60px;" class="mx-auto"
                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Contact Us on Twitter!">
                    </div>
                    <div class="col-2">
                        <img src="icons/gmail.png" alt="" srcset="" style="height: 60px; width: 60px;" class="mx-auto"
                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Contact Us on Gmail!">
                    </div>
                    <div class="col-3"></div>
                </div>
            </div>
        </div>
        <!-- Copyright -->
        <div class="row">
            <div class="text-center pt-3 Footer">
                <p class="text-white">© 2021 Copyright:
                    <a class="text-white" href="#">Student Hostel</a>
                    - All Rights Reserved.
                </p>
            </div>
        </div>
        <!-- Copyright -->
    </footer>


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