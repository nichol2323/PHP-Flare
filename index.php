<?php
session_start();
include "includes/config.php";

$error = "";
$username = "";
if (isset($_POST['username']) && isset($_POST['password'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = validate($_POST['username']);
    $password = validate($_POST['password']);

    $password = md5($password);

$sql = "SELECT * FROM tblaccount WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    $sql1 = "SELECT * FROM tblofficer WHERE username='$username' AND password='$password'";
    $result1 = mysqli_query($conn, $sql1);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['uid'] = $row['id'];
        $_SESSION['uname'] = $row['name'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['violation_datetime'] = $row['violation_datetime'];
        echo "<script>
        window.location.href='home.php';
        </script>";
    }
    else if (mysqli_num_rows($result1) === 1) {
        $row = mysqli_fetch_assoc($result1);
        if ($row['Is_Active'] == 1) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['positionid'] = $row['positionid'];
            $_SESSION['db'] = $row['db'];
            $_SESSION['ar'] = $row['ar'];
            $_SESSION['co'] = $row['co'];
            $_SESSION['ca'] = $row['ca'];
            $_SESSION['of'] = $row['of'];
            $_SESSION['us'] = $row['us'];
            $_SESSION['pa'] = $row['pa'];
            echo "<script>
        window.location.href='admin/dashboard.php';
        </script>";
        } else {
            $error = "*Your account is not active";
        }
    } 
    else {
        $error = "*Incorrect details. Please try again";
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
    </style>
    <script src="assets/js/modernizr.min.js"></script>
    <style>
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

        form i#togglePassword {
            float: right;
            margin-top: -25px;
            margin-right: 30px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="main">
        <section class="sign-in" style="margin-top: 20px;">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image" style="background-color: #fff; border-radius: 20px;">
                        <h4 style="text-align: center; font-weight: 600 !important;">The Flare - Student Publication
                            </h5>
                            <figure><img src="images/flare.jpg" alt="flare image" style="background-color: #fff; border-radius: 50%;" width="250"></figure>
                            <a href="sign-up.php" class="signup-image-link link1"><u> Create an account</u></a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign in</h2>
                        <form method="post">
                            <div class="form-group">
                                <label for=""><i class="fa fa-user"></i></label>
                                <input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>" autocomplete="off" required />
                            </div>
                            <div class="form-group">
                                <label for=""><i class="fa fa-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password" autocomplete="off" required />
                                <i class="fa fa-eye" id="togglePassword"></i>
                            </div>

                            <div style="color: red;"><?php echo $error; ?></div>
                            <div class="form-group">
                                <label for="" class="label-agree-term"><i class="fa fa-key"></i></span></span><a href="forget-password.php"> Forget Password ?</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input class="btn btn-primary btn-lg" type="submit" name="login" value="Login" onclick="loginFunction()" />
                            </div>
                            <a style="display: none;" href="sign-up.php" class="signup-image-link link2"><u> Create an account</u></a>
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