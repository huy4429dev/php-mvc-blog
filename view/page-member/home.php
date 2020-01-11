<?php include('./view/layouts/page-member/header.php') ?>
    <div class="slideshow-container">

        <!-- Full-width images with number and caption text -->
        <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
            <img src="<?php echo (asset('image/slide/hanoi2016.jpg')) ?>" style="width:1020px; height: 400px">
            <div class="text_slide">Đây là ở hồ Gươm năm 2016</div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
            <img src="<?php echo (asset('image/slide/pornhub.jpg')) ?>" style="width:1020px; height: 400px">
            <div class="text_slide">Mai Châu cùng nhóm PornHub 2016</div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
            <img src="<?php echo (asset('image/slide/hamlon2017.jpg')) ?>" style="width:1020px; height: 400px">
            <div class="text_slide">Hàm Lợn cùng nhóm PornHub 2017</div>
        </div>

        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>

    <!-- The dots/circles -->
    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>
    <script>
        var slideIndex = 0;
        showSlides();

        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
            setTimeout(showSlides, 5000); // Change image every 2 seconds
        }
    </script>
    <div class="trong"></div>
    <div class="container content">
        <div class="row">
            <div class="item_noidung col-md-8">
                <div class="contents">
                    <h3>Những điều nổi bật</h3>
                </div>
                <div class="row">
                    <?php foreach($posts as $post): ?>
                    <div class="item_nho_noidung col-md-6">
                        <h4><?php echo($post->title) ?></h4>
                        <a href="<?php echo(pageUrl('PostController',"detail&id=$post->id")) ?>"><img src="<?php echo (asset("uploads/images/$post->image")) ?>" title="Hà Nội năm 2016" id="image_content"></a>
                        <p>
                           <?php echo($post->description) ?>
                        </p>
                        <p>
                            <a href="<?php echo(pageUrl('PostController',"detail&id=$post->id")) ?>">Đọc thêm...</a>
                        </p>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
            <div class="item_about col-md-4">
                <h4>THÔNG TIN NHỎ VỀ TÔI</h4>
                <img src="<?php echo (asset('image/about_me.jpg')) ?>" id="image_about" title="about_me">
                <p style="padding-top: 20px; text-align: center; border-bottom: solid 1px rgba(32,35,70,0.75);">Chào, tôi là Nguyễn Minh Quân, hiện tại tôi 21 tuổi. Thích du lịch, nghe nhạc, đá bóng, chụp ảnh, lưu giữ những kỷ niệm trong đời.</p>
                <p style="text-align: center">Theo dõi tôi qua:
                    <a href="http://facebook.com/minhquan.roger"><img src="<?php echo (asset('image/fb.png')) ?>" width="16px" height="16px" title="facebook"></a>
                    <a href="http://instagram.com/quannguyen0505"><img src="<?php echo (asset('image/twitter.png')) ?>" width="16px" height="16px" title="Instagram"></a>
                </p>
            </div>
        </div>
    </div>
<?php include('./view/layouts/page-member/footer.php') ?>