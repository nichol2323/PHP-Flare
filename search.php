<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (isset($_SESSION['uid']) && isset($_SESSION['uname']) && isset($_SESSION['email'])) {
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>The Flare - Student Publication</title>
    <link rel="icon" href="images/flare-logo.png" type="image/icon type">

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
  </head>

  <body>

    <?php include('includes/header.php'); ?>

    <div class="container">
      <div class="row" style="margin-top: 4%">
        <div class="col-md-8">
          <?php
          if ($_POST['searchtitle'] != '') {
            $st = $_SESSION['searchtitle'] = $_POST['searchtitle'];
          }
          $st;

          if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
          } else {
            $pageno = 1;
          }
          $no_of_records_per_page = 8;
          $offset = ($pageno - 1) * $no_of_records_per_page;

          $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
          $result = mysqli_query($con, $total_pages_sql);
          $total_rows = mysqli_fetch_array($result)[0];
          $total_pages = ceil($total_rows / $no_of_records_per_page);

          $query = mysqli_query($con, "SELECT tblposts.id as pid, tblposts.PostTitle as posttitle, tblcategory.CategoryName as category, tblposts.PostDetails as postdetails, tblposts.PostingDate as postingdate, tblposts.PostUrl as url, tblposts.PostImage as PostImage FROM tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId WHERE tblposts.PostTitle like '%$st%' and tblposts.Is_Active=1 LIMIT $offset, $no_of_records_per_page");

          $rowcount = mysqli_num_rows($query);
          if ($rowcount == 0) {
            echo "No record found";
          } else {
            while ($row = mysqli_fetch_array($query)) {
          ?>

              <div class="card mb-4" style="box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);">
                <div class="card-body">
                  <img class="card-img-top" src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>" alt="<?php echo htmlentities($row['posttitle']); ?>">
                  <br><br>
                  <h2 class="card-title"><?php echo htmlentities($row['posttitle']); ?></h2>
                  <p><b>Category : </b> <a href="category.php?catid=<?php echo htmlentities($row['cid']) ?>"><?php echo htmlentities($row['category']); ?></a> </p>
                  <?php
                  $postid = $row['pid'];

                  $numberoflikes = mysqli_query($con, "SELECT COUNT(id) AS likes FROM tbllikes WHERE postid = $postid");
                  $nrow = mysqli_fetch_array($numberoflikes);
                  $nlikes = $nrow['likes'];

                  $numberofviews = mysqli_query($con, "SELECT COUNT(id) AS views FROM tblviews WHERE postid = $postid");
                  $mrow = mysqli_fetch_array($numberofviews);
                  $nviews = $mrow['views'];
                  ?>
                  <p>
                    <i class="fa fa-thumbs-up" style="color: blue;"></i>&nbsp;<?php echo $nlikes; ?> Likes <br>
                    <i class="fa fa-eye" style="color: green;"></i>&nbsp;<?php echo $nviews ?> Views
                  </p>
                  <a href="news-details.php?nid=<?php echo htmlentities($row['pid']) ?>" class="btn btn-primary">Read More &rarr;</a>

                </div>
                <div class="card-footer text-muted">
                  Posted on
                  <?php
                  echo date('F d, Y - h : i A ', strtotime($row['postingdate']));
                  ?>
                </div>
              </div>
            <?php } ?>

            <ul class="pagination justify-content-center mb-4">
              <li class="page-item"><a href="?pageno=1" class="page-link">First</a></li>
              <li class="<?php if ($pageno <= 1) {
                            echo 'disabled';
                          } ?> page-item">
                <a href="<?php if ($pageno <= 1) {
                            echo '#';
                          } else {
                            echo "?pageno=" . ($pageno - 1);
                          } ?>" class="page-link">Prev</a>
              </li>
              <li class="<?php if ($pageno >= $total_pages) {
                            echo 'disabled';
                          } ?> page-item">
                <a href="<?php if ($pageno >= $total_pages) {
                            echo '#';
                          } else {
                            echo "?pageno=" . ($pageno + 1);
                          } ?> " class="page-link">Next</a>
              </li>
              <li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>" class="page-link">Last</a></li>
            </ul>
          <?php } ?>
        </div>

        <?php include('includes/sidebar.php'); ?>

      </div>

    </div>

    <?php include('includes/footer.php'); ?>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>

  </html>
<?php
} else {
  header("Location: index.php");
  exit();
}
?>