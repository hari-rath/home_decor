<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ContactModel;

class Contact extends BaseController
{
    protected $ContactModel;

    public function __construct()
    {
        $this->ContactModel = new ContactModel();
       
    }

    public function index()
    {
        $contactlist = $this->ContactModel->findAll();

        return view('admin/contact_list', [
            'contact_list' => $contactlist
        ]);
    }

    public function delete($id)
    {
        if (!$this->ContactModel->find($id)) {
            return redirect()->back()->with('error', 'Category not found!');
        }

        $this->ContactModel->delete($id);

        return redirect()->to('admin/contact_list')->with('success', 'Category deleted successfully!');
    }
}
