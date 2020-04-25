<?php include'header.php' ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> Fund Requests </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"> Fund Requests</li>
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
                            <table class="table table-hover" id="tableView" data-date_col="5">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User ID</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Remark</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($requests as $key => $request) {
                                        ?>
                                        <tr>
                                            <td><?php echo ($key + 1) ?></td>
                                            <td><?php echo $request['user_id']; ?></td>
                                            <td><?php echo $request['amount']; ?></td>
                                            <td><?php echo $request['amount'] > 0 ? '<span class="text-success">Credit</span>' : '<span class="text-danger">Debit</span>'; ?></td>
                                            <td><?php echo $request['remark']; ?></td>
                                            <td><?php echo date("m/d/Y", strtotime($request['created_at'])); ?></td>
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