<?php include'header.php' ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">All users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">All users</li>
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
                            <table class="table table-hover" id="tableView" data-date_col="11">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User ID</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Postion</th>
                                        <th>Password</th>
                                        <th>Transaction Pin</th>
                                        <th>Sponsor ID</th>
                                        <th>Package</th>
                                        <th>E-wallet</th>
                                        <th>Income</th>
                                        <th>Joining Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($users as $key => $user) {
                                        ?>
                                        <tr>
                                            <td><?php echo ($key + 1) ?></td>
                                            <td><?php echo $user['user_id']; ?></td>
                                            <td><?php echo $user['name']; ?></td>
                                            <td><?php echo $user['phone']; ?></td>
                                            <td><?php echo $user['position']; ?></td>
                                            <td><?php echo $user['password']; ?></td>
                                            <td><?php echo $user['master_key']; ?></td>
                                            <td><?php echo $user['sponser_id']; ?></td>
                                            <td><?php echo $user['package_amount']; ?></td>
                                            <td><?php echo $user['e_wallet']['e_wallet']; ?></td>
                                            <td><?php echo $user['income_wallet']['income_wallet']; ?></td>
                                            <td><?php
                                                echo date("m/d/Y", strtotime($user['created_at']));
                                                ?></td>
                                            <td>
                                                <a href="<?php echo base_url('Admin/Management/user_login/' . $user['user_id']); ?>" target="_blank">Login</a>/
                                                <a href="<?php echo base_url('Admin/Settings/EditUser/' . $user['user_id']); ?>" target="_blank">Edit</a>/
                                                <?php
                                                if ($user['disabled'] == 0)
                                                    echo'<a class="blockUser" data-status="1" data-user_id="' . $user['user_id'] . '">Block Now</a>';
                                                else
                                                    echo'<a class="blockUser" data-status="0" data-user_id="' . $user['user_id'] . '">UnBlock Now</a>';
                                                ?>

                                            </td>
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
<script>
    $(document).on('click', '.blockUser', function () {
        var status = $(this).data('status');
        var user_id = $(this).data('user_id');
        var url = "<?php echo base_url('Admin/Management/blockStatus/'); ?>" + user_id + '/' + status;
        $.get(url, function (res) {
            alert(res.message)
            if (res.success == 1)
                location.reload()
        }, 'json')
    })
</script>