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
                        <h3 class="box-title">Danh sách liên hệ</h3>
                        <?php if ((Session::get('success'))) : ?>
                            <div class="alert alert-warning" style="margin-top:2rem">Xóa liên hệ thành công</div>
                            <?php Session::forget('success') ?>

                        <?php elseif ((Session::get('error'))) : ?>
                            <div class="alert alert-danger" style="margin-top:2rem">Xảy ra lỗi nghiêm trọng</div>
                            <?php Session::forget('error') ?>

                        <?php endif ?>
                    </div>
                    <!-- /.box-header -->
                    <?php if (!is_array($contacts)) : ?>
                        <div class="text-center text-danger" style="padding: 30px 5px;">Chưa có danh mục nào</div>
                    <?php else : ?>
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tr>
                                    <th style="width:5%">ID</th>
                                    <th style="width:30%">Chủ đề</th>
                                    <th style="width:20%"> Thời gian</th>
                                    <th>Người gửi</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th class="text-center">Status</th>
                                    <th style="width:10%" class="text-center" colspan="2">Action</th>
                                </tr>
                                <?php foreach ($contacts as $item) : ?>
                                    <tr style="cursor:pointer" onclick="detail(<?php echo $item->id ?>)">
                                        <td><?php echo ($item->id) ?></td>
                                        <td><?php echo ($item->subject) ?></td>
                                        <td><?php echo ($item->created_at) ?></td>
                                        <td><?php echo ($item->full_name) ?></td>
                                        <td><?php echo ($item->phone) ?></td>
                                        <td><?php echo ($item->email) ?></td>
                                        <?php if ($item->status == 1) : ?>
                                            <td class="text-center"><small class="btn text-center label label-success">Đã xem</small></td>
                                        <?php else : ?>
                                            <td class="text-center"><small class="btn text-center label label-primary">Chưa xem</small></td>
                                        <?php endif ?>
                                        <td class="text-center"><a href="<?php echo (adminUrl('ContactController', 'destroy&id=' . $item->id)) ?>" class="btn text-center label label-danger">Xóa</span></td>

                                    </tr>
                                <?php endforeach ?>
                                <script>
                                    function detail(id) {
                                        window.location.replace("<?php echo (adminUrl('ContactController', 'detail&id=')) ?>" + id);
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