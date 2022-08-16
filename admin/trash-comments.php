<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (isset($_SESSION['id']) && isset($_SESSION['name']) && isset($_SESSION['positionid'])) {

    $msg = "";
    $error = "";
    $delmsg = "";

    // Code for approval
    if ($_GET['appid']) {
        $id = intval($_GET['appid']);
        $query = mysqli_query($con, "update tblcomments set status='1' where id='$id'");
        $msg = "Comment successfully restore";
    }

    // Code for deletion
    if ($_GET['action'] == 'del' && $_GET['rid']) {
        $id = intval($_GET['rid']);
        $query = mysqli_query($con, "delete from  tblcomments  where id='$id'");
        $delmsg = "Comment successfully deleted";
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title></title>
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
                                    <h4 class="page-title"></h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">Comments </a>
                                        </li>
                                        <li class="active">
                                            Archive
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
                            <div class="col-md-12">
                                <div class="card-box">
                                    <div class="table-responsive">
                                        <table class="table table-hover display" id="example" style="width:100%">
                                            <thead class="thead">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Comment</th>
                                                    <th>Article</th>
                                                    <th>Creation Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query = mysqli_query($con, "Select tblcomments.id,  tblcomments.name,tblcomments.email,tblcomments.postingDate,tblcomments.comment,tblposts.id as postid,tblposts.PostTitle from  tblcomments join tblposts on tblposts.id=tblcomments.postId where tblcomments.status=0");
                                                $cnt = 1;
                                                while ($row = mysqli_fetch_array($query)) {
                                                ?>
                                                    <tr>
                                                        <th scope="row"><?php echo htmlentities($cnt++); ?></th>
                                                        <td><?php echo htmlentities($row['name']); ?></td>
                                                        <td><?php echo htmlentities($row['email']); ?></td>
                                                        <td><?php echo htmlentities($row['comment']); ?></td>
                                                        <!-- <td><a href="edit-post.php?pid=<?php //echo htmlentities($row['postid']); 
                                                                                            ?>"><?php //echo htmlentities($row['PostTitle']); 
                                                                                                ?></a></td> -->
                                                        <td><b><?php echo htmlentities($row['PostTitle']); ?></b></td>
                                                        <td><?php echo htmlentities($row['postingDate']); ?></td>
                                                        <td>
                                                            <?php if ($st == '0') : ?>

                                                            <?php else : ?>
                                                                <a data-toggle="tooltip" data-placement="top" href="trash-comments.php?appid=<?php echo htmlentities($row['id']); ?>" title="Restore this comment"><i class="ion-arrow-return-left"></i></a>
                                                            <?php endif; ?>
                                                            &nbsp;
                                                            <a data-toggle="tooltip" data-placement="top" title="Permanent delete this comment" href="trash-comments.php?rid=<?php echo htmlentities($row['id']); ?>&&action=del">
                                                                <i class="fa fa-trash" style="color: #f05050;"></i></a>
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

                        <div class="row">
                            <div class="col-md-12">
                                <div class="demo-box m-t-20">
                                    <div class="m-b-30">
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