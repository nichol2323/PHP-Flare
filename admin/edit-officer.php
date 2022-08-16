<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (isset($_SESSION['id']) && isset($_SESSION['name']) && isset($_SESSION['positionid'])) {

    $msg = "";
    $error = "";
    $delmsg = "";
    $catid = intval($_GET['cid']);
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
            $query = mysqli_query($con, "UPDATE tblofficer SET db=$db, ar=$ar, co=$co, ca=$ca, of=$of, us=$us, pa=$pa, UpdationDate='$today' WHERE id = $catid");
            if ($query) {
                // $query = mysqli_query($con, "UPDATE tblposition SET Is_Active = 1 WHERE id = $position");
                $msg = "Successfully Updated ";
                if ($_SESSION['id'] == $catid) {
                    session_start();
                    session_unset();
                    session_destroy();
                    header("Location: index.php");
                } else {
                    header("Location: manage-officer.php");
                }
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
                                            Edit
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $catid = intval($_GET['cid']);
                        $query = mysqli_query($con, "SELECT tblofficer.username as username, tblofficer.name as name, tblofficer.password as password, tblofficer.positionid as pid,tblposition.name as pname, tblofficer.db as db, tblofficer.ar as ar, tblofficer.co as co, tblofficer.ca as ca, tblofficer.of as of, tblofficer.us as us, tblofficer.pa as pa FROM tblofficer LEFT JOIN tblposition on tblofficer.positionid = tblposition.id where tblofficer.Is_Active=1 AND tblofficer.id =  $catid");
                        $cnt = 1;
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box">
                                        <h4 class="m-t-0 header-title"><b>Edit Official</b></h4>
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
                                                            <input type="text" class="form-control" value="<?php echo htmlentities($row['name']); ?>" name="officername" autocomplete="off" disabled required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">Username</label>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control" value="<?php echo htmlentities($row['username']); ?>" name="officerusername" autocomplete="off" disabled required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">Password</label>
                                                        <div class="col-md-10">
                                                            <input type="password" class="form-control" value="<?php echo htmlentities($row['password']); ?>" name="officerpassword" autocomplete="off" minlength="8" disabled required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">Confirm Password</label>
                                                        <div class="col-md-10">
                                                            <input type="password" class="form-control" value="<?php echo htmlentities($row['password']); ?>" name="officerconfirmpassword" autocomplete="off" minlength="8" disabled required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">Position</label>
                                                        <div class="col-md-10">
                                                            <select class="form-control" name="officerposition" id="category" onChange="getSubCat(this.value);" disabled required>
                                                                <option value="<?php echo $row['pid']; ?>"><?php echo $row['pname']; ?></option>
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
                                                            <input data-toggle="tooltip" data-placement="top" title="Allow to see dashboard content" <?php if ($row['db'] == 1) {
                                                                                                                                                            echo "checked";
                                                                                                                                                        } ?> type="checkbox" name="db" class="dashboard">&nbsp;Dashboard &nbsp;|
                                                            <input data-toggle="tooltip" data-placement="top" title="Allow to write/update/delete article content" <?php if ($row['ar'] == 1) {
                                                                                                                                                                        echo "checked";
                                                                                                                                                                    } ?> <?php if ($row['pid'] == 1) {
                                                                                                                                                                                echo "disabled";
                                                                                                                                                                            } ?> type="checkbox" name="ar" class="article">&nbsp;Article &nbsp;|
                                                            <input data-toggle="tooltip" data-placement="top" title="Allow to see and delete comments" <?php if ($row['co'] == 1) {
                                                                                                                                                            echo "checked";
                                                                                                                                                        } ?> type="checkbox" name="co" class="comments">&nbsp;Comments &nbsp;|
                                                            <input data-toggle="tooltip" data-placement="top" title="Allow to add/update/delete category content" <?php if ($row['ca'] == 1) {
                                                                                                                                                                        echo "checked";
                                                                                                                                                                    } ?> type="checkbox" name="ca" class="category">&nbsp;Category &nbsp;|
                                                            <input data-toggle="tooltip" data-placement="top" title="Allow to edit privilege of the officials" disabled <?php if ($row['of'] == 1) {
                                                                                                                                                                            echo "checked";
                                                                                                                                                                        } ?> type="checkbox" name="of" class="official">&nbsp;Official &nbsp;|
                                                            <input type="text" name="of1" class="official" value="<?php if ($row['of'] == 1) {
                                                                                                                        echo "1";
                                                                                                                    } else {
                                                                                                                        echo "0";
                                                                                                                    } ?>" style="display: none;">
                                                            <input data-toggle="tooltip" data-placement="top" title="Allow to block users" <?php if ($row['us'] == 1) {
                                                                                                                                                echo "checked";
                                                                                                                                            } ?> type="checkbox" name="us" class="user">&nbsp;User &nbsp;|
                                                            <input data-toggle="tooltip" data-placement="top" title="Allow to edit the content of the page" <?php if ($row['pa'] == 1) {
                                                                                                                                                                echo "checked";
                                                                                                                                                            } ?> type="checkbox" name="pa" class="page">&nbsp;Page &nbsp;

                                                        </div>
                                                    </div>
                                                    <br>
                                                <?php } ?>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">&nbsp;</label>
                                                    <div class="col-md-10">
                                                        <p><i style="color:red;" class="fa fa-exclamation-triangle"></i> Note: Updating own privilege results automatic logout<span style="color: red">*</span></p>
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light btn-md" name="submit">
                                                            Update
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

        </script>
    </body>

    </html>
<?php
} else {
    header("Location: index.php");
    exit();
}
?>