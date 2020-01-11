<?php

class Model
{


    private static $sql = "";
    private static $DB  = null;
    public function __construct()
    {
        Model::$DB = new Database();
    }

    public static function all($table)
    {

        return Model::$DB->all($table);
    }
    public static function find($table, $id)
    {

        return Model::$DB->find($table, $id);
    }

    public static function orderBy($table, $id, $order)
    {
        Model::$sql = "SELECT * FROM $table ORDER BY $id $order ";
        return new static();
    }

    public function take($limit)
    {
        Model::$sql .= "LIMIT $limit";
        return new static();
    }

    public function getComment($postId){
        Model::$sql = "SELECT users.*, comments.id as id, comments.content as content, comments.created_at as created_at FROM comments JOIN users ON comments.user_id = users.id  WHERE post_id = $postId ORDER BY comments.id DESC";
        return new static();
    }

    public function get()
    {
        return Model::$DB->query(Model::$sql);
    }

    public function paginate($table, $limit)
    {
        /**
         * Phân trang 
         */
        $currentPage =  Input::get('page') ?? 0;
        if($currentPage > 0){
            $currentPage = ($currentPage - 1) * $limit;
        }
        $sql         = "SELECT * FROM $table ORDER BY id DESC LIMIT $currentPage,$limit ";
        return Model::$DB->query($sql);
    }

    public function links($table, $so_ban_ghi_mot_trang,$baseUrl )
    {
        /**
         * Lấy link phân trang
         */

        $tong_so_ban_ghi = Model::$DB->CountRecord($table)->count;
        $trang_hien_tai  = Input::get('page') ?? 0;;

        $html            = '<ul class="pagination pagination-sm m-0 float-right">';

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

    public function insert($table, $data)
    {
        if (empty($data)) {
            return false;
        }
        return Model::$DB->create($table, $data);
    }
    public function update($table, $data , $id)
    {
        if (empty($data)) {
            return false;
        }
        return Model::$DB->update($table, $data, $id);
    }

    public function delete($table,$id){
        return Model::$DB->delete($table, $id);
    }

}
