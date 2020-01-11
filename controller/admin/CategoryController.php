<?php

include('./controller/Controller.php');

class CategoryController extends Controller
{

    public function index()
    {
        $category = new Category();
        $categories = $category->paginate('categories', 4);
        $links = $category->links('categories', 4, adminUrl('CategoryController', 'index'));
        $this->loadView('page-admin/category/index', [
            'categories' => $categories,
            'links'      => $links,
        ]);
    }

    public function create()
    {
        $this->loadView('page-admin/category/create');
    }

    public function store()
    {

        $category = new Category();
        $created  = $category->insert('categories', Input::all());

        if ($created === true) {
            Session::put('success', true);
        } else {
            Session::put('error', true);
        }

        return Redirect::back();
    }

    public function edit()
    {
        $idCategory = Input::get('id');
        $category = new Category();
        $category = $category->find('categories', $idCategory);
        $this->loadView('page-admin/category/edit', [
            'category' => $category
        ]);
    }


    public function update()
    {

        $idCategory = Input::get('id');
        $category = new Category();
        $updated  = $category->update('categories', Input::all(),  $idCategory);

        if ($updated === true) {
            Session::put('success', true);
        } else {
            Session::put('error', true);
        }

        return Redirect::back();
    }

    public function destroy()
    {
        $idCategory = Input::get('id');
        $category = new Category();
        $deleted  = $category->delete('categories', $idCategory);

        if ($deleted === true) {
            Session::put('success', true);
        } else {
            Session::put('error', true);
        }

        return Redirect::back();
    }
}
