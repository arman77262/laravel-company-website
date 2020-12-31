<?php

namespace App\Http\Controllers;

use App\Models\HomeAbout;
use App\Models\Multipic;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        $homeabout = HomeAbout::latest()->get();
        return view('admin.about.index', compact('homeabout'));
    }

    public function addAbout(){
        return view('admin.about.add_about');
    }

    public function storeAbout(Request $request){
        $validatedData = $request->validate([
            'title' => 'required|unique:home_abouts|min:4',
            'short_dis' => 'required|unique:home_abouts|min:4',
            'long_dis' => 'required|unique:home_abouts|min:4',
        ], [
            'title.required' => 'Please Input About Title',
            'title.min' => 'You have to input minimum 4 character',
            'short_dis.required' => 'Please Add Your About Short Description',
            'short_dis.min' => 'You have to input minimum 4 character',
            'long_dis.required' => 'Please Add Your About Long Description',
            'long_dis.min' => 'You have to input minimum 4 character',
        ]);

        HomeAbout::insert([
            'title' => $request->title,
            'short_dis' => $request->short_dis,
            'long_dis' => $request->long_dis,
        ]);

        return redirect()->route('home.about')->with('success', 'About Added Successfully');
    }

    public function EditAbout($id){
        $editabout = HomeAbout::find($id);
        return view('admin.about.edit_about', compact('editabout'));
    }

    public function UpdateAbout(Request $request, $id){
        $validatedData = $request->validate([
            'title' => 'required|min:4',
            'short_dis' => 'required|min:4',
            'long_dis' => 'required|min:4',
        ], [
            'title.required' => 'Please Input About Title',
            'title.min' => 'You have to input minimum 4 character',
            'short_dis.required' => 'Please Add Your About Short Description',
            'short_dis.min' => 'You have to input minimum 4 character',
            'long_dis.required' => 'Please Add Your About Long Description',
            'long_dis.min' => 'You have to input minimum 4 character',
        ]);

        HomeAbout::find($id)->update([
            'title' => $request->title,
            'short_dis' => $request->short_dis,
            'long_dis' => $request->long_dis,
        ]);

        return redirect()->route('home.about')->with('success', 'About Updated Successfully');
    }

    public function DeleteAbout($id){
        HomeAbout::find($id)->delete();
        return redirect()->route('home.about')->with('success', 'About Delete Successfully');
    }

    public function portfolio(){
        $images = Multipic::all();
        return view('pages.portfolio', compact('images'));
    }

}

