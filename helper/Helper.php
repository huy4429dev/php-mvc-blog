<?php

/**
 * Lấy đường dẫn thư mục asset 
 */

function asset($path){
    return BASE_URL.'asset/'.$path;
}

/**
 *  Định dạng tiền
 */
function formatPrice($price)
{
    return number_format($price) . ' đ';
}
/**
 *  Get sale price
 */
function salePrice($price, $sale)
{
    return number_format($price - ($price / 100 * $sale)) . ' đ';
}

/**
 * hiện thị rate (sao) 
 */
function rateProduct($rate)
{
    return $rate / 5 * 100;
}

/**
 *  Phân trang 
 */

function phan_trang($tong_so_ban_ghi, $so_ban_ghi_mot_trang, $trang_hien_tai, $baseUrl)
{


    $html = '<ul>';

    $so_trang = ceil($tong_so_ban_ghi / $so_ban_ghi_mot_trang);


    if (strpos($baseUrl, "?")) {
        if ($trang_hien_tai > 1) {
            $trangtruoc = $trang_hien_tai - 1;
            $html = "<ul> <li><a href='&page=$trangtruoc' class='pagination-prev'><i class='icon-left-4'></i> <span>PREV page</span></a></li>";
        }
    } else {
        if ($trang_hien_tai > 1) {
            $trangtruoc = $trang_hien_tai - 1;
            $html = "<ul> <li><a href='?page=$trangtruoc' class='pagination-prev'><i class='icon-left-4'></i> <span>PREV page</span></a></li>";
        }
    }
    for ($i = 1; $i <= $so_trang; $i++) {

        if (strpos($baseUrl, "?")) {
            if ($trang_hien_tai == $i) {
                $html .= "<li class='active'> <a href='$baseUrl&page=$i'> $i </a></li> ";
                continue;
            }
            $html .= "<li> <a href='$baseUrl&page=$i'> $i </a></li> ";
        } else {

            if ($trang_hien_tai == $i) {
                $html .= "<li class='active'> <a href='$baseUrl?page=$i'> $i </a></li> ";
                continue;
            }
            $html .= "<li> <a href='$baseUrl?page=$i'> $i </a></li> ";
        }
    }

    if (strpos($baseUrl, "?")) {

        if ($trang_hien_tai < $so_trang) {
            $trangsau = $trang_hien_tai + 1;
            $html .= "<li><a href='$baseUrl&page=$trangsau' class='pagination-next'><span>next page</span> <i class='icon-right-4'></i></a></li>";
        } else {
            $html .= '</ul>';
        }
        $i = $so_trang;
    } else {

        if ($trang_hien_tai < $so_trang) {
            $trangsau = $trang_hien_tai + 1;
            $html .= "<li><a href='$baseUrl?page=$trangsau' class='pagination-next'><span>next page</span> <i class='icon-right-4'></i></a></li>";
        } else {
            $html .= '</ul>';
        }
        $i = $so_trang;
    }

    return $html;
}

function phan_trang_admin($tong_so_ban_ghi, $so_ban_ghi_mot_trang, $trang_hien_tai, $baseUrl)
{


    $html = '<ul class="pagination pagination-sm m-0 float-right">';

    $so_trang = ceil($tong_so_ban_ghi / $so_ban_ghi_mot_trang);


    if (strpos($baseUrl, "?")) {
        if ($trang_hien_tai > 1) {
            $trangtruoc = $trang_hien_tai - 1;
            $html = "<ul class='pagination pagination-sm m-0 float-right'> <li class='page-item'><a href='&page=$trangtruoc' class='page-link'><i class='icon-left-4'></i>«</a></li>";
        }
    } else {
        if ($trang_hien_tai > 1) {
            $trangtruoc = $trang_hien_tai - 1;
            $html = "<ul class='pagination pagination-sm m-0 float-right'> <li class='page-item'><a href='?page=$trangtruoc' class='page-link'><i class='icon-left-4'></i> <span>«</span></a></li>";
        }
    }
    for ($i = 1; $i <= $so_trang; $i++) {

        if (strpos($baseUrl, "?")) {
            if ($trang_hien_tai == $i) {
                $html .= "<li class='page-item active'> <a href='$baseUrl&page=$i'> $i </a></li> ";
                continue;
            }
            $html .= "<li> <a class='page-link' href='$baseUrl&page=$i'> $i </a></li> ";
        } else {

            if ($trang_hien_tai == $i) {
                $html .= "<li class='page-item active'> <a class='page-link' href='$baseUrl?page=$i'> $i </a></li> ";
                continue;
            }
            $html .= "<li class='page-item'> <a class='page-link' href='$baseUrl?page=$i'> $i </a></li> ";
        }
    }

    if (strpos($baseUrl, "?")) {

        if ($trang_hien_tai < $so_trang) {
            $trangsau = $trang_hien_tai + 1;
            $html .= "<li class='page-item'><a href='$baseUrl&page=$trangsau' class='page-link'><span>»</span> <i class='icon-right-4'></i></a></li>";
        } else {
            $html .= '</ul>';
        }
        $i = $so_trang;
    } else {

        if ($trang_hien_tai < $so_trang) {
            $trangsau = $trang_hien_tai + 1;
            $html .= "<li class='page-item'><a href='$baseUrl?page=$trangsau' class='page-link'><span>»</span> <i class='icon-right-4'></i></a></li>";
        } else {
            $html .= '</ul>';
        }
        $i = $so_trang;
    }

    return $html;
}
/**
 *  String to Slug URL 
 */

function base_url()
{
    if (isset($_SERVER['HTTPS'])) {
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
    } else {
        $protocol = 'http://';
    }
    return $protocol . $_SERVER['HTTP_HOST'] . dirname($_SERVER["REQUEST_URI"] . '?') . '/';
}

function toSlug($title)
{
    $replacement = '_';
    $map = array();
    $quotedReplacement = preg_quote($replacement, '/');
    $default = array(
        '/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ|À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ|å/' => 'a',
        '/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ|È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ|ë/' => 'e',
        '/ì|í|ị|ỉ|ĩ|Ì|Í|Ị|Ỉ|Ĩ|î/' => 'i',
        '/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ|Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ|ø/' => 'o',
        '/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ|Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ|ů|û/' => 'u',
        '/ỳ|ý|ỵ|ỷ|ỹ|Ỳ|Ý|Ỵ|Ỷ|Ỹ/' => 'y',
        '/đ|Đ/' => 'd',
        '/ç/' => 'c',
        '/ñ/' => 'n',
        '/ä|æ/' => 'ae',
        '/ö/' => 'oe',
        '/ü/' => 'ue',
        '/Ä/' => 'Ae',
        '/Ü/' => 'Ue',
        '/Ö/' => 'Oe',
        '/ß/' => 'ss',
        '/[^\s\p{Ll}\p{Lm}\p{Lo}\p{Lt}\p{Lu}\p{Nd}]/mu' => ' ',
        '/\\s+/' => $replacement,
        sprintf('/^[%s]+|[%s]+$/', $quotedReplacement, $quotedReplacement) => '',
    );
    $title = urldecode($title);
    $map = array_merge($map, $default);
    return strtolower(preg_replace(array_keys($map), array_values($map), $title));
}
