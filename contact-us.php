<?php
session_start();
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

    <div class="container" style="margin-top: 4%">
      <?php
      $pagetype = 'contactus';
      $query = mysqli_query($con, "select PageTitle,Description from tblpages where PageName='$pagetype'");
      while ($row = mysqli_fetch_array($query)) {
      ?>
        <h1 class="mt-4 mb-3"><?php echo htmlentities($row['PageTitle']) ?>
        </h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="home.php">Home</a>
          </li>
          <li class="breadcrumb-item active">Contact</li>
        </ol>
        <div class="row">
          <div class="col-md-12">
            <p><?php echo $row['Description']; ?></p>
          </div>
        </div>
      <?php } ?>
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