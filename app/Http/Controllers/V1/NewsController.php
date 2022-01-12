<?php

namespace App\Http\Controllers\V1;
use App\Http\Controllers\Controller;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class NewsController extends Controller
{
    public function index()
    {
        $news = DB::table('news')
            ->join('categories','categories.id','news.category_id')
            ->select('categories.category_name')
            ->select('news.*')
            ->orderByDesc('news.created_at')
            ->get();
        //return response()->json($departments);
        return view('admin.news.manageNews',['news'=>$news]);
    }

    public function create()
    {
        return view('admin.news.addNews');
    }

    public function store(Request $request)
    {
        // $validateData = $request->validate([
        //     'news_title' => ['required', 'unique:news', 'min:3']
        // ]);
        // if($validateData){
        //     $department = News::create($request->all());
        //     return redirect()->back()->with('msg','News save in database successfully!');
        // }

        //dd($request->all());
        $news = array();

        $news['category_id'] = $request->category_id;
        $news['news_title'] = $request->news_title;
        $news['news_description'] = $request->news_description;
        $news['news_url'] = $request->news_url;
        $news['publication_status'] = $request->publication_status;

        $dep_id = DB::table('news')->select('id')->get();
        $count = $dep_id->count();
        $max = $dep_id->max('id')+1;

        if ($request->hasFile('news_image')) {
            
            $image = $request->file('news_image');
            $name = $max.'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('uploaded_images/news');
            $image->move($destinationPath, $name);
            //$this->save();

            //$totalPathName = 'public/uploaded_images/'.$name;
            //print_r($totalPathName) ;  
            $totalPathName = 'uploaded_images/news/'.$name;
            $news['news_image'] = $totalPathName;
            $success = DB::table('news')->insert($news);
            return redirect()->back()->with('msg','News added with image database successfully!'); 
        }

        $success = DB::table('news')->insert($news);
        return redirect()->back()->with('msg','News added without image database successfully!');
    }

    public function show($id){
        $edit_news = DB::table('news')
                    ->where('news.id','=',$id)
                    ->get();
        return view('admin.news.editNews',['edit_news'=>$edit_news]);
    }

    public function update(Request $request)
    {
        //dd($request->all());
        $id = $request->inputId;

        $news = array();
        $news['news_title'] = $request->news_title;
        $news['news_description'] = $request->news_description;
        $news['news_url'] = $request->news_url;
        $news['publication_status'] = $request->publication_status;

        if ($request->hasFile('news_image')) {
            $image = $request->file('news_image');
            $name = $id.'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('uploaded_images/news');
            $image->move($destinationPath, $name);
  
            $totalPathName = 'uploaded_images/news/'.$name;
            $news['news_image'] = $totalPathName;
            $success = DB::table('news')->where('id','=',$id)->update($news);
            return redirect()->back()->with('msg','News updated with image successfully!'); 
        }

        $success = DB::table('news')->where('id','=',$id)->update($news);
        return redirect()->back()->with('msg','News updated without image database successfully!');
    }

    public function destroy(Request $request)
    {
        //dd($request->all());
        $id = $request->inputId;
        $success = DB::table('news')->where('id', '=', $id)->delete();
        return redirect()->back()->with('msg','News deleted with image  successfully!');
        
    }

    public function activateNews(Request $request){
        $id = $request->inputId;
        $news = array();
        $news['publication_status'] = 1;
        $success = DB::table('news')->where('id','=',$id)->update($news);
        return redirect()->back()->with('msg','News activated successfully!');
    }

    public function deactivateNews(Request $request){
        $id = $request->inputId;
        $news = array();
        $news['publication_status'] = 0;
        $success = DB::table('news')->where('id','=',$id)->update($news);
        return redirect()->back()->with('msg','News deactivated successfully!');
    }
}
