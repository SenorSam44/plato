<?php

namespace App\Http\Controllers\V1;
use App\Http\Controllers\Controller;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = DB::table('abouts')
            ->select('abouts.*')
            ->get();
        return view('admin.about.manageAbout',['abouts'=>$abouts]);
    }

    public function create()
    {
        return view('admin.about.addAbout');
    }

    public function store(Request $request)
    {
        // $validateData = $request->validate([
        //     'banner_title' => ['required', 'unique:banners', 'min:3']
        // ]);
        // if($validateData){
        //     $banner = Banner::create($request->all());
        //     return redirect()->back()->with('msg','Banner save in database successfully!');
        // }

        //dd($request->all());
        $abouts = array();

        $abouts['about_title'] = $request->about_title;
        $abouts['about_description'] = $request->about_description;
        $abouts['publication_status'] = $request->publication_status;

        $dep_id = DB::table('abouts')->select('id')->get();
        $count = $dep_id->count();
        $max = $dep_id->max('id')+1;

        if ($request->hasFile('about_image')) {
            
            $image = $request->file('about_image');
            $name = $max.'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('uploaded_images/abouts');
            $image->move($destinationPath, $name);
            //$this->save();

            //$totalPathName = 'public/uploaded_images/'.$name;
            //print_r($totalPathName) ;  
            $totalPathName = 'uploaded_images/abouts/'.$name;
            $abouts['about_image'] = $totalPathName;
            $success = DB::table('abouts')->insert($abouts);
            return redirect()->back()->with('msg','About added with image database successfully!'); 
        }

        $success = DB::table('abouts')->insert($abouts);
        return redirect()->back()->with('msg','About added without image database successfully!');
    }

    public function show($id){
        $edit_about = DB::table('abouts')
                    ->where('abouts.id','=',$id)
                    ->get();
        return view('admin.about.editAbout',['edit_about'=>$edit_about]);
    }

    public function update(Request $request)
    {
        //dd($request->all());
        $id = $request->inputId;

        $abouts = array();
        $abouts['about_title'] = $request->about_title;
        $abouts['about_description'] = $request->about_description;
        $abouts['publication_status'] = $request->publication_status;

        if ($request->hasFile('about_image')) {
            $image = $request->file('about_image');
            $name = $id.'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('uploaded_images\abouts');
            $image->move($destinationPath, $name);
  
            $totalPathName = 'uploaded_images/abouts/'.$name;
            $abouts['about_image'] = $totalPathName;
            $success = DB::table('abouts')->where('id','=',$id)->update($abouts);
            return redirect()->back()->with('msg','About added with image database successfully!'); 
        }

        $success = DB::table('abouts')->where('id','=',$id)->update($abouts);
        return redirect()->back()->with('msg','About added without image database successfully!');

    }

    public function destroy(Request $request)
    {
        //dd($request->all());
        $id = $request->inputId;

        $data = DB::table('abouts')
                        ->select('about_image')
                        ->where('id',$id)
                        ->first();
        unlink($data->about_image);
        $success = DB::table('abouts')->where('id', '=', $id)->delete();
        return redirect()->back()->with('msg','About deleted with image  successfully!');
        
    }

    public function activateAbout(Request $request){
        $id = $request->inputId;
        $abouts = array();
        $abouts['publication_status'] = 1;
        $success = DB::table('abouts')->where('id','=',$id)->update($abouts);
        return redirect()->back()->with('msg','About activated successfully!');
    }

    public function deactivateAbout(Request $request){
        $id = $request->inputId;
        $abouts = array();
        $abouts['publication_status'] = 0;
        $success = DB::table('abouts')->where('id','=',$id)->update($abouts);
        return redirect()->back()->with('msg','About deactivated successfully!');
    }

}
