<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (isset($_SESSION['id']) && isset($_SESSION['name']) && isset($_SESSION['positionid'])) {

    $msg = "";
    $error = "";
    $delmsg = "";

    if ($_GET['action'] == 'del' && $_GET['rid']) {

        $id = intval($_GET['rid']);
        $positionquery = mysqli_query($conn, "SELECT positionid as posid FROM tblofficer WHERE id = $id");
        $posrow = mysqli_fetch_array($positionquery);
        $posid = $posrow['posid'];
        $positionquery1 = mysqli_query($con, "UPDATE tblposition SET Is_Active = 0 WHERE id = $posid");
        $query = mysqli_query($con, "UPDATE tblofficer SET Is_Active = 0 WHERE id = '$id'");
        $delmsg = "Official successfully move to archive and the slot for that position are now open";
        if ($id == $_SESSION['id']) {
            session_start();
            session_unset();
            session_destroy();
            header("Location: index.php");
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
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query = mysqli_query($con, "select tblofficer.id as id, tblofficer.name as officername, tblofficer.positionid as officerid, tblofficer.creationdate as CreationDate, tblofficer.updationdate as UpdationDate, tblposition.id as positionid, tblposition.name as positionname, tblofficer.db as db, tblofficer.ar as ar, tblofficer.co as co, tblofficer.ca as ca, tblofficer.of as of, tblofficer.us, tblofficer.pa as pa from tblofficer left join tblposition on tblofficer.positionid=tblposition.id where tblofficer.Is_Active = 1");
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
                                                        <td>

                                                            <a style="display: <?php if ($row['of'] == 1 and $row['id'] != $_SESSION['id']) {
                                                                                    echo "none";
                                                                                } else if ($row['id'] == $_SESSION['id']) {
                                                                                    echo "";
                                                                                } ?>;" data-toggle="tooltip" data-placement="top" title="Edit privilege" href="edit-officer.php?cid=<?php echo htmlentities($row['id']); ?>"><i class="fa fa-pencil" style="color: #29b6f6;"></i></a>&nbsp;
                                                            <?php if ($row['of'] == 1 and $row['id'] != $_SESSION['id']) {
                                                                echo "<i style='color:red;' data-toggle='tooltip' data-placement='left' title='You are unable to edit other officials who have access to this module' class='fa fa-ban'></i> ";
                                                            } ?>
                                                            <?php
                                                            $positionvalidation = mysqli_query($con, "SELECT * from tblposition");
                                                            while ($prow = mysqli_fetch_array($positionvalidation)) {
                                                                if ($prow['id'] == 1 && $prow['Is_Active'] == 0) {
                                                                    // echo "You won't be able to deactivate your account until a new administrator or adviser is assigned";
                                                                    if ($row['id'] == $_SESSION['id']) {
                                                                        echo "<i style='color:red;' data-toggle='tooltip' data-placement='left' title='You wont be able to deactivate your account until a new administrator or adviser is assigned' class='fa fa-ban'></i> ";
                                                                    }
                                                                    
                                                                }
                                                                if ($prow['id'] == 2 && $prow['Is_Active'] == 0) {
                                                                    // echo "You won't be able to deactivate your account until a new administrator or adviser is assigned";
                                                                    if ($row['id'] == $_SESSION['id']) {
                                                                        echo "<i style='color:red;' data-toggle='tooltip' data-placement='left' title='You wont be able to deactivate your account until a new administrator or adviser is assigned' class='fa fa-ban'></i> ";
                                                                    }
                                                                }
                                                            }
                                                            ?>

                                                            <a style="display: <?php
                                                                                $positionvalidation = mysqli_query($con, "SELECT * from tblposition WHERE id=1 OR id=2");
                                                                                while ($prow = mysqli_fetch_array($positionvalidation)) {
                                                                                    if ($prow['id'] == 1 && $prow['Is_Active'] == 0) {
                                                                                        if($row['id'] == $_SESSION['id']){
                                                                                            echo "none";
                                                                                        }
                                                                                       
                                                                                    }
                                                                                    if ($prow['id'] == 2 && $prow['Is_Active'] == 0) {
                                                                                        if ($row['id'] == $_SESSION['id']) {
                                                                                            echo "none";
                                                                                        }
                                                                                    }
                                                                                }
                                                                                ?><?php if ($row['of'] == 1 and $row['id'] != $_SESSION['id']) {
                                                                                                                                                        echo "none";
                                                                                                                                                    }  ?>;" data-toggle="tooltip" data-placement="left" title="<?php if ($row['id'] == $_SESSION['id']) {
                                                                                                                                                echo "Deactivate your account and open this position";
                                                                                                                                            } else {
                                                                                                                                                echo "Deactivate this official and open this position";
                                                                                                                                            } ?>" onclick="return confirm('Warning: Once you click OK, the transaction cannot be undone.')" href="manage-officer.php?rid=<?php echo htmlentities($row['id']); ?>&&action=del"><i class="<?php if ($row['id'] == $_SESSION['id']) {
                                                                                                                                                                                                                                                                                                                                            echo "fa fa-power-off";
                                                                                                                                                                                                                                                                                                                                        } else {
                                                                                                                                                                                                                                                                                                                                            echo "fa fa-archive";
                                                                                                                                                                                                                                                                                                                                        } ?>" style="color: #f05050"></i></a>
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