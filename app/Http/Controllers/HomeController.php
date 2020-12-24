<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    public function homeSlider(){
        $sliders = Slider::latest()->get();
        return view('admin.slider.index', compact('sliders'));
    }

    public function addSlider(){
        return view('admin.slider.add_slider');
    }

    public function storeSlider(Request $request){
        $validatedData = $request->validate([
            'title' => 'required|unique:sliders|min:4',
            'description' => 'required|unique:sliders|min:4',
            'image' => 'required|mimes:jpg,jpeg,png',
        ], [
            'title.required' => 'Please Input Slider Title',
            'image.required' => 'Tor Band Er image ta upload kortai hoba vai',
            'title.min' => 'You have to input minimum 4 character',
            'description.required' => 'Please Add Your Slider Description',
            'description.min' => 'You have to input minimum 4 character',
        ]);

        $image = $request->file('image');

        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($image->getClientOriginalExtension());
        $image_name = $name_gen.'.'.$img_ext;
        $up_location = 'images/slider/';
        $last_image = $up_location.$image_name;
        $image->move($up_location, $last_image);

        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $last_image,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('home.slider')->with('success', 'Slider Added Successfully');
    }
}
