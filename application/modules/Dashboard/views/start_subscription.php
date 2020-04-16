<?php include_once'header.php'; ?>
<script
    src="https://www.paypal.com/sdk/js?client-id=ATWYJH57rO1BhOQJIaU_2MowAyuZIThp3sOPCSRs9hQgjLVirSMHBxTTWNdPef80QZbymV8zsAQwXt7m&vault=true">
</script>

<div id="content" class="content">
    <!-- BEGIN breadcrumb -->
    <!--<ul class="breadcrumb"><li class="breadcrumb-item"><a href="#">FORMS</a></li><li class="breadcrumb-item active">FORM WIZARS</li></ul>-->
    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <h2 class="page-titel">
        <spna style="">Monthly Subscription your Account</span>
    </h2>
    <h1 class="page-header">
        <spna style="">
            <small>You can see Subscription requests list and check fund request status and also cancel anytime.</small>
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
                  <?php
                  if (empty($membership))
                      echo '<div id="paypal-button-container"></div>';
                  else {
                      echo '<span class="" style="font-size:20px;"></b>Congratulations your monthly $20 subscription Has been activated sucessfully.
                          You can cancel that anytime by paypal. </b></span><br>';
                      echo'Order ID : ' . $membership['orderID'] . '<br>';
                      echo'Subscription ID : ' . $membership['subscriptionID'] . '<br>';
                  }
                  ?>

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

        createSubscription: function (data, actions) {

            return actions.subscription.create({

                'plan_id': 'P-9UE10233SJ824280VL2KA25A'

            });

        },

        onApprove: function (data, actions) {
            console.log(data)
            console.log(actions)
            var url = '<?php echo base_url('Dashboard/'); ?>start_monthly_subscription/' + data.orderID + '/' + data.subscriptionID;
            $.get(url, function (res) {
                alert(res.message)
                if (res.success == 1) {
                    location.reload();
                }
            }, 'json')
//            alert('You have successfully created subscription ' + data.subscriptionID);

        }


    }).render('#paypal-button-container');
</script>
