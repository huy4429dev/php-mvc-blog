<?php 

include('./controller/Controller.php');

class PostController extends Controller{
    public function index(){
        $this->loadView('page-admin/post/index');
    }
    public function create(){
        $this->loadView('page-admin/post/create');
    }

}
