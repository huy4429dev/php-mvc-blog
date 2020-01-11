<?php

include('./controller/Controller.php');

class PostController extends Controller
{
    public function detail()
    {
        $idpost     = Input::get('id');
        $post       = new post();
        $post       = $post->find('posts', $idpost);
        $author     = new User();
        $author     = $author->find('users',$post->user_id);
        $category   = new Category();
        $categories = $category->all('categories');
        $comment    = new Comment();
        $comments   = $comment->getComment($idpost)->get();

        $this->loadView(
            'page-member/post-detail',
            [
                'post'       => $post,
                'author'     => $author,
                'categories' => $categories,
                'comments'   => $comments,
            ]
        );
    }
}
