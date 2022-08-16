  <!-- Search -->
  <div class="col-md-4 sidebar">
    <div class="card mb-4" style="box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);">
      <h5 class="card-header" style="background-color: #ed703e; color: #fff;">Search</h5>
      <div class="card-body" style="background-color: #fff;">
        <form name="search" action="search.php" method="post">
          <div class="input-group">
            <input type="text" name="searchtitle" class="form-control" placeholder="Search article..." autocomplete="off" required>
            <span class="input-group-btn">
              <style>
                .btn-orange {
                  background-color: #f27746 !important;
                  color: #fff;
                }
              </style>
              <button class="btn btn-orange" type="submit">Search &rarr;</button>
            </span>

        </form>
      </div>
    </div>
  </div>

  <!-- Categories  -->
  <div class="card my-4" style="box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);">
    <h5 class="card-header" style="background-color: #ed703e; color: #fff;">Categories</h5>
    <div class="card-body" style="background-color: #fff;">
      <div class="row">
        <div class="col-lg-12">
          <ul class="mb-0">
            <?php $query = mysqli_query($con, "select id,CategoryName from tblcategory where is_active = 1");
            while ($row = mysqli_fetch_array($query)) {
            ?>

              <li>
                <a href="category.php?catid=<?php echo htmlentities($row['id']) ?>"><?php echo htmlentities($row['CategoryName']); ?></a>
              </li>
            <?php } ?>
          </ul>
        </div>

      </div>
    </div>
  </div>

  <!-- Recent -->
  <div class="card my-4" style="box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);">
    <h5 class="card-header" style="background-color: #ed703e; color: #fff;">Recent News</h5>
    <div class="card-body" style="background-color: #fff;">
      <ul class="mb-0">
        <?php
        $query = mysqli_query($con, "SELECT tblposts.id as pid, tblposts.PostTitle as posttitle FROM tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId WHERE tblposts.Is_Active = 1  ORDER BY tblposts.PostingDate DESC limit 5;");
        while ($row = mysqli_fetch_array($query)) {
        ?>
          <li>
            <a href="news-details.php?nid=<?php echo htmlentities($row['pid']) ?>"><?php echo htmlentities($row['posttitle']); ?></a>
          </li>
        <?php } ?>
      </ul>
    </div>
  </div>
 

  </div>