<?php
session_start();
include('includes/config.php');
if (isset($_SESSION['id']) && isset($_SESSION['name']) && isset($_SESSION['positionid'])) {

    $msg = "";
    $error = "";

    if (isset($_POST['submit'])) {
        $posttitle = $_POST['posttitle'];
        $catid = $_POST['category'];

        $postdetails = $_POST['postdescription'];
        $arr = explode(" ", $posttitle);
        $url = implode("-", $arr);
        $imgfile = $_FILES["postimage"]["name"];
        // get the image extension
        $extension = substr($imgfile, strlen($imgfile) - 4, strlen($imgfile));
        // allowed extensions
        $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");
        // Validation for allowed extensions .in_array() function searches an array for a specific value.
        if (!in_array($extension, $allowed_extensions)) {
            $error = "Invalid file format. Only JPG / JPEG / PNG / GIF format allowed";
        } else {
            $imgnewfile = md5($imgfile) . $extension;
            // $imgnewfile = $imgfile . $extension;
            // Code for move image into directory
            move_uploaded_file($_FILES["postimage"]["tmp_name"], "postimages/" . $imgnewfile);

            $status = 1;

            date_default_timezone_set("Asia/Manila");
            $today = date("Y-m-d H:i:s");
            $query = mysqli_query($con, "insert into tblposts(PostTitle,CategoryId,PostDetails,PostUrl,Is_Active,PostImage,PostingDate) values('$posttitle','$catid','$postdetails','$url','$status','$imgnewfile','$today')");
            if ($query) {
                $msg = "Article successfully added";
            } else {
                $error = "Something went wrong. Please try again.";
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

        <title>The Flare - Student Publication</title>
        <link rel="icon" href="../images/flare-logo.png" type="image/icon type">

        <!-- Summernote css -->
        <link href="../plugins/summernote/summernote.css" rel="stylesheet" />
        <!-- Select2 -->
        <link href="../plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="../plugins/jquery.filer/css/jquery.filer.css" rel="stylesheet" />
        <link href="../plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet" />
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
                                    <h4 class="page-title"> </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">Article</a>
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
                            <div class="col-md-10 col-md-offset-1">
                                <div class="p-6">
                                    <div class="">
                                        <form name="addpost" method="post" enctype="multipart/form-data">
                                            <div class="form-group m-b-20">
                                                <label for="">Article Title</label>
                                                <input type="text" class="form-control" id="posttitle" name="posttitle" placeholder="Enter title" autocomplete="off" required>
                                            </div>

                                            <div class="form-group m-b-20">
                                                <label for="">Article Category</label>
                                                <select class="form-control" name="category" id="category" onChange="getSubCat(this.value);" required>
                                                    <option value="">Select Category </option>
                                                    <?php
                                                    $ret = mysqli_query($con, "select id,CategoryName from  tblcategory where Is_Active=1");
                                                    while ($result = mysqli_fetch_array($ret)) {
                                                    ?>
                                                        <option value="<?php echo htmlentities($result['id']); ?>">
                                                            <?php echo htmlentities($result['CategoryName']); ?></option>
                                                    <?php } ?>

                                                </select>
                                            </div>


                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <label for="">Article Content</label>
                                                    <div class="card-box">
                                                        <textarea class="summernote" name="postdescription" required></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <label for="">Feature Image</label>
                                                    <div class="card-box">
                                                        <input type="file" class="form-control" id="postimage" name="postimage" required>
                                                        <b style="font-size: 12px;">Supported Format: JPG / JPEG / PNG / GIF</b>
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="submit" name="submit" class="btn btn-primary waves-effect waves-light">Post</button>
                                        </form>
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

        <script>
            jQuery(document).ready(function() {
                // $('#summernote').summernote('lineHeight', 1);
                $('.summernote').summernote({
                    height: 400, // set editor height
                    minHeight: null, // set minimum height of editor
                    maxHeight: null, // set maximum height of editor
                    focus: false, // set focus to editable area after initializing summernote

                });
                // Select2
                $(".select2").select2();

                $(".select2-limiting").select2({
                    maximumSelectionLength: 2
                });
            });
        </script>
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