<?php

namespace App\Http\Controllers\V1;
use App\Http\Controllers\Controller;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = DB::table('categories')
            ->select('categories.*')
            ->get();
        //return response()->json($departments);
        return view('admin.category.manageCategory',['categories'=>$categories]);
    }

    public function create()
    {
        return view('admin.category.addCategory');
    }

    public function store(Request $request)
    {
        // $validateData = $request->validate([
        //     'department_name' => ['required', 'unique:departments', 'min:3']
        // ]);

        // if($validateData){
        //     $department = Department::create($request->all());
        //     return redirect()->back()->with('msg','Department save in database successfully!');
        // }

        //dd($request->all());
        $categories = array();

        $categories['category_name'] = $request->category_name;
        $categories['category_description'] = $request->category_description;
        $categories['publication_status'] = $request->publication_status;

        $cat_id = DB::table('categories')->select('id')->get();
        $count = $cat_id->count();
        $max = $cat_id->max('id')+1;

        if ($request->hasFile('category_image')) {

            $image = $request->file('category_image');
            $name = $max.'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('uploaded_images/categories');
            $image->move($destinationPath, $name);


            $totalPathName = 'uploaded_images/categories/'.$name;
            $categories['category_image'] = $totalPathName;
            $success = DB::table('categories')->insert($categories);
            return redirect()->back()->with('msg','Category added with image database successfully!');
        }

        $success = DB::table('categories')->insert($categories);
        return redirect()->back()->with('msg','Category added without image database successfully!');

    }

    public function show($id){
        $edit_category = DB::table('categories')
                    ->where('categories.id','=',$id)
                    ->get();
        return view('admin.category.editCategory',['edit_category'=>$edit_category]);
    }

    public function update(Request $request)
    {
        //dd($request->all());
        $id = $request->inputId;

        $categories = array();
        $categories['category_name'] = $request->category_name;
        $categories['category_description'] = $request->category_description;
        $categories['publication_status'] = $request->publication_status;

        if ($request->hasFile('category_image')) {
            $image = $request->file('category_image');
            $name = $id.'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('uploaded_images/categories');
            $image->move($destinationPath, $name);

            $totalPathName = 'uploaded_images/categories/'.$name;
            $categories['category_image'] = $totalPathName;
            $success = DB::table('categories')->where('id','=',$id)->update($categories);
            return redirect()->back()->with('msg','Category updated with image successfully!');
        }

        $success = DB::table('categories')->where('id','=',$id)->update($categories);
        return redirect()->back()->with('msg','Category updated without image database successfully!');
    }

    public function destroy(Request $request)
    {
        //dd($request->all());
        $id = $request->inputId;
        $data = DB::table('categories')
                        ->select('department_image')
                        ->where('id',$id)
                        ->first();
        unlink($data->department_image);
        $success = DB::table('categories')->where('id', '=', $id)->delete();
        return redirect()->back()->with('msg','Category deleted with image  successfully!');

    }

    public function activateDepartment(Request $request){
        $id = $request->inputId;
        $categories = array();
        $categories['publication_status'] = 1;
        $success = DB::table('categories')->where('id','=',$id)->update($categories);
        return redirect()->back()->with('msg','Category activated successfully!');
    }

    public function deactivateDepartment(Request $request){
        $id = $request->inputId;
        $categories = array();
        $categories['publication_status'] = 0;
        $success = DB::table('categories')->where('id','=',$id)->update($categories);
        return redirect()->back()->with('msg','Category deactivated successfully!');
    }

}
