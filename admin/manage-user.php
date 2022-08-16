<?php
session_start();
include('includes/config.php');
error_reporting(0);

date_default_timezone_set('Asia/Manila');
$currenttime = date("Y-m-d h:i:s");


if (isset($_SESSION['id']) && isset($_SESSION['name']) && isset($_SESSION['positionid'])) {
    include('includes/config.php');

    $msg = "";
    $error = "";
    $delmsg = "";

    // 
    if ($_GET['action'] == 'del' && $_GET['rid']) {
        date_default_timezone_set('Asia/Manila');
        $id = intval($_GET['rid']);
        // $lvlone = date("Y-m-d H:i:s", strtotime('+24 hours'));

        $sql = "SELECT violation_lvl FROM tblaccount where id = '$id';";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $lvl = $row['violation_lvl'];
            if ($lvl == 1) {
                $violation = date("Y-m-d H:i:s", strtotime('+24 hours'));
            } else if ($lvl == 2) {
                $violation = date("Y-m-d H:i:s", strtotime('+1 week'));
            } else if ($lvl == 3) {
                $violation = date("Y-m-d H:i:s", strtotime('+1 month'));
            } else if ($lvl >= 4) {
                $violation = date("Y-m-d H:i:s", strtotime('+1 year'));
            }
        }
        if ($lvl == 0) {
            $query = mysqli_query($con, "UPDATE tblaccount SET violation_lvl = violation_lvl+1 where id = '$id';");
            if ($query) {
                $msg = "User successfully give warning";
                echo "<script>
        window.location.href='manage-user.php';
        </script>";
            } else {
                $delmsg = "Something went wrong";
            }
        } else {
            $query = mysqli_query($con, "UPDATE tblaccount SET violation_lvl = violation_lvl+1, violation_datetime = '$violation' where id = '$id';");
            if ($query) {
                $msg = "User successfully block";
                echo "<script>
        window.location.href='manage-user.php';
        </script>";
            } else {
                $delmsg = "Something went wrong";
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
                                            <a href="#">User </a>
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
                            <div class="col-md-12">
                                <div class="card-box">
                                    <div class="table-responsive">
                                        <table class="table table-hover display" id="example" style="width:100%">
                                            <thead class="thead">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Status</th>
                                                    <th>Likes(s)</th>
                                                    <th>View(s)</th>
                                                    <th>Comment(s)</th>
                                                    <th>No. Violation</th>
                                                    <th>Violation Duration</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query = mysqli_query($con, "SELECT tblaccount.id as id, tblaccount.name as name, tblaccount.username as username, tblaccount.email as email, (SELECT COUNT(*) FROM tbllikes WHERE accountid=tblaccount.id) as likes,(SELECT COUNT(*) FROM tblviews WHERE accountid=tblaccount.id) as views,(SELECT COUNT(*) FROM tblcomments WHERE email=tblaccount.email) as comments, tblaccount.violation_lvl as lvl, violation_datetime as duration FROM tblaccount;");
                                                $cnt = 1;
                                                while ($row = mysqli_fetch_array($query)) {
                                                ?>
                                                    <tr>
                                                        <th scope="row"><?php echo htmlentities($cnt++); ?></th>
                                                        <td><?php echo htmlentities($row['name']); ?></td>
                                                        <td><?php echo htmlentities($row['email']); ?></td>
                                                        <td><?php if ($currenttime > $row['duration']) {
                                                                echo "ACTIVE";
                                                            } else {
                                                                echo "BLOCKED";
                                                            } ?></td>
                                                        <td><?php echo htmlentities($row['likes']); ?></td>
                                                        <td><?php echo htmlentities($row['views']); ?></td>
                                                        <td><?php echo htmlentities($row['comments']); ?></td>
                                                        <td><?php echo htmlentities($row['lvl']); ?></td>
                                                        <td><?php
                                                            date_default_timezone_set("Asia/Manila");

                                                            $time = $row['duration'];
                                                            $tense = 'left';
                                                            $periods = array(
                                                                'year', 'month', 'day', 'hour', 'minute', 'second'
                                                            );

                                                            // if (!(strtotime($time) > 0)) {
                                                            //     return trigger_error("wrong time format: '$time'", E_USER_ERROR);
                                                            // }
                                                            $now = new DateTime('now');
                                                            $time = new DateTime($time);
                                                            $diff = $now->diff($time)->format('%y %m %d %h %i %s');
                                                            $diff = explode(' ', $diff);
                                                            $diff = array_combine($periods, $diff);
                                                            $diff = array_filter($diff);

                                                            $period = key($diff);

                                                            $value = current($diff);
                                                            if (!$value) {
                                                                $period = '';
                                                                $tense = '';
                                                                $value = '';
                                                            } else {
                                                                if ($period == 'day' && $value >= 7) {
                                                                    $period = 'week';
                                                                    $value = floor($value / 7);
                                                                }
                                                                if ($value > 1) {
                                                                    $period .= 's';
                                                                }
                                                            }
                                                            $timeago = "$value $period $tense";
                                                            if ($now > $time) {
                                                                echo "";
                                                            } else {
                                                                echo $timeago;
                                                            }
                                                            if ($row['lvl'] == 1) {
                                                                echo "Warning";
                                                            }
                                                            ?></td>

                                                        <td>
                                                            <?php if ($currenttime < $row['duration']) {
                                                                echo "<i data-toggle='tooltip' data-placement='top' title='This user has ongoing punishment' style='color:red;margin-left: 18px;' class='fa fa-ban'><i>'";
                                                            } else {
                                                            } ?>
                                                            <a onclick="return confirm('Warning: Once you click OK, the transaction cannot be undone.')" style="display: <?php if ($currenttime < $row['duration']) {
                                                                                                                                                                                echo "none";
                                                                                                                                                                            } else {
                                                                                                                                                                                echo "block";
                                                                                                                                                                            } ?> ;margin-left: 20px;" data-toggle="tooltip" data-placement="top" title="Block this user from commenting" href="manage-user.php?rid=<?php echo htmlentities($row['id']); ?>&&action=del"><i class="fa fa-lock" style="color: #f05050"></i></a>
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