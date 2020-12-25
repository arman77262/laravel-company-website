<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

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

        /* $name_gen = hexdec(uniqid());
        $img_ext = strtolower($image->getClientOriginalExtension());
        $image_name = $name_gen.'.'.$img_ext;
        $up_location = 'images/slider/';
        $last_image = $up_location.$image_name;
        $image->move($up_location, $last_image); */

        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        image::make($image)->resize(1920,1088)->save('images/slider/'.$name_gen);
        $last_image = 'images/slider/'.$name_gen;

        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $last_image,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('home.slider')->with('success', 'Slider Added Successfully');
    }

    public function EditSlider($id){
        $slider = Slider::find($id);
        return view('admin.slider.edit_slider',compact('slider'));
    }

    public function UpdateSlider(Request $request, $id){

        $validatedData = $request->validate([
            'title' => 'required|min:4',
            'description' => 'required|min:4',
            'image' => 'mimes:jpg,jpeg,png',
        ], [
            'title.required' => 'Please Input Slider Title',
            'title.min' => 'You have to input minimum 4 character',
            'description.required' => 'Please Add Your Slider Description',
            'description.min' => 'You have to input minimum 4 character',
        ]);

        $old_image = $request->old_image;
        $image = $request->file('image');

        if ($image) {
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            image::make($image)->resize(1920,1088)->save('images/slider/'.$name_gen);
            $last_image = 'images/slider/'.$name_gen;

            unlink($old_image);
            Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $last_image,
                'created_at' => Carbon::now(),
            ]);

            return redirect()->route('home.slider')->with('success', 'Slider Update Successfully');
        }else{
            Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);
            return redirect()->route('home.slider')->with('success', 'Slider Update Successfully');
        }
    }
}
