<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (isset($_SESSION['id']) && isset($_SESSION['name']) && isset($_SESSION['positionid'])) {
    date_default_timezone_set("Asia/Manila");
    $currentyear = date("Y");
    $msg = "";
    $error = "";
    $delmsg = "";


    if ($_GET['action'] == 'del' && $_GET['rid']) {
        $id = intval($_GET['rid']);
        $commentquery = mysqli_query($con, "UPDATE tblcomments SET status=0 WHERE postid='$id'");
        $query = mysqli_query($con, "update tblposts set Is_Active='0' where id='$id'");
        $msg = "Article successfully moved to archive";
    }

    if (isset($_POST['submit'])) {
        $start = $_POST['syear'];
        $end = $_POST['eyear'];
        if ($start == '' || $end == '') {
            $delmsg = "Something went wrong. Please try again";
        } else {
            // $end = date('Y-m-d', strtotime($end . ' +1 day'));
            $archivequery = mysqli_query($con, "UPDATE tblposts SET Is_Active= 0 WHERE PostingDate >= '$start' AND PostingDate <= '$end 23:59:59' AND Is_Active = 1;");
            if (!$archivequery) {
                $delmsg = "error";
            } else {
                $msg = "Article from $start to $end successfully moved to archive";
                // $end1 = $_POST['eyear'];
                // $msg = "Article successfully moved to archive date from $start to $end1 ";
            }
        }
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>The Flare - Student Publication</title>
        <link rel="icon" href="../images/flare-logo.png" type="image/icon type">

        <!-- CSS -->
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

        <!-- DATA TABLES CSS -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/keytable/2.6.4/css/keyTable.dataTables.min.css">
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
                                            <a href="#">Article </a>
                                        </li>
                                        <li class="active">
                                            Manage
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

                                <?php if ($delmsg) { ?>
                                    <div class="alert alert-danger text-center" role="alert">
                                        <strong><?php echo htmlentities($delmsg); ?></strong>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="col-sm-3"></div>
                        </div>
                        <div class="row">
                            <form action="" method="post">
                                <div class="col-md-5">
                                    <label for="" class="label" style="color: black !important;">Start</label>
                                    <input class="form-control" type="date" name="syear" required>
                                </div>
                                <div class="col-md-5">
                                    <label for="" class="label" style="color: black !important;">End</label>
                                    <input class="form-control" type="date" name="eyear" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="" class="label">&nbsp;</label>
                                    <button class="form-control btn btn-danger" onclick="return confirm('Warning: Are you sure?')" type="submit" name="submit" style="color:#fff !important;"><i class="fa fa-archive" style="color: #fff"></i> Archive all</button>
                                </div>
                            </form>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box">
                                    <div class="table-responsive">
                                        <!-- table-striped table-bordered -->
                                        <table class="table table-hover display" id="example" style="width:100%">
                                            <thead class="thead">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Title</th>
                                                    <th>Category</th>
                                                    <th>Like(s)</th>
                                                    <th>View(s)</th>
                                                    <th>Comment(s)</th>
                                                    <th>Creation Date</th>
                                                    <th>Last updation Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query = mysqli_query($con, "SELECT tblposts.id as postid, tblposts.PostTitle as title, tblposts.PostingDate as PostingDate, tblposts.UpdationDate as UpdationDate,tblcategory.CategoryName as category, tblcategory.id as cid, (SELECT COUNT(id) FROM tbllikes WHERE tbllikes.postid = tblposts.id) as likes, (SELECT COUNT(id) FROM tblcomments WHERE tblcomments.postid = tblposts.id) as comments, (SELECT COUNT(id) FROM tblviews WHERE tblviews.postid = tblposts.id) as views FROM tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId WHERE tblposts.Is_Active=1 ORDER BY PostingDate DESC;");

                                                $cnt = 1;
                                                while ($row = mysqli_fetch_array($query)) {

                                                ?>

                                                    <tr>
                                                        <th scope="row"><?php echo htmlentities($cnt++); ?></th>
                                                        <td><?php echo htmlentities($row['title']); ?></td>
                                                        <td><?php echo htmlentities($row['category']); ?></td>
                                                        <td><?php echo htmlentities($row['likes']); ?></td>
                                                        <td><?php echo htmlentities($row['views']); ?></td>
                                                        <td><?php echo htmlentities($row['comments']); ?></td>

                                                        <td><?php
                                                            $arr = explode(' ', trim($row['PostingDate']));
                                                            echo htmlentities($arr[0]); ?>
                                                        </td>
                                                        <td><?php
                                                            $arr1 = explode(' ', trim($row['UpdationDate']));
                                                            echo htmlentities($arr1[0]); ?>
                                                        </td>

                                                        <td>
                                                            <a data-toggle="tooltip" data-placement="top" title="Edit this article" href="edit-post.php?pid=<?php echo htmlentities($row['postid']); ?>"><i class="fa fa-pencil" style="color: #29b6f6;"></i></a>&nbsp;
                                                            <a data-toggle="tooltip" data-placement="top" title="Move to archive" href="manage-post.php?rid=<?php echo htmlentities($row['postid']); ?>&&action=del"><i class="fa fa-archive" style="color: #f05050"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php
                                                } ?>
                                            </tbody>

                                        </table>
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

        <!-- DATA TABLES JS -->
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#example').DataTable();
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