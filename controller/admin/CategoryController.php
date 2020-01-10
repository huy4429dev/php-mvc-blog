<?php 

include('./controller/Controller.php');

class CategoryController extends Controller{
    public function index(){
        $this->loadView('page-admin/category/index');
    }
}

