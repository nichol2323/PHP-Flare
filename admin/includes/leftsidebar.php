            <div class="left side-menu" style="font-size: 15px !important;font-family: 'Segoe UI',Tahoma, Geneva, Verdana, sans-serif;">
                <div class="sidebar-inner slimscrollleft">
                    <div id="sidebar-menu">
                        <ul>
                            <li class="menu-title" style="color: #fff;">Navigation</li>
                            <li class="has_sub" style="display:<?php
                                                                if ($_SESSION['db'] == 0) {
                                                                    echo "none";
                                                                } else {
                                                                    echo "block";
                                                                }
                                                                ?>;">
                                <a href="dashboard.php" class="waves-effect"><i class="fa fa-tachometer"></i> <span> Dashboard </span> </a>
                            </li>
                            <li class="has_sub" style="display:<?php
                                                                if ($_SESSION['ar'] == 0) {
                                                                    echo "none";
                                                                } else {
                                                                    echo "block";
                                                                }
                                                                ?>;">
                                <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-sticky-note-o" aria-hidden="true"></i> <span> Article </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a class="bghover" href="add-post.php"><i class="fa fa-plus"></i>Add </a></li>
                                    <li><a class="bghover" href="manage-post.php"><i class="fa fa-gear"></i>Manage </a></li>
                                    <li><a class="bghover" href="trash-post.php"><i class="fa fa-archive"></i>Archive</a></li>
                                </ul>
                            </li>

                            <li class="has_sub" style="display:<?php
                                                                if ($_SESSION['co'] == 0) {
                                                                    echo "none";
                                                                } else {
                                                                    echo "block";
                                                                }
                                                                ?>;">
                                <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-comments"></i> <span>Comments</span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a class="bghover" href="manage-comments.php"><i class="fa fa-gear"></i>Manage</a></li>
                                    <li><a class="bghover" href="trash-comments.php"><i class="fa fa-archive"></i>Archive</a></li>
                                </ul>
                            </li>

                            <li class="has_sub" style="display:<?php
                                                                if ($_SESSION['ca'] == 0) {
                                                                    echo "none";
                                                                } else {
                                                                    echo "block";
                                                                }
                                                                ?>;">
                                <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-list"></i> <span> Category </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a class="bghover" href="add-category.php"><i class="fa fa-plus"></i>Add</a></li>
                                    <li><a class="bghover" href="manage-categories.php"><i class="fa fa-gear"></i>Manage </a></li>
                                    <li><a class="bghover" href="trash-categories.php"><i class="fa fa-archive"></i>Archive </a></li>
                                </ul>
                            </li>

                            <li class="has_sub" style="display:<?php
                                                                if ($_SESSION['of'] == 0) {
                                                                    echo "none";
                                                                } else {
                                                                    echo "block";
                                                                }
                                                                ?>;">
                                <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-user"></i> <span>Official</span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a class="bghover" href="add-officer.php"><i class="fa fa-plus"></i>Add</a></li>
                                    <li><a class="bghover" href="manage-officer.php"><i class="fa fa-gear"></i>Manage </a></li>
                                    <li style="display:none;"><a class="bghover" href="trash-officer.php"><i class="fa fa-file"></i>Report </a></li>
                                </ul>
                            </li>

                            <li class="has_sub" style="display:<?php
                                                                if ($_SESSION['us'] == 0) {
                                                                    echo "none";
                                                                } else {
                                                                    echo "block";
                                                                }
                                                                ?>;">
                                <a href="manage-user.php" class="waves-effect"><i class="fa fa-male"></i> <span> Users </span> </a>
                            </li>

                            <li class="has_sub" style="display:<?php
                                                                if ($_SESSION['pa'] == 0) {
                                                                    echo "none";
                                                                } else {
                                                                    echo "block";
                                                                }
                                                                ?>;">
                                <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-file"></i> <span>Page</span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a class="bghover" href="aboutus.php"><i class="fa fa-info-circle"></i> About us</a></li>
                                    <li><a class="bghover" href="contactus.php"><i class="fa fa-phone-square"></i> Contact us</a></li>
                                    <li><a class="bghover" href="terms-conditions.php"><i class="fa fa-gavel"></i> Terms and Conditions</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>