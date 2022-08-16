<?php
session_start();
include('includes/config.php');
if (isset($_SESSION['id']) && isset($_SESSION['name']) && isset($_SESSION['positionid'])) {

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

        $id = $_SESSION['id'];
        $password = validate($_POST['password']);
        $newpassword = validate($_POST['newpassword']);
        $confirmpassword = validate($_POST['confirmpassword']);

        // hashing the password
        $password = md5($password);
        $newpassword = md5($newpassword);

        $sql = mysqli_query($con, "SELECT password FROM tblofficer WHERE id=$id AND password='$password'");
        $num = mysqli_fetch_array($sql);
        if ($num > 0) {
            $con = mysqli_query($con, "UPDATE tblofficer SET password='$newpassword' WHERE id=$id");
            $msg = "Password Changed Successfully !";
        } else {
            $error = "Wrong old password. Please try again.";
        }
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>The Flare - Student Publication</title>
        <link rel="icon" href="../images/flare-logo.png" type="image/icon type">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
        <script src="assets/js/modernizr.min.js"></script>
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

    <body class="fixed-left">

        <!--   -->
        <div id="wrapper">
            <?php include('includes/topheader.php'); ?>
            <?php include('includes/leftsidebar.php'); ?>
            <div class="content-page">
                <!-- -->
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title"></h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>

                                        <li class="active">
                                            Change Password
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!--   -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>Change Password </b></h4>
                                    <hr />
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-6">
                                            <?php if ($msg) { ?>
                                                <div class="alert alert-success text-center" role="alert">
                                                    <strong><?php echo htmlentities($msg); ?></strong>
                                                </div>
                                            <?php } ?>

                                            <?php if ($error) { ?>
                                                <div class="alert alert-danger text-center" role="alert">
                                                    <strong><?php echo htmlentities($error); ?></strong>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <div class="col-sm-3"></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-10">
                                            <form class="form-horizontal" name="chngpwd" method="post" onSubmit="return valid();">

                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Current Password</label>
                                                    <div class="col-md-8">
                                                        <input type="password" id="password2" class="form-control" style="width: 85% !important;" value="" name="password" required>
                                                        <i class="fa fa-eye" id="togglePassword2"></i>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">New Password</label>
                                                    <div class="col-md-8">
                                                        <input type="password" id="password" class="form-control" style="width: 85% !important;" value="" name="newpassword" title="Password must contain at least 1 number and 1 uppercase and lowercase letter, and at least 8 or more characters" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                                        <i class="fa fa-eye" id="togglePassword"></i>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Confirm Password</label>
                                                    <div class="col-md-8">
                                                        <input type="password" id="password1" class="form-control" style="width: 85% !important;" value="" name="confirmpassword" title="Password must contain at least 1 number and 1 uppercase and lowercase letter, and at least 8 or more characters" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                                        <i class="fa fa-eye" id="togglePassword1"></i>
                                                    </div>
                                                </div>
                                                <center>
                                                    <div id="error" style="color: red;"><?php echo $error; ?></div>
                                                </center>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">&nbsp;</label>
                                                    <div class="col-md-8">

                                                        <button type="submit" class="btn btn-primary waves-effect waves-light btn-md" name="submit">
                                                            Submit
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- container -->

                </div> <!-- content -->
                <?php include('includes/footer.php'); ?>
            </div>
        </div>

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="../plugins/switchery/switchery.min.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

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