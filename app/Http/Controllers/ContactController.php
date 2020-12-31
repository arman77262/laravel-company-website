<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function AdminContact(){
        $contacts = Contact::latest()->get();
        return view('admin.contact.index', compact('contacts'));
    }
}