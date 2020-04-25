<?php
$user_info = userinfo();
?>
<!DOCTYPE html>
<html lang="en" class="gr__dream21_in">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo title; ?></title>
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
        <meta content="" name="description">
        <meta content="" name="author">
        <link rel="icon" href="<?php echo base_url('uploads/'); ?>Fav-1.png" type="image/x-icon" />
        <link href="<?php echo base_url('NewTheme/') ?>assets/css/Pricing-Plans.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url('NewTheme/') ?>assets/css/jquery-ui.min.css" rel="stylesheet">
        <link href="<?php echo base_url('NewTheme/') ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url('NewTheme/') ?>assets/css/themify-icons.css" rel="stylesheet">
        <link href="<?php echo base_url('NewTheme/') ?>assets/css/animate.min.css" rel="stylesheet">
        <link href="<?php echo base_url('NewTheme/') ?>assets/css/style.min.css" rel="stylesheet">
        <link href="<?php echo base_url('NewTheme/') ?>assets/css/yellow.css" rel="stylesheet" id="theme">
        <link rel="stylesheet" href="<?php echo base_url('NewTheme/') ?>assets/css/font-awesome.min.css">
        <link href="<?php echo base_url('NewTheme/') ?>assets/css/jquery-jvectormap.css" rel="stylesheet">
        <link href="<?php echo base_url('NewTheme/') ?>assets/css/app.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url('NewTheme/') ?>assets/css/other.css" rel="stylesheet">
        <link rel="stylesheet" href="https://winto.in/Assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            .modal-content1.overlay.whiter123 {
                width: 700px;
                background: white;
                margin: 0 auto;
                position: relative;
                border-radius: 10px;
                border: 2px solid green;
            }
            .navbar .navbar-brand img {
                width: 116px;
            }


            .flg img{
                width: 23px;
                position: relative;
                top: -1px;
                left: 5px;
            }


            #txt{
                position: relative;
                left: 10px;
                top: 1px;
            }

            .table-striped>tbody>tr:nth-of-type(odd) {
                background: #efefefcf;
            }
            .goog-te-menu-value {
                text-decoration: none!important;}
            .widget.widget-product {
                padding: 6px;
            }
            #divTips p, #divTipsResult p{font-weight:bold;}
            .ArticleHeader_channel {
                font-family: knowledge-medium, sans-serif;
                -webkit-font-smoothing: antialiased;
                margin-right: 10px;
                min-height: 2px;
                display: initial; font-weight: bold;
            }
            .ArticleHeader_date {
                font-size: 11px;
                letter-spacing: 0.1rem;
                text-transform: uppercase;
                display: inline-block;
                font-weight: bold;
            }
            #people-list .widget-desc{
                font-size: 10px!important;
                width: 108px!important;
                white-space: nowrap!important;
                text-overflow: ellipsis;
                overflow: hidden;
            }
            .widget-price, .widget-price a {

                white-space: nowrap;
            }
            .widget.with-rounded-corner {
                -webkit-border-radius: .375rem;
                -moz-border-radius: .375rem;
                border-radius: .375rem !important;
            }
            .bg-white-transparent-2 {
                background: rgb(70, 70, 70)!important;
                color: #fff!important;
            }
            .bg-white-transparent-5 {
                background: rgb(169, 168, 168)!important;
                color: #fff!important;
            }
            .with-rounded-corner {
                -webkit-border-radius: .375rem;
                -moz-border-radius: .375rem;
                border-radius: .375rem !important;
            }
            .form-control-sm, .input-group-sm>.form-control, .input-group-sm>.input-group-addon, .input-group-sm>.input-group-btn>.btn, .input-sm, select.form-control-sm:not([size]):not([multiple]), select.input-sm:not([size]):not([multiple]) {
                height: 1.875rem;
                line-height: 0.875rem;
            }

            .widget-list-container .widget-list-media {
                width: 65px;
                position: relative;
            }
            .panel-body {
                padding: 8px 16px;
            }
            .widget-stats-value {
                font-size: 23px;
                font-weight: 700;
                line-height: 11px;
                margin-bottom: 4px;
            }
            #OrderLink ul{    padding: 0;}
            .widget-desc, .widget-desc a {
                font-size: 16px!important;

            }
            .widget.widget-card.dynamic {
                padding: 0;
                height: 217px;
            }
            .widget.widget-card .widget-card-cover img {
                max-width: 100%;
                width: 100%;
                -webkit-transition: all .2s linear;
                -moz-transition: all .2s linear;
                -ms-transition: all .2s linear;
                -o-transition: all .2s linear;
                transition: all .2s linear;
            }
            .widget.widget-list {
                list-style-type: none;
                margin: 0;
                padding: 0;
            }


            #people-list.widget .widget-title {
                font-size: .75rem;
                color: #000;
                line-height: 1rem;
                width: 108px!important;
            }
            .slimScrollDiv .widget.widget-list li {
                border-bottom: 1px solid #f2f2f2;
            }
            .slimScrollDiv .widget.widget-list li:last-child {
                border-bottom: 0px;
            }
            .opacity-7 a {
                color: #58ee77;
                /* font-size: 12px; */
                font-weight: 900;
            }

            .switcher.switcher-success #firewall_checkbox:checked+label:before {
                background: #f7ae0d;
                border-color: #f7af0e;
            }
            .switcher.switcher-success #webmail_checkbox:checked+label:before {
                background: #ff2e56;
                border-color: #ff2e56;
            }
            .news-breck {
                border-top: 1px solid rgba(255, 255, 255, .25);
                padding: 5px 0 5px;
                background: #efefef;
            }
            .diamond ul {
                padding: 0;
                margin: 0;
            }
            .diamond {
                margin: 5px 0;
                padding: 7px 5px;
                border-radius: 19px;
                position: relative;
                top: 1px;
            }
            .diamond li {
                display: inline-block;

            }
            .diamond li a{padding: 0 6px;}

            .widget-list-media, .widget-list-content, .widget-list-action{}
            .widget-rating-star {
                list-style-type: none;
                margin: 0;
                padding: 0;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                font-size: .5625rem;
                color: #f90131;
                font-weight: bold;
                line-height: .875rem;
            }

            @media (min-width: 768px) and (max-width:992px){


                #people-list .widget-price,#people-list .widget-price a {
                    padding: 2px 2px;
                    font-size: 12px;
                    line-height: 1.5;
                    border: 1px solid #007aff;
                    color: #007aff;
                    -webkit-border-radius: .1875rem;
                    -moz-border-radius: .1875rem;
                    border-radius: .1875rem;
                }

                #people-list .widget-list-container .widget-list-media {
                    width: 56px;
                    position: relative;
                }
                #people-list .widget-list-container .widget-list-action {
                    width: 60px;
                }
            }
            @media (max-width: 767px)
            {

                .navbar-toggle	{
                    z-index: 9999999999999999999999;
                    overflow: hidden;
                }
                .dropdown-menu.show {
                    position: absolute;
                    transform: translate3d(0px, 34px, 0px)!important;
                    top: -16px !important;
                    left: -109px !important;
                    will-change: transform;
                    width: 0rem;
                }



                #people-list.widget .widget-title {
                    font-size: .75rem;
                    color: #000;
                    line-height: 1rem;
                    width: 144px!important;
                }
                #people-list .widget-desc {

                    width: 100%!important;
                }
                .navbar-nav-list, .navbar-xs-justified {


                }
                .panel>.table td:first-child, .panel>.table th:first-child, .table.table-panel td:first-child, .table.table-panel th:first-child {
                    padding-left: .9375rem;
                    width: 25% !important;
                }
                .navbar-nav-list .nav.navbar-nav>li, .navbar-xs-justified .nav.navbar-nav>li {
                    display: table-cell;
                    width: 65%;
                    text-align: center;
                    vertical-align: top;
                }
                .content, .page-header-fixed.page-sidebar-fixed .content {
                    margin-left: 0;
                    padding: .9375rem .9375rem 3.6875rem;
                    overflow: initial;
                    height: auto;
                    margin-top: 16px;
                }}
            .modal {
                display: none; /* Hidden by default */
                position: fixed; /* Stay in place */
                z-index: 100000; /* Sit on top */
                /* Location of the box */
                padding: 30px;
                left: 0;
                top: 0;
                width: 100%; /* Full width */
                height: 100%; /* Full height */
                /* Enable scroll if needed */
                background-color: rgb(0,0,0); /* Fallback color */
                background-color: rgba(0, 0, 0, 0.88);
            }

            /* Modal Content */
            .modal-content {

                background-color: #fefefe;
                margin: auto;
                padding: 20px;
                border: 1px solid #888;
                width: 85%;
            }

            .progress-widget__step {
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%,-50%);
                color: #fbfbfc;
                font-size: 40px;
                font-weight: 600;
                transition-property: color;
            }
            .progress-widget__circle {
                height: 78px;
                width: 78px;
                background-color: #cacaca;
                border: 1px solid #b4b4b4;
                border-radius: 50%;
                margin: 0 auto;
                position: relative;
                z-index: 1;
                transition-property: background-color,border-color,display,margin-left,height,width;
                color: white;
            }
            .border-dark .tooltiptext3::after {
                content: "";
                border-color: transparent transparent #bdb3b3 transparent;
                display: block;
                border-style: solid;
                border-width: 10px;
                position: absolute;
                margin: auto;
                top: -7px;
                left: 0;
                right: 0;
                width: 15px;
                height: 15px;
                transform: rotate(45deg);
                -webkit-transform: rotate(226deg);
                -moz-transform: rotate(45deg);
                -o-transform: rotate(45deg);
                -ms-transform: rotate(45deg);
                border-right: 1px solid #9e9e9e;
                border-bottom: 1px solid #9e9e9e;
            }
            @media only screen and (max-width: 767px) {
                .modal-content {
                    padding: 0px;
                    width: 100% !important;
                }
                .modal {

                    padding: 0px;

                }
                .verification-img img {
                    width: 50px;
                    position: relative;
                    right: 17px;
                }
                .document-verify-step1.lead.mb0 {
                    position: relative;
                    top: 10px;
                    font-size: 12px;
                }
                .tooltiptext3{
                    display:none;
                }
                .panel-body {
                    /* padding: .9375rem; */
                    padding-top: 11px;
                    padding-bottom: 11px;
                }



            }

            .border-dark {
                border-color: #bfbfbfb0!important;
                border-radius: 8px;
            }
            .ti-check:before {
                content: "\e64c";
                color: green;
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%,-50%);}


            #header {
                height: 72px;
            }
            .side-padding {
                padding: 30px 0 0 0;
            }
            #page-container {
                padding-top: 4.10rem;
            }
            #mobile-logo{
                display:none;

            }
            @media only screen and (max-width: 767px) {
                #screen-logo {
                    display: none;
                }

                #mobile-logo {
                    display: block;
                }

                .navbar-nav-list .nav.navbar-nav>li, .navbar-xs-justified .nav.navbar-nav>li {
                    width: auto;
                }

                .diamond {
                    padding: 12px 5px!important;
                }


            }



            .passed .progress-widget__circle {
                border: 4px solid #9bbb72;
                background: white;
                font-weight: 900;
                font-size: 20px;

            }


            .border-dark .tooltiptext3::after {

                background: white;
            }

            .border-dark .tooltiptext3 {
                display: block;
                visibility: hidden;
                width: 100%;
                height: auto;
                background-color: #ffffff;
                color: #45535e;
                border-radius: 4px;
                box-sizing: border-box;
                position: absolute;
                z-index: 1;
                top: 67px;
                left: -1px;
                border: 1px solid #b6bbbf;
                font-size: 14px;
                text-align: justify;
                line-height: 18px;
                padding: 16px;
            }

            .ti-check {
                display: inline-block;
                vertical-align: middle;
                font-size: 20px;
                font-weight: 900;
            }

            @media (max-width: 767px){

                .content, .page-header-fixed.page-sidebar-fixed .content {

                    margin-top: 48px!important;
                }

                .collapsed .progress-widget__circle.wr1ing {
                    height: 30px;
                    width: 30px;
                    display: inline-block;
                    vertical-align: middle;
                    margin-top: 2px;

                }
                .collapsed .progress-widget__step.asaping12, .progress-widget_modal .progress-widget__step{
                    font-size: 13px;
                }

                .progress-widget__title.fancing12 span {
                    display: block;
                    white-space: normal;
                    padding: 0px 0px 0px 20px;
                    font-size: 16px;

                }

                .tooltiptext3.amazesd1234
                {

                    font-weight:400;
                    color:#9b9b9b;

                }

                .amazesd1234
                {
                    font-weight:400;
                    color:#9b9b9b;
                }

                .modal-content1.overlay.whiter123
                {
                    width: 75%;
                    background: white;
                    margin: 0 auto;
                    position: relative;
                    margin-top: 100px;
                    height: 455px;
                    border-radius: 4px;

                }

            }

            #content .page-titel spna
            {
                color: #3fbfd7;
            }

            #content .page-titel
            {
                font-size: 13px;
                font-weight: 500;
                text-transform: uppercase;
            }

            .alos  a{

                color: #fff!important;

            }
            .alos a:hover{

                color: #fff!important;

            }
            .with-rounded-corner .m-t-10 {
                position: relative;
                margin-top: unset!important;
            }
            #mem_rank {
                position: absolute;
                left: 0;
                top: -15px;
                width: 100%;
            }


            .header.navbar.navbar-default {
                background: #000;
            }
            .header.navbar-default .navbar-nav>li>a, .header.navbar.navbar-default .navbar-brand {
                color: #FFF;
            }
            .nav>li>a:focus, .nav>li>a:hover {
                background: #484848;
            }

            @media (max-width: 767px) {
                .navbar-nav-list, .navbar-xs-justified {
                    margin: 0 -.9375rem;
                    background: #333;
                    border-top: 1px solid rgba(0, 0, 0, .1);
                }
            }

            div#content {

                max-width: 100%;
                overflow: scroll;
            }
            .wizard .wizard-content .tab-pane {

                max-width: 100%;
                overflow: scroll;
            }

            .widget .widget-title, .widget .widget-title a {
                font-size: 15px;

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
    </head>
    <body data-gr-c-s-loaded="true">
        <div id="myModal1" class="modal">
            <div class="modal-content1 overlay whiter123">
                <span class="close" id="cl" style="margin-top: -24px;    color: black;
                      margin-right: -15px;    margin-top: -24px;
                      color: black;
                      margin-right: -15px;
                      position: absolute;
                      right: 35px;
                      top: 24px;
                      " onclick="popupClose();">×</span>
                <div id="news_list_dynemic" style="overflow-y: auto;height: 500px;text-align: center;"></div>
            </div>
        </div>
        <!-- Modal -->
        <!--        <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                         Modal content
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">×</button>
                            </div>
                            <div class="modal-body">
                                <div class="progress-widget_modal pt20 pb20 ng-scope">
                                    <div class="progress-widget__wrapper  kik" id="Div1">
                                         step 1 
                                        <div class="progress-widget__item  progress-widget__item_4-items passed disabled tooltip-col" ng-class="{&#39;passed disabled&#39;: state.currentStep & gt; 1, &#39;current&#39;: state.currentStep === 1}" ng-click="clickOnFirstStep(state.currentStep === 1)">
                                            <div class="progress-widget__item-layer" uib-popover="Fill in all your details in the form to take you one step closer to trading!" popover-placement="bottom" popover-trigger="mouseenter">
                                                <div class="progress-widget__circle">
                                                    <div class="progress-widget__step">
                                                         ngIf: state.currentStep <= 1 
                                                         ngIf: state.currentStep > 1 
                                                        <span class="ti-check ng-scope" ng-if="state.currentStep & gt; 1"></span>
                                                         end ngIf: state.currentStep > 1 
                                                    </div>
                                                </div>
                                                <div class="progress-widget__title">
                                                    <span>Complete Profile</span>
                                                    <span class="tooltiptext3">Fill in all your details in the form to take you one step closer to trading!</span>
                                                </div>
                                            </div>
                                        </div>
                                         step 2 
                                        <div class="progress-widget__item  progress-widget__item_4-items passed tooltip-col" ng-class="{&#39;passed&#39;: state.currentStep & gt; 2, &#39;current&#39;: state.currentStep === 2}" ui-sref="app.accounts.open.live" href="/en/accounts/open/live">
                                            <div class="progress-widget__item-layer">
                                                <div class="progress-widget__circle">
                                                    <div class="progress-widget__step">
                                                         ngIf: state.currentStep <= 2 
                                                         ngIf: state.currentStep > 2 
                                                        <span class="ti-check ng-scope" ng-if="state.currentStep & gt; 2"></span>
                                                         end ngIf: state.currentStep > 2 
                                                    </div>
                                                </div>
                                                <div class="progress-widget__title">
                                                    <span>Payment Account</span>
                                                    <span class="tooltiptext3">Add your bank account for payment withdrawal.</span>
                                                </div>
                                            </div>
                                        </div>
                                         ************************* GLOBAL Version ************************* 
                                         step 3 
                                        <div class="progress-widget__item  progress-widget__item_4-items current tooltip-col nocs" ng-class="{&#39;passed&#39;: state.currentStep & gt; 3, &#39;current&#39;: state.currentStep === 3 }" ui-sref="app.money.deposits" href="/en/deposits">
                                            <div class="progress-widget__item-layer">
                                                <div class="progress-widget__circle">
                                                    <div class="progress-widget__step">
                                                         ngIf: state.currentStep <= 3 
                                                        <span ng-if="state.currentStep & lt; = 3" class="ng-scope">3</span>
                                                         end ngIf: state.currentStep <= 3 
                                                         ngIf: state.currentStep > 3 
                                                    </div>
                                                </div>
                                                <div class="progress-widget__title">
                                                    <span class="amazesd1234">Document</span>
                                                    <span class="tooltiptext3 amazesd1234">Don't forget to upload documents for verification within 30 days so you can continue trading!</span>
                                                </div>
                                            </div>
                                        </div>
                                         step 4 
                                        <div class="progress-widget__item  progress-widget__item_4-items last tooltip-col" ng-class="{&#39;current&#39;: state.currentStep === 4 }" ui-sref="app.platforms.download" href="/en/platforms">
                                            <div class="progress-widget__item-layer">
                                                <div class="progress-widget__circle">
                                                    <div class="progress-widget__step">
                                                         ngIf: state.currentStep <= 4 
                                                        <span ng-if="state.currentStep & lt; = 4" class="ng-scope">4</span>
                                                         end ngIf: state.currentStep <= 4 
                                                         ngIf: state.currentStep > 4 
                                                    </div>
                                                </div>
                                                <div class="progress-widget__title ">
                                                    <span class="amazesd1234">Active Account</span>
                                                    <span class="tooltiptext3 amazesd1234">Choose deposit amount, Growth option for deposit. You can deposit for other/self</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer"></div>
                        </div>
                    </div>
                </div>-->


        <div id="page-container" class="page-header-fixed fade in">


            <!-- BEGIN #header -->
            <div id="header" class="header navbar navbar-default">
                <!-- BEGIN container-fluid -->
                <div class="container-fluid">
                    <!-- BEGIN mobile sidebar expand / collapse button -->
                    <div class="navbar-header">
                        <a href="<?php echo base_url('Dashboard'); ?>" class="navbar-brand">
                            <img src="<?php echo base_url(logo) ?>" alt="logo" id="screen-logo">
                            <img src="<?php echo base_url(logo) ?>" alt="logo"  id="mobile-logo">
                        </a>
                        <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- END mobile sidebar expand / collapse button -->


                    <!-- BEGIN navbar-nav-list -->
                    <div class="navbar-nav-list">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="diamond">
                                <span class="flg"><img src="<?php echo base_url('Assets/flags/flag-of-' . country_flag($user_info->country)) ?>.jpg"></span>
                                <span id="txt" style="font-size:14px;font-weight: 500; color:#FFF;"><?php echo $user_info->created_at; ?> </span>
                            </li>
                            <li class="dropdown">
                                <a href="<?php echo base_url('Dashboard/Support/ComposeMail'); ?>" class=" navbar-icon with-label"><i class="ti-email"></i></a>
                            </li>

                            <li class="dropdown">
                                <a href="javascript:;" data-toggle="dropdown">
                                    <span class="navbar-user-img online pull-left" id="Mem_Profl_Pic">
                                        <img width="44" height="44" src="<?php echo base_url('uploads/' . ($user_info->image == '' ? 'no_image.png' : $user_info->image)); ?>" alt="user">
                                    </span>
                                    <span class="hidden-xs " id="Mem_Name"><?php echo $user_info->name; ?></span>
                                    <b class="caret hidden-xs"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo base_url('Dashboard/User/Profile'); ?>">Edit Profile</a></li>
                                    <li><a href="<?php echo base_url('Dashboard/Support/Inbox'); ?>">Inbox</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo base_url('Dashboard/User/logout'); ?>">Log Out</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- END navbar-nav-list -->
                </div>
                <!-- END header-search-bar -->
            </div>
            <!-- END #header -->


            <!-- BEGIN #sidebar -->
            <div id="sidebar" class="sidebar sidebar-inverse side-padding">
                <!-- BEGIN scrollbar -->
                <div class="slimScrollDiv" style="">
                    <div data-scrollbar="true" data-height="100%" data-init="true" style="overflow: hidden; width: auto; height: 100%;">
                        <!-- BEGIN nav -->
                        <ul class="nav">
                            <li class="nav-profile">
                                <div class="image" id="Mem_Profl_Pic1">
                                    <img width="44" height="44" src="<?php echo base_url('uploads/' . ($user_info->image == '' ? 'no_image.png' : $user_info->image)); ?>" alt="user">
                                </div>
                                <div class="info">
                                    <h4 id="MName"><?php echo $user_info->name; ?></h4>
                                    <p id="MemID"><?php echo $user_info->user_id; ?></p>
                                </div>
                            </li>
                            <li class="nav-divider"></li>
                            <li class="nav-header">Navigation</li>
                            <li class=" active">
                                <a href="<?php echo base_url('Dashboard/User/'); ?>"><i class="ti-home"></i><span> Dashboard</span></a>
                            </li>
                            <li class="has-sub <?php echo active_menu($_SERVER['REDIRECT_QUERY_STRING'] ,'profile') ? 'expand' : ''; ?>">
                                <a href="javascript:;">
                                    <b class="caret caret-right pull-right"></b>
                                    <i class="ti-user"></i>
                                    <span>Profile
                                    </span>
                                </a>
                                <ul class="sub-menu" style="display: <?php echo active_menu($_SERVER['REDIRECT_QUERY_STRING'] ,'profile') ? 'block' : 'none'; ?>;">
                                    <li><a href="<?php echo base_url('Dashboard/User/Profile'); ?>">User Profile</a></li>
                                    <li><a href="<?php echo base_url('Dashboard/User/Profile/identity-verification'); ?>">Identity Verification</a></li>
                                    <li><a href="<?php echo base_url('Dashboard/User/Profile/reset-password'); ?>">Change Password</a></li>
                                </ul>
                            </li>
                            <li class="nav-divider"></li>
                            <li class="has-sub <?php echo active_menu($_SERVER['REDIRECT_QUERY_STRING'] ,'Membership') ? 'expand' : ''; ?>">
                                <a href="javascript:;">
                                    <b class="caret caret-right pull-right"></b>
                                    <i class="ti-hand-point-right"></i>
                                    <span>Membership </span>
                                </a>
                                <ul class="sub-menu" style="display: <?php echo active_menu($_SERVER['REDIRECT_QUERY_STRING'] ,'Membership') ? 'block' : 'none'; ?>;">
                                    <!--<li><a href="<?php // echo base_url('Dashboard/User/Register/?sponser_id=' . $user_info->user_id);     ?>">Referral Link</a></li>-->
                                    <li><a href="<?php echo base_url('Dashboard/User/Profile/refferal-link'); ?>">Referral Link</a></li>
                                    <li><a href="<?php echo base_url('Dashboard/start_subscription'); ?>" > Monthly Subscription</a></li>
                                    <?php
                                    if (subscription_status()) {
                                        echo'<li><a href="' . base_url('Dashboard/ActivateAccount') . '"> Activate Membership </a></li>';
                                    }
                                    ?>

                                    <li><a href="<?php echo base_url('Dashboard/Settings/BusinessPlan'); ?>" > Business Plan</a></li>



                                </ul>
                            </li>

                            <li class="nav-divider"></li>

                            <li class="has-sub <?php echo active_menu($_SERVER['REDIRECT_QUERY_STRING'] ,'Network') ? 'expand' : ''; ?>">
                                <a href="javascript:;">
                                    <b class="caret caret-right pull-right"></b>
                                    <i class="ti-palette"></i>
                                    <span>Network </span>
                                </a>
                                <ul class="sub-menu" style="display: <?php echo active_menu($_SERVER['REDIRECT_QUERY_STRING'] ,'Network') ? 'block' : 'none'; ?>;">
                                    <li><a href="<?php echo base_url('Dashboard/User/Directs'); ?>">Direct Network</a></li>
                                    <li><a href="<?php echo base_url('Dashboard/User/Downline'); ?>">Total Network</a></li>
                                    <li><a href="<?php echo base_url('Dashboard/User/Tree/' . $user_info->user_id); ?>">Genealogy</a></li>
                                </ul>
                            </li>
                            <li class="nav-divider"></li>

                            <li class="has-sub <?php echo active_menu($_SERVER['REDIRECT_QUERY_STRING'] ,'NetworkCommision') ? 'expand' : ''; ?>">
                                <a href="javascript:;">
                                    <b class="caret caret-right pull-right"></b>
                                    <i class="ti-palette"></i>
                                    <span>Network Commission </span>
                                </a>
                                <ul class="sub-menu" style="display: <?php echo active_menu($_SERVER['REDIRECT_QUERY_STRING'] ,'NetworkCommision') ? 'block' : 'none'; ?>;">
                                    <li><a href="<?php echo base_url('Dashboard/Fund/SubmitBill'); ?>">Network Commissions</a></li>
                                    <li><a href="<?php echo base_url('Dashboard/Fund/BillStatus'); ?>">Submission Status</a></li>
                                </ul>
                            </li>
                            <li class="nav-divider"></li>
                            <li><a href="<?php echo store_url(); ?>" target="_blank"><i class="ti-lock"></i><span>Shop HOPE</span></a></li>


                            <li class="nav-divider"></li>

                            <li class="has-sub <?php echo active_menu($_SERVER['REDIRECT_QUERY_STRING'] ,'E-wallet') ? 'expand' : ''; ?>">
                                <a href="javascript:;">
                                    <b class="caret caret-right pull-right"></b>
                                    <i class="ti-wallet"></i>
                                    <span>E-Wallet </span>
                                </a>
                                <ul class="sub-menu" style="display: <?php echo active_menu($_SERVER['REDIRECT_QUERY_STRING'] ,'E-wallet') ? 'block' : 'none'; ?>;">
                                    <li><a href="<?php echo base_url('Dashboard/User/Profile/payment-accounts'); ?>">Payment Accounts</a></li>
                                    <!-- <li><a href="<?php echo base_url('Dashboard/Fund/Request_fund'); ?>">Fund Request</a></li> -->
                                    <li><a href="<?php echo base_url('Dashboard/Fund/requests'); ?>">Request Status</a></li>
                                    <li><a href="<?php echo base_url('Dashboard/DirectIncomeWithdraw') ?>">Withdrawal</a></li>
                                    <li><a href="<?php echo base_url('Dashboard/IncomeTransfer') ?>"> Transfer</a></li>
                                    <!-- <li><a href="<?php //echo base_url('Dashboard/Fund/transfer_fund');       ?>">Transfer Wallet</a></li> -->

                                </ul>
                            </li>

                            <li class="nav-divider"></li>
                            <li class="has-sub <?php echo active_menu($_SERVER['REDIRECT_QUERY_STRING'] ,'Reports') ? 'expand' : ''; ?>">
                                <a href="javascript:;">
                                    <b class="caret caret-right pull-right"></b>
                                    <i class="ti-package"></i>
                                    <span>Reports </span>
                                </a>
                                <ul class="sub-menu" style="display: <?php echo active_menu($_SERVER['REDIRECT_QUERY_STRING'] ,'Reports') ? 'block' : 'none'; ?>;">
                                    <?php
                                    $incomes = incomes();
                                    foreach ($incomes as $key => $income) {
                                        echo' <li>
                                              <a href="' . base_url('Dashboard/User/Income/' . $key) . '">' . $income . '</a>
                                           </li>';
                                    }
                                    ?>
                                    <li><a href="<?php echo base_url('Dashboard/User/income_ledgar/') ?>">Total Revenue</a></li>

                                    <li><a href="<?php echo base_url('Dashboard/Fund/wallet_ledger'); ?>">E-Wallet History</a></li>
                                    <li><a href="<?php echo base_url('Dashboard/withdraw_history') ?>">Withdrawal History</a></li>
                                    <li><a href="<?php echo base_url('Dashboard/User/Income/income_transfer') ?>"> Transfer History</a></li>
                                    <li><a href="<?php echo base_url('Dashboard/Fund/activation_history'); ?>">Membership History</a></li>
                                </ul>
                            </li>
                            <li class="nav-divider"></li>

                            <li class="has-sub <?php echo active_menu($_SERVER['REDIRECT_QUERY_STRING'] ,'Support') ? 'expand' : ''; ?>">
                                <a href="javascript:;">
                                    <span class="caret caret-right pull-right"></span>
                                    <i class="ti-email"></i>
                                    <span>Support </span>
                                </a>
                                <ul class="sub-menu" style="display: <?php echo active_menu($_SERVER['REDIRECT_QUERY_STRING'] ,'Support') ? 'block' : 'none'; ?>;">
                                    <li><a href="<?php echo base_url('Dashboard/Support/Inbox'); ?>">Mailbox</a></li>
                                    <li><a href="<?php echo base_url('Dashboard/Support/ComposeMail'); ?>">Create Ticket</a></li>


                                </ul>
                            </li>
<!-- <li><a href="<?php //  echo base_url('Dashboard/User/Register/?sponser_id='.$user_info->user_id);       ?>"> Open New Accounts</a></li> -->



                            <li class="nav-divider"></li>
                            <li><a href="<?php echo base_url('Dashboard/User/logout'); ?>"><i class="ti-lock"></i><span>Log-Out</span></a></li>
                            <li class="nav-copyright">© 2020 <b>HOPE Partners</b><br></li>
                        </ul>
                        <!-- END nav -->
                    </div>
                    <div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 716.348px;"></div>
                    <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
                </div>
                <!-- END scrollbar -->
                <!-- BEGIN sidebar-minify-btn -->
                <a href="index.html" class="sidebar-minify-btn" data-click="sidebar-minify">
                    <i class="ti-arrow-left"></i>
                </a>
                <!-- END sidebar-minify-btn -->
            </div>
            <!-- END #sidebar -->
