<?php
include'header.php';

function is_image($path) {
    $a = getimagesize($path);
    $image_type = $a[2];

    if (in_array($image_type, array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_BMP))) {
        return true;
    }
    return false;
}
?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> Bill Requests </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"> Bill Requests</li>
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
                            <table class="table table-hover" id="tableView" data-date_col="4">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User ID</th>
                                        <th>Amount</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Purchase Description</th>
                                        <th>Remark</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($requests as $key => $request) {
                                        // pr($request);
                                        ?>
                                        <tr>
                                            <td><?php echo ($key + 1) ?></td>
                                            <td><?php echo $request['user_id']; ?></td>
                                            <td><?php echo $request['amount']; ?></td>
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
                                            <td><?php echo $request['purchase_description']; ?></td>
                                            <td><?php echo $request['remarks']; ?></td>
                                            <td><?php echo date("m/d/Y", strtotime($request['created_at'])); ?></td>
                                            <td><a href="<?php echo base_url('Admin/Management/update_bill_request/' . $request['id']); ?>" class="btn btn-info">View</a></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
</div>

<?php include'footer.php' ?>