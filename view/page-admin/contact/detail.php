<?php include('./view/layouts/page-admin/header.php') ?>
<section class="content-header">
    <h1>
        Liên hệ
        <small>contact manage</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo (adminUrl('DashboardController', 'index')) ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Contact</li>
    </ol>
</section>
<div class="content pt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-11">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Chi tiết liên hệ </h3> <span>(<?php echo($contact->created_at) ?>)</span>

                        <div class="box-tools">
                            <a href="<?php echo (adminUrl('ContactController', 'index')) ?>" class="btn btn-sm btn-secondary">Quay lại</a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <div class="row" style="margin:auto;padding-bottom:3rem">
                            <div class="col-md-12">
                                <form role="form" method="POST">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Người gửi</label>
                                            <input required type="text" class="form-control" id="product-name" placeholder="Tiêu đề" name="name" value="<?php echo($contact->full_name) ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input required type="text" class="form-control" id="product-name" placeholder="Tiêu đề" name="name" value="<?php echo($contact->email) ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input required type="text" class="form-control" id="product-name" placeholder="Tiêu đề" name="name" value="<?php echo($contact->phone) ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>Chủ đề</label>
                                            <input required type="text" class="form-control" id="product-name" placeholder="Tiêu đề" name="name" value="<?php echo($contact->subject) ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>Nội dung</label>
                                            <textarea disabled required type="text" class="form-control" id="product-name" name="description" rows="10" ><?php echo($contact->content) ?></textarea>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

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