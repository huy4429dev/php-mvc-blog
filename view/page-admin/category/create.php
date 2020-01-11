<?php include('./view/layouts/page-admin/header.php') ?>
<section class="content-header">
    <h1>
        Danh mục
        <small>category manage</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo (adminUrl('DashboardController', 'index')) ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Category</li>
    </ol>
</section>
<div class="content pt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-11">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Thêm mới danh mục</h3>

                        <div class="box-tools">
                            <a href="<?php echo (adminUrl('CategoryController', 'index')) ?>" class="btn btn-sm btn-secondary">Quay lại</a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <div class="row" style="margin:auto;padding-bottom:3rem">
                            <div class="col-md-12">
                                <form role="form" method="POST" action='<?php echo (adminUrl('CategoryController', 'store'))  ?>' enctype="multipart/form-data">
                                    <?php if ((Session::get('success'))) : ?>
                                        <div class="alert alert-success">Thêm mới danh mục thành công</div>
                                        <?php Session::forget('success') ?>

                                    <?php elseif ((Session::get('error'))): ?>
                                        <div class="alert alert-danger">Xảy ra lỗi nghiêm trọng</div>
                                        <?php Session::forget('error') ?>

                                    <?php endif ?>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Tiêu đề</label>
                                            <input required type="text" class="form-control" id="product-name" placeholder="Tiêu đề" name="name">
                                        </div>
                                        <div class="form-group">
                                            <label>Mô tả</label>
                                            <textarea required type="text" class="form-control" id="product-name" name="description"></textarea>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Thêm</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
</div>
<script>
    CKEDITOR.replace('noi_dung', {
        height: 300,
        filebrowserUploadUrl: './helper/Upload-Image.php'
    });
</script>
<?php include('./view/layouts/page-admin/footer.php') ?>