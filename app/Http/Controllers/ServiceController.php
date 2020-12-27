<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(){
        $services = Service::latest()->get();
        return view('admin.service.index', compact('services'));
    }

    public function addService(){
        return view('admin.service.add_service');
    }

    public function storeService(Request $request){
        $validatedData = $request->validate([
            'icon_class' => 'unique:services|min:4',
            'title' => 'required|unique:services|min:4',
            'short_dis' => 'required|min:4',
        ], [
            'title.required' => 'Please Input About Title',
            'title.min' => 'You have to input minimum 4 character',
            'short_dis.required' => 'Please Add Your About Short Description',
            'short_dis.min' => 'You have to input minimum 4 character',
        ]);

        Service::insert([
            'under_service' => $request->under_service,
            'icon_class' => $request->icon_class,
            'title' => $request->title,
            'short_dis' => $request->short_dis
        ]);

        return redirect()->route('home.service')->with('success', 'Services Added Successfully');
    }

    public function EditService($id){
        $editservice = Service::find($id);
        return view('admin.service.edit_services', compact('editservice'));
    }

    public function UpdateService(Request $request, $id){
        Service::find($id)->update([
            'under_service' => $request->under_service,
            'icon_class' => $request->icon_class,
            'title' => $request->title,
            'short_dis' => $request->short_dis
        ]);

        return redirect()->route('home.service')->with('success', 'Services Updated Successfully');
    }

    public function DeleteService($id){
        Service::find($id)->delete();
        return redirect()->back()->with('success', 'Services Delete Successfully');
    }
}
