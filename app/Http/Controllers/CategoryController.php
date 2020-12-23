<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function AllCat()
    {
        $categories = Category::paginate(4);
        $trashcat = Category::onlyTrashed()->paginate(3);
        //$categories = DB::table('Categories')->paginate(4);

        /* $categories = DB::table('categories')
            ->join('users', 'categories.user_id','users.id')
            ->select('categories.*', 'users.name')
            ->latest()->paginate(4); */
        return view('admin.category.index', compact('categories','trashcat'));
    }

    public function StoreCat(Request $request)
    {
        $validatedData = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ], [
            'category_name.required' => 'Please Input Category name',
            'category_name.max' => 'You Can Input between 255 character',
        ]);

        Category::insert([
            'category_name' => $request->cat_name,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        /* $category = new Category;
        $category->category_name = $request->category_name;
        $category->user_id = Auth::user()->id;
        $result = $category->save(); */

        /* $data = array();
        $data['category_name'] = $request->category_name;
        $data['user_id'] = Auth::user()->id;
        DB::table('categories')->insert($data); */
        return redirect()->back()->with('success','Category Added Successfully');
    }

    public function Edit($id){
        //$categories = Category::find($id);
        $categories = DB::table('categories')->where('id', $id)->first();
        return view('admin.category.edit', compact('categories'));
    }

    public function UpdateCat(Request $request, $id){
        /* $update = Category::find($id)->update([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id,
        ]); */

        $data = array();
        $data['category_name'] = $request->category_name;
        $data['user_id'] = Auth::user()->id;
        DB::table('categories')->where('id',$id)->update($data);

        return redirect()->route('all.category')->with('success','Category Updated Successfully');
    }

    //delete
    public function SoftDelete($id){
        $delete = Category::find($id)->delete();
        return redirect()->back()->with('success', 'Category Soft Delete Successfully');
    }

    public function restore($id){
        $delete = Category::withTrashed()->find($id)->restore();
        return redirect()->back()->with('success', 'Category Stored Successfully');
    }

    public function pDelete($id){
        $delete = Category::onlyTrashed()->find($id)->forceDelete();
        return redirect()->back()->with('success', 'Category Permanantly Delete');
    }
}
