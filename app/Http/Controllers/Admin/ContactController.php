<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {
        return view('admin.contacts.index');
    }
}
