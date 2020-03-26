<?php include_once'header.php';
$userinfo = userinfo();
// pr($userinfo,true);
?>

            <!-- BEGIN #content -->
            <div id="content" class="content">
                <!-- BEGIN page-header -->
                <h2 class="page-titel">
                    <span style="">DASHBOARD </span> / HOME
                </h2>
                <h1 class="page-header">
                    Dashboard
                    <small> Account summary, All breif details </small>
                    <?php
                    if($userinfo->paid_status == 1){
                        if($userinfo->directs <= 3){
                            ?>
                            <p style="background: red;
    color: #fff;
    padding: 8px;">Time left For Fast Track Income: <b id="timer"></b> </p>
                            <?php
                        }
                    }
                    ?>

                </h1>
                <script>
                    var countDownDate = new Date("<?php echo date('Y-m-d H:i',strtotime('+78 hour',strtotime($userinfo->topup_date))); ?>").getTime();

                    // Update the count down every 1 second
                    var x = setInterval(function() {

                    // Get today's date and time
                    var now = new Date().getTime();

                    // Find the distance between now and the count down date
                    var distance = countDownDate - now;

                    // Time calculations for days, hours, minutes and seconds
                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    // Output the result in an element with id="demo"
                    document.getElementById("timer").innerHTML = days + "d " + hours + "h "
                    + minutes + "m " + seconds + "s ";

                    // If the count down is over, write some text
                    if (distance < 0) {
                        clearInterval(x);
                        document.getElementById("timer").innerHTML = "EXPIRED";
                    }
                    }, 1000);
                </script>
                <!-- END page-header -->
                <div class="row">
                    <!-- BEGIN col-6 -->
                    <div class="col-lg-6 col-sm-12">
                        <!-- BEGIN widget -->
                        <div class="widget widget-card widget-card-rowspan2 dynamic-xs inverse-mode with-min-height">
                            <!-- BEGIN widget-card-cover -->
                            <div class="widget-card-cover">
                                <div class="cover-bg"></div>
                                <img src="<?php echo base_url('NewTheme/')?>assets/img/o.jpg" alt="">
                            </div>
                            <!-- END widget-card-cover -->
                            <!-- BEGIN widget-card-content -->
                            <div class="widget-card-content">
                                <a href="#" class="widget-title-link bg-primary" style="padding-bottom: 3px;">
                                    <span id="date-time"><?php
                                    echo $userinfo->created_at;?></span>
                                    <!--<span id="rank_tem"></span>-->
                                </a>
                                <h4 class="widget-title">
                                    <b>GETTING STARTED</b>
                                </h4>
                            </div>
                            <!-- END widget-card-content -->
                            <!-- BEGIN widget-card-content -->
                            <div class="widget-card-content bottom p-b-5">
                                <div class="text-center">
                                    <h4>Package Amount : $<?php echo $userinfo->package_amount;?></h4>
                                    <h3 class="m-b-0">Welcome,
                                        <span id="Mem_Name1"><?php
                                        echo $userinfo->name;?></span>
                                    </h3>
                                    <p class="opacity-7" id="RefLink102">
                                          <a style="background:red; padding: 5px; color:white" href="<?php echo base_url('/Dashboard/User/Register/?sponser_id='.$userinfo->user_id)?>" target="_blank">Share Link: <?php echo ($userinfo->user_id)?></a>
                                    </p>
                                </div>
                                <!-- BEGIN row -->
                                <div class="row">
                                    <!-- BEGIN col-6 -->
                                    <div class="col-6">
                                        <!-- BEGIN widget -->
                                        <ul class="widget widget-list m-b-0 no-bg inverse-mode">
                                            <li>
                                                <!-- BEGIN widget-list-container -->
                                                <a href="#" class="widget-list-container">
                                                    <div class="widget-list-media icon p-l-0">
                                                        <i class="ti-user bg-gradient-blue"></i>
                                                    </div>
                                                    <div class="widget-list-content">
                                                        <h4 class="widget-title">My Team</h4>
                                                        <!--<div class="widget-desc hidden-xs">Directs, Non-Directs</div>-->
                                                        <ul class="widget-inline-list widget-desc hidden-xs">
                                                            <li>Non-Directs</li>
                                                        </ul>
                                                    </div>
                                                </a>
                                                <!-- END widget-list-container -->
                                            </li>
                                            <li>
                                                <!-- BEGIN widget-list-container -->
                                                <a href="<?php echo base_url('Dashboard/User/Directs')?>" class="widget-list-container">
                                                    <div class="widget-list-media icon p-l-0">
                                                        <i class="ti-anchor bg-gradient-purple"></i>
                                                    </div>
                                                    <div class="widget-list-content">
                                                        <h4 class="widget-title">My Referral
                                                        </h4>
                                                        <div class="widget-desc hidden-xs">Directs</div>
                                                    </div>
                                                </a>
                                                <!-- END widget-list-container -->
                                            </li>
                                            <li>
                                                <!-- BEGIN widget-list-container -->
                                                <a href="<?php echo base_url('Dashboard/User/Register/?sponser_id='.$userinfo->user_id);?>" target="_blank" class="widget-list-container">
                                                    <div class="widget-list-media icon p-l-0">
                                                        <i class="ti-lock bg-gradient-green"></i>
                                                    </div>
                                                    <div class="widget-list-content">
                                                        <h4 class="widget-title">Sign-up</h4>
                                                        <div class="widget-desc hidden-xs">Add new user</div>
                                                    </div>
                                                </a>
                                                <!-- END widget-list-container -->
                                            </li>
                                        </ul>
                                        <!-- END widget -->
                                    </div>
                                    <!-- END col-6 -->
                                    <!-- BEGIN col-6 -->
                                    <div class="col-6">
                                        <!-- BEGIN widget -->
                                        <ul class="widget widget-list m-b-0 no-bg inverse-mode">
                                            <li>
                                                <!-- BEGIN widget-list-container -->
                                                <a href="#" class="widget-list-container">
                                                    <div class="widget-list-media icon p-l-0">
                                                        <i class="ti-ticket bg-gradient-orange"></i>
                                                    </div>
                                                    <div class="widget-list-content">
                                                        <h4 class="widget-title">Business </h4>
                                                        <ul class="widget-inline-list widget-desc hidden-xs">
                                                          <h4 class="widget-title">Left Business : $<?php echo $userinfo->leftPower;?></h4>
                                                          <h4 class="widget-title">Right Business : $<?php echo $userinfo->rightPower;?></h4>
                                                        </ul>
                                                    </div>
                                                </a>
                                                <!-- END widget-list-container -->
                                            </li>

                                            <li>
                                                <a href="#" class="widget-list-container">
                                                    <div class="widget-list-media icon p-l-0">
                                                        <i class="ti-settings bg-gradient-silver"></i>
                                                    </div>
                                                    <div class="widget-list-content">
                                                        <h4 class="widget-title">Settings</h4>
                                                        <!--<div class="widget-desc hidden-xs">Accounts, Login password</div>-->
                                                        <ul class="widget-inline-list widget-desc hidden-xs">
                                                            <li>Accounts</li>
                                                            <li>Login password</li>
                                                        </ul>
                                                    </div>
                                                </a>
                                                <!-- END widget-list-container -->
                                            </li>
                                        </ul>
                                        <!-- END widget -->
                                    </div>
                                    <!-- END col-6 -->
                                </div>
                                <!-- END row -->
                            </div>
                            <!-- END widget-card-content -->
                        </div>
                        <!-- END widget -->
                    </div>
                    <!-- END col-6 -->
                    <!-- BEGIN col-3 -->
                    <div class="col-lg-3 col-sm-6">
                        <!-- BEGIN widget -->
                        <div class="widget widget-card inverse-mode with-min-height">
                            <!-- BEGIN widget-card-cover -->
                            <div class="widget-card-cover">
                                <div class="cover-bg with-gradient"></div>
                                <img src="<?php echo base_url('NewTheme/')?>assets/img/c.jpg" alt="">
                            </div>
                            <!-- END widget-card-cover -->
                            <!-- BEGIN widget-card-content -->
                            <div class="widget-card-content">
                                <div class="dropdown dropdown-icon pull-right">
                                    <a data-toggle="dropdown">
                                        <i class="ti-more-alt"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a href="#">Deposit By F-Wallet</a>
                                        </li>
                                        <li>
                                            <a href="#">Deposit History </a>
                                        </li>
                                    </ul>
                                </div>
                                <h4 class="widget-title">
                                    <b>Available Balance</b>

                                </h4>
                            </div>
                            <!-- END widget-card-content -->
                            <!-- BEGIN widget-card-content -->
                            <div class="widget-card-content bottom">
                                <div class="widget-card-icon bg-gradient-purple">
                                    <i class="ti-control-backward"></i>
                                </div>
                                <div class="widget-card-info">
                                    <h4 class="widget-title">
                                        <a href="#" id="TOTAL_DEPOSIT">$<?php echo number_format($income_balance['income_balance'],2);?></a>
                                    </h4>
                                    <ul class="widget-inline-list">
                                        <li>Total You Have till now</li>
                                        <li></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- END widget-card-content -->
                        </div>
                        <!-- END widget -->
                        <!-- BEGIN widget -->
                        <div class="widget widget-card inverse-mode with-min-height">
                            <!-- BEGIN widget-card-cover -->
                            <div class="widget-card-cover">
                                <div class="cover-bg with-gradient"></div>
                                <img src="<?php echo base_url('NewTheme/')?>assets/img/p.jpg" alt="">
                            </div>
                            <!-- END widget-card-cover -->
                            <!-- BEGIN widget-card-content -->
                            <div class="widget-card-content">
                                <div class="dropdown dropdown-icon pull-right">
                                    <a data-toggle="dropdown">
                                        <i class="ti-more-alt"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a href="#">Fund-Request</a>
                                        </li>
                                        <li>
                                            <a href="#">Fund-Request Status</a>
                                        </li>
                                        <li>
                                            <a href="#">Transaction History</a>
                                        </li>
                                    </ul>
                                </div>
                                <h4 class="widget-title">f-Wallet</h4>
                            </div>
                            <!-- END widget-card-content -->
                            <!-- BEGIN widget-card-content -->
                            <div class="widget-card-content bottom">
                                <div class="widget-card-icon bg-gradient-red">
                                    <i class="ti-control-forward"></i>
                                </div>
                                <div class="widget-card-info">
                                    <h4 class="widget-title">
                                        <a href="/Dashboard.html#" id="MAR">$<?php echo $wallet_balance['wallet_balance'];?></a>
                                    </h4>
                                    <ul class="widget-inline-list">
                                        <li>Available On f- Wallet </li>
                                        <li></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- END widget-card-content -->
                        </div>
                        <!-- END widget -->
                    </div>
                    <!-- END col-3 -->
                    <!-- BEGIN col-3 -->
                    <div class="col-lg-3 col-sm-6">
                        <!-- BEGIN widget -->
                        <div class="widget widget-card inverse-mode with-min-height">
                            <!-- BEGIN widget-card-cover -->
                            <div class="widget-card-cover">
                                <div class="cover-bg with-gradient"></div>
                                <img src="<?php echo base_url('NewTheme/')?>assets/img/nn.jpg" alt="">
                            </div>
                            <!-- END widget-card-cover -->
                            <!-- BEGIN widget-card-content -->
                            <div class="widget-card-content">
                                <div class="dropdown dropdown-icon pull-right">
                                    <a href="/Dashboard.html#" data-toggle="dropdown">
                                        <i class="ti-more-alt"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a href="<?php echo base_url('Dashboard/DirectIncomeWithdraw')?>">Withdrawal Request</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('Dashboard/withdraw_history')?>">Withdrawal Status</a>
                                        </li>
                                    </ul>
                                </div>
                                <h4 class="widget-title">TOTAL WITHDRAWAL</h4>
                            </div>
                            <!-- END widget-card-content -->
                            <!-- BEGIN widget-card-content -->
                            <div class="widget-card-content bottom">
                                <div class="widget-card-icon bg-gradient-orange">
                                    <i class="ti-stats-up"></i>
                                </div>
                                <div class="widget-card-info">
                                    <h4 class="widget-title">
                                        <a href="/Dashboard.html#" id="TotWithdrawal">$<?php echo $total_withdrawal['total_withdrawal']?></a>
                                    </h4>
                                    <ul class="widget-inline-list">
                                        <li>Total Withdrawal till now</li>
                                        <li></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- END widget-card-content -->
                        </div>
                        <!-- END widget -->
                        <!-- BEGIN widget -->
                        <div class="widget widget-card inverse-mode with-min-height">
                            <!-- BEGIN widget-card-cover -->
                            <div class="widget-card-cover">
                                <div class="cover-bg with-gradient"></div>
                                <img src="<?php echo base_url('NewTheme/')?>assets/img/t.jpeg">
                            </div>
                            <!-- END widget-card-cover -->
                            <!-- BEGIN widget-card-content -->
                            <div class="widget-card-content">
                                <div class="dropdown dropdown-icon pull-right">
                                    <a href="/Dashboard.html#" data-toggle="dropdown">
                                        <i class="ti-more-alt"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a href="/IWallet-Transaction-History.html">Transaction History</a>
                                        </li>
                                    </ul>
                                </div>
                                <h4 class="widget-title">
                                    <b>TOTAL BONUS</b>
                                </h4>
                            </div>
                            <!-- END widget-card-content -->
                            <!-- BEGIN widget-card-content -->
                            <div class="widget-card-content bottom">
                                <div class="widget-card-icon  bg-gradient-green">
                                    <i class="ti-wallet"></i>
                                </div>
                                <div class="widget-card-info">
                                    <h4 class="widget-title text-ellipsis">
                                        <a href="<?php echo base_url('Dashboard/User/income_ledgar');?>" id="DED">$<?php echo $total_income['total_income'];?></a>
                                    </h4>
                                    <ul class="widget-inline-list">
                                        <li>Total Income</li>
                                        <li></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- END widget-card-content -->
                        </div>
                        <!-- END widget -->
                    </div>
                    <!-- END col-3 -->
                </div>

                <div class="ng-scope">


                    <div class="ng-scope">
                        <div class="ng-scope">
                            <!-- ngIf: state.currentStep > 0 -->
                            <div class="ng-scope">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="progress-widget panel panel-light-grey border border-dark collapsed" style="">
                                            <!-- ngIf: !isMobile -->
                                            <button class="progress-widget__btn close progress-widget__btn_close ng-scope" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                                <!-- ngIf: !state.collapsed -->
                                                <span class="ti-close ng-scope" style=""></span>
                                                <span class="ti-angle-down ng-scope" style=""></span>
                                                <!-- end ngIf: !state.collapsed -->
                                                <!-- ngIf: state.collapsed -->
                                            </button>
                                            <!-- end ngIf: !isMobile -->
                                            <button class="progress-widget__btn close progress-widget__btn_close kki" data-toggle="modal" data-target="#myModal">
                                                <span class="ti-angle-down ng-scope" style=""></span>
                                            </button>
                                            <!-- ngIf: isMobile -->
                                            <div class="progress-widget__wrapper  kik" id="collapseExample">
                                                <!-- step 1 -->
                                                <div class="progress-widget__item  progress-widget__item_4-items passed disabled tooltip-col">
                                                    <div class="progress-widget__item-layer">
                                                        <div class="progress-widget__circle">
                                                            <div class="progress-widget__step">
                                                                <!-- ngIf: state.currentStep <= 1 -->
                                                                <!-- ngIf: state.currentStep > 1 -->
                                                                <span class="ti-check ng-scope" style="position: relative;top: -3px;"></span>
                                                                <!-- end ngIf: state.currentStep > 1 -->
                                                            </div>
                                                        </div>
                                                        <div class="progress-widget__title">
                                                            <span>Complete Profile</span>
                                                            <span class="tooltiptext3">Fill in all your details in the form to take you one step closer to benifits!</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- step 2 -->
                                                <div class="progress-widget__item  progress-widget__item_4-items current tooltip-col nocs" ng-class="{&#39;passed&#39;: state.currentStep & gt; 2, &#39;current&#39;: state.currentStep === 2 }" ui-sref="app.money.deposits" href="/en/deposits">
                                                    <div class="progress-widget__item-layer">
                                                        <div class="progress-widget__circle wr1ing passed" id="DepCnt1">
                                                            <div class="progress-widget__step asaping12">
                                                                <span id="PmAcnt" class="ti-check passed progress-widget__circle"></span>
                                                            </div>
                                                        </div>
                                                        <div class="progress-widget__title fancing12">
                                                            <span>Bitcoin Account</span>
                                                            <span class="tooltiptext3">Add your Bitcoin account for payment withdrawal.</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- ************************* GLOBAL Version ************************* -->
                                                <!-- step 3 -->
                                                <div class="progress-widget__item  progress-widget__item_4-items current tooltip-col nocs" ng-class="{&#39;passed&#39;: state.currentStep & gt; 3, &#39;current&#39;: state.currentStep === 3 }" ui-sref="app.money.deposits" href="/en/deposits">
                                                    <div class="progress-widget__item-layer">
                                                        <div class="progress-widget__circle wr1ing" id="DepCnt2">
                                                            <div class="progress-widget__step asaping12">
                                                                <span id="KycCnt">3</span>
                                                            </div>
                                                        </div>
                                                        <div class="progress-widget__title fancing12 ">
                                                            <span>Document</span>
                                                            <span class="tooltiptext3">Don't forget to upload documents for verification within 30 days so you can continue Benifits!</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- step 4 -->
                                                <div class="progress-widget__item  progress-widget__item_4-items last tooltip-col" ng-class="{&#39;passed&#39;: state.currentStep & gt; 4, &#39;current&#39;: state.currentStep === 4}" ui-sref="app.platforms.download" href="/en/platforms">
                                                    <div class="progress-widget__item-layer">
                                                        <div class="progress-widget__circle passed" id="DepCnt3">
                                                            <div class="progress-widget__step">
                                                                <span id="DepCnt" class="ti-check passed progress-widget__circle"></span>
                                                            </div>
                                                        </div>
                                                        <div class="progress-widget__title ">
                                                            <span>Active Account</span>
                                                            <span class="tooltiptext3">Choose deposit amount, Growth option for deposit. You can deposit for other/self</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end ngIf: state.currentStep > 0 -->
                        </div>
                    </div>

                </div>
                <div class="fozs">
                    <div class="row">
                        <div class="col-xl-4 col-md-4 col-sm-6 Polaroid">
                            <!-- Card -->
                            <div class="dt-card text-center">
                                <!-- Card Header -->
                                <div class="dt-card__header px-5 mb-4">
                                    <!-- Card Heading -->
                                    <div class="dt-card__heading text-center">
                                        <div class="dt-separator-h-v1 mb-2"></div>
                                        <h3 class="mb-1">Direct Bonus</h3>
                                        <span class="d-inline-block text-primary" id="dir_income">$<?php echo $direct_income['direct_income']; ?></span>
                                    </div>
                                    <!-- /card heading -->
                                </div>
                                <!-- /card header -->
                                <!-- Card Body -->
                                <div class="dt-card__body px-5">
                                    <!-- Avatar -->
                                    <img class="img-fluid mb-7" src="<?php echo base_url('NewTheme/')?>assets/img/affiliate.svg" alt="Camera">
                                    <!-- /avatar -->
                                    <div class="add-cart">
                                        <!-- Button -->
                                        <a href="<?php echo base_url('Dashboard/User/Income/direct_income');?>" class="btn bg-brown text-uppercase text-white btn-sm">Details</a>
                                        <!-- /button -->
                                    </div>
                                </div>
                                <!-- /card body -->
                            </div>
                            <!-- /card -->
                        </div>
                        <div class="col-xl-4 col-md-4 col-sm-6 iPhone">
                            <!-- Card -->
                            <div class="dt-card text-center overflow-hidden">
                                <!-- Card Header -->
                                <div class="dt-card__header px-5 mb-4">
                                    <!-- Card Heading -->
                                    <div class="dt-card__heading text-center">
                                        <div class="dt-separator-h-v1 mb-2"></div>
                                        <h3 class="mb-0">Level  <br>Bonus</h3>
                                    </div>
                                    <!-- /card heading -->
                                </div>
                                <!-- /card header -->
                                <!-- Card Body -->
                                <div class=" dt-card__body px-5">
                                    <!-- Card Text -->
                                    <p class="mb-5">Total Level  Bonus
                                        <br>
                                        <span id="R_Bouns">$<?php echo $direct_level_income['direct_level_income']; ?></span>
                                    </p>
                                    <!-- /card text-->
                                    <!-- Button -->
                                    <a href="<?php echo base_url('Dashboard/User/Income/direct_level_income');?>" class="text-uppercase f-12 font-weight-500">More Details</a>
                                    <!-- /button -->
                                </div>
                                <!-- /card body -->
                                <!-- Card Image -->
                                <img class="img-fluid mb-n15" src="<?php echo base_url('NewTheme/')?>assets/img/contest.svg" alt="iphone">
                                <!-- /card Image -->
                            </div>
                            <!-- /card -->
                        </div>
                        
                        
                        <div class="col-xl-4 col-md-4 col-sm-4 ">
                            <!-- Grid -->
                            <div class="row">
                                <!-- Grid Item -->
                                <div class="col-6 col-sm-12">
                                    <div class="Grid-Item">
                                        <!-- Card -->
                                        <div class="pratnge card dt-card__full-height bg-gradient-orange text-white">
                                            <!-- Card Body -->
                                            <div class="card-body p-6 ">
                                                <p class="display-3 mb-1">
                                                    <span id="las_wid"></span>
                                                </p>
                                                <p class="f-12">
                                                    <span id="last_down"></span>
                                                </p>
                                                <a href="/Withdrawal-Request.html" class="text-light f-12 font-weight-500 text- uppercase">Last Withdraw</a>
                                            </div>
                                            <!-- /card body -->
                                        </div>
                                        <!-- /card -->
                                    </div>
                                </div>
                                <!-- /grid item -->
                                <!-- Grid Item -->
                                <div class="col-6 col-sm-12 jhhh">
                                    <!-- Card -->
                                    <div class="card dt-card__full-height bg-gradient-blue text-white">
                                        <!-- Card Body -->
                                        <div class="card-body p-6 jg">
                                            <div class="jhhh d-flex flex-wrap mb-3">
                                                <i class="ti-dropbox text-primary f-s-18 pull-left m-r-10"></i>
                                                <a class="text-white ml-auto" href="/D-Wallet-Transaction.html">
                                                    <i class="ti-arrow-right text-primary f-s-18 pull-left m-r-10"></i>
                                                </a>
                                            </div>
                                            <p class="" id="Yo_dir">Total : <?php echo $team['team']; ?></p>
                                            <p class="" id="Yo_dir">Paid Direct : <?php echo $paid_directs['paid_directs']; ?> , Unpaid Direct : <?php echo $free_directs['free_directs']; ?></p>
                                            <p class="" id="Yo_dir">Indirect unpaid: <?php echo $team_unpaid['team'] ;//$team['team'] - ( + $team_paid['team']); ?></p>
                                            <p class="" id="Yo_dir">Indirect paid: <?php echo $team_paid['team'] ;//$team['team'] - ( + $team_paid['team']); ?></p>


                                            <p class="card-text">Your Directs</p>
                                        </div>
                                        <!-- /card body -->
                                    </div>
                                    <!-- /card -->
                                </div>
                                <!-- /grid item -->
                            </div>
                            <!-- /grid -->
                        </div>
                        
                    </div>
                </div>
                <div class="row">
                    <!-- BEGIN col-3 -->
                    <div class="col-lg-4 col-sm-6 with-rounded-corner">
                        <!-- BEGIN section-title -->
                        <div class="section-title m-t-10">USER PROFILE</div>
                        <!-- END section-title -->
                        <!-- BEGIN widget -->
                        <div class="widget widget-card dynamic inverse-mode  with-rounded-corner with-shadow text-center m-b-0">
                            <div class="widget-card-cover with-rounded-corner">
                                <div class="cover-bg with-gradient"></div>
                                <img class="img-portrait" src="<?php echo base_url('NewTheme/')?>assets/img/dashboard-cover-5.jpg" alt="">
                            </div>
                            <div class="widget-card-content with-rounded-corner">
                                <div class="m-b-10 m-t-10">
                                    <div id="mem_rank">
                                        <img width="110" class="img-circle" src="<?php echo base_url('NewTheme/')?>assets/img/Star.png" alt="Rank">
                                    </div>
                                    <div id="prof_pic">
                                        <img width="72" class="img-circle" src="<?php echo base_url('NewTheme/')?>assets/img/Cropvywozcmeimw.jpg" alt="user">
                                    </div>
                                    <!-- <img   width="72" class="img-circle" alt=""  src="../UserProfileImg/Open_User.jpg"/>-->
                                </div>
                                <!--id="prof_pic"-->
                                <h4 class="widget-title f-s-13" id="MemID1"><?php echo $userinfo->name;?></h4>
                                <div class="widget-desc " id="email1"><?php echo $userinfo->email;?></div>
                            </div>
                            <div class="widget-card-content with-rounded-corner p-10 p-t-0">
                                <div class="widget-divider m-t-0"></div>
                                <div class="row m-b-2">
                                    <div class="col-4">
                                        <div class="widget-title" id="withLimit">Associate</div>
                                        <div class="widget-desc" style="   white-space: nowrap;">Designation</div>
                                    </div>
                                    <div class="col-4">
                                        <div class="widget-title" id="TOTALROI"><?php echo $userinfo->package_amount;?></div>
                                        <div class="widget-desc">Magic Account</div>
                                    </div>
                                    <div class="col-4">
                                        <div class="widget-title" style="color: #4cd964;" id="MemSts"><?php echo $userinfo->paid_status == 0 ? 'Free' : 'Active';?></div>
                                        <div class="widget-desc">Status</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END widget -->
                        <!-- BEGIN widget -->
                        <ul class="widget widget-list with-rounded-corner">
                            <li>
                                <a href="#" class="widget-list-container">
                                    <div class="widget-list-media square">
                                        <div class="img-container">
                                            <img src="<?php echo base_url('NewTheme/')?>assets/img/team.png" alt="" class="img-portrait">
                                        </div>
                                    </div>
                                    <div class="widget-list-content">
                                        <h4 class="widget-title text-ellipsis" id="Actived_On1">
                                            <b>Doj : </b><?php echo $userinfo->created_at;?>
                                        </h4>
                                        <!--	<div class="widget-desc" id="TotTeam1"></div>-->
                                    </div>
                                    <div class="widget-list-action">
                                        <div class="text-muted">
                                            <i class="ti-angle-right"></i>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="widget-list-container">
                                    <div class="widget-list-media square">
                                        <div class="img-container">
                                            <img src="<?php echo base_url('NewTheme/')?>assets/img/business.png" alt="" class="img-portrait">
                                        </div>
                                    </div>
                                    <div class="widget-list-content">
                                        <h4 class="widget-title text-ellipsis" id="DOJ">
                                            <b>Act. On : </b><?php echo $userinfo->paid_status == 0 ? 'Free' : $userinfo->topup_date;?>
                                        </h4>
                                        <!--<div class="widget-desc" id="Totbussiness"></div>-->
                                    </div>
                                    <div class="widget-list-action">
                                        <div class="text-muted">
                                            <i class="ti-angle-right"></i>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <!-- END widget -->
                    </div>
                    <!-- END col-3 -->
                    <!-- BEGIN col-3 -->
                    <div class="col-lg-4 col-sm-6 with-rounded-corner">
                        <!-- BEGIN section-title -->
                        <div class="section-title m-t-10">RECENT REFFERAL SIGNUP</div>
                        <!-- END section-title -->
                        <!-- BEGIN widget -->
                        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 330px;">
                            <div data-scrollbar="true" data-height="330px" class=" widget with-rounded-corner " data-init="true" style="overflow: hidden; width: auto; height: 330px;">
                                <ul class="widget widget-list  with-rounded-corner" id="people-list">
                                    <?PHP
                                    foreach($directs as $key => $direct){
                                        echo'<li>
                                            <a href="#" class="widget-list-container">
                                                <div class="widget-list-media">
                                                    <img src="'.base_url("NewTheme/assets/img/UserProfile_Pic.jpg").'" alt="">
                                                </div>
                                                <div class="widget-list-content">
                                                    <div class="widget-desc">'.$direct['user_id'].'</div>
                                                    <h4 class="widget-title text-ellipsis">'.$direct['name'].'</h4>
                                                    <ul class="widget-rating-star"></ul>
                                                    <ul class="widget-rating-star">
                                                        <li> '.$direct['created_at'].'</li>
                                                    </ul>
                                                </div>
                                                <div class="widget-list-action">
                                                    <div class="widget-price">'.($direct['paid_status'] == 1 ? "GREEN" : "FREE").'</div>
                                                </div>
                                            </a>
                                        </li>';
                                    }
                                    ?>
                                </ul>
                            </div>
                            <div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 263.68px;"></div>
                            <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
                        </div>
                        <!-- END widget -->
                    </div>
                    <!-- END col-3 -->
                    <!-- BEGIN col-3 -->
                    <div class="col-lg-4 col-sm-6 with-rounded-corner" style="display:none;">
                        <!-- BEGIN section-title -->
                        <div class="section-title m-t-10">NETWORK SUMMARY</div>
                        <!-- END section-title -->
                        <!-- BEGIN widget -->
                        <div class="widget  with-rounded-corner m-b-0">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-7">
                                        <h4 class="widget-title">Total Bussiness:
                                            <small id="Totbussiness">Rs. 17500</small>
                                        </h4>
                                    </div>
                                    <div class="col-5">
                                        <h4 class="widget-title">Total Team:
                                            <small id="TotTeam1">5</small>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-body bg-white-transparent-2 p-t-20 p-b-10">
                                <iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;" src="<?php echo base_url('NewTheme/')?>assets/img/#"></iframe>
                                <canvas id="barChart" height="128" width="341" style="display: block; width: 341px; height: 128px;"></canvas>
                            </div>
                        </div>
                        <!-- END widget -->
                        <!-- BEGIN widget -->
                        <ul class="widget widget-list with-rounded-corner ">
                            <li>
                                <div class="widget-list-container">
                                    <div class="widget-list-media icon icon-sm">
                                        <i class="ti-server bg-white-transparent-5"></i>
                                    </div>
                                    <div class="widget-list-content">
                                        Active

                                        <small id="ChartAct" style="color: #4cd964;font-weight: bolder;font-size: 13px;margin-left: 10px;">5</small>
                                    </div>
                                    <div class="widget-list-action">
                                        <div class="switcher switcher-success pull-left">
                                            <input type="checkbox" name="backup_checkbox" id="backup_checkbox" checked="" value="1">
                                            <label for="backup_checkbox"></label>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="widget-list-container">
                                    <div class="widget-list-media icon icon-sm">
                                        <i class="ti-shield bg-white-transparent-5"></i>
                                    </div>
                                    <div class="widget-list-content">
                                        In-Active
                                        <small id="ChartInAct" style="
                                               color: #f7ae0d;
                                               font-weight: bolder;
                                               font-size: 13px;
                                               margin-left: 10px;">0</small>
                                    </div>
                                    <div class="widget-list-action">
                                        <div class="switcher switcher-success pull-left">
                                            <input type="checkbox" name="firewall_checkbox" id="firewall_checkbox" checked="" value="1">
                                            <label for="firewall_checkbox"></label>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="widget-list-container">
                                    <div class="widget-list-media icon icon-sm">
                                        <i class="ti-email bg-white-transparent-5"></i>
                                    </div>
                                    <div class="widget-list-content">
                                        Block
                                        <small id="ChartBlock" style="
                                               color: #ff2e56;
                                               font-weight: bolder;
                                               font-size: 13px;
                                               margin-left: 10px;">0</small>
                                    </div>
                                    <div class="widget-list-action">
                                        <div class="switcher switcher-success pull-left">
                                            <input type="checkbox" name="webmail_checkbox" id="webmail_checkbox" checked="" value="1">
                                            <label for="webmail_checkbox"></label>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <!-- END widget -->
                    </div>
                    <!-- END col-3 -->

                </div>
                <!-- END row -->
            </div>


<?php //include_once'footer.php'; ?>
