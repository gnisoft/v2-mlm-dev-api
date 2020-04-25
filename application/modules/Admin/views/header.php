<!DOCTYPE html>
<!--
   This is a starter template page. Use this page to start your new project from
   scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>HOPE Partners - Admin</title>
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="<?php echo base_url('Assets/') ?>plugins/fontawesome-free/css/all.min.css">
        <!-- Theme style -->
        <link rel="icon" href="<?php echo base_url('uploads/'); ?>Fav-1.png" type="image/x-icon" />
        <link rel="stylesheet" href="<?php echo base_url('Assets/') ?>dist/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <link rel="stylesheet" href="https://winto.in/Assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <style>
        .brand-link {

            width: 100%;
            float: left;
            background: black;
        }
        .ui-datepicker{
            background: white;
            border: 1px solid;
            padding: 10px;
        }
        .ui-datepicker select{
            height: calc(1.8125rem + 2px);
            padding-top: .25rem;
            padding-bottom: .25rem;
            padding-left: .5rem;
            font-size: 75%;
        }
        .ui-datepicker .ui-icon {
            padding: 3px;
            background: #4682b4;
        }
        .dt-button.dt-copy {
            color: white;
            background: #4682b4;
        }
        .dt-button.dt-excel {
            color: white;
            background: #3ca23c;
        }
        .dt-button.dt-csv {
            color: white;
            background: #e86c3a;
        }
        .dt-button.dt-pdf {
            color: white;
            background: #dc2f2f;
        }
        .dt-button.dt-print {
            color: white;
            background: #8766b1;
        }
    </style>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="<?php echo base_url('Admin'); ?>" class="nav-link">Home</a>
                    </li>
                    <!-- <li class="nav-item d-none d-sm-inline-block">
                       <a href="#" class="nav-link">Contact</a>
                    </li> -->
                </ul>
            </nav>
            <!-- /.navbar -->
            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="<?php echo base_url('Admin/Management/'); ?>" class="brand-link" style="">
                    <img src="<?php echo base_url(logo) ?>" alt="Logo" class="brand-image img-circle elevation-3"
                         style="opacity: .8">

                </a>
                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                       <div class="image">
                          <img src="<?php echo base_url('uploads/winto_logo.jpg') ?>" class="img-circle elevation-2" alt="User Image">
                       </div>
                       <div class="info">
                          <a href="#" class="d-block">Winto</a>
                       </div>
                    </div> -->
                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                               with font-awesome or any other icon font library -->
                            <li class="nav-item has-treeview menu-open">
                                <a href="<?php base_url('Admin/Management/'); ?>" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item has-treeview <?php echo active_menu($_SERVER['REDIRECT_QUERY_STRING'] ,'Settings') ? 'active menu-open' : ''; ?>">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-chart-pie"></i>
                                    <p>
                                        Settings
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview" style="display: <?php echo active_menu($_SERVER['REDIRECT_QUERY_STRING'] ,'Settings') ? 'block' : 'none'; ?>;">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Admin/Settings/ResetPassword'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Change Password</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Admin/Package/Edit/2'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Subscription Package</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Admin/Package/Edit/1'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Membership Package</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Admin/Management/NetworkCommission'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Network Commissions</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item has-treeview <?php echo active_menu($_SERVER['REDIRECT_QUERY_STRING'] ,'Membership') ? 'active menu-open' : ''; ?>">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-chart-pie"></i>
                                    <p>
                                        Membership
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview" style="display: <?php echo active_menu($_SERVER['REDIRECT_QUERY_STRING'] ,'Membership') ? 'block' : 'none'; ?>;">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Admin/Management/Tree/Admin'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Member Genealogy</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Admin/Management/users'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>All Members</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Admin/Management/paidUsers'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Active Members</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Admin/Management/subscription_members'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Subscription Members</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Admin/Withdraw/AddressRequests') ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Identity Verifications</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Admin/Management/today_joinings'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>New Members Today</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview <?php echo active_menu($_SERVER['REDIRECT_QUERY_STRING'] ,'WalletManagement') ? 'active menu-open' : ''; ?>">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-chart-pie"></i>
                                    <p>
                                        Wallet Management
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview" style="display: <?php echo active_menu($_SERVER['REDIRECT_QUERY_STRING'] ,'WalletManagement') ? 'block' : 'none'; ?>;">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Admin/Withdraw/Pending') ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Withdrawal Requests</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Admin/Management/fund_history'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Deposit History</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Admin/Withdraw') ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Withdrawal History</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>

                            <li class="nav-item has-treeview <?php echo active_menu($_SERVER['REDIRECT_QUERY_STRING'] ,'E-Commerce') ? 'active menu-open' : ''; ?>">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-chart-pie"></i>
                                    <p>
                                        E-Commerce
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview" style="display: <?php echo active_menu($_SERVER['REDIRECT_QUERY_STRING'] ,'E-Commerce') ? 'block' : 'none'; ?>;">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Admin/Settings/manage_store_url') ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Store Settings </p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item has-treeview <?php echo active_menu($_SERVER['REDIRECT_QUERY_STRING'] ,'NetworkCommisions') ? 'active menu-open' : ''; ?>">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-chart-pie"></i>
                                    <p>
                                        Network Commisions
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview" style="display: <?php echo active_menu($_SERVER['REDIRECT_QUERY_STRING'] ,'NetworkCommisions') ? 'block' : 'none'; ?>;">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Admin/Management/Bill_requests'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Commission Requests</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item has-treeview" <?php echo active_menu($_SERVER['REDIRECT_QUERY_STRING'] ,'Reports') ? 'active menu-open' : ''; ?>>
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-chart-pie"></i>
                                    <p>
                                        Reports
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview" style="display: <?php echo active_menu($_SERVER['REDIRECT_QUERY_STRING'] ,'Reports') ? 'block' : 'none'; ?>;">

                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Admin/Withdraw/incomeLedgar/'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Revenue History</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Admin/Withdraw/payout_summary/'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Payout Summary</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item has-treeview <?php echo active_menu($_SERVER['REDIRECT_QUERY_STRING'] ,'Support') ? 'active menu-open' : ''; ?>">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-chart-pie"></i>
                                    <p>
                                        Support
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview" style="display: <?php echo active_menu($_SERVER['REDIRECT_QUERY_STRING'] ,'Support') ? 'block' : 'none'; ?>;">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Admin/Support/inbox'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Mailbox</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="<?php echo base_url('Admin/Management/logout'); ?>" class="nav-link">
                                    <i class="nav-icon fas fa-chart-pie"></i>
                                    <p>Logout
                                    </p>
                                </a>

                            </li>
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>
