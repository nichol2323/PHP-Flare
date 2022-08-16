<?php
session_start();
include('includes/config.php');
if (isset($_SESSION['uid']) && isset($_SESSION['uname']) && isset($_SESSION['email'])) {

    $msg = "";
    $error = "";

    if (isset($_POST['submit'])) {

        function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $id = $_SESSION['uid'];
        $password = validate($_POST['password']);
        $newpassword = validate($_POST['newpassword']);
        $confirmpassword = validate($_POST['confirmpassword']);

        $password = md5($password);
        $newpassword = md5($newpassword);

        $sql = mysqli_query($con, "SELECT password FROM tblaccount WHERE id=$id AND password='$password'");
        $num = mysqli_fetch_array($sql);
        if ($num > 0) {
            date_default_timezone_set("Asia/Manila");
            $today = date("Y-m-d H:i:s");
            $con = mysqli_query($con, "UPDATE tblaccount SET password='$newpassword', UpdationDate='$today' WHERE id=$id");
            $msg = "Password changed Successfully";

            session_start();
            session_unset();
            session_destroy();
            header("Location: index.php");
        } else {
            $error = "*Wrong old password. Please try again <br>";
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

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="assets/css/icons.css">

        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <link rel="stylesheet" href="css/input.css">

        <script type="text/javascript">
            function valid() {
                if (document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value) {
                    document.getElementById('error').innerHTML = "*Password and confirm password does not match. Please try again";
                    document.chngpwd.confirmpassword.focus();
                    return false;
                }
                return true;
            }
        </script>
        <style>
            form i#togglePassword,
            #togglePassword1,
            #togglePassword2 {
                float: right;
                margin-top: -25px;
                margin-right: 20%;
                cursor: pointer;
            }
        </style>
    </head>

    <body>

        <?php include('includes/header.php'); ?>

        <div class="container">
            <div class="row" style="margin-top: 4%">
                <div class="col-md-8">
                    <section style="box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);border-radius: 10px;">
                        <div class="signin-form">
                            <h2 style="margin-top:20px;" class="form-title">Change password</h2>
                            <form class="form-horizontal" name="chngpwd" method="post" onSubmit="return valid();">
                                <div class="form-group">
                                    <label for=""><i class="fa fa-unlock"></i></label>
                                    <input type="password" name="password" id="password2" style="width: 85% !important;" placeholder="Current password" autocomplete="off" required />
                                    <i class="fa fa-eye" id="togglePassword2"></i>
                                </div>
                                <div class="form-group">
                                    <label for=""><i class="fa fa-lock"></i></label>
                                    <input type="password" name="newpassword" id="password" style="width: 85% !important;" placeholder="New password" autocomplete="off" title="Password must contain at least 1 number and 1 uppercase and lowercase letter, and at least 8 or more characters" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required />
                                    <i class="fa fa-eye" id="togglePassword"></i>
                                </div>
                                <div class="form-group">
                                    <label for=""><i class="fa fa-lock"></i></label>
                                    <input type="password" name="confirmpassword" id="password1" style="width: 85% !important;" placeholder="Repeat your new password" autocomplete="off" title="Password must contain at least 1 number and 1 uppercase and lowercase letter, and at least 8 or more characters" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required />
                                    <i class="fa fa-eye" id="togglePassword1"></i>
                                </div>
                                <div id="error" style="color: red;"><?php echo $error; ?></div>
                                <div style="color: green;"><?php echo $msg; ?></div>
                                <div class="col-md-9">
                                    <div class="form-group form-button">
                                        <p><i style="color:red;" class="fa fa-exclamation-triangle"></i> Note: Updating your password results automatic logout<span style="color: red">*</span></p>
                                        <br>
                                        <input class="btn btn-primary" style="width: 50%;" type="submit" name="submit" value="Save" />
                                    </div>
                                </div>

                            </form>
                        </div>
                    </section>
                </div>

                <?php include('includes/sidebar.php'); ?>

            </div>
        </div>

        </div>
        </div>
        </div>

        <?php include('includes/footer.php'); ?>

        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

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

            const togglePassword2 = document.querySelector("#togglePassword2");
            const password2 = document.querySelector("#password2");

            togglePassword2.addEventListener("click", function() {

                const type2 = password2.getAttribute("type") === "password" ? "text" : "password";
                password2.setAttribute("type", type2);

                this.classList.toggle("fa-eye");
                this.classList.toggle("fa-eye-slash");
            });
        </script>
    </body>

    </html>
<?php
} else {
    header("Location: index.php");
    exit();
}
?>