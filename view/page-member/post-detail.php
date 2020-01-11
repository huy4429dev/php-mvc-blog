<?php include('./view/layouts/page-member/header.php') ?>
<style>
    .content_about {
        width: 100%;
        height: 400px;
        text-align: center;
        font-size: 50px;
        padding-top: 100px;
        border: 3px solid rgba(32, 35, 70, 0.75);
        margin-bottom: 100px;
    }
</style>
<div class="trong">
<div class="container">

<div class="row">

  <!-- Post Content Column -->
  <div class="col-lg-8">

    <!-- Title -->
    <h1 class="mt-4"><?php echo($post->title) ?> </h1>

    <!-- Author -->
    <p class="lead">
        <?php echo($author->full_name) ?>
    </p>

    <hr>

    <!-- Date/Time -->
    <p>Xuất bản: <?php echo(date("d M Y - H:m", strtotime($post->created_at))) ?></p>

    <hr>

    <!-- Preview Image -->
    <img class="img-fluid rounded" style="width:900px; height:300px" src="<?php echo(asset('/uploads/images/'.$post->image)) ?>" alt="">

    <hr>

    <!-- Post Content -->
    <?php echo($post->content) ?>
    <hr>

    <!-- Comments Form -->
    <div class="card my-4">
      <h5 class="card-header">Bình luận:</h5>
      <div class="card-body">
        <form>
          <div class="form-group">
            <textarea class="form-control" rows="3"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Gửi</button>
        </form>
      </div>
    </div>

    <!-- Single Comment -->
    <?php if(is_array($comments)): ?>
    <?php foreach($comments as $comment): ?>
    <div class="media mb-4">
      <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
      <div class="media-body">
        <h5 class="mt-0"><?php echo$comment->full_name ?></h5>
        <?php echo($comment->content) ?>
      </div>
    </div>
    <?php endforeach ?>
    <?php else: ?>
        <div class="alert alert-warning">
            Bài viết chưa có bình luận nào
        </div>
    <?php endif ?>
  </div>

  <!-- Sidebar Widgets Column -->
  <div class="col-md-4">

    <!-- Search Widget -->
    <div class="card my-4">
      <h5 class="card-header">Search</h5>
      <div class="card-body">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for...">
          <span class="input-group-btn">
            <button class="btn btn-secondary" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>

    <!-- Categories Widget -->
    <div class="card my-4">
      <h5 class="card-header">Danh mục</h5>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-6">
            <ul class="list-unstyled mb-0">
              <?php foreach($categories as $category): ?>
              <li>
                <a href="#"><?php echo$category->name ?></a>
              </li>
              <?php endforeach ?>
          </div>
        </div>
      </div>
    </div>


  </div>

</div>
<!-- /.row -->

</div>

<?php include('./view/layouts/page-member/footer.php') ?>