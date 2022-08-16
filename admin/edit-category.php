<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (isset($_SESSION['id']) && isset($_SESSION['name']) && isset($_SESSION['positionid'])) {

    $msg = "";
    $error = "";
    $delmsg = "";

    if (isset($_POST['submit'])) {
        $catid = intval($_GET['cid']);
        $category = $_POST['category'];
        $description = $_POST['description'];
        date_default_timezone_set("Asia/Manila");
        $today = date("Y-m-d H:i:s");
        $query = mysqli_query($con, "Update  tblcategory set CategoryName='$category',Description='$description', UpdationDate='$today' where id='$catid'");
        if ($query) {
            $msg = "Category successfully updated";
        } else {
            $error = "Something went wrong. Please try again.";
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
        <!-- JS -->
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
                                            <a href="#">Category </a>
                                        </li>
                                        <li class="active">
                                            Edit
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>Edit Category </b></h4>
                                    <hr />

                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-6">
                                            <?php if ($msg) { ?>
                                                <div class="alert alert-success text-center" role="alert">
                                                    <strong><?php echo htmlentities($msg); ?></strong>
                                                </div>
                                            <?php } ?>

                                            <?php if ($delmsg) { ?>
                                                <div class="alert alert-danger text-center" role="alert">
                                                    <strong><?php echo htmlentities($delmsg); ?></strong>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <div class="col-sm-3"></div>
                                    </div>

                                    <?php
                                    $catid = intval($_GET['cid']);
                                    $query = mysqli_query($con, "Select id,CategoryName,Description,PostingDate,UpdationDate from  tblcategory where Is_Active=1 and id='$catid'");
                                    $cnt = 1;
                                    while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form class="form-horizontal" name="category" method="post">
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">Category</label>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control" autocomplete="off" value="<?php echo htmlentities($row['CategoryName']); ?>" name="category" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">Category Description</label>
                                                        <div class="col-md-10">
                                                            <textarea class="form-control" rows="5" name="description" required><?php echo htmlentities($row['Description']); ?></textarea>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">&nbsp;</label>
                                                    <div class="col-md-10">

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
                    </div>
                </div>

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
    </body>

    </html>
<?php
} else {
    header("Location: index.php");
    exit();
}
?>