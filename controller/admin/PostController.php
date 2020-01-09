<?php 

include('./controller/Controller.php');

class PostController extends Controller{
    public function index(){
        $users = ['huy' => 10, 'hanh' => 20];
        $this->loadView('page-member/home', ['users' => $users]);
    }
}
