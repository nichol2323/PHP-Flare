<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (isset($_SESSION['id']) && isset($_SESSION['name']) && isset($_SESSION['positionid'])) {

    $msg = "";
    $error = "";
    $delmsg = "";

    // Code for restore
    if ($_GET['resid']) {
        $id = intval($_GET['resid']);
        $query = mysqli_query($con, "update tblcategory set Is_Active='1' where id='$id'");
        $msg = "Category successfully restored";
    }

    // Code for deletion
    if ($_GET['action'] == 'parmdel' && $_GET['rid']) {
        $id = intval($_GET['rid']);

        $query = mysqli_query($con, "delete from  tblcategory  where id='$id'");
        $delmsg = "Category successfully deleted";
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
                                    <h4 class="page-title"></h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">Category </a>
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
                                                    <th> Category</th>
                                                    <th>Description</th>
                                                    <th>Creation Date</th>
                                                    <th>Last updation Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query = mysqli_query($con, "Select id,CategoryName,Description,PostingDate,UpdationDate from  tblcategory where Is_Active=0");
                                                $cnt = 1;
                                                $rowcount = mysqli_num_rows($query);
                                                if ($rowcount == 0) {
                                                ?>
                                                    <?php
                                                } else {
                                                    while ($row = mysqli_fetch_array($query)) {
                                                    ?>

                                                        <tr>
                                                            <th scope="row"><?php echo htmlentities($cnt++); ?></th>
                                                            <td><?php echo htmlentities($row['CategoryName']); ?></td>
                                                            <td><?php echo htmlentities($row['Description']); ?></td>
                                                            <td><?php
                                                                $arr = explode(' ', trim($row['PostingDate']));
                                                                echo htmlentities($arr[0]); ?>
                                                            </td>
                                                            <td><?php
                                                                $arr1 = explode(' ', trim($row['UpdationDate']));
                                                                echo htmlentities($arr1[0]); ?>
                                                            </td>
                                                            <td><a data-toggle="tooltip" data-placement="top" href="trash-categories.php?resid=<?php echo htmlentities($row['id']); ?>" title="Restore this category"><i class="ion-arrow-return-left"></i></a>
                                                                &nbsp;<a data-toggle="tooltip" data-placement="top" href="trash-categories.php?rid=<?php echo htmlentities($row['id']); ?>&&action=parmdel" title="Permanent delete this category"> <i class="fa fa-trash" style="color: #f05050"></i> </td>
                                                        </tr>
                                                <?php }
                                                } ?>
                                            </tbody>
                                        </table>
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