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
                        <h3 class="box-title">Cập nhật bài viết</h3>

                        <div class="box-tools">
                            <a href="<?php echo (adminUrl('PostController', 'index')) ?>" class="btn btn-sm btn-secondary">Quay lại</a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <div class="row" style="margin:auto;padding-bottom:3rem">
                            <div class="col-md-12">
                                <form role="form" method="POST" action='<?php echo (adminUrl('PostController', "update&id=$post->id"))  ?>' enctype="multipart/form-data">
                                    <?php if ((Session::get('success'))) : ?>
                                        <div class="alert alert-success">Cập nhật bài viết thành công</div>
                                        <?php Session::forget('success') ?>

                                    <?php elseif ((Session::get('error'))) : ?>
                                        <div class="alert alert-danger">Xảy ra lỗi nghiêm trọng</div>
                                        <?php Session::forget('error') ?>

                                    <?php endif ?>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Tiêu đề</label>
                                            <input required type="text" class="form-control" placeholder="Tiêu đề" name="title" value="<?php echo ($post->title) ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Danh mục</label>
                                            <select class="form-control" name="category_id" id="">
                                                <?php if (is_array($categories)) : ?>
                                                    <?php foreach ($categories as $category) : ?>
                                                        <?php if ($category->id == $post->category_id) :  ?>
                                                            <option value="<?php echo ($category->id) ?>" selected><?php echo ($category->name)  ?></option>
                                                        <?php else : ?>
                                                            <option value="<?php echo ($category->id) ?>"><?php echo ($category->name) ?></option>
                                                        <?php endif ?>
                                                    <?php endforeach ?>
                                                <?php endif ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Mô tả</label>
                                            <textarea required type="text" class="form-control" name="description"><?php echo($post->description) ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Nội dung</label>
                                            <textarea required type="text" class="form-control" name="content" id="noi_dung"><?php echo($post->content) ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Ảnh đại diện</label>
                                            <div>
                                                <img style="width:100px; margin-bottom:2rem" src="<?php echo(BASE_URL . 'asset/uploads/images/'. $post->image) ?>" alt="">
                                            </div>
                                            <input  type="file" class="form-control" name="image">
                                        </div>
                                        <input type="hidden" class="form-control" name="user_id" value="2">
                                        <input type="hidden" class="form-control" name="total_like" value="0">
                                        <input type="hidden" class="form-control" name="total_comment" value="0">

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Cập nhật</button>
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