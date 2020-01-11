<?php

include('./controller/Controller.php');

class PhotoGalleryController extends Controller
{
    public function index()
    {
        $photo  = new PhotoGallery();
        $photos = $photo->paginate('photos', 4);
        $links = $photo->links('photo_gallery', 4, adminUrl('PhotoGalleryController', 'index'));
        $this->loadView('page-admin/photo-gallery/index', [
            'photos' => $photos,
            'links' => $links,
        ]);
    }

    public function create()
    {
        $category   = new Category();
        $categories = $category->all('categories');
        $this->loadView('page-admin/photo/create', [
            'categories' => $categories
        ]);
    }

    public function store()
    {

        $photo = new PhotoGallery();
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
        $created  = $photo->insert('photos', $data);

        if ($created === true) {
            Session::put('success', true);
        } else {
            Session::put('error', true);
        }

        return Redirect::back();
    }

    public function edit()
    {
        $idphoto     = Input::get('id');
        $photo       = new PhotoGallery();
        $category   = new Category();
        $categories = $category->all('categories');
        $photo       = $photo->find('photos', $idphoto);
        $this->loadView('page-admin/photo/edit', [
            'photo'       => $photo,
            'categories' => $categories
        ]);
    }


    public function update()
    {
        $idphoto = Input::get('id');
        $photo   = new PhotoGallery();
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
            $data['image'] = $photo->image;
        }

        $updated  = $photo->update('photos', $data,  $idphoto);

        if ($updated === true) {
            Session::put('success', true);
        } else {
            Session::put('error', true);
        }

        return Redirect::back();
    }

    public function destroy()
    {
        $idphoto = Input::get('id');
        $photo = new PhotoGallery();
        $deleted  = $photo->delete('photos', $idphoto);

        if ($deleted === true) {
            Session::put('success', true);
        } else {
            Session::put('error', true);
        }

        return Redirect::back();
    }
}
