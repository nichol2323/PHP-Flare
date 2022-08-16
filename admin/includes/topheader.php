            <div class="topbar">
                <div class="topbar-left">
                    <a href="dashboard.php"><img src="../images/flare-logo.png" alt="" height="60"></a>
                </div>

                <!-- DISPLAY:  -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <ul class="nav navbar-nav navbar-left">
                            <li>
                                <button class="button-menu-mobile open-left waves-effect" style="display: none;">
                                    <i style="color: black" class="mdi mdi-menu"></i>
                                </button>
                            </li>

                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown user-box">
                                <a href="" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true">
                                    <i class="fa fa-caret-down fa-2x"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                                    <li>
                                        <h5 style="margin-left:5px;background-color: #fff;"><i class="fa fa-user"></i> Hi, <?php echo $_SESSION['name']; ?></h5>
                                    </li>
                                    <hr style="margin-top: -5px;margin-bottom: 5px;">
                                    <li><a href="change-password.php"><i class="fa fa-gear"></i> Change Password</a></li>
                                    <li><a href="logout.php"><i class="fa fa-arrow-left"></i> Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>