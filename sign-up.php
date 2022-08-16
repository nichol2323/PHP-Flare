<?php
session_start();
include "includes/config.php";

$errorusername = "";
$erroremail = "";
$error = "";

if (isset($_POST['login'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $username = validate($_POST['username']);
    $password = validate($_POST['password']);
    $confirmpassword = validate($_POST['confirmpassword']);

    if ($password !== $confirmpassword) {
    } else {
        // Hashing password
        $password = md5($password);

        // Checking username if already exist in database
        $sql = "SELECT * FROM tblaccount WHERE username='$username' ";
        $result = mysqli_query($conn, $sql);

        // Checking email if already exist in database
        $sqlEmail = "SELECT * FROM tblaccount WHERE email='$email' ";
        $resultEmail = mysqli_query($conn, $sqlEmail);

        if (mysqli_num_rows($result) > 0) {
            $errorusername = "*Username is already taken. Please try again";
        } else if (mysqli_num_rows($resultEmail) > 0) {
            $erroremail = "*Email is already taken. Please try again";
        } else {
            date_default_timezone_set("Asia/Manila");
            $today = date("Y-m-d H:i:s");
            $sql2 = "INSERT INTO tblaccount (username, password, name, email, Is_Active, violation_lvl, CreationDate) VALUES('$username', '$password', '$name', '$email', 1, 0, '$today')";
            $result2 = mysqli_query($conn, $sql2);
            if ($result2) {
                echo "<script>alert('Your account has been created successfully');
                window.location.href='index.php';
                </script>";
            } else {
                $error = "*Something went wrong. Please try again";
            }
        }
    }
} else {
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>The Flare - Student Publication</title>
    <link rel="icon" href="images/flare-logo.png" type="image/icon type">

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/style.css">

    <style>
        html,
        .main {
            min-height: 100%;
            background: linear-gradient(160deg, rgba(237, 112, 62), rgba(235, 183, 70));
            background-size: cover;
        }

        @media only screen and (max-width: 768px) {
            .signin-form {
                order: 2;
            }
        }

        @media only screen and (max-width: 768px) {
            .link1 {
                display: none;
            }

            .link2 {
                display: block !important;
            }
        }

        form i#togglePassword,
        #togglePassword1 {
            float: right;
            margin-top: -25px;
            margin-right: 30px;
            cursor: pointer;
        }
    </style>

    <script src="assets/js/modernizr.min.js"></script>
    <script type="text/javascript">
        function valid() {
            if (document.chngpwd.password.value != document.chngpwd.confirmpassword.value) {
                document.getElementById('error').innerHTML =
                    "*Password and confirm password does not match. Please try again";
                document.chngpwd.confirmpassword.focus();
                return false;
            }
            return true;
        }
    </script>
</head>

<body>
    <div class="main">
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">

                    <div class="signin-image" style="background-color: #fff; border-radius: 20px;">
                        <h4 style="text-align: center; font-weight: 600 !important;">The Flare - Student Publication
                        </h4>
                        <center><img style="width: 80px;" src="images/flare-logo.png" alt=""></center>
                        <div style="font-size: 14px; margin-top: 30px;">
                            <i class="fa fa-info-circle"></i> Creating Account Guide :
                            <ul>
                                <li>Provide the requested information to register<span style="color: red">*</span></li>
                                <li>Please don't use inappropriate names<span style="color: red">*</span></li>
                                <li>Make sure to enter working email address<span style="color: red">*</span></li>
                                <li>Password must contain at least 1 number and 1 uppercase and lowercase letter, and at
                                    least 8 or more characters<span style="color: red">*</span></li>
                                <li>Accept the terms and conditions to register<span style="color: red">*</span></li>
                            </ul>
                        </div>
                        <br>
                        <a href="index.php" class="signup-image-link link1"><u> I already have account</u></a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign Up</h2>
                        <form class="" name="chngpwd" method="post" onSubmit="return valid();">
                            <div class="form-group">
                                <label for="name"><i class="fa fa-book"></i></label>
                                <input type="text" required="" name="name" placeholder="Name" autocomplete="off" />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="fa fa-envelope"></i></label>
                                <input type="email" required="" name="email" placeholder="Email" autocomplete="off">
                            </div>
                            <div style="color: red;"><?php echo $erroremail; ?></div>
                            <div class="form-group">
                                <label for="username"><i class="fa fa-user"></i></label>
                                <input type="text" required="" name="username" placeholder="Username" autocomplete="off">
                            </div>
                            <div style="color: red;"><?php echo $errorusername; ?></div>
                            <div class="form-group">
                                <label for="pass"><i class="fa fa-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password" autocomplete="off" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Password must contain at least 1 number and 1 uppercase and lowercase letter, and at least 8 or more characters.')" required>
                                <i class="fa fa-eye" id="togglePassword"></i>
                            </div>

                            <div class="form-group">
                                <label for="re-pass"><i class="fa fa-lock"></i></label>
                                <input type="password" name="confirmpassword" id="password1" placeholder="Repeat your password" autocomplete="off" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                <i class="fa fa-eye" id="togglePassword1"></i>
                            </div>
                            <div id="error" style="color: red;"><?php echo $error; ?></div>
                            <div class="form-group">
                                <input style="float: left; margin-top: 5px;" type="checkbox" required>
                                I agree all statements in <a data-toggle="modal" data-placement="top" title="Click to read" data-target="#exampleModal" href="#">Terms and conditions</a>
                            </div>
                            <div class="form-group form-button">
                                <input class="btn btn-primary btn-lg" type="submit" value="Create Account" name="login"></input>
                            </div>
                            <a style="display:none;" href="index.php" class="signup-image-link link2"><u> I already have account</u></a>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?php
    $pagetype = 'termsandconditions';
    $query = mysqli_query($con, "select PageTitle,Description from tblpages where PageName='$pagetype'");
    while ($row = mysqli_fetch_array($query)) {
    ?>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <?php echo htmlentities($row['PageTitle']) ?>
                        </h3>

                    </div>
                    <div class="modal-body">
                        <p><?php echo $row['Description']; ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function() {

            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);

            this.classList.toggle("fa-eye");
            this.classList.toggle("fa-eye-slash");
        });

        const togglePassword1 = document.querySelector("#togglePassword1");
        const password1 = document.querySelector("#password1");

        togglePassword1.addEventListener("click", function() {

            const type1 = password1.getAttribute("type") === "password" ? "text" : "password";
            password1.setAttribute("type", type1);

            this.classList.toggle("fa-eye");
            this.classList.toggle("fa-eye-slash");
        });
    </script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/detect.js"></script>
    <script src="assets/js/fastclick.js"></script>
    <script src="assets/js/jquery.blockUI.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
</body>

</html>