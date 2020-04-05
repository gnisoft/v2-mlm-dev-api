<div id="content" class="content">
    <!-- BEGIN breadcrumb -->
    <!--<ul class="breadcrumb"><li class="breadcrumb-item"><a href="#">FORMS</a></li><li class="breadcrumb-item active">FORM WIZARS</li></ul>-->
    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <h2 class="page-titel">
        <spna style="">Network Commisions </spna> /  Submit Bill
    </h2>
    <h1 class="page-header">
        Submit Bill
        <small></small>
    </h1>
    <!-- END page-header -->
    <!-- BEGIN wizard -->
    <div id="rootwizard" class="wizard wizard-full-width">

        <div class="wizard-content tab-content">
            <!-- BEGIN tab-pane -->
            <div class="tab-pane active show" id="tabFundRequestForm">
                <!-- BEGIN row -->
                <div class="row">
                    <!-- BEGIN col-6 -->
                    <div class="col-md-11 offset-md-1">
                        <!-- <p class="desc m-b-20">Make sure to use a valid input, you'll need to verify it before you can submit request.</p> -->
                        <div class="form-group m-b-10">
                            <div class="row row-space-6">

                                <div class="col-md-6">
                                    <a href="Fund-Request.html?TB=tabFundRequestForm#" class="to-padding widget widget-stats">
                                        <div class="widget-stats-info mm-info">
                                            <!-- <div class="widget-stats-value to-fontsize" id="FBald58">$ <?php //echo $balance['sum'];?></div> -->
                                            <!-- <div class="widget-desc">E-Wallet Balance </div> -->
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-b-10">
                            <?php echo form_open_multipart(); ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <h2><?php echo $this->session->flashdata('message'); ?></h2>
                                    <div class="form-group">
                                        <label>Purchase Description</label>
                                        <?php
                                        echo form_textarea(array('class' => 'form-control','name' => 'purchase_description','rows'=> '5','cols' => '10',));
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Amount</label>
                                        <?php
                                        echo form_input(array('type' => 'number', 'name' => 'amount', 'class' => 'form-control'));
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Date</label>
                                        <?php
                                        echo form_input(array('type' => 'date', 'name' => 'purchase_date', 'class' => 'form-control'));
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Upload Proof Here</label>
                                        <?php
                                        echo form_input(array('type' => 'file', 'name' => 'userfile', 'class' => 'form-control', 'id' => 'payment_slip', 'size' => 20));
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <?php
                                        echo form_input(array('type' => 'submit', 'class' => 'btn btn-success pull-right', 'name' => 'fundbtn', 'value' => 'Request'));
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <img src="<?php echo base_url('uploads/no_image.png'); ?>" title="Payment Slip" id="slipImage" style="width: 100%;">
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </div>




                    </div>
                    <!-- END col-6 -->
                </div>
                <!-- END row -->
            </div>
            <!-- END tab-pane -->
        </div>
        <!-- END wizard-content -->

        <!-- END wizard-form -->
    </div>
    <!-- END wizard -->
</div>






<?php $this->load->view('footer'); ?>
<script>
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#slipImage').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#payment_slip").change(function () {
        readURL(this);
    });
    $(document).on('submit', '#paymentForm', function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $('#savebtn').css('display', 'none');
        $('#uploadnot').css('display', 'block');
        var action = $(this).attr('action');
        $.ajax({
            url: action,
            type: "POST",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data)
            {
                data = JSON.parse(data);
                if (data.success === 1)
                {
                    toastr.success(data.message);
//                    swal("Thank You", data.message);
                    //window.location = "https://soarwaylife.in/Dashboard/request_money.php" + data.message;
                    location.reload();
                } else {
                    toastr.error(data.message);
                }
                $('#savebtn').css('display', 'block');
                $('#uploadnot').css('display', 'none');
            }
        });
    });


</script>
