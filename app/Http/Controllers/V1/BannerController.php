<?php

namespace App\Http\Controllers\V1;
use App\Http\Controllers\Controller;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BannerController extends Controller
{
    public function index()
    {
        $banners = DB::table('banners')
            ->select('banners.*')
            ->get();
        return view('admin.banner.manageBanner',['banners'=>$banners]);
    }

    public function create()
    {
        return view('admin.banner.addBanner');
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
        $banners = array();

        $banners['banner_title'] = $request->banner_title;
        $banners['banner_subtitle'] = $request->banner_subtitle;
        $banners['banner_description'] = $request->banner_description;
        $banners['publication_status'] = $request->publication_status;

        $dep_id = DB::table('banners')->select('id')->get();
        $count = $dep_id->count();
        $max = $dep_id->max('id')+1;

        if ($request->hasFile('banner_image')) {

            $image = $request->file('banner_image');
            $name = $max.'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('uploaded_images/banners');
            $image->move($destinationPath, $name);
            //$this->save();

            //$totalPathName = 'public/uploaded_images/'.$name;
            //print_r($totalPathName) ;
            $totalPathName = 'uploaded_images/banners/'.$name;
            $banners['banner_image'] = $totalPathName;
            $success = DB::table('banners')->insert($banners);
            return redirect()->back()->with('msg','Banner added with image database successfully!');
        }

        $success = DB::table('banners')->insert($banners);
        return redirect()->back()->with('msg','Banner added without image database successfully!');
    }

    public function show($id){
        $edit_banner = DB::table('banners')
            ->where('banners.id','=',$id)
            ->get();
        return view('admin.banner.editBanner',['edit_banner'=>$edit_banner]);
    }

    public function update(Request $request)
    {
        //dd($request->all());
        $id = $request->inputId;

        $banners = array();
        $banners['banner_title'] = $request->banner_title;
        $banners['banner_subtitle'] = $request->banner_subtitle;
        $banners['banner_description'] = $request->banner_description;
        $banners['publication_status'] = $request->publication_status;

        if ($request->hasFile('banner_image')) {
            $image = $request->file('banner_image');
            $name = $id.'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('uploaded_images/banners');
            $image->move($destinationPath, $name);

            $totalPathName = 'uploaded_images/banners/'.$name;
            $banners['banner_image'] = $totalPathName;
            $success = DB::table('banners')->where('id','=',$id)->update($banners);
            return redirect()->back()->with('msg','Banner added with image database successfully!');
        }

        $success = DB::table('banners')->where('id','=',$id)->update($banners);
        return redirect()->back()->with('msg','Banner added without image database successfully!');

    }

    public function destroy(Request $request)
    {
        //dd($request->all());
        $id = $request->inputId;

        $data = DB::table('banners')
            ->select('banner_image')
            ->where('id',$id)
            ->first();
        unlink($data->banner_image);
        $success = DB::table('banners')->where('id', '=', $id)->delete();
        return redirect()->back()->with('msg','Banner deleted with image  successfully!');

    }

    public function activateBanner(Request $request){
        $id = $request->inputId;
        $banners = array();
        $banners['publication_status'] = 1;
        $success = DB::table('banners')->where('id','=',$id)->update($banners);
        return redirect()->back()->with('msg','Banner activated successfully!');
    }

    public function deactivateBanner(Request $request){
        $id = $request->inputId;
        $banners = array();
        $banners['publication_status'] = 0;
        $success = DB::table('banners')->where('id','=',$id)->update($banners);
        return redirect()->back()->with('msg','Banner deactivated successfully!');
    }

}
