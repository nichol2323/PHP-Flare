<?php
session_start();
include('includes/config.php');
if (isset($_SESSION['id']) && isset($_SESSION['name']) && isset($_SESSION['positionid'])) {

    $msg = "";
    $error = "";
    if (isset($_POST['update'])) {
        $imgfile = $_FILES["postimage"]["name"];
        // get the image extension
        $extension = substr($imgfile, strlen($imgfile) - 4, strlen($imgfile));
        // allowed extensions
        $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");
        // Validation for allowed extensions .in_array() function searches an array for a specific value.
        if (!in_array($extension, $allowed_extensions)) {
            $error = "Invalid format. Only JPG / JPEG / PNG / GIF format allowed";
        } else {
            //rename the image file
            $imgnewfile = md5($imgfile) . $extension;
            // Code for move image into directory
            move_uploaded_file($_FILES["postimage"]["tmp_name"], "postimages/" . $imgnewfile);

            $postid = intval($_GET['pid']);
            date_default_timezone_set("Asia/Manila");
            $today = date("Y-m-d H:i:s");
            $query = mysqli_query($con, "update tblposts set PostImage='$imgnewfile', UpdationDate='$today' where id='$postid'");
            if ($query) {
                $msg = "Article Feature Image updated ";
            } else {
                $error = "Something went wrong . Please try again.";
            }
        }
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
        <!-- App favicon -->

        <!-- App title -->
        <title>The Flare - Student Publication</title>
        <link rel="icon" href="../images/flare-logo.png" type="image/icon type">

        <!-- Summernote css -->
        <link href="../plugins/summernote/summernote.css" rel="stylesheet" />

        <!-- Select2 -->
        <link href="../plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

        <!-- Jquery filer css -->
        <link href="../plugins/jquery.filer/css/jquery.filer.css" rel="stylesheet" />
        <link href="../plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet" />

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

    </head>

    <body class="fixed-left">

        <!--   -->
        <div id="wrapper">
            <?php include('includes/topheader.php'); ?>
            <?php include('includes/leftsidebar.php'); ?>
            <div class="content-page">
                <!--   -->
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Update Image </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#"> Article </a>
                                        </li>
                                        <li>
                                            <a href="#"> Edit </a>
                                        </li>
                                        <li class="active">
                                            Update Image
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!--   -->

                        <div class="row">
                            <div class="col-sm-6">
                                <!--- --->
                                <?php if ($msg) { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong></strong> <?php echo htmlentities($msg); ?>
                                    </div>
                                <?php } ?>

                                <!--- --->
                                <?php if ($error) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong></strong> <?php echo htmlentities($error); ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <form name="addpost" method="post" enctype="multipart/form-data">
                            <?php
                            $postid = intval($_GET['pid']);
                            $query = mysqli_query($con, "select PostImage,PostTitle from tblposts where id='$postid' and Is_Active=1 ");
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="p-6">
                                            <div class="">
                                                <form name="addpost" method="post">
                                                    <div class="form-group m-b-20">
                                                        <label for="">Article Title</label>
                                                        <input type="text" class="form-control" id="posttitle" value="<?php echo htmlentities($row['PostTitle']); ?>" name="posttitle" readonly>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <label for="">Current Feature Image</label>
                                                            <div class="card-box">
                                                                <img src="postimages/<?php echo htmlentities($row['PostImage']); ?>" width="300" />

                                                            </div>
                                                        </div>
                                                    </div>

                                                <?php } ?>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <label for="">New Feature Image</label>
                                                        <div class="card-box">
                                                            <input type="file" class="form-control" id="postimage" name="postimage" required>
                                                            <b style="font-size: 12px;">Supported Format: JPG / JPEG / PNG / GIF</b>
                                                        </div>
                                                    </div>
                                                </div>

                                                <button type="submit" name="update" class="btn btn-primary waves-effect waves-light">Update </button>
                                                </form>
                                            </div>
                                        </div> <!-- end p-20 -->
                                    </div> <!-- end col -->
                                </div>
                                <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->

                <?php include('includes/footer.php'); ?>

            </div>
        </div>
        <!--  -->

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

        <!--Summernote js-->
        <script src="../plugins/summernote/summernote.min.js"></script>
        <!-- Select 2 -->
        <script src="../plugins/select2/js/select2.min.js"></script>
        <!-- Jquery filer js -->
        <script src="../plugins/jquery.filer/js/jquery.filer.min.js"></script>

        <!-- page specific js -->
        <script src="assets/pages/jquery.blog-add.init.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <script src="../plugins/switchery/switchery.min.js"></script>

        <!--Summernote js-->
        <script src="../plugins/summernote/summernote.min.js"></script>

    </body>

    </html>
<?php
} else {
    header("Location: index.php");
    exit();
}
?>