<?php include('./view/layouts/page-admin/header.php') ?>
<section class="content-header">
    <h1>
        Danh mục bài viết
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
                        <h3 class="box-title">Danh sách danh mục</h3>
                        <?php if ((Session::get('success'))) : ?>
                            <div class="alert alert-warning" style="margin-top:2rem">Xóa danh mục thành công</div>
                            <?php Session::forget('success') ?>

                        <?php elseif ((Session::get('error'))) : ?>
                            <div class="alert alert-danger" style="margin-top:2rem">Xảy ra lỗi nghiêm trọng</div>
                            <?php Session::forget('error') ?>

                        <?php endif ?>
                        <div class="box-tools">
                            <div class="input-group input-group-sm hidden-xs">
                                <a href="<?php echo (adminUrl('CategoryController', 'create')) ?>" class="btn btn-sm btn-success">Thêm</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <?php if (!is_array($categories)) : ?>
                        <div class="text-center text-danger" style="padding: 30px 5px;">Chưa có danh mục nào</div>
                    <?php else : ?>
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tr>
                                    <th style="width:5%">ID</th>
                                    <th style="width:30%">Tiêu đề</th>
                                    <th style="width:20%"> Thời gian</th>
                                    <th style="width:35%">Mô tả</th>
                                    <th style="width:10%" class="text-center" colspan="2">Action</th>
                                </tr>
                                <?php foreach ($categories as $item) : ?>
                                    <tr style="cursor:pointer" onclick="detail(<?php echo $item->id ?>)">
                                        <td><?php echo ($item->id) ?></td>
                                        <td><?php echo ($item->name) ?></td>
                                        <td><?php echo ($item->created_at) ?></td>
                                        <td><?php echo ($item->description) ?></td>
                                        <td class="text-center"><a href="<?php echo (adminUrl('CategoryController', 'edit&id='.$item->id)) ?>" class="btn text-center label label-warning">Sửa</span></td>
                                        <td class="text-center"><a href="<?php echo (adminUrl('CategoryController', 'destroy&id='.$item->id)) ?>" class="btn text-center label label-danger">Xóa</span></td>
                                    </tr>
                                <?php endforeach ?>
                                <script>
                                    function detail(id) {
                                        window.location.replace("<?php echo (adminUrl('CategoryController', 'edit&id=')) ?>" + id);
                                    }
                                </script>
                            </table>
                            <div style="display: flex;justify-content: flex-end; padding-right:2rem">
                                <?php echo ($links) ?>
                            </div>
                        <?php endif ?>
                        </div>
                        <!-- /.box-body -->
                </div>

                <!-- /.box -->
            </div>
        </div>
    </div>
</div>
<?php include('./view/layouts/page-admin/footer.php') ?>