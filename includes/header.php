<link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
<style>
  @media only screen and (min-width: 563px) {
    .navbar-brand {
      font-size: 23px !important;
    }
  }

  @media only screen and (max-width: 562px) {
    .navbar-brand {
      font-size: 20px !important;
    }
  }

  @media only screen and (max-width: 520px) {
    .navbar-brand {
      font-size: 19px !important;
    }
  }

  @media only screen and (max-width: 506px) {
    .navbar-brand {
      font-size: 18px !important;
    }
  }

  @media only screen and (max-width: 492px) {
    .navbar-brand {
      font-size: 17px !important;
    }
  }

  @media only screen and (max-width: 478px) {
    .navbar-brand {
      font-size: 16px !important;
    }
  }

  @media only screen and (max-width: 465px) {
    .navbar-brand {
      font-size: 15px !important;
    }
  }

  @media only screen and (max-width: 451px) {
    .navbar-brand {
      font-size: 14px !important;
    }
  }

  @media only screen and (max-width: 437px) {
    .navbar-brand {
      font-size: 13px !important;
    }
  }

  @media only screen and (max-width: 423px) {
    .navbar-brand {
      font-size: 12px !important;
    }
  }

  @media only screen and (max-width: 409px) {
    .navbar-brand {
      font-size: 11px !important;
    }
  }

  @media only screen and (max-width: 395px) {
    .navbar-brand {
      font-size: 10px !important;
    }
  }

  @media only screen and (max-width: 382px) {
    .navbar-brand {
      font-size: 9.5px !important;
    }
  }

  @media only screen and (max-width: 375px) {
    .navbar-brand {
      font-size: 9px !important;
    }
  }

  @media only screen and (max-width: 368px) {
    .navbar-brand {
      font-size: 8.5px !important;
    }
  }

  @media only screen and (max-width: 361px) {
    .navbar-brand {
      font-size: 8px !important;
    }
  }
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" style="background-color: #ed703e !important;">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
    <span class="navbar-toggler-icon"></span>
  </button> <a href="home.php" class="navbar-brand" style="font-weight: 400;font-size: 23px;margin-left: 90px;color: white;"><img src="images/flare-logo.png" alt="" height="50"> The Flare - Student Publication</a>
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="navbar-nav ml-md-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home.php" style="color: white !important;">Home </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="about-us.php" style="color: white !important;">About</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="contact-us.php" style="color: white !important;">Contact us </a>
      </li>
      <li class="nav-item dropdown active" style="margin-right: 95px;">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" style="color: white !important;">Account</a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
          <h6 style="margin-left: 25px;"><i class="fa fa-user"></i> Hi, <?php echo $_SESSION['uname']; ?></h6>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="change-password.php"><i class="fa fa-gear"></i> Change Password</a>
          <a class="dropdown-item" href="logout.php"><i class="fa fa-arrow-left"></i> Logout</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->