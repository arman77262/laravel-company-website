<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Multipic;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function AllBrand(){
        $brand = Brand::latest()->paginate();
        return view('admin.brand.index', compact('brand'));
    }

    public function StoreBrand(Request $request){
        $validatedData = $request->validate([
            'brand_name' => 'required|unique:brands|min:4',
            'brand_image' => 'required|mimes:jpg,jpeg,png',
        ], [
            'brand_name.required' => 'Please Input Brand name',
            'brand_image.required' => 'Tor Band Er image ta upload kortai hoba vai',
            'brand_name.min' => 'You have to input minimum 4 character',
        ]);

        $brand_image = $request->file('brand_image');

        /* $name_gen = hexdec(uniqid());
        $img_ext = strtolower($brand_image->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $up_location = 'public/images/brand/';
        $last_image = $up_location.$img_name;
        $brand_image->move($up_location,$last_image); */


        //image intervesion
        $name_gen = hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
        image::make($brand_image)->resize(300,200)->save('public/images/brand/'.$name_gen);
        $last_image = 'public/images/brand/'.$name_gen;

        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_image' => $last_image,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->back()->with('success','Brand Added Successfully');
    }

    public function Edit($id){
        $brand = Brand::find($id);
        return view('admin.brand.edit', compact('brand'));
    }

    public function UpdateBrand(Request $request, $id){
        $validatedData = $request->validate([
            'brand_name' => 'required|min:4',
        ], [
            'brand_name.required' => 'Please Input Brand name',
            'brand_name.min' => 'You have to input minimum 4 character',
        ]);

        $old_image = $request->old_image;
        $brand_image = $request->file('brand_image');

        if($brand_image){
            $name_gen = hexdec(uniqid());
            $img_ext =strtolower($brand_image->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;
            $up_location = 'public/images/brand/';
            $last_image = $up_location.$img_name;
            $brand_image -> move($up_location,$last_image);

            unlink($old_image);
            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'brand_image' => $last_image,
                'created_at' => Carbon::now(),
            ]);

            return redirect()->back()->with('success','Brand Updated Successfully');
        }else{
            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'created_at' => Carbon::now(),
            ]);

            return redirect()->back()->with('success','Brand Updated Successfully');
        }
    }

    public function DeleteBrand($id){
        $image = Brand::find($id);
        $old_image = $image->brand_image;
        unlink($old_image);

        Brand::find($id)->delete();
        return redirect()->back()->with('success','Brand Delete Successfully');
    }

    public function MultiPic(){
        $images = Multipic::all();
        return view('admin.multipic.index', compact('images'));
    }

    public function StoreImages(Request $request){

        $image = $request->file('images');
        foreach($image as $multi_image){
            $name_gen = hexdec(uniqid()).'.'.$multi_image->getClientOriginalExtension();
            image::make($multi_image)->resize(300,300)->save('images/multipic/'.$name_gen);
            $last_image = 'images/multipic/'.$name_gen;

            Multipic::insert([
                'image' =>$last_image,
                'created_at' => Carbon::now(),
            ]);
        }
        return redirect()->back()->with('success','Images Upload Successfully');

    }

    public function MultipicDelete($id){
        $images = Multipic::find($id);
        $old_images = $images->image;
        unlink($old_images);

        Multipic::find($id)->delete();
        return redirect()->back()->with('success','Picture Delete Successfully');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
