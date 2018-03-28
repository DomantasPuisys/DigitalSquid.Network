<?php

echo '
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><em>DigitalSquid.Network</em></a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                ';
                if ($type == 3) {
                echo '
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>';
                };
                    echo '
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">';
                        //<li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        //</li>
                        //<li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        //</li>
                        //<li class="divider"></li>
                        echo '
                        <li><a href="dashboard.php?logout=1"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">';
                        if ($type >= 2) { echo '
                        <li>
                            <a href="dashboard.php"><i class="fa fa-dashboard fa-fw"></i> Prietaisų skydas</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-table fa-fw"></i> Planai<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="dienos-planas.php">Dienos Planas</a>
                                </li>
                                <li>
                                    <a href="darbu_planai.php">Darbu Planai</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="uzrasai.php"><i class="fa fa-edit fa-fw"></i> Užrašai</a>
                        </li>
                        <li>
                            <a href="svetaines.php"><i class="fa fa-globe fa-fw"></i> Svetainės</a>
                        </li>
                        <li>
                            <a href="paskyros.php"><i class="fa fa-users fa-fw"></i> Paskyros</a>
                        </li>
                        <li>
                            <a href="rss.php">RSS</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-money fa-fw"></i> Finansai<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="islaidos.php">Išlaidos</a>
                                </li>
                            </ul>
                        </li> ';
                        };
                        if ($type == 1) { echo '
                        <li>
                            <a href="#"><i class="fa fa-dashboard fa-fw"></i> <del>Prietaisų skydas</del></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-table fa-fw"></i> <del>Planai</del><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#"><del>Dienos Planas</del></a>
                                </li>
                                <li>
                                    <a href="#"><del>Darbu Planai</del></a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i> <del>Užrašai</del></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-globe fa-fw"></i> <del>Svetainės</del></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> <del>Paskyros</del></a>
                        </li>
                        <li>
                            <a href="#"><del>RSS</del></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-money fa-fw"></i> <del>Finansai</del><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#"><del>Išlaidos</del></a>
                                </li>
                            </ul>
                        </li> ';
                        };
                        if($type == 3) {
                            echo '
                                    <li>
                                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
                                        <ul class="nav nav-second-level">
                                            <li>
                                                <a href="flot.html">Flot Charts</a>
                                            </li>
                                            <li>
                                                <a href="morris.html">Morris.js Charts</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="tables.html"><i class="fa fa-table fa-fw"></i> Tables</a>
                                    </li>
                                    <li>
                                        <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
                                        <ul class="nav nav-second-level">
                                            <li>
                                                <a href="panels-wells.html">Panels and Wells</a>
                                            </li>
                                            <li>
                                                <a href="buttons.html">Buttons</a>
                                            </li>
                                            <li>
                                                <a href="notifications.html">Notifications</a>
                                            </li>
                                            <li>
                                                <a href="typography.html">Typography</a>
                                            </li>
                                            <li>
                                                <a href="icons.html"> Icons</a>
                                            </li>
                                            <li>
                                                <a href="grid.html">Grid</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                                        <ul class="nav nav-second-level">
                                            <li>
                                                <a href="#">Second Level Item</a>
                                            </li>
                                            <li>
                                                <a href="#">Second Level Item</a>
                                            </li>
                                            <li>
                                                <a href="#">Third Level <span class="fa arrow"></span></a>
                                                <ul class="nav nav-third-level">
                                                    <li>
                                                        <a href="#">Third Level Item</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Third Level Item</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Third Level Item</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Third Level Item</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                                        <ul class="nav nav-second-level">
                                            <li>
                                                <a href="blank.html">Blank Page</a>
                                            </li>
                                            <li>
                                                <a href="login.html">Login Page</a>
                                            </li>
                                        </ul>
                                    </li>';
                                };
                                echo '
                    </ul>
                </div>
            </div>
        </nav>
';
?>