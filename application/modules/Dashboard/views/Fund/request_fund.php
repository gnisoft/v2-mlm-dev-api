<div id="content" class="content">
    <!-- BEGIN breadcrumb -->
    <!--<ul class="breadcrumb"><li class="breadcrumb-item"><a href="#">FORMS</a></li><li class="breadcrumb-item active">FORM WIZARS</li></ul>-->
    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <h2 class="page-titel">
        <spna style="">Wallet Request </spna> /  Fund Request
    </h2>
    <h1 class="page-header">
        Fund Request
        <small>You can send fund request and check fund request status.</small>
    </h1>
    <!-- END page-header -->
    <!-- BEGIN wizard -->
    <div id="rootwizard" class="wizard wizard-full-width">
        <!-- BEGIN wizard-header -->
        <div class="wizard-header">
            <ul class="nav nav-pills">
                <li>
                    <a id="tab1" href="#tabFundRequestForm" data-toggle="tab" class="active show">FUND REQUEST</a>
                </li>
                <li>
                    <a id="tab2" href="#tabFundRequestHistory" data-toggle="tab">FUND REQUEST STATUS</a>
                </li>

            </ul>
        </div>
        <!-- END wizard-header -->
        <!-- BEGIN wizard-form -->

        <div class="wizard-content tab-content">
            <!-- BEGIN tab-pane -->
            <div class="tab-pane active show" id="tabFundRequestForm">
                <!-- BEGIN row -->
                <div class="row">
                    <!-- BEGIN col-6 -->
                    <div class="col-md-11 offset-md-1">
                        <p class="desc m-b-20">Make sure to use a valid input, you'll need to verify it before you can submit request.</p>
                        <div class="form-group m-b-10">
                            <div class="row row-space-6">

                                <div class="col-md-6">
                                    <a href="Fund-Request.html?TB=tabFundRequestForm#" class="to-padding widget widget-stats">
                                        <div class="widget-stats-info mm-info">
                                            <div class="widget-stats-value to-fontsize" id="FBald58">$ 0</div>
                                            <div class="widget-desc">E-Wallet Balance </div>
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
                                        <label>Select Payment Mode</label>
                                        <?php
                                        echo form_dropdown('payment_method', array('BTC' => 'BTC', 'PayPal' => 'Paypal', 'Cash' => 'Cash'), '', array('class' => 'form-control'));
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Amount</label>
                                        <?php
                                        echo form_input(array('type' => 'number', 'name' => 'amount', 'class' => 'form-control'));
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
            <!-- BEGIN tab-pane -->
            <div class="tab-pane" id="tabFundRequestHistory">
                <div class="panel panel-default">
                    <div class="table-responsive">
                        <div id="datatables-default_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="dataTables_length" id="datatables-default_length">
                                        <label>Show
                                            <select name="datatables-default_length" aria-controls="datatables-default" class="form-control form-control-sm">
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                                <option value="200">200</option>
                                            </select> entries
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-4 text-center">
                                    <div class="dt-buttons btn-group">
                                        <a class="btn btn-default buttons-copy buttons-html5 btn-sm" tabindex="0" aria-controls="datatables-default" href="Fund-Request.html?TB=tabFundRequestForm#">
                                            <span>Copy</span>
                                        </a>
                                        <a class="btn btn-default buttons-csv buttons-html5 btn-sm" tabindex="0" aria-controls="datatables-default" href="Fund-Request.html?TB=tabFundRequestForm#">
                                            <span>CSV</span>
                                        </a>
                                        <a class="btn btn-default buttons-pdf buttons-html5 btn-sm" tabindex="0" aria-controls="datatables-default" href="Fund-Request.html?TB=tabFundRequestForm#">
                                            <span>PDF</span>
                                        </a>
                                        <a class="btn btn-default buttons-print btn-sm" tabindex="0" aria-controls="datatables-default" href="Fund-Request.html?TB=tabFundRequestForm#">
                                            <span>Print</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div id="datatables-default_filter" class="dataTables_filter">
                                        <label>Search:
                                            <input type="search" class="form-control form-control-sm" placeholder="" aria-controls="datatables-default">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div id="datatables-default_processing" class="dataTables_processing card" style="display: none;">Processing...</div>
                            <table class="table table-bordered table-striped dataTable" id="tableView">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User ID</th>
                                        <th>Amount</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Remark</th>
                                        <th>Type</th>
                                        <th>CreatedAt</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($requests as $key => $request) {
                                        ?>
                                        <tr>
                                            <td><?php echo ($key + 1) ?></td>
                                            <td><?php echo $request['user_id']; ?></td>
                                            <td>$ <?php echo $request['amount']; ?></td>
                                            <td><img src="<?php echo base_url('uploads/' . $request['image']); ?>" height="100px" width="100px"></td>
                                            <td><?php
                                                if ($request['status'] == 0) {
                                                    echo'<span class="btn btn-primary">Pending</span>';
                                                } elseif ($request['status'] == 1) {
                                                    echo'<span class="btn btn-success">Approved</span>';
                                                } elseif ($request['status'] == 2) {
                                                    echo'<span class="btn btn-danger">Rejected</span>';
                                                }
                                                ?></td>
                                            <td><?php echo $request['payment_method']; ?></td>
                                            <td><?php echo $request['remarks']; ?></td>
                                            <td><?php echo $request['created_at']; ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
<!--                            <div class="bottom">
                                <div class="dataTables_info" id="datatables-default_info" role="status" aria-live="polite">Showing 0 to 0 of 0 entries</div>
                                <div class="dataTables_paginate paging_full_numbers" id="datatables-default_paginate">
                                    <ul class="pagination">
                                        <li class="paginate_button page-item first disabled" id="datatables-default_first">
                                            <a href="Fund-Request.html?TB=tabFundRequestForm#" aria-controls="datatables-default" data-dt-idx="0" tabindex="0" class="page-link">First</a>
                                        </li>
                                        <li class="paginate_button page-item previous disabled" id="datatables-default_previous">
                                            <a href="Fund-Request.html?TB=tabFundRequestForm#" aria-controls="datatables-default" data-dt-idx="1" tabindex="0" class="page-link">Previous</a>
                                        </li>
                                        <li class="paginate_button page-item next disabled" id="datatables-default_next">
                                            <a href="Fund-Request.html?TB=tabFundRequestForm#" aria-controls="datatables-default" data-dt-idx="2" tabindex="0" class="page-link">Next</a>
                                        </li>
                                        <li class="paginate_button page-item last disabled" id="datatables-default_last">
                                            <a href="Fund-Request.html?TB=tabFundRequestForm#" aria-controls="datatables-default" data-dt-idx="3" tabindex="0" class="page-link">Last</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>-->
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </div>
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
