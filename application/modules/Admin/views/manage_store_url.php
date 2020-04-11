<?php include'header.php' ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> Manage Store Url</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">  Manage Store Url</li>
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
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <h3><?php echo $this->session->flashdata('message'); ?></h3>
                            <?php echo form_open(); ?>
                            <div class="form-group">
                                <label>Store Url</label>
                                <?php
                                echo form_input(array('type' => 'url', 'class' => 'form-control', 'name' => 'url', 'required' => 'required', 'value' => $store_url['url']));
                                ?>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success pull-right">Update</button>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                        <!-- /.card-body -->
                        <!-- <iframe src="<?php //echo $task['link'] ?>"><iframe> -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
</div>
<?php include'footer.php' ?>
