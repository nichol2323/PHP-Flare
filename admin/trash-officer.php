<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (isset($_SESSION['id']) && isset($_SESSION['name']) && isset($_SESSION['positionid'])) {

    $msg = "";
    $error = "";
    $delmsg = "";

    // Code for deletion
    if ($_GET['action'] == 'del' && $_GET['rid']) {
        $id = intval($_GET['rid']);
        $query = mysqli_query($con, "UPDATE tblofficer SET Is_Active = 0 WHERE id = '$id'");
        $delmsg = "Official successfully move to archive";
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

        <!-- DATA TABLES CSS -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/keytable/2.6.4/css/keyTable.dataTables.min.css">

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
                                            <a href="#">Official </a>
                                        </li>
                                        <li class="active">
                                            Report
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
                                    <div class="alert alert-success text-center" role="alert">
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
                                                    <th>Position</th>
                                                    <th>Privilege</th>
                                                    <th>Date Created</th>
                                                    <th>Last updation Date</th>
                                                    <th style="display:none;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query = mysqli_query($con, "select tblofficer.id as id, tblofficer.name as officername, tblofficer.positionid as officerid, tblofficer.creationdate as CreationDate, tblofficer.updationdate as UpdationDate, tblposition.id as positionid, tblposition.name as positionname, tblofficer.db as db, tblofficer.ar as ar, tblofficer.co as co, tblofficer.ca as ca, tblofficer.of as of, tblofficer.us, tblofficer.pa as pa from tblofficer left join tblposition on tblofficer.positionid=tblposition.id where tblofficer.Is_Active = 0");
                                                $cnt = 1;
                                                while ($row = mysqli_fetch_array($query)) {
                                                ?>

                                                    <tr>
                                                        <th scope="row"><?php echo htmlentities($cnt++); ?></th>
                                                        <td><?php echo htmlentities($row['officername']); ?></td>
                                                        <td><?php echo htmlentities($row['positionname']); ?></td>
                                                        <td><?php
                                                            if ($row['db'] == 1) {
                                                                echo "Dashboard, ";
                                                            }
                                                            if ($row['ar'] == 1) {
                                                                echo "Article, ";
                                                            }
                                                            if ($row['co'] == 1) {
                                                                echo "Comments, ";
                                                            }
                                                            if ($row['ca'] == 1) {
                                                                echo "Category, ";
                                                            }
                                                            if ($row['of'] == 1) {
                                                                echo "Official, ";
                                                            }
                                                            if ($row['us'] == 1) {
                                                                echo "Users, ";
                                                            }
                                                            if ($row['pa'] == 1) {
                                                                echo "Page";
                                                            }
                                                            ?></td>
                                                        <td><?php
                                                            $arr = explode(' ', trim($row['CreationDate']));
                                                            echo htmlentities($arr[0]); ?>
                                                        </td>
                                                        <td><?php
                                                            $arr1 = explode(' ', trim($row['UpdationDate']));
                                                            echo htmlentities($arr1[0]); ?>
                                                        </td>
                                                        <td style="display:none;">
                                                            <a data-toggle="tooltip" data-placement="top" title="no function yet" href="#?cid=<?php echo htmlentities($row['id']); ?>"><i class="fa fa-pencil" style="color: #29b6f6;"></i></a>&nbsp;
                                                            <a data-toggle="tooltip" data-placement="top" title="Move to archive" href="manage-officer.php?rid=<?php echo htmlentities($row['id']); ?>&&action=del"><i class="fa fa-archive" style="color: #f05050"></i></a>
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