<?php
session_start();
include "includes/config.php";

if (!isset($_GET["code"])) {
    exit("<h1><center>Can't find page</center></h1>");
}
$code = $_GET["code"];

$getemailQuery = mysqli_query($conn, "SELECT email FROM tblresetrequest WHERE code='$code'");
if (mysqli_num_rows($getemailQuery) == 0) {
    exit("<h1><center>Can't find page</center></h1>");
}

if (isset($_POST["change"])) {

    $pw = $_POST["password"];
    $pw = md5($pw);

    $row = mysqli_fetch_array($getemailQuery);
    $email = $row["email"];

    $query = mysqli_query($conn, "UPDATE tblaccount SET password ='$pw' WHERE email='$email'");
    if ($query) {
        $query = mysqli_query($conn, "DELETE FROM tblresetrequest WHERE code='$code'");
        echo "<script>alert('Password updated');
        window.location.href='index.php';
        </script>";
    } else {
        exit("<h3><center>Something went wrong. Please try again</center></h3>");
    }
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

        form i#togglePassword {
            float: right;
            margin-top: -25px;
            margin-right: 30px;
            cursor: pointer;
        }
    </style>
    <script src="assets/js/modernizr.min.js"></script>
</head>

<body>
    <div class="main">
        <section class="sign-in" style="margin-top: 20px;">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image" style="background-color: #fff; border-radius: 20px;">
                        <h5 style="text-align: center; font-weight: 600 !important;">The Flare - Student Publication</h5>
                        <figure><img src="images/flare.jpg" alt="flare image" style="background-color: #fff; border-radius: 50%;"></figure>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Reset password</h2>
                        <form method="post" class="" id="">
                            <div class="form-group">
                                <label for=""><i class="fa fa-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="New password" autocomplete="off" title="Password must contain at least 1 number and 1 uppercase and lowercase letter, and at least 8 or more characters" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required />
                                <i class="fa fa-eye" id="togglePassword"></i>
                            </div>
                            <div class=" form-group form-button">
                                <input class="btn btn-primary btn-lg" type="submit" name="change" value="Change password" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function() {

            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);

            this.classList.toggle("fa-eye");
            this.classList.toggle("fa-eye-slash");
        });
    </script>
</body>

</html>