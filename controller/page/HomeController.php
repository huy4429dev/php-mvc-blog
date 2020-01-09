<?php

include('./controller/Controller.php');

class HomeController extends Controller
{
    public function index()
    {
        /**
         *  Get all Post 
         */

        $posts = Post::orderBy('posts', 'id', 'desc')
            ->take(4)
            ->get();

        $this->loadView(
            'page-member/home',
            [
                'posts' => $posts
            ]
        );
    }
}
