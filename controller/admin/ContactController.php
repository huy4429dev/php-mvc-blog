<?php

include('./controller/Controller.php');

class ContactController extends Controller
{

    public function index()
    {
        $contact = new Contact();
        $contacts = $contact->paginate('contacts', 4);
        $links = $contact->links('contacts', 4, adminUrl('ContactController', 'index'));
        $this->loadView('page-admin/contact/index', [
            'contacts' => $contacts,
            'links'    => $links,
        ]);
    }

    public function create()
    {
        $this->loadView('page-admin/contact/create');
    }

    public function store()
    {

        $contact = new contact();
        $created  = $contact->insert('contacts', Input::all());

        if ($created === true) {
            Session::put('success', true);
        } else {
            Session::put('error', true);
        }

        return Redirect::back();
    }

    public function detail()
    {
        
        $idcontact       = Input::get('id');
        $contact         = new contact();
        $contact         = $contact->find('contacts', $idcontact);
        $contact->status = 1;
        $contactUpdate   = new contact();
        $data            =  (array)$contact; 
        $updated         = $contactUpdate->update('contacts', $data,  $contact->id);
        $this->loadView('page-admin/contact/detail', [
            'contact' => $contact
        ]);
    }

    public function destroy()
    {
        $idcontact = Input::get('id');
        $contact = new contact();
        $deleted  = $contact->delete('contacts', $idcontact);

        if ($deleted === true) {
            Session::put('success', true);
        } else {
            Session::put('error', true);
        }

        return Redirect::back();
    }
}
