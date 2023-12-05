<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fa fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fa fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fa fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="public/images/artistes/user2-160x160.jpg" class="img-circle-o elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Alexander Pierce</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-tachometer nav-icon"></i>
                                <p>Dashbaord</p>
                            </a>
                        </li>
                        <?php if (isset($_SESSION['role']) && $_SESSION['role'] == "gestionnaire") { ?>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fa fa-edit"></i>
                                    <p>
                                        Stocks marchandises
                                        <i class="fa fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="index.php?controller=stock&task=entree" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>Entrees</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="index.php?controller=livraison" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>Sorties</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php } elseif (isset($_SESSION['role']) && $_SESSION['role'] == "comptable") { ?>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fa fa-table"></i>
                                    <p>
                                        Caisse
                                        <i class="fa fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="../tables/simple.html" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>Entrées</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../tables/data.html" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>Sorties</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php } elseif (isset($_SESSION['role']) && $_SESSION['role'] == "admin") { ?>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fa fa-edit"></i>
                                    <p>
                                        Stocks marchandises
                                        <i class="fa fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="index.php?controller=stock&task=entree" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>Entrees</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="index.php?controller=livraison" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>Sorties</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fa fa-table"></i>
                                    <p>
                                        Caisse
                                        <i class="fa fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="index.php?controller=vente&task=vente" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>Vente</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="index.php?controller=livraison&task=vente" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>Transport</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="index.php?controller=Vente&task=vente" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>Transport</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="index.php?controller=livraison&task=vente" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>Transport</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="index.php?controller=livraison&task=vente" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>Sorties</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php } ?>

                        <li class="nav-header">Rapports</li>
                        <li class="nav-item">
                            <a href="../calendar.html" class="nav-link">
                                <i class="nav-icon fa fa-calendar"></i>
                                <p>
                                    Calendar
                                    <span class="badge badge-info right">2</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../gallery.html" class="nav-link">
                                <i class="nav-icon fa fa-image"></i>
                                <p>
                                    Gallery
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">