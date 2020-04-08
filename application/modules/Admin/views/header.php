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
      <link rel="stylesheet" href="<?php echo base_url('Assets/')?>plugins/fontawesome-free/css/all.min.css">
      <!-- Theme style -->
      <link rel="icon" href="<?php echo base_url('uploads/'); ?>Fav-1.png" type="image/x-icon" />
      <link rel="stylesheet" href="<?php echo base_url('Assets/')?>dist/css/adminlte.min.css">
      <!-- Google Font: Source Sans Pro -->
      <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
      <link rel="stylesheet" href="https://winto.in/Assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
   </head>
   <style>
   .brand-link {

       width: 100%;
       float: left;
       background: black;
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
               <a href="<?php echo base_url('Admin');?>" class="nav-link">Home</a>
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
         <a href="<?php echo base_url('Admin/Management/');?>" class="brand-link" style="">
         <img src="<?php echo base_url(logo)?>" alt="Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">

         </a>
         <!-- Sidebar -->
         <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
               <div class="image">
                  <img src="<?php echo base_url('uploads/winto_logo.jpg')?>" class="img-circle elevation-2" alt="User Image">
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
                     <a href="<?php base_url('Admin/Management/');?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                           Dashboard
                        </p>
                     </a>
                  </li>

                  <li class="nav-item has-treeview">
                     <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                           Settings
                           <i class="right fas fa-angle-left"></i>
                        </p>
                     </a>
                     <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                           <a href="<?php echo base_url('Admin/Settings/ResetPassword');?>" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Change Password</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="<?php echo base_url('Admin/Package/Edit/1');?>" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Membership Package</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="<?php echo base_url('Admin/Management/NetworkCommission');?>" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Network Commissions</p>
                           </a>
                        </li>
                         <!--<li class="nav-item">
                           <a href="<?php echo base_url('Admin/Management/CommingSoon/af_authenticate');?>" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>2F Authenticate</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="<?php echo base_url('Admin/Management/CommingSoon/add_staff_member');?>" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Add Staff Member</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="<?php echo base_url('Admin/Management/CommingSoon/login_history');?>" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Login History</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="<?php echo base_url('Admin/Management/CommingSoon/active_member_settings');?>" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Active Member Setting</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="<?php echo base_url('Admin/Management/CommingSoon/change_password');?>" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Change Password</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="<?php echo base_url('Admin/Management/CommingSoon/gallary');?>" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Gallary</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="<?php echo base_url('Admin/Management/CommingSoon/offer');?>" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Offer</p>
                           </a>
                        </li> -->
                        <!-- <li class="nav-item">
                           <a href="<?php //echo base_url('Admin/Settings/news');?>" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>News</p>
                           </a>
                        </li> -->
                        <!-- <li class="nav-item">
                           <a href="<?php //echo base_url('Admin/Management/popup_upload');?>" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Upload Popup Image</p>
                           </a>
                        </li> -->
                        <!-- <li class="nav-item">
                           <a href="<?php echo base_url('Admin/Management/CommingSoon/free_popup_settings');?><" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Free Popup Settings</p>
                           </a>
                        </li> -->
                     </ul>
                  </li>

                  <li class="nav-item has-treeview">
                     <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                           Membership
                           <i class="right fas fa-angle-left"></i>
                        </p>
                     </a>
                     <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                           <a href="<?php echo base_url('Admin/Management/Tree/Admin');?>" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Member Genealogy</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="<?php echo base_url('Admin/Management/users');?>" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>All Members</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="<?php echo base_url('Admin/Management/paidUsers');?>" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Active Members</p>
                           </a>
                        </li>

                        <li class="nav-item">
                           <a href="<?php echo base_url('Admin/Withdraw/AddressRequests')?>" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Identity Verifications</p>
                           </a>
                        </li>

                        <li class="nav-item">
                           <a href="<?php echo base_url('Admin/Management/today_joinings');?>" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>New Members Today</p>
                           </a>
                        </li>
                        <?php
                        $pool_count = pool_count();
                        for($i = 1 ; $i <= $pool_count['pool_count'];$i++){
                           echo'<li class="nav-item">
                                 <a href="'.base_url('Admin/Management/Pool/adminadmin/'.$i).'" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Pool '.$i.'</p>
                                 </a>
                              </li>';
                        }
                        ?>
                     </ul>
                  </li>



                  <!-- <li class="nav-item">
                     <a href="<?php echo base_url('Admin/Task/');?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Videos Settings</p>
                     </a>
                  </li> -->
                  <!-- <li class="nav-item has-treeview">
                     <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                           Notifications
                           <i class="right fas fa-angle-left"></i>
                        </p>
                     </a>
                     <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                           <a href="<?php echo base_url('Admin/Management/CommingSoon/News');?><" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>News</p>
                           </a>
                        </li>
                     </ul>
                  </li> -->

                  <!-- <li class="nav-item has-treeview">
                     <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                           KYC
                           <i class="right fas fa-angle-left"></i>
                        </p>
                     </a>
                     <ul class="nav nav-treeview" style="display: none;">

                        <li class="nav-item">
                           <a href="<?php echo base_url('Admin/Withdraw/ApprovedAddressRequests')?>" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Approved Kyc Request List</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="<?php echo base_url('Admin/Withdraw/RejectedAddressRequests')?>" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Rejected Kyc Request List</p>
                           </a>
                        </li>
                     </ul>
                  </li> -->


                  <li class="nav-item has-treeview">
                     <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                           Wallet Management
                           <i class="right fas fa-angle-left"></i>
                        </p>
                     </a>
                     <ul class="nav nav-treeview" style="display: none;">
                        <!-- <li class="nav-item">
                           <a href="<?php echo base_url('Admin/Management/Fund_requests/');?>" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Deposit Requests</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="<?php echo base_url('Admin/Management/SendWallet');?>" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Initiate Deposit</p>
                           </a>
                        </li> -->
                        <li class="nav-item">
                           <a href="<?php echo base_url('Admin/Withdraw/Pending')?>" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Withdrawal Requests</p>
                           </a>
                        </li>

                        <!-- <li class="nav-item">
                           <a href="<?php echo base_url('Admin/Management/Fund_requests/1');?>" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Approved Fund Request List</p>
                           </a>
                        </li> -->
                        <!-- <li class="nav-item">
                           <a href="<?php echo base_url('Admin/Management/Fund_requests/0');?>" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Pending Fund Request List</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="<?php echo base_url('Admin/Management/Fund_requests/2');?>" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Rejected Fund Request List</p>
                           </a>
                        </li> -->
                        <li class="nav-item">
                           <a href="<?php echo base_url('Admin/Management/fund_history');?>" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Deposit History</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="<?php echo base_url('Admin/Withdraw')?>" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Withdrawal History</p>
                           </a>
                        </li>

                     </ul>
                  </li>

                  <li class="nav-item has-treeview">
                     <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                           E-Commerce
                           <i class="right fas fa-angle-left"></i>
                        </p>
                     </a>
                     <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                           <a href="<?php echo base_url('Admin/Package/Products');?>" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Products</p>
                           </a>
                        </li>
                     </ul>
                  </li>

                  <li class="nav-item has-treeview">
                     <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                           Network Commisions
                           <i class="right fas fa-angle-left"></i>
                        </p>
                     </a>
                     <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                           <a href="<?php echo base_url('Admin/Management/Bill_requests');?>" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Commission Requests</p>
                           </a>
                        </li>
                     </ul>
                  </li>

                  <li class="nav-item has-treeview">
                     <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                           Reports
                           <i class="right fas fa-angle-left"></i>
                        </p>
                     </a>
                     <ul class="nav nav-treeview" style="display: none;">

                        <li class="nav-item">
                           <a href="<?php echo base_url('Admin/Withdraw/incomeLedgar/');?>" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Revenue History</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="<?php echo base_url('Admin/Withdraw/payout_summary/');?>" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Payout Summary</p>
                           </a>
                        </li>
                     </ul>
                  </li>

                  <li class="nav-item has-treeview">
                     <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                           Support
                           <i class="right fas fa-angle-left"></i>
                        </p>
                     </a>
                     <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                           <a href="<?php echo base_url('Admin/Support/inbox');?>" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Mailbox</p>
                           </a>
                        </li>
                        <!-- <li class="nav-item">
                           <a href="<?php echo base_url('Admin/Support/Compose');?>" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Inbox</p>
                           </a>
                        </li> -->

                     </ul>
                  </li>
                  <!-- <li class="nav-item has-treeview">
                     <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                           Withdraw Management
                           <i class="right fas fa-angle-left"></i>
                        </p>
                     </a>
                     <ul class="nav nav-treeview" style="display: none;">

                        <li class="nav-item">
                           <a href="<?php echo base_url('Admin/Withdraw/Approved')?>" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Approved Withdraw Request</p>
                           </a>
                        </li>

                        <li class="nav-item">
                           <a href="<?php echo base_url('Admin/Withdraw/Rejected')?>" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Rejected Withdraw Request</p>
                           </a>
                        </li>
                     </ul>
                  </li> -->
                  <li class="nav-item has-treeview">
                     <a href="<?php echo base_url('Admin/Management/logout');?>" class="nav-link">
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
