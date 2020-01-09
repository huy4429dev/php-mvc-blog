<?php 

include('./controller/Controller.php');

class DashboardController extends Controller{
    public function index(){
        $this->loadView('page-admin/dashboard');
    }
}
