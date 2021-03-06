<?php

include('./controller/Controller.php');

class PostController extends Controller
{
    public function index()
    {
        $post  = new post();
        $posts = $post->paginate('posts', 4);
        $links = $post->links('posts', 4, adminUrl('postController', 'index'));
        $this->loadView('page-admin/post/index', [
            'posts' => $posts,
            'links' => $links,
        ]);
    }

    public function create()
    {
        $category   = new Category();
        $categories = $category->all('categories');
        $this->loadView('page-admin/post/create', [
            'categories' => $categories
        ]);
    }

    public function store()
    {

        $post = new post();
        $data = Input::all();
        if (isset($_FILES['image'])) {
            $file_name = rand(100, 10000) . '-' . $_FILES['image']['name'];
            $file_tmp  = $_FILES['image']['tmp_name'];
            $file_type = $_FILES['image']['type'];
            $file_erro = $_FILES['image']['error'];
            if ($file_erro == 0) {
                $part = $_SERVER['DOCUMENT_ROOT'] . '/php-mvc-blog/asset/uploads/images/';
                $data['image'] = $file_name;
                move_uploaded_file($file_tmp, $part . $file_name);
            }
        }
        $created  = $post->insert('posts', $data);

        if ($created === true) {
            Session::put('success', true);
        } else {
            Session::put('error', true);
        }

        return Redirect::back();
    }

    public function edit()
    {
        $idpost     = Input::get('id');
        $post       = new post();
        $category   = new Category();
        $categories = $category->all('categories');
        $post       = $post->find('posts', $idpost);
        $this->loadView('page-admin/post/edit', [
            'post'       => $post,
            'categories' => $categories
        ]);
    }


    public function update()
    {
        $idpost = Input::get('id');
        $post   = new post();
        $data   = Input::all();

        if (isset($_FILES['image'])) {
            $file_name = rand(100, 10000) . '-' . $_FILES['image']['name'];
            $file_tmp  = $_FILES['image']['tmp_name'];
            $file_type = $_FILES['image']['type'];
            $file_erro = $_FILES['image']['error'];
            if ($file_erro == 0) {
                $part = $_SERVER['DOCUMENT_ROOT'] . '/php-mvc-blog/asset/uploads/images/';
                $data['image'] = $file_name;
                move_uploaded_file($file_tmp, $part . $file_name);
            }
        } else {
            $data['image'] = $post->image;
        }

        $updated  = $post->update('posts', $data,  $idpost);

        if ($updated === true) {
            Session::put('success', true);
        } else {
            Session::put('error', true);
        }

        return Redirect::back();
    }

    public function destroy()
    {
        $idpost = Input::get('id');
        $post = new post();
        $deleted  = $post->delete('posts', $idpost);

        if ($deleted === true) {
            Session::put('success', true);
        } else {
            Session::put('error', true);
        }

        return Redirect::back();
    }
}
