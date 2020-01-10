<?php include('./view/layouts/page-admin/header.php') ?>
<section class="content-header">
    <h1>
        Bài viết
        <small>post manage</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo(adminUrl('DashboardController','index')) ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Post</li>
    </ol>
</section>
<div class="content pt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-11">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Danh sách bài viết</h3>

                        <div class="box-tools">
                                <a href="<?php echo(adminUrl('PostController','create')) ?>" class="btn btn-sm btn-success">Thêm</a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>ID</th>
                                <th>Tiêu đề</th>
                                <th>Thời gian</th>
                                <th>Mô tả</th>
                                <th class="text-center" colspan="2">Action</th>
                            </tr>
                            <tr>
                                <td>183</td>
                                <td>John Doe</td>
                                <td>11-7-2014</td>
                                <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                <td class="text-center"><span class="text-center label label-warning">Sửa</span></td>
                                <td class="text-center"><span class="text-center label label-danger">Xóa</span></td>
                            </tr>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
</div>
<?php include('./view/layouts/page-admin/footer.php') ?>