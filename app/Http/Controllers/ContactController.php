<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{
    public function AdminContact(){
        $contacts = Contact::latest()->get();
        return view('admin.contact.index', compact('contacts'));
    }

    public function CreateContact(){
        return view('admin.contact.create');
    }

    public function StoreContact(Request $request){
        $validatedData = $request->validate([
            'email' => 'required|unique:contacts',
            'phone' => 'required|unique:contacts',
            'address' => 'required',
        ], [
            'email.required' => 'This Email Fild Is Required',
            'phone.required' => 'This Phone Fild Is Required',
            'address.required' => 'This Address Fild Is Required'
        ]);

        Contact::insert([
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address
        ]);

        return redirect()->route('contact')->with('success', 'Contact Added Successfully');
    }

    public function EditContact($id){
        $edit = Contact::find($id);
        return view('admin.contact.edit', compact('edit'));
    }

    public function UpdateContact(Request $request, $id){
        Contact::find($id)->update([
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address
        ]);

        return redirect()->route('contact')->with('success', 'Contact Updated Successfully');
    }

    public function DeleteContact($id){
        Contact::find($id)->delete();
        return redirect()->back()->with('success', 'Contact Delete Successfully');
    }

    //Home view for Contact Pages
    public function HomeContact(){
        $contact = DB::table('contacts')->first();
        return view('pages.contact', compact('contact'));
    }

    public function ContactMessage(Request $request){
        ContactForm::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        ]);

        return Redirect()->back()->with('success', 'Message Send Successfully');
    }

    public function Message(){
        $messages= ContactForm::all();
        return view('admin.contact.message', compact('messages'));
    }

    public function DeleteMessage($id){
        $delete = ContactForm::find($id)->delete();
        return Redirect()->back()->with('success', 'Message Delete Successfully');
    }
}
