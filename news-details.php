<?php

session_start();
include('includes/config.php');

if (isset($_SESSION['uid']) && isset($_SESSION['uname']) && isset($_SESSION['email'])) {

  date_default_timezone_set("Asia/Manila");
  $datenow = date('Y-m-d');

  $myid = $_SESSION['uid'];

  $samecomment = "";
  if (isset($_POST['liked'])) {
    date_default_timezone_set("Asia/Manila");
    $today = date("Y-m-d");
    $postid = $_POST['postid'];
    $numberoflikes1 = mysqli_query($conn, "SELECT COUNT(id) AS likes FROM tbllikes WHERE postid = $postid");
    $lrow = mysqli_fetch_array($numberoflikes1);
    $n = $lrow['likes'];

    mysqli_query($conn, "INSERT INTO tbllikes (accountid, postid, date) VALUES ($myid, $postid, '$today')");
    echo $n + 1;
    exit();
  }

  if (isset($_POST['unliked'])) {
    $postid = $_POST['postid'];
    $numberoflikes2 = mysqli_query($conn, "SELECT COUNT(id) AS likes FROM tbllikes WHERE postid = $postid");
    $urow = mysqli_fetch_array($numberoflikes2);
    $n = $urow['likes'];

    mysqli_query($conn, "DELETE FROM tbllikes WHERE accountid=$myid AND postid = $postid");
    echo $n - 1;
    exit();
  }

  // VIEW
  if (!isset($_POST['submit'])) {
    $postid = $_GET['nid'];

    $results = mysqli_query($con, "SELECT * FROM tblviews WHERE accountid=$myid AND postid= $postid");
    if (mysqli_num_rows($results) == 1) :

    else :
      date_default_timezone_set("Asia/Manila");
      $today = date("Y-m-d");
      $query = mysqli_query($con, "INSERT INTO tblviews (accountid, postid, date) VALUES ($myid, $postid, '$today')");
      if ($query) :

      else :

      endif;
    endif;
  }

  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];
    $postid = $_GET['nid'];
    $st1 = '1';
    $check = mysqli_query($con, "SELECT * FROM tblcomments WHERE postId = $postid AND name='$name' AND email='$email' AND comment='$comment' AND status=$st1");
    if (mysqli_num_rows($check) >= 1) {
      $samecomment = "You already submit a comment with same content";
      // echo "<script>alert('You already submit a comment with same content')</script>";
    } else {
      date_default_timezone_set("Asia/Manila");
      $today = date("Y-m-d H:i:s");
      $query = mysqli_query($con, "insert into tblcomments(postId,name,email,comment,status,PostingDate) values('$postid','$name','$email','$comment','$st1','$today')");
      if ($query) :

      // header("Refresh:0.1");
      else :


      endif;
    }
  }

  if (isset($_POST['commentdel'])) {
    $id = $_POST['commentid'];

    $sql = "DELETE FROM tblcomments WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
      $samecomment = "Something went wrong. Please try again";
    } else {
    }
  }
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>The Flare - Student Publication</title>
    <link rel="icon" href="images/flare-logo.png" type="image/icon type">

    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/css/icons.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
      span#mydiv {
        cursor: pointer;
        padding: 5px;
      }

      .like {
        color: none;
      }

      .likes_count {
        cursor: default;
      }

      .unlike {
        color: blue;
      }

      .visit {
        color: green;
        cursor: default;
      }

      .reply {
        color: green;
        cursor: pointer;
      }

      .hide {
        display: none;
      }

      .scroll-up {
        margin-left: 20px;
        max-height: 100vh;
        overflow: scroll;
        position: relative;
      }

      .alert {
        padding: 10px;
        background-color: #f44336;
        color: white;
      }

      .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
      }

      .closebtn:hover {
        color: black;
      }

      @media only screen and (max-width: 768px) {
        .sidebar {
          order: 4;
        }
      }
    </style>
  </head>

  <body>

    <?php include('includes/header.php'); ?>
    <div class="container">
      <div class="row" style="margin-top: 4%">
        <!-- ARTICLE -->
        <div class="col-md-8">
          <?php
          $pid = $_GET['nid'];

          $query = mysqli_query($con, "SELECT tblposts.id as id, tblposts.PostTitle as posttitle, tblposts.PostImage, tblcategory.CategoryName as category, tblcategory.id as cid, tblposts.PostDetails as postdetails, tblposts.PostingDate as postingdate, tblposts.PostUrl as url FROM tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId WHERE tblposts.id=$pid");
          while ($row = mysqli_fetch_array($query)) {

            $numberoflikes = mysqli_query($con, "SELECT COUNT(id) AS likes FROM tbllikes WHERE postid = $pid");
            $nrow = mysqli_fetch_array($numberoflikes);
            $n = $nrow['likes'];
          ?>
            <div class="card mb-4" style="box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);">
              <div class="card-body">
                <h2 class="card-title"><?php echo htmlentities($row['posttitle']); ?></h2>

                <p><b>Category : </b> <a href="category.php?catid=<?php echo htmlentities($row['cid']) ?>"><?php echo htmlentities($row['category']); ?></a>
                  |
                  <b> Posted on
                  </b>
                  <?php
                  echo date('F d, Y - h : i A ', strtotime($row['postingdate']));
                  ?>
                </p>
                <hr />

                <img style="width: 100%;" class="img-fluid rounded" src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>" alt="<?php echo htmlentities($row['posttitle']); ?>">
                <p class="card-text">
                  <?php
                  $pt = $row['postdetails'];
                  echo (substr($pt, 0)); ?>

                  <br>
                  <?php
                  $results = mysqli_query($con, "SELECT * FROM tbllikes WHERE accountid=$myid AND postid= $pid");
                  if (mysqli_num_rows($results) == 1) : ?>
                    <!-- user already likes post -->
                    <span title="Unlike this post" class="unlike" id="mydiv" data-myval="<?php echo $row['id']; ?>" data-id="<?php echo $row['id']; ?>"><i class="fa fa-thumbs-up"></i></span>
                    <span title="Like this post" class="hide like" id="mydiv" data-myval="<?php echo $row['id']; ?>" data-id="<?php echo $row['id']; ?>"><i class="fa fa-thumbs-up"></i></span>
                  <?php else : ?>
                    <!-- user has not yet liked post -->
                    <span title="Unlike this post" class="like" id="mydiv" data-myval="<?php echo $row['id']; ?>" data-id="<?php echo $row['id']; ?>"><i class="fa fa-thumbs-up"></i></span>
                    <span title="Like this post" class="hide unlike" id="mydiv" data-myval="<?php echo $row['id']; ?>" data-id="<?php echo $row['id']; ?>"><i class="fa fa-thumbs-up"></i></span>
                  <?php endif ?>


                <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Like(s):</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <?php
                        $userlist = mysqli_query($con, "SELECT tblaccount.name AS name FROM tbllikes LEFT JOIN tblaccount on tbllikes.accountid = tblaccount.id WHERE postid = $pid;");
                        while ($userrow = mysqli_fetch_array($userlist)) {
                        ?>
                          <ul style="margin: 1px;">
                            <li><?php echo $userrow['name']; ?></li>
                          </ul>
                        <?php }
                        ?>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>

                <span style="cursor:pointer;" class="likes_count">
                  <?php echo $n; ?>
                </span>
                <a type="button" class="modalhover" style="cursor: pointer;" data-toggle="modal" data-target="#exampleModal1">
                  Likes
                </a>

                &nbsp;
                <span class="visit liked fa fa-eye"></span>
                <?php
                echo " &nbsp;";
                $views = mysqli_query($conn, "SELECT COUNT(id) AS views FROM tblviews WHERE postid = $pid");
                $viewsrow = mysqli_fetch_array($views);
                $v = $viewsrow['views'];
                echo $v;
                ?>

                <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Views(s):</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <?php
                        $userlist = mysqli_query($con, "SELECT tblaccount.name AS name FROM tblviews LEFT JOIN tblaccount on tblviews.accountid = tblaccount.id WHERE postid =  $pid;");
                        while ($userrow = mysqli_fetch_array($userlist)) {
                        ?>
                          <ul style="margin: 1px;">
                            <li><?php echo $userrow['name']; ?></li>
                          </ul>
                        <?php }
                        ?>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>

                <span style="cursor:pointer;">
                </span>
                <a type="button" class="modalhover" style="cursor: pointer;" data-toggle="modal" data-target="#exampleModal2">
                  Views
                </a>

                </p>
              </div>


            </div>
          <?php } ?>

          <div class="card-footer">&nbsp;
          </div>
        </div>


        <!-- SIDEBAR -->
        <?php include('includes/sidebar.php'); ?>

        <!-- COMMENT -->
        <div class="col-md-8" style="margin-top: -95px;">
          <form name="Comment" method="post">
            <div class="card my-4" style="box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);">
              <h5 class="card-header">Leave a Comment
                <!-- POLICY AND GUIDELINES -->
                <a type="button" style="cursor: pointer;float: right;" data-toggle="modal" data-target="#exampleModal">
                  <i data-toggle="tooltip" data-placement="top" title="Policy and Guidelines for commenting" class="fa fa-question-circle"></i>
                </a>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Comment Policy</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">

                        <div style="font-size: 14px; margin-top: 10px;font-weight: normal;"><i class="fa fa-info-circle"></i> Comments are welcomed and encouraged on this site, but there are some instances where comments will be deleted as follows: <br><br>
                          <ul>
                            <li> Deemed to be spam or solely promotional in nature will be deleted. Including a link to relevant content is permitted, but comments should be relevant to the post topic <span style="color: red">*</span></li>
                            <li> Including profanity will be deleted <span style="color: red">*</span></li>
                            <li> Containing language or concepts that could be deemed offensive will be deleted. Note this may include abusive, threatening, pornographic, offensive, misleading or libelous language <span style="color: red">*</span></li>
                            <li> That attack an individual directly will be deleted <span style="color: red">*</span></li>
                            <li> That harass other posters will be deleted. Please be respectful toward other contributors <span style="color: red">*</span></li>
                          </ul>
                        </div>
                        <hr style="border: 0;height: 1px;background: #333;background-image: linear-gradient(to right, #ccc, #333, #ccc);">
                        <div style="font-size: 14px; margin-top: 10px;font-weight: normal;"><i class="fa fa-info-circle"></i> How does Flare Student Publication determine if a comment is offensive?
                          We may label a comment as being offensive (example: hate speech or violence inciting content) if it appears to go against Flare Student Publication Standards.
                          Penalties for offensive comments <br><br>
                          <ul>
                            <li> 1st offense - warning <span style="color: red">*</span></li>
                            <li> 2nd offense - 24 hours suspension <span style="color: red">*</span></li>
                            <li> 3rd offense - 1 week suspension <span style="color: red">*</span></li>
                            <li> 4th offense - 1 month suspension <span style="color: red">*</span></li>
                            <li> 5th offense - 1 year suspension <span style="color: red">*</span></li>
                          </ul>
                        </div>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
                date_default_timezone_set('Asia/Manila');
                $currenttime = date("Y-m-d h:i:s");

                $violatedate = $_SESSION['violation_datetime'];
                $time = $violatedate;
                $tense = 'left';
                $periods = array(
                  'year', 'month', 'day', 'hour', 'minute', 'second'
                );

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

                if ($currenttime < $violatedate) {

                  $buttondisable = "disabled";
                } else {

                  $buttondisable = "";
                }
                ?>
              </h5>
              <div class="card-body">

                <div class="form-group" style="display: none;">
                  <input type="text" name="name" class="form-control" placeholder="Enter your fullname" value="<?php echo $_SESSION['uname']; ?>" required>
                </div>
                <div class=" form-group" style="display: none;">
                  <input type="email" name="email" class="form-control" placeholder="Enter your Valid email" value="<?php echo $_SESSION['email']; ?>" required>
                </div>
                <div style="background-color: grey !important;" class="alert" role="alert"><span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span><i class="fa fa-info"></i> &nbsp; Any questions or queries will be entertained thru email.</div>
                <?php
                $lvl = mysqli_query($conn, "SELECT violation_lvl as lvl FROM tblaccount WHERE id = $myid");
                $row = mysqli_fetch_array($lvl);
                $vlvl = $row['lvl'];
                if ($vlvl == 1) {
                  echo '<div class="alert">';
                  echo '<span class="closebtn"';
                  echo 'onclick="this.parentElement.style.display=';
                  echo "'none';";
                  echo '">&times;</span><i class="fa fa-exclamation-triangle"></i> If you violate our Community standards again, you will be blocked from commenting.</div>';
                }
                if ($currenttime < $violatedate) {
                  echo '<div class="alert">';
                  echo '<span class="closebtn"';
                  echo 'onclick="this.parentElement.style.display=';
                  echo "'none';";
                  echo '"></span><i class="fa fa-exclamation-triangle"></i> You have violated our Community standards (' . $timeago . ')</div>';
                }
                ?>
                <div class="form-group">
                  <textarea class="form-control" name="comment" id="textarea" rows="5" placeholder="Comment" onkeyup="check()" required <?php echo $buttondisable; ?>></textarea>

                  <script>
                    var check = function() {
                      my_textarea = document.getElementById('textarea');
                      var badwords = "asshole";
                      if (/\b(?=\w)(Shit|Fuck|Piss off|Bloody hell|Bastard|Wanker|Bitch|Suck|Dick|Idiot|Cunt|Cum|Stupid|Jerk|Slut|Asshole|Damn|Tits|Goddam|Bullshit|Son of a bitch|Pussy|Tangina|Siraulo|Bobo|Boba|Taena|Kingina|Puta|Pota|Ulol|Ulul|Gago|Gagu|Gagi|Tarantado|Buwisit|BwisetBuset|Burat|Kupal|Leche|Letse|Ungas|Punyeta|Hinayupak|Peste|Yawa|Pakshet|Shet|Pakingshet|Tanga|Amputa|Ampota|Susmaryosep|Engot|Pokpok|Panget|Titi|Tite|Pekpek|Puke|Puki|Pepe|Siraulo|Tae|Hindutan|Bayag|Burat|Tamod|Kantot|Pakyu)\b(?!\w)/gi.test(my_textarea.value)) {
                        document.getElementById('commenterror').innerHTML = "<h6>We automatically delete comments that contain inappropriate words.</h6>";
                        my_textarea.value = "";
                        document.getElementById('textarea').blur();
                      } else {
                        document.getElementById('commenterror').innerHTML = "";
                      }
                    }
                  </script>
                </div>
                <div id="commenterror" style="color: red;"><?php echo $samecomment; ?></div>
                <button type="submit" class="btn btn-primary" name="submit" <?php echo $buttondisable; ?>>Post Comment</button>
          </form>
        </div>

        <!-- COMMENT SECTION -->
        <div class="col-md-12 p-0 m-0">
          <div id="card-739810">
            <div class="card">
              <div class="card-header">
                <a style="color:#333;" class="collapsed card-link" data-toggle="collapse" data-parent="#card-739810" href="#card-element-430224">
                  <h5>Comments <i class="fa fa-caret-down"></i></h5>
                </a>
              </div>
              <!--  -->
              <div id="card-element-430224" class="collapse show">
                <div class="card-body">
                  <div class="scroll-up">
                    <?php
                    $getname = mysqli_query($con, "SELECT id, username, email FROM tblaccount WHERE id = $myid;");
                    while ($row = mysqli_fetch_array($getname)) {
                      $user = $row['email'];
                    }
                    ?>
                    <?php
                    $sts = 1;
                    $query = mysqli_query($con, "SELECT id, email, name, comment, postingDate FROM tblcomments WHERE postId='$pid' and status='$sts' ORDER BY postingDate DESC");
                    while ($row = mysqli_fetch_array($query)) {
                      $commentid = $row['email'];
                    ?>
                      <div class="col-md-12" style="margin-top: 8px;margin-left: -15px;">
                        <div class="media-body">
                          <h5 class="mt-1">

                            <?php echo htmlentities($row['name']); ?>
                          </h5>
                          <p>
                            <?php echo htmlentities($row['comment']); ?>
                          </p>
                          <?php if ($user == $commentid) {
                          ?>
                            <form method="POST">
                              <p style="font-size: 10px;margin-top: -60px;float:right;">
                                <input type="text" style="display:none;" name="commentid" value="<?php echo $row['id']; ?>">
                                <button name="commentdel" style="width: 50px;" type="submit" class="btn btn-danger btn-small" data-toggle="tooltip" data-placement="top" title="Delete Comment"><i class=" fa fa-trash" style="color: white;"></i></button>
                              </p>
                            </form>
                          <?php
                          }
                          ?>

                          <p style="font-size:12px;">
                            <?php
                            echo date('F d, Y - h : i A ', strtotime($row['postingDate']));

                            date_default_timezone_set("Asia/Manila");
                            $time = $row['postingDate'];

                            $tense = 'ago';
                            $periods = array('year', 'month', 'day', 'hour', 'minute', 'second');

                            if (!(strtotime($time) > 0)) {
                              return trigger_error("wrong time format: '$time'", E_USER_ERROR);
                            }
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
                              $value = 'just now';
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
                            echo " <b style='font-size:12px;'>(" . $timeago . ")</b>";
                            ?>
                          </p>
                          <p>
                            <span style="display:none;" title="Like this comment" class="commentlike" id="commentlike" data-myval="<?php echo $row['']; ?>" data-id="<?php echo $row['']; ?>"><i class="fa fa-heart"></i></span>
                            <span style="display:none;" title="Reply on this comment" class="reply" id="reply" data-myval="<?php echo $row['']; ?>" data-id="<?php echo $row['']; ?>"><i class="fa fa-reply"></i></span>
                          </p>
                          <hr style="border: 0;height: 1px;background: #333;background-image: linear-gradient(to right, #ccc, #333, #ccc);">
                        </div>
                      </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div> <!-- container -->


    </div>
    </div>
    </div>

    <?php include('includes/footer.php'); ?>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.min.js"></script>


    <script>
      $(document).ready(function() {
        // when the user clicks on like
        $('.like').on('click', function() {
          var postid = $('#mydiv').data('myval');
          $post = $(this);

          $.ajax({
            url: 'news-details.php',
            type: 'post',
            data: {
              'liked': 1,
              'postid': postid
            },
            success: function(response) {
              $post.parent().find('span.likes_count').text(response);
              $post.addClass('hide');
              $post.siblings().removeClass('hide');
            }
          });
        });

        // when the user clicks on unlike
        $('.unlike').on('click', function() {
          // var postid = $(this).data('pid');
          var postid = $('#mydiv').data('myval');
          $post = $(this);

          $.ajax({
            url: 'news-details.php',
            type: 'post',
            data: {
              'unliked': 1,
              'postid': postid
            },
            success: function(response) {
              $post.parent().find('span.likes_count').text(response);
              $post.addClass('hide');
              $post.siblings().removeClass('hide');
            }
          });
        });
      });

      $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
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