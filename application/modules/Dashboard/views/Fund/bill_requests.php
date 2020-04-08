<?php
$this->load->view('header');

function is_image($path) {
    $a = getimagesize($path);
    $image_type = $a[2];

    if (in_array($image_type, array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_BMP))) {
        return true;
    }
    return false;
}
?>
<div id="content" class="content">
    <!-- BEGIN breadcrumb -->
    <!--<ul class="breadcrumb"><li class="breadcrumb-item"><a href="#">FORMS</a></li><li class="breadcrumb-item active">FORM WIZARS</li></ul>-->
    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <h2 class="page-titel">
        <spna style="">Network Commisions </spna> /  Submitted Bills
    </h2>
    <h1 class="page-header">
        Submitted Bills
        <small></small>
    </h1>
    <!-- END page-header -->
    <!-- BEGIN wizard -->
    <div id="rootwizard" class="wizard wizard-full-width">
        <!-- BEGIN wizard-header -->

        <!-- END wizard-header -->
        <!-- BEGIN wizard-form -->

        <div class="wizard-content tab-content">
            <!-- BEGIN tab-pane -->
            <div class="tab-pane active show" id="tabFundRequestForm">
                <!-- BEGIN row -->
                <div class="row">
                    <!-- BEGIN col-6 -->
                    <div class="col-md-12">
                        <!-- <p class="desc m-b-20">Make sure to use a valid input, you'll need to verify it before you can submit request.</p> -->
                        <div class="form-group m-b-10">

                        </div>
                        <div class="form-group m-b-10">
                            <table class="table table-bordered table-striped dataTable" id="tableView">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Description</th>
                                        <th>Amount</th>
                                        <th>Proof</th>
                                        <th>Status</th>
                                        <th>Remark</th>
                                        <th>Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($requests as $key => $request) {
                                        ?>
                                        <tr>
                                            <td><?php echo ($key + 1) ?></td>
                                            <td><?php echo $request['purchase_description']; ?></td>
                                            <td>$ <?php echo $request['amount']; ?></td>
                                            <td>
                                                <?php
                                                if (is_image(base_url('uploads/' . $request['proof']))) {
                                                    echo'<img src="' . base_url('uploads/' . $request['proof']) . '" height="100px" width="100px">';
                                                } else {
                                                    echo'<a href="' . base_url('uploads/' . $request['proof']) . '">View</a>';
                                                }
                                                ?>

                                            </td>
                                            <td><?php
                                                if ($request['status'] == 0) {
                                                    echo'<span class="btn btn-primary">Pending</span>';
                                                } elseif ($request['status'] == 1) {
                                                    echo'<span class="btn btn-success">Approved</span>';
                                                } elseif ($request['status'] == 2) {
                                                    echo'<span class="btn btn-danger">Rejected</span>';
                                                }
                                                ?></td>
                                            <td><?php echo $request['remarks']; ?></td>
                                            <td><?php echo $request['created_at']; ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>




                    </div>
                    <!-- END col-6 -->
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







<?php
$this->load->view('footer');
?>
