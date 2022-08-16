<?php
session_start();
include('includes/config.php');
if (isset($_SESSION['id']) && isset($_SESSION['name']) && isset($_SESSION['positionid'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
        <!-- App title -->
        <title>The Flare - Student Publication</title>
        <link rel="icon" href="../images/flare-logo.png" type="image/icon type">

        <link rel="stylesheet" href="../plugins/morris/morris.css">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
        <!-- <script src="assets/js/modernizr.min.js"></script> -->
        <?php
        $columnchart = mysqli_query($con, "SELECT tblposts.id as postid, tblposts.PostTitle as title, tblposts.PostingDate as PostingDate, tblposts.UpdationDate as UpdationDate,tblcategory.CategoryName as category, tblcategory.id as cid, (SELECT COUNT(id) FROM tbllikes WHERE tbllikes.postid = tblposts.id) as likes, (SELECT COUNT(id) FROM tblcomments WHERE tblcomments.postid = tblposts.id) as comments, (SELECT COUNT(id) FROM tblviews WHERE tblviews.postid = tblposts.id) as views FROM tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId WHERE tblposts.Is_Active=1 ORDER BY PostingDate DESC;");
        $piechart = mysqli_query($con, "SELECT tblcategory.CategoryName as category, tblposts.CategoryId, count(*) AS counter
                        FROM tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId
                        WHERE tblposts.Is_Active=1
                        GROUP BY tblposts.CategoryId  
                        ORDER BY counter  DESC;");
        $likesandviewperday = mysqli_query($con, "select ifnull(sel2.nr,0) as nrlikes, ifnull(sel3.nr,0) as nrviews, sel.date as date from (select date from tbllikes union select date from tblviews) sel left join (select count(*) as nr, date from tbllikes group by date) sel2 on sel.date=sel2.date left join (select count(*) as nr, date from tblviews group by date) sel3 on sel.date=sel3.date ORDER BY date ASC;");
        ?>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['bar']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Title', 'Likes', 'Views', 'Comments'],

                    <?php

                    if (mysqli_num_rows($columnchart) > 0) {
                        while ($row = mysqli_fetch_array($columnchart)) {
                            echo "['" . $row['title'] . "', " . $row['likes'] . ", " . $row['views'] . ", " . $row['comments'] . "],";
                        }
                    }
                    ?>
                ]);

                var options = {
                    vAxis: {
                        title: 'Column Chart',
                    },
                    colors: ['blue', 'green', '#fc9003'],



                };

                var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
                chart.draw(data, google.charts.Bar.convertOptions(options));
            }
        </script>
        <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {

                var data = google.visualization.arrayToDataTable([
                    ['Category', 'Likes'],
                    <?php

                    if (mysqli_num_rows($piechart) > 0) {
                        while ($row = mysqli_fetch_array($piechart)) {
                            echo "['" . $row['category'] . "', " . $row['counter'] . "],";
                        }
                    }
                    ?>
                ]);

                var options = {
                    title: 'Category',
                    is3D: true,

                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                chart.draw(data, options);
            }
        </script>
        <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Date', 'Likes', 'Views'],
                    <?php

                    if (mysqli_num_rows($likesandviewperday) > 0) {
                        while ($row = mysqli_fetch_array($likesandviewperday)) {
                            echo "['" . $row['date'] . "', " . $row['nrlikes'] . ", " . $row['nrviews'] . "],";
                        }
                    }
                    ?>
                ]);

                var options = {
                    vAxis: {
                        title: 'Area Chart',
                    },
                    colors: ['blue', 'green'],

                };

                var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
                chart.draw(data, options);
            }
        </script>
    </head>

    <body class="fixed-left">
        <div id="wrapper">
            <div class="topbar">
                <div class="topbar-left">
                </div>
                <?php include('includes/topheader.php'); ?>
            </div>

            <?php include('includes/leftsidebar.php'); ?>

            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Dashboard</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li class="active">
                                            Dashboard
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- ARTICLES -->
                            <a href="manage-post.php">
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="card-box widget-box-one">
                                        <i class="fa fa-book widget-one-icon"></i>
                                        <div class="wigdet-one-content">
                                            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="">Articles</p>
                                            <?php $query = mysqli_query($con, "select * from tblposts where Is_Active=1");
                                            $countposts = mysqli_num_rows($query);
                                            ?>
                                            <h2><?php echo htmlentities($countposts); ?> <small></small></h2>

                                        </div>
                                    </div>
                                </div>
                            </a>
                            <!-- CATEGORIES -->
                            <a href="manage-categories.php">
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="card-box widget-box-one">
                                        <i class="fa fa-list widget-one-icon"></i>
                                        <div class="wigdet-one-content">
                                            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="">Categories</p>
                                            <?php $query = mysqli_query($con, "select * from tblcategory where Is_Active=1");
                                            $countcat = mysqli_num_rows($query);
                                            ?>
                                            <h2><?php echo htmlentities($countcat); ?> <small></small></h2>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <!-- USERS -->
                            <a href="manage-user.php">
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="card-box widget-box-one">
                                        <i class="fa fa-male widget-one-icon"></i>
                                        <div class="wigdet-one-content">
                                            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="">Users</p>
                                            <?php $query = mysqli_query($con, "select * from tblaccount");
                                            $countcat = mysqli_num_rows($query);
                                            ?>
                                            <h2><?php echo htmlentities($countcat); ?> <small></small></h2>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div>
                                &nbsp;
                                <hr style="border: 0;height: 1px;background: #333;background-image: linear-gradient(to right, #ccc, #333, #ccc);">
                            </div>
                            <!-- TOTAL COMMENTS -->
                            <a href="manage-comments.php">
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="card-box widget-box-one">
                                        <i class="fa fa-comments widget-one-icon"></i>
                                        <div class="wigdet-one-content">
                                            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="">Total Comments</p>
                                            <?php $query = mysqli_query($con, "select * from tblcomments left join tblposts on tblcomments.postid=tblposts.id WHERE tblposts.Is_Active = 1 And tblcomments.status = 1;");
                                            $countcat = mysqli_num_rows($query);
                                            ?>
                                            <h2><?php echo htmlentities($countcat); ?> <small></small></h2>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <!-- TOTAL LIKES -->
                            <a style="cursor: default;">
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="card-box widget-box-one">
                                        <i class="fa fa-thumbs-up widget-one-icon"></i>
                                        <div class="wigdet-one-content">
                                            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="">Total Likes</p>
                                            <?php $query = mysqli_query($con, "select * from tbllikes left join tblposts on tbllikes.postid=tblposts.id WHERE tblposts.Is_Active = 1");
                                            $countcat = mysqli_num_rows($query);
                                            ?>
                                            <h2><?php echo htmlentities($countcat); ?> <small></small></h2>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <!-- TOTAL VIEWS -->
                            <a style="cursor: default;">
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="card-box widget-box-one">
                                        <i class="fa fa-eye widget-one-icon"></i>
                                        <div class="wigdet-one-content">
                                            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="">Total Views</p>
                                            <?php $query = mysqli_query($con, "select * from tblviews left join tblposts on tblviews.postid=tblposts.id WHERE tblposts.Is_Active = 1;");
                                            $countcat = mysqli_num_rows($query);
                                            ?>
                                            <h2><?php echo htmlentities($countcat); ?> <small></small></h2>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <div>
                                &nbsp;
                                <hr style="border: 0;height: 1px;background: #333;background-image: linear-gradient(to right, #ccc, #333, #ccc);">
                            </div>
                            <!-- AVERAGE COMMENT -->
                            <a style="cursor: default;">
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="card-box widget-box-one">
                                        <i class="fa fa-comments widget-one-icon"></i>
                                        <div class="wigdet-one-content">
                                            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="">AVERAGE COMMENTS PER ARTICLE</p>
                                            <?php $query = mysqli_query($con, "select * from tblcomments left join tblposts on tblcomments.postid=tblposts.id WHERE tblposts.Is_Active = 1");
                                            $query1 = mysqli_query($con, "SELECT * FROM tblposts WHERE Is_Active = 1");
                                            $countcat = mysqli_num_rows($query);
                                            $countcat1 = mysqli_num_rows($query1);
                                            $number = $countcat / $countcat1;
                                            ?>
                                            <h2><?php echo number_format((float)$number, 2, '.', ''); ?> <small></small></h2>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <!-- AVERAGE LIKE -->
                            <a style="cursor: default;">
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="card-box widget-box-one">
                                        <i class="fa fa-thumbs-up widget-one-icon"></i>
                                        <div class="wigdet-one-content">
                                            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="">AVERAGE LIKES PER ARTICLE</p>
                                            <?php $query = mysqli_query($con, "select * from tbllikes left join tblposts on tbllikes.postid=tblposts.id WHERE tblposts.Is_Active = 1");
                                            $query1 = mysqli_query($con, "SELECT * FROM tblposts WHERE Is_Active = 1");
                                            $countcat = mysqli_num_rows($query);
                                            $countcat1 = mysqli_num_rows($query1);
                                            $number = $countcat / $countcat1;
                                            ?>
                                            <h2><?php echo number_format((float)$number, 2, '.', ''); ?> <small></small></h2>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <!-- AVERAGE VIEW -->
                            <a style="cursor: default;">
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="card-box widget-box-one">
                                        <i class="fa fa-eye widget-one-icon"></i>
                                        <div class="wigdet-one-content">
                                            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="">AVERAGE VIEWS PER ARTICLE</p>
                                            <?php $query = mysqli_query($con, "select * from tblviews left join tblposts on tblviews.postid=tblposts.id WHERE tblposts.Is_Active = 1;");
                                            $query1 = mysqli_query($con, "SELECT * FROM tblposts WHERE Is_Active = 1");
                                            $countcat = mysqli_num_rows($query);
                                            $countcat1 = mysqli_num_rows($query1);
                                            $number = $countcat / $countcat1;
                                            ?>
                                            <h2><?php echo number_format((float)$number, 2, '.', ''); ?> <small></small></h2>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div>
                                &nbsp;
                                <hr style="border: 0;height: 1px;background: #333;background-image: linear-gradient(to right, #ccc, #333, #ccc);">
                            </div>
                            <!-- MOST ACTIVE -->
                            <a style="cursor: default;">
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="card-box widget-box-one">
                                        <i class="fa fa-male widget-one-icon"></i>
                                        <div class="wigdet-one-content">
                                            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="">MOST ACTIVE VIEWER</p>
                                            <?php
                                            $query1 = mysqli_query($con, "SELECT tblaccount.name as name, COUNT(postid)as view FROM tblviews LEFT JOIN tblaccount on tblviews.accountid = tblaccount.id GROUP BY tblviews.accountid ORDER BY view DESC LIMIT 1;");
                                            while ($row1 = mysqli_fetch_array($query1)) {
                                                $max = $row1['view'];
                                            }
                                            $query = mysqli_query($con, "SELECT tblaccount.name as name, COUNT(postid)as view FROM tblviews LEFT JOIN tblaccount on tblviews.accountid = tblaccount.id GROUP BY tblviews.accountid ORDER BY view DESC;");

                                            while ($row = mysqli_fetch_array($query)) {
                                            ?>
                                                <?php if ($row['view'] == $max) { ?>
                                                    <h3><?php echo $row['name']; ?> <small></small></p>
                                                    <?php } ?>

                                                <?php
                                            } ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <!-- MOST LIKE -->
                            <a style="cursor: default;">
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="card-box widget-box-one">
                                        <i class="fa fa-book widget-one-icon"></i>
                                        <div class="wigdet-one-content">
                                            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="">MOST LIKED ARTICLE</p>
                                            <?php
                                            $query1 = mysqli_query($con, "SELECT tblposts.PostTitle as title, COUNT(postid)as view FROM tbllikes LEFT JOIN tblposts on tbllikes.postid = tblposts.id WHERE tblposts.Is_Active =1 GROUP BY tbllikes.postid ORDER BY view DESC LIMIT 1;");
                                            while ($row1 = mysqli_fetch_array($query1)) {
                                                $max = $row1['view'];
                                            }
                                            $query = mysqli_query($con, "SELECT tblposts.PostTitle as title, COUNT(postid)as view FROM tbllikes LEFT JOIN tblposts on tbllikes.postid = tblposts.id WHERE tblposts.Is_Active =1 GROUP BY tbllikes.postid ORDER BY view DESC");

                                            while ($row = mysqli_fetch_array($query)) {
                                            ?>
                                                <?php if ($row['view'] == $max) { ?>
                                                    <h3><?php echo $row['title']; ?> <small></small></p>
                                                    <?php } ?>

                                                <?php
                                            } ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <!-- MOST VIEW -->
                            <a style="cursor: default;">
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="card-box widget-box-one">
                                        <i class="fa fa-book widget-one-icon"></i>
                                        <div class="wigdet-one-content">
                                            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="">MOST VIEWED ARTICLE</p>
                                            <?php
                                            $query1 = mysqli_query($con, "SELECT tblposts.PostTitle as title, COUNT(postid)as view FROM tblviews LEFT JOIN tblposts on tblviews.postid = tblposts.id WHERE tblposts.Is_Active =1 GROUP BY tblviews.postid ORDER BY view DESC LIMIT 1;");
                                            while ($row1 = mysqli_fetch_array($query1)) {
                                                $max = $row1['view'];
                                            }
                                            $query = mysqli_query($con, "SELECT tblposts.PostTitle as title, COUNT(postid)as view FROM tblviews LEFT JOIN tblposts on tblviews.postid = tblposts.id WHERE tblposts.Is_Active =1 GROUP BY tblviews.postid ORDER BY view DESC");

                                            while ($row = mysqli_fetch_array($query)) {
                                            ?>
                                                <?php if ($row['view'] == $max) { ?>
                                                    <h3><?php echo $row['title']; ?> <small></small></p>
                                                    <?php } ?>

                                                <?php
                                            } ?>

                                               
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <br><br>
                            <br><br>
                            <div>
                                &nbsp;
                                <hr style="border: 0;height: 1px;background: #333;background-image: linear-gradient(to right, #ccc, #333, #ccc);">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <center>
                                <div id="chart_div" style="width: 100%; height: 500px;"></div>
                            </center>
                        </div>
                        <div>
                            &nbsp;
                            <hr style="border: 0;height: 1px;background: #333;background-image: linear-gradient(to right, #ccc, #333, #ccc);">
                        </div>
                        <div class="row">
                            <center>
                                <div id="columnchart_material" style="width: 100%; height: 500px;"></div>
                            </center>
                        </div>

                        <div>
                            &nbsp;
                            <hr style="border: 0;height: 1px;background: #333;background-image: linear-gradient(to right, #ccc, #333, #ccc);">
                        </div>
                        <div class="row">
                            
                            <center> 
                                <div id="piechart" style="width: 100%; height: 500px;"></div>
                            </center>
                           
                        </div>


                    </div>
                </div>
                <?php include('includes/footer.php'); ?>

            </div>



        </div>
        <!--   -->

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

        <!-- Counter js  -->
        <script src="../plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="../plugins/counterup/jquery.counterup.min.js"></script>

        <!--Morris Chart-->
        <!-- <script src="../plugins/morris/morris.min.js"></script> -->
        <!-- <script src="../plugins/raphael/raphael-min.js"></script> -->

        <!-- Dashboard init -->
        <!-- <script src="assets/pages/jquery.dashboard.js"></script> -->
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