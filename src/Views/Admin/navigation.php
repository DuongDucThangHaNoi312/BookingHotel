<?php

use BookingHotel\Core\URL;

?>
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="">Admin</a>
        <ul class="nav navbar-nav navbar-left navbar-top-links">
            <li><a href="<?= URL::uri() ?>"><i class="fa fa-home fa-fw"></i> Website </a></li>
        </ul>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li><a href="<?= URL::uri('a.logout') ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <!--                <li class="sidebar-search">-->
                <!--                    <div class="input-group custom-search-form">-->
                <!--                        -->
                <!--                    </div>-->
                <!--                     /input-group -->
                <!--                </li>-->
                <!-- /input-group -->
                <li>
                    <a href="<?= URL::uri('a.dashboard') ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li>
                    <a href="<?= URL::uri('a.listHotel') ?>"><i class="fa fa-database fa-fw"></i>Hotels<span
                                class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?= URL::uri('a.listHotel') ?>">List Hotels</a>
                        </li>
                        <li>
                            <a href="<?= URL::uri('a.addHotel') ?>">Add Hotel</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="<?= URL::uri('a.listLocation') ?>"><i class="fa fa-building fa-fw"></i> Locations<span
                                class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?= URL::uri('a.listLocation') ?>">List Locations</a>
                        </li>
                        <li>
                            <a href="<?= URL::uri('a.addLocation') ?>">Add Location</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href=""><i class="fa fa-cube fa-fw"></i>Rooms<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?=URL::uri('a.listRoom')?>">List Room</a>
                        </li>
                        <li>
                            <a href="<?=URL::uri('a.addRoom')?>">Add Room</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>

                <li>
                    <a href=""><i class="fa fa-book"></i>&ensp;&ensp;Blogs<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?=URL::uri('a.listBlog')?>">List Blog</a>
                        </li>
                        <li>
                            <a href="<?=URL::uri('a.addBlog')?>">Add Blog</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>