<?php
/**
 * Load config
 */

include('./config/config.php');
include('./helper/Helper.php');

$loadHelperClass = [
    'Database','Input', 'Session'
];

foreach($loadHelperClass as $helper){
    if(file_exists('./helper/'.$helper.'.php')){
        include('./helper/'.$helper.'.php');
        $$helper = new $helper();
    }
    else{
        die('File ' . $helper . '.php không tồn tại , Kiểm tra lại thư mục helper xem có không ?');
    }
}



/**
 * Load all Model
 */

foreach ($models as $model) {
    if (file_exists('./model/' . $model . '.php')) {
        include('./model/' . $model . '.php');
    } else {
        die('File ' . $model . '.php không tồn tại , Kiểm tra lại thư mục Model xem có không ?');
    }
}


/**
 * Load Controller And Action ADMIN
 * 
 */

if (file_exists('./controller/' . $Controller . '.php')) {

    include('./controller/' . $Controller . '.php');


    /**
     * Tạo đối tượng controller luôn
     * ex : $Controller = 'PostController' -> $$Controller = new $Controller === $PostController = new PostController
     */
    if(strpos($Controller,'admin') === 0){
        $Controller = substr($Controller,6); // cắt admin/
        
        
    }
    else if(strpos($Controller,'page') === 0){
        $Controller = substr($Controller,5); // cắt page/
    }

     $$Controller = new $Controller();
     
} else {
    die('File ' . $Controller . '.php không tồn tại , Kiểm tra lại thư mục controller xem có không ?');
}


if(method_exists($Controller,$Action)){
    /**
     * Gọi phương thức
     */
    $$Controller->$Action() ;
}
else{ 
    die('Class' .$Controller.' không tồn tại phương thức' .$Action);
}