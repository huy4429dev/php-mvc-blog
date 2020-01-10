<?php include('./view/layouts/page-admin/header.php') ?>
<section class="content-header">
    <h1>
        Bài viết
        <small>post manage</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo (adminUrl('DashboardController', 'index')) ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Post</li>
    </ol>
</section>
<div class="content pt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-11">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Thêm mới bài viết</h3>

                        <div class="box-tools">
                            <a href="<?php echo (adminUrl('PostController', 'index')) ?>" class="btn btn-sm btn-secondary">Quay lại</a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <div class="row" style="margin:auto;padding-bottom:3rem">
                            <div class="col-md-11">
                                <form role="form" method="POST" action='create.php' enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Tiêu đề</label>
                                            <input type="text" class="form-control" id="product-name" placeholder="Tiêu đề" name="tieu_de">
                                        </div>
                                        <div class="form-group">
                                            <label>Danh mục</label>
                                            <select class="form-control" name="danh_muc_blog_id" id="">
                                                <?php foreach ($dataDanhmuc as $danhmuc) : ?>
                                                    <option value="<?php echo $danhmuc->id ?>"><?php echo $danhmuc->ten_danh_muc ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Đoạn trích</label>
                                            <textarea type="text" class="form-control" id="product-name" name="doan_trich"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Nội dung</label>
                                            <textarea name="noi_dung" id="editor1" cols="30" rows="10"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Ảnh đại diện</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="hinhanh">
                                                </div>
                                            </div>
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