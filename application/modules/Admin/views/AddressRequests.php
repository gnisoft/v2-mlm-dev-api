<?php include'header.php' ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?php echo $header; ?>  </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><?php echo $header; ?> </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-3">
                                    Minimum Date:<input name="min" id="min" type="text">
                                </div>
                                <div class="col-md-3">
                                    Maximum Date:<input name="max" id="max" type="text">
                                </div>
                                <div class="col-md-3">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover"  id="tableView" data-date_col="11">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User ID</th>
                                        <th>Acount Type</th>
                                        <th>Bank Name</th>
                                        <th>Account Number</th>
                                        <th>Name on Account </th>
                                        <th>International Routing Number</th>
                                        <th>BIC/SWIFT Code</th>
                                        <th>Tax/BOR Identification Number </th>
                                        <th>Government Issued ID	</th>
                                        <th>Passport</th>
                                        <th>Other ID proof</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($users as $key => $user) {
//                                        pr($user);
                                        ?>
                                        <tr>
                                            <td><?php echo ($key + 1) ?></td>
                                            <td><?php echo $user['user_id']; ?></td>
                                            <td><?php echo $user['account_type']; ?></td>
                                            <td><?php echo $user['bank']['bank_name'] . '(' . $user['bank']['country'] . ')'; ?></td>
                                            <td><?php echo $user['bank_account_number']; ?></td>
                                            <td><?php echo $user['account_holder_name']; ?></td>
                                            <td><?php echo $user['internation_routing_number']; ?></td>
                                            <td><?php echo $user['ifsc_code']; ?></td>
                                            <td><?php echo $user['pan']; ?></td>
                                            <td><img src="<?php echo base_url('uploads/' . $user['id_proof']); ?>" data-image="<?php echo base_url('uploads/' . $user['id_proof']); ?>" style="cursor:pointer;" width="150px" class="img-responsive zmimg"></td>
                                            <td><img src="<?php echo base_url('uploads/' . $user['id_proof2']); ?>" data-image="<?php echo base_url('uploads/' . $user['id_proof2']); ?>" style="cursor:pointer;" width="150px" class="img-responsive zmimg"></td>
                                            <td><img src="<?php echo base_url('uploads/' . $user['id_proof3']); ?>" data-image="<?php echo base_url('uploads/' . $user['id_proof3']); ?>" style="cursor:pointer;" width="150px" class="img-responsive zmimg"></td>
                                            <td>
                                                <?php
                                                if ($user['kyc_status'] != 2) {
                                                    echo '<button class="btn btn-success apvbtn" data-id="' . $user['id'] . '" data-status="2">Approve</button>';
                                                    echo '<button class="btn btn-danger apvbtn" data-id="' . $user['id'] . '" data-status="3">Reject</button>';
                                                }
                                                ?>

                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
                            <?php
                            echo $this->pagination->create_links();
                            ?>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Proof Display</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="" id="mainImage" style="width: 100%;">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php include'footer.php' ?>

<script>
    $(document).on('click', '.apvbtn', function () {
        var id = $(this).data('id');
        var status = $(this).data('status')
        var url = '<?php echo base_url("Admin/Withdraw/ApproveUserAddressRequest/"); ?>' + id + '/' + status;
        var r = confirm("Are You Sure to Approve this User for Withdraw");
        if (r == true) {
            $.get(url, function (res) {
                alert(res.message)
                if (res.success == 1)
                    location.reload()
                console.log(res);
            }, 'json')
        }

    })
    $(document).on('click', '.zmimg', function () {
        var image = $(this).data('image');
        $('#mainImage').attr('src', image);
        $('#exampleModal').modal('show');
    })

</script>
