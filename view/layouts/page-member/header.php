<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nguyễn Minh Quân Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo(asset('bootstrap-4.3.1-dist/css/mestyle.css')) ?>">
    <link rel="stylesheet" href="<?php echo(asset('bootstrap-4.3.1-dist/css/bootstrap.min.css')) ?>">
    <script src="<?php echo(asset('jquery-3.4.1.min.js') )?>"></script>
    <script src="<?php echo(asset('jquery-3.4.1.js'))?>"></script>
</head>
    <body>
        <div class="container header">
                <div class="menu1">
                    <ul>
                        <li><a href="<?php echo(pageUrl('HomeController','index')) ?>">Trang chủ</a></li>
                        <li><a href="post">Giới thiệu</a> </li>
                        <li><a href="post">Âm nhạc</a></li>
                        <li><a href="post">Sự kiện</a></li>
                        <li><a href="post">Hình ảnh</a></li>
                        <li><a href="post">Liên hệ</a></li>
                    </ul>
                </div>
                <div class="menu2">
                    <ul>
                        <li><a href="#" target="_blank"><img src="<?php echo(asset('image/fb.png'))?>" title="Facebook"> Facebook</a></li>
                        <li><a href="#" target="_blank"><img src="<?php echo(asset('image/twitter.png'))?>" title="instagram"> Instagram</a></li>
                    </ul>
                </div>
            </div>
        <div class="logo-container">
            <div class="text_logo"><h1>Nguyen Minh Quan Blog</h1></div>
        </div> 