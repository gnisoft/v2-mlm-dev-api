<?php include_once'header.php'; ?>
<script
    src="https://www.paypal.com/sdk/js?client-id=ATWYJH57rO1BhOQJIaU_2MowAyuZIThp3sOPCSRs9hQgjLVirSMHBxTTWNdPef80QZbymV8zsAQwXt7m"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.
</script>
<div id="content" class="content">
    <!-- BEGIN breadcrumb -->
    <!--<ul class="breadcrumb"><li class="breadcrumb-item"><a href="#">FORMS</a></li><li class="breadcrumb-item active">FORM WIZARS</li></ul>-->
    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <h2 class="page-titel">
        <spna style="">Activate your Account</span>
    </h2>
    <h1 class="page-header">
        <spna style="">  Wallet balance ($<?php echo $wallet['wallet_balance']; ?>)
            <small>You can see fund requests list and check fund request status.</small>
    </h1>
    <!-- END page-header -->
    <!-- BEGIN wizard -->
    <div id="rootwizard" class="wizard wizard-full-width">
        <!-- BEGIN wizard-header -->

        <!-- END wizard-header -->
        <!-- BEGIN wizard-form -->

        <div class="wizard-content tab-content row">
            <!--            <div class="col-md-4">
                            <form id="BtcForm" style="display:block;" action="https://www.coinpayments.net/index.php"  method="post" style="text-align:center;">
                                <div class="form-row">
                                    <div class="col-md-4">
                                        <label for="amount" style="color:#fff;">Deposited Amount <span class="text-red">*</span></label>
                                        <input type="hidden" name="amountf" value="100" id="Payamount" required="" class="form-control">
                                        <div class="error"></div>
                                    </div>
                                </div>
                                <input type="hidden" name="user_id" value="<?php echo $user_info->user_id; ?>">
                                <input type="hidden" name="cmd" value="_pay">
                                <input type="hidden" name="reset" value="1">
                                <input type="hidden" name="want_shipping" value="0">
                                <input type="hidden" name="merchant" value="d9481e195615de09cd4d4857104a52ed">
                                <input type="hidden" name="currency" value="USD">
                                <input type="hidden" name="item_name" value="Pins Purchase">
                                <input type="hidden" name="user_id" value="<?php echo $user_info->user_id; ?>">
                                <input type="hidden" name="first_name" value="<?php echo $user_info->user_id; ?>">
                                <input type="hidden" name="last_name" value="<?php echo $user_info->name; ?>">
                                <input type="hidden" name="email" value="<?php echo $user_info->email; ?>">
                                <input type="hidden" name="allow_extra" value="1">
                                <input type="image" src="https://www.coinpayments.net/images/pub/buynow-white.png" alt="Buy Now with CoinPayments.net"> 
            
                                <input type="hidden" name="success_url" value="<?php echo base_url('Dashboard/payment_response/success'); ?>">
                                <input type="hidden" name="cancel_url" value="<?php echo base_url('Dashboard/payment_response/failure'); ?>">
                                <div class="col-md-12 text-center">  <img src="payment-mode.jpeg" class="img-responsive" style="max-width:100%"></div> 
                                <div class="form-row text-center">
            
                                </div>
                            </form>  
                        </div>-->
            <!--            <div class="col-md-4">
                            <div class="contact-form">
            
                                <p class="notice error"><?= $this->session->flashdata('error_msg') ?></p><br/>
                                <p class="notice error"><?= $this->session->flashdata('success_msg') ?></p><br/>
            
            <?php
            $package = $packages[0];
            echo form_open(base_url('Dashboard/paypal/create_payment_with_paypal'));
            ?>
                                <fieldset>
                                    <input type="hidden" name="user_id" value="<?php echo $user_info->user_id; ?>">
                                    <input title="item_name" name="item_name" type="hidden" value="<?php echo $package['title'] ?>">
                                    <input title="item_number" name="item_number" type="hidden" value="<?php echo $package['id'] ?>">
                                    <input title="item_description" name="item_description" type="hidden" value="<?php echo $package['title'] ?>">
                                    <input title="item_tax" name="item_tax" type="hidden" value="1">
                                    <input title="item_price" name="item_price" type="hidden" value="<?php echo $package['price'] ?>">
                                    <input title="details_tax" name="details_tax" type="hidden" value="0">
                                    <input title="details_subtotal" name="details_subtotal" type="hidden" value="2<?php //echo $package['price']                 ?>">
                                    <input type="hidden" name="notify_url" value="<?php echo base_url('Dashboard/Paypal/CallBack/' . $user_info->user_id); ?>" />
            
                                    <div class="form-group">
                                        <div class="col-sm-offset-5">
                                            <button  type="submit"  class="btn btn-success">Pay Now</button>
                                        </div>
                                    </div>
                                </fieldset>
            <?php echo form_close(); ?>
                            </div>
                            
                        </div>-->
        </div>
        <div class="wizard-content tab-content">
            <!-- BEGIN tab-pane -->
            <div class="tab-pane active show" id="tabFundRequestForm">
                <!-- BEGIN row -->
                <div class="col-md-12">
                    <!-- BEGIN col-6 -->
                    <?php echo form_open('', array('id' => 'TopUpForm')); ?>
                    <h3 class="text-danger"><?php echo $this->session->flashdata('message'); ?></h3>
                    <div class="form-group">
                        <label>Choose Package</label>
                        <select class="form-control" name="package_id" id="PackageId">
                            <?php
                            foreach ($packages as $key => $package) {
                                echo'<option value="' . $package['id'] . '" data-price="' . $package['price'] . '">' . $package['title'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="payment_method" id="payment_method">
                            <option value="paypal">PayPal</option>
                            <option value="e_wallet">E-wallet</option>
                            <option value="btc">BTC</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>User ID</label>
                        <input type="text" class="form-control" id="user_id" name="user_id" value="<?php echo set_value('user_id'); ?>" placeholder="User ID" style="max-width: 400px"/>
                        <span class="text-danger"><?php echo form_error('user_id') ?></span>
                        <span class="text-danger" id="errorMessage"></span>
                    </div>
                    <div class="form-group" id="SaveBtn" style="display:none;">
                        <button type="submit" name="save" class="btn btn-success" />Activate</button>
                    </div>
                    <div class="form-group">
                        <label></label>
                        <input type="button" name="updateProfileBtn" value="Pay With BTC" id="PayBtcBtn"  style="display:none;" class="btn btn-primary">
                    </div>
                    <?php echo form_close(); ?>
                    <div id="paypal-button-container" style="display:block;"></div>
                    <!-- END col-6 -->
                    <form id="BtcForm" style="display:none;" action="https://www.coinpayments.net/index.php"  method="post" style="text-align:center;">
                        <div class="form-row">
                            <div class="col-md-4">
                                <label for="amount" style="color:#fff;">Deposited Amount <span class="text-red">*</span></label>
                                <input type="hidden" name="amountf" value="100" id="Payamount" required="" class="form-control">
                                <div class="error"></div>
                            </div>
                        </div>
                        <input type="hidden" name="user_id" value="<?php echo $user_info->user_id; ?>">
                        <input type="hidden" name="cmd" value="_pay">
                        <input type="hidden" name="reset" value="1">
                        <input type="hidden" name="want_shipping" value="0">
                        <input type="hidden" name="merchant" value="d9481e195615de09cd4d4857104a52ed">
                        <input type="hidden" name="currency" value="USD">
                        <input type="hidden" name="item_name" value="Pins Purchase">
                        <input type="hidden" name="user_id" value="<?php echo $user_info->user_id; ?>">
                        <input type="hidden" name="first_name" value="<?php echo $user_info->user_id; ?>">
                        <input type="hidden" name="last_name" value="<?php echo $user_info->name; ?>">
                        <input type="hidden" name="email" value="<?php echo $user_info->email; ?>">
                        <input type="hidden" name="allow_extra" value="1">
                        <!-- <input type="image" src="https://www.coinpayments.net/images/pub/buynow-white.png" alt="Buy Now with CoinPayments.net"> -->

                        <input type="hidden" name="success_url" value="<?php echo base_url('Dashboard/payment_response/success'); ?>">
                        <input type="hidden" name="cancel_url" value="<?php echo base_url('Dashboard/payment_response/failure'); ?>">
                        <!-- <div class="col-md-12 text-center">  <img src="payment-mode.jpeg" class="img-responsive" style="max-width:100%"></div> -->
                        <div class="form-row text-center">

                        </div>
                    </form>  
                </div>
                <!-- END row -->
            </div>
            <!-- END tab-pane -->
            <!-- BEGIN tab-pane -->

        </div>
        <!-- END wizard-content -->

        <!-- END wizard-form -->
    </div>
    <!-- END wizard -->
</div>






<?php include_once'footer.php'; ?>
<script>
    paypal.Buttons({
        createOrder: function (data, actions) {
            // This function sets up the details of the transaction, including the amount and line item details.
            return actions.order.create({
                purchase_units: [{
                        amount: {
                            value: '<?php echo $package['price']; ?>'
                        }
                    }]
            });
        },
        onApprove: function (data, actions) {
            // This function captures the funds from the transaction.
            return actions.order.capture().then(function (details) {
                console.log(details);
                var user_id = $('#user_id').val();
                var transaction_id = details.id;
                var url = '<?php echo base_url("Dashboard/paypal_transaction_status/"); ?>' + user_id + '/' + transaction_id;
                $.get(url, function (res) {
                    console.log(res)
                    alert(res.message)
                    if (res.success == 1) {
                        location.reload();
                    }
                }, 'json')
                // This function shows a transaction success message to your buyer.
//                alert('Transaction completed by ' + details.payer.name.given_name);
            });
        }
    }).render('#paypal-button-container');
</script>
<script>
    $(document).on('blur', '#user_id', function () {
        var user_id = $('#user_id').val();
        if (user_id != '') {
            var url = '<?php echo base_url("Dashboard/User/check_topup_user/") ?>' + user_id;
            $.get(url, function (res) {
                if (res.success == 1) {
                    $('#user_id').val(user_id);
//                    $('#paypal-button-container').css('display', 'block')
                } else {
//                    $('#paypal-button-container').css('display', 'none')
                }
                $('#errorMessage').html(res.message);
            }, 'json')
        }
    })
    $(document).on('submit', '#TopUpForm', function () {
        if (confirm('Are You Sure U want to Topup This Account')) {
            yourformelement.submit();
        } else {
            return false;
        }
    })
    $(document).on('change', '#PackageId', function () {
        var package_price = parseInt($(this).children("option:selected").data('price'));
        $('#Payamount').val(package_price);
        // alert(package_price)
    })
    $(document).on('change', '#payment_method', function () {
        var val = $(this).val();
        $('#SaveBtn').css('display', 'none');
        $('#PayBtcBtn').css('display', 'none');
        $('#paypal-button-container').css('display', 'none');
        if (val == 'e_wallet') {
            $('#SaveBtn').css('display', 'block');
        } else if (val == 'btc') {
            $('#PayBtcBtn').css('display', 'block');
        } else if (val == 'paypal') {
            $('#paypal-button-container').css('display', 'block');
        }
    })
    $(document).on('click', '#PayBtcBtn', function (e) {
        var formData = $(this).serialize();
        var user_id = $('#user_id').val();
        console.log(formData);
        if (user_id == '') {
            alert('Please Fill User ID');
            return;
        }
        $('#BtcForm').submit();
    })
</script>
