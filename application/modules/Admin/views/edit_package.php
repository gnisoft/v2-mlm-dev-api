<?php include'header.php' ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> Edit <?php echo $package['title']; ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"> Edit <?php echo $package['title']; ?></li>
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
                                <label>Package Title</label>
                                <?php
                                echo form_input(array('type' => 'text', 'class' => 'form-control', 'name' => 'title', 'required' => 'required', 'value' => $package['title']));
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Package Description</label>
                                <?php
                                echo form_textarea(array('class' => 'form-control', 'name' => 'description', 'cols' => 3, 'rows' => 3, 'required' => 'required', 'value' => $package['description']));
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Package Price ($)</label>
                                <?php
                                echo form_input(array('type' => 'number', 'class' => 'form-control', 'name' => 'price', 'required' => 'required', 'value' => $package['price']));
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Direct Commission (%)</label>
                                <?php
                                echo form_input(array('type' => 'number', 'class' => 'form-control', 'name' => 'direct_income', 'required' => 'required', 'value' => $package['direct_income']));
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Level Commission (%)</label>
                                <?php
                                echo form_input(array('type' => 'number', 'class' => 'form-control', 'name' => 'level_income', 'required' => 'required', 'value' => $package['level_income']));
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
