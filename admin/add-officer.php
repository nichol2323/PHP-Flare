<?php
session_start();
include('includes/config.php');
if (isset($_SESSION['id']) && isset($_SESSION['name']) && isset($_SESSION['positionid'])) {

    $msg = "";
    $error = "";
    if (isset($_POST['submit'])) {
        $name = $_POST['officername'];
        $username = $_POST['officerusername'];
        $password = $_POST['officerpassword'];
        $confirmpassword = $_POST['officerconfirmpassword'];
        $position = $_POST['officerposition'];
        $db;
        $ar;
        $co;
        $ca;
        $of = $_POST['of1'];
        $us;
        $pa;
        $status = 1;
        if ($password !== $confirmpassword) {
            $error = "Password does not match. Please try again.";
        } else {
            if (!empty($_POST['db'])) {
                $db = 1;
            }
            if (empty($_POST['db'])) {
                $db = 0;
            }
            if (!empty($_POST['ar'])) {
                $ar = 1;
            }
            if (empty($_POST['ar'])) {
                $ar = 0;
            }
            if (!empty($_POST['co'])) {
                $co = 1;
            }
            if (empty($_POST['co'])) {
                $co = 0;
            }
            if (!empty($_POST['ca'])) {
                $ca = 1;
            }
            if (empty($_POST['ca'])) {
                $ca = 0;
            }
            // if (!empty($_POST['of'])) {
            //     $of = 1;
            // }
            // if (empty($_POST['of'])) {
            //     $of = 0;
            // }
            if (!empty($_POST['us'])) {
                $us = 1;
            }
            if (empty($_POST['us'])) {
                $us = 0;
            }
            if (!empty($_POST['pa'])) {
                $pa = 1;
            }
            if (empty($_POST['pa'])) {
                $pa = 0;
            }
            // HASHING PASSWORD
            $password = md5($password);
            date_default_timezone_set("Asia/Manila");
            $today = date("Y-m-d H:i:s");
            $query = mysqli_query($con, "INSERT INTO tblofficer(positionid, username, password, name, db, ar, co, ca, of, us, pa, Is_Active, CreationDate) VALUES($position,'$username','$password', '$name', $db, $ar, $co, $ca, $of, $us, $pa, 1, '$today')");
            if ($query) {
                $query = mysqli_query($con, "UPDATE tblposition SET Is_Active = 1 WHERE id = $position");
                $msg = "Successfully Created ";
            } else {
                $error = "Something went wrong. Please try again.";
            }
        }
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>The Flare - Student Publication</title>
        <link rel="icon" href="../images/flare-logo.png" type="image/icon type">

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
        <script src="assets/js/modernizr.min.js"></script>

        <style>
            form i#togglePassword,
            #togglePassword1 {
                float: right;
                margin-top: -25px;
                margin-right: 30px;
                cursor: pointer;
            }
        </style>
    </head>

    <body class="fixed-left">
        <div id="wrapper">

            <?php include('includes/topheader.php'); ?>
            <?php include('includes/leftsidebar.php'); ?>

            <div class="content-page">
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
                                        <li>
                                            <a href="#">Official</a>
                                        </li>
                                        <li class="active">
                                            Add
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>Add Official</b></h4>
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
                                        <div class="col-md-12">
                                            <form class="form-horizontal" name="category" method="post">
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Official Name</label>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" value="" name="officername" autocomplete="off" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Username</label>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" value="" name="officerusername" autocomplete="off" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Password</label>
                                                    <div class="col-md-10">
                                                        <input type="password" class="form-control" id="password" value="" name="officerpassword" autocomplete="off" minlength="8" required>
                                                        <i class="fa fa-eye" id="togglePassword"></i>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Confirm Password</label>
                                                    <div class="col-md-10">
                                                        <input type="password" class="form-control" id="password1" value="" name="officerconfirmpassword" autocomplete="off" minlength="8" required>
                                                        <i class="fa fa-eye" id="togglePassword1"></i>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Position</label>
                                                    <div class="col-md-10">
                                                        <select class="form-control" name="officerposition" id="category" onChange="getSubCat(this.value);" required>
                                                            <option value="">Select Available Position </option>
                                                            <?php
                                                            $ret = mysqli_query($con, "select id, name from  tblposition where Is_Active=0");
                                                            while ($result = mysqli_fetch_array($ret)) {
                                                            ?>
                                                                <option value="<?php echo htmlentities($result['id']); ?>"><?php echo htmlentities($result['name']); ?></option>
                                                            <?php } ?>

                                                        </select>
                                                    </div>
                                                </div>
                                                <style>
                                                    .cb {
                                                        margin-top: 8px;
                                                        font-size: 1.5rem;
                                                        padding-left: 10px;
                                                    }
                                                </style>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Privilege</label>
                                                    <div class="cb col-md-10">
                                                        <input data-toggle="tooltip" data-placement="top" title="Allow to see dashboard content" type="checkbox" name="db" class="dashboard">&nbsp;Dashboard &nbsp;|
                                                        <input data-toggle="tooltip" data-placement="top" title="Allow to write/update/delete article content" type="checkbox" name="ar" class="article">&nbsp;Article &nbsp;|
                                                        <input data-toggle="tooltip" data-placement="top" title="Allow to see and delete comments" type="checkbox" name="co" class="comments">&nbsp;Comments &nbsp;|
                                                        <input data-toggle="tooltip" data-placement="top" title="Allow to add/update/delete category content" type="checkbox" name="ca" class="category">&nbsp;Category &nbsp;|
                                                        <input data-toggle="tooltip" data-placement="top" title="Allow to edit privilege of the officials" type="checkbox" name="of" class="official" disabled>&nbsp;Official &nbsp;|
                                                        <input type="text" name="of1" class="official" value="" style="display: none;">
                                                        <input data-toggle="tooltip" data-placement="top" title="Allow to block users" type="checkbox" name="us" class="user">&nbsp;User &nbsp;|
                                                        <input data-toggle="tooltip" data-placement="top" title="Allow to edit the content of the page" type="checkbox" name="pa" class="page">&nbsp;Page &nbsp;

                                                    </div>
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">&nbsp;</label>
                                                    <div class="col-md-10">

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
                        <!-- end row -->
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

        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
        <script type="text/javascript">
            $('select').on('change', function() {
                // ADMIN and ADVISER
                if (this.value == 1) {
                    $('.dashboard').prop('checked', true);
                    $('.article').prop('checked', false);
                    $('.article').attr("disabled", true);
                    $('.comments').prop('checked', true);
                    $('.category').prop('checked', false);
                    $('.official').prop('checked', true);
                    $('.official').val(1);
                    $('.user').prop('checked', true);
                    $('.page').prop('checked', false);
                } else if (this.value == 2) {
                    $('.dashboard').prop('checked', true);
                    $('.article').prop('checked', true);
                    $('.article').attr("disabled", false);
                    $('.comments').prop('checked', true);
                    $('.category').prop('checked', true);
                    $('.official').prop('checked', true);
                    $('.official').val(1);
                    $('.user').prop('checked', true);
                    $('.page').prop('checked', true);
                }
                //EDITOR-IN-CHIEF and ASSOCIATE EDITOR-IN-CHIEF FOR INTERNAL/EXTERNAL AFFAIRS and MANAGING EDITOR
                else if (this.value == 3 || this.value == 4 || this.value == 5 || this.value == 6) {
                    $('.dashboard').prop('checked', true);
                    $('.article').prop('checked', true);
                    $('.article').attr("disabled", false);
                    $('.comments').prop('checked', true);
                    $('.category').prop('checked', true);
                    $('.official').prop('checked', false);
                    $('.official').val(0);
                    $('.user').prop('checked', true);
                    $('.page').prop('checked', true);

                }
                //COPY EDITOR
                else if (this.value == 7) {
                    $('.dashboard').prop('checked', true);
                    $('.article').prop('checked', true);
                    $('.article').attr("disabled", false);
                    $('.comments').prop('checked', true);
                    $('.category').prop('checked', false);
                    $('.official').prop('checked', false);
                    $('.official').val(0);
                    $('.user').prop('checked', true);
                    $('.page').prop('checked', false);

                }
                //PRODUCTION EDITOR
                else if (this.value == 8) {
                    $('.dashboard').prop('checked', true);
                    $('.article').prop('checked', false);
                    $('.article').attr("disabled", false);
                    $('.comments').prop('checked', true);
                    $('.category').prop('checked', false);
                    $('.official').prop('checked', false);
                    $('.official').val(0);
                    $('.user').prop('checked', true);
                    $('.page').prop('checked', false);

                }
                //BUSINESS AND CIRCULATION MANAGER
                else if (this.value == 9) {
                    $('.dashboard').prop('checked', true);
                    $('.article').prop('checked', false);
                    $('.article').attr("disabled", false);
                    $('.comments').prop('checked', true);
                    $('.category').prop('checked', false);
                    $('.official').prop('checked', false);
                    $('.official').val(0);
                    $('.user').prop('checked', true);
                    $('.page').prop('checked', false);

                }
                //NEWS EDITOR and SPORTS EDITOR
                else if (this.value == 10 || this.value == 11) {
                    $('.dashboard').prop('checked', true);
                    $('.article').prop('checked', true);
                    $('.article').attr("disabled", false);
                    $('.comments').prop('checked', true);
                    $('.category').prop('checked', true);
                    $('.official').prop('checked', false);
                    $('.official').val(0);
                    $('.user').prop('checked', true);
                    $('.page').prop('checked', false);

                }
                //FEATURE EDITOR and LITERARY EDITOR
                else if (this.value == 12 || this.value == 13) {
                    $('.dashboard').prop('checked', true);
                    $('.article').prop('checked', true);
                    $('.article').attr("disabled", false);
                    $('.comments').prop('checked', true);
                    $('.category').prop('checked', true);
                    $('.official').prop('checked', false);
                    $('.official').val(0);
                    $('.user').prop('checked', true);
                    $('.page').prop('checked', true);

                }
                //CARTOONS AND COMICS EDITOR
                else if (this.value == 15) {
                    $('.dashboard').prop('checked', true);
                    $('.article').prop('checked', true);
                    $('.article').attr("disabled", false);
                    $('.comments').prop('checked', true);
                    $('.category').prop('checked', true);
                    $('.official').prop('checked', false);
                    $('.official').val(0);
                    $('.user').prop('checked', true);
                    $('.page').prop('checked', true);

                }
                //PHOTO EDITOR and LAYOUT AND GRAPHIC EDITOR
                else if (this.value == 14 || this.value == 16) {
                    $('.dashboard').prop('checked', true);
                    $('.article').prop('checked', false);
                    $('.article').attr("disabled", false);
                    $('.comments').prop('checked', true);
                    $('.category').prop('checked', false);
                    $('.official').prop('checked', false);
                    $('.official').val(0);
                    $('.user').prop('checked', true);
                    $('.page').prop('checked', false);

                } else {
                    $('.dashboard').prop('checked', false);
                    $('.article').prop('checked', false);
                    $('.article').attr("disabled", false);
                    $('.comments').prop('checked', false);
                    $('.category').prop('checked', false);
                    $('.official').prop('checked', false);
                    $('.official').val(0);
                    $('.user').prop('checked', false);
                    $('.page').prop('checked', false);
                }
            });
        </script>

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
    </body>

    </html>
<?php
} else {
    header("Location: index.php");
    exit();
}
?>