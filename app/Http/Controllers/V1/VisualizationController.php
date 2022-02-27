<?php

namespace App\Http\Controllers\V1;
use App\Http\Controllers\Controller;

use App\Models\Visualization;
use Carbon\Carbon;
use FFMpeg\Coordinate\TimeCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use ProtoneMedia\LaravelFFMpeg\Drivers\PHPFFMpeg;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

class VisualizationController extends Controller
{
    public function index()
    {
        $visualizations = DB::table('visualizations')
            ->select('visualizations.*')
            ->get();
        return view('admin.visualization.manageVisualization',['visualizations'=>$visualizations]);
    }

    public function create()
    {
        return view('admin.visualization.editVisualization');
    }

    public function store(Request $request)
    {
        // $validateData = $request->validate([
        //     'visualization_title' => ['required', 'unique:visualizations', 'min:3']
        // ]);
        // if($validateData){
        //     $visualization = Visualization::create($request->all());
        //     return redirect()->back()->with('msg','Visualization save in database successfully!');
        // }

        //dd($request->all());
        $visualizations = array();

        $visualizations['visualization_title'] = $request->visualization_title;
        $visualizations['visualization_subtitle'] = $request->visualization_subtitle;
        $visualizations['visualization_description'] = $request->visualization_description;
        $visualizations['publication_status'] = $request->publication_status;

        $dep_id = DB::table('visualizations')->select('id')->get();
        $count = $dep_id->count();
        $max = $dep_id->max('id')+1;


        if ($request->hasFile('gallery_file')) {
            $gallery_file_array = [];
            foreach ($request->file('gallery_file') as $gallery_file){
//                $image = $request->file('visualization_video');
//                $name = $max.'.'.$image->getClientOriginalExtension();
//                $destinationPath = public_path('uploaded_videos/visualizations');
//                $image->move($destinationPath, $name);
//                //$this->save();
//
//                //$totalPathName = 'public/uploaded_videos/'.$name;
//                //print_r($totalPathName) ;
//                $totalPathName = 'uploaded_videos/visualizations/'.$name;
//                $visualizations['visualization_video'] = $totalPathName;
                $name = $max."-".Carbon::now()->toTimeString().".".$gallery_file->getClientOriginalExtension();
                $destinationPath = public_path('uploaded_videos/visualizations');
                $gallery_file->move($destinationPath, $name);

                $totalPathName = 'uploaded_videos/visualizations/'.$name;
                array_push($gallery_file_array, $totalPathName);
            }
            $visualizations['gallery_file'] = serialize($gallery_file_array);
        }

        if ($request->hasFile('visualization_video')) {

            $image = $request->file('visualization_video');
            $name = $max.'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('uploaded_videos/visualizations');
            $image->move($destinationPath, $name);

            $totalPathName = 'uploaded_videos/visualizations/'.$name;
            $visualizations['visualization_video'] = $totalPathName;

            try {
                $ffvideo = FFMpeg::fromDisk('directpublic')->open($totalPathName);

                $name = $id . '.jpg';
                $destinationPath = public_path('uploaded_images/visualizations');

                $ffvideo->getFrameFromSeconds(0)->export()->toDisk('directpublic')->save('/uploaded_images/visualizations/'.$name);

                $totalPathName = 'uploaded_images/visualizations/' . $name;
                $visualizations['visualization_image'] = $totalPathName;

            }catch (\Exception $e){

            }

            $success = DB::table('visualizations')->insert($visualizations);
            return redirect()->back()->with('msg','Visualization added with video database successfully!');
        }
        else if ($request->hasFile('visualization_image')) {

            $image = $request->file('visualization_image');
            $name = $max.'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('uploaded_images/visualizations');
            $image->move($destinationPath, $name);


            $totalPathName = 'uploaded_images/visualizations/'.$name;
            $visualizations['visualization_image'] = $totalPathName;
            $success = DB::table('visualizations')->insert($visualizations);
            return redirect()->back()->with('msg','Visualization added with image database successfully!');
        }

        return redirect()->back()->with('msg','Visualization added');
    }


    public function show($id){
        $visualization = DB::table('visualizations')
            ->where('visualizations.id','=',$id)
            ->first();
        return view('admin.visualization.editVisualization',['visualization'=>$visualization]);
    }


    public function update(Request $request)
    {
        $id = $request->inputId?? Visualization::max('id')+1;

        $visualizations = array();
//        if (isset($request->inputId)){
//            $visualizations['id'] = $id;
//        }
        $visualizations['visualization_title'] = $request->visualization_title;
        $visualizations['visualization_subtitle'] = $request->visualization_subtitle;
        $visualizations['visualization_description'] = $request->visualization_description;
        $visualizations['publication_status'] = $request->publication_status;

        if ($request->hasFile('gallery_file')) {
            $gallery_file_array = [];
            foreach ($request->file('gallery_file') as $gallery_file){
//                $image = $request->file('visualization_video');
//                $name = $max.'.'.$image->getClientOriginalExtension();
//                $destinationPath = public_path('uploaded_videos/visualizations');
//                $image->move($destinationPath, $name);
//                //$this->save();
//
//                //$totalPathName = 'public/uploaded_videos/'.$name;
//                //print_r($totalPathName) ;
//                $totalPathName = 'uploaded_videos/visualizations/'.$name;
//                $visualizations['visualization_video'] = $totalPathName;
                $name = $id."-".Carbon::now()->toTimeString().".".$gallery_file->getClientOriginalExtension();
                $destinationPath = public_path('uploaded_videos/visualizations');
                $gallery_file->move($destinationPath, $name);

                $totalPathName = 'uploaded_videos/visualizations/'.$name;
                array_push($gallery_file_array, $totalPathName);
            }
            $visualizations['gallery_file'] = serialize($gallery_file_array);
        }

        if ($request->hasFile('visualization_video')) {
            $video = $request->file('visualization_video');
            $name = $id.'.'.$video->getClientOriginalExtension();
            $destinationPath = public_path('uploaded_videos/visualizations');
            $video->move($destinationPath, $name);
            //$this->save();

            //$totalPathName = 'public/uploaded_videos/'.$name;
            //print_r($totalPathName) ;
            $totalPathName = 'uploaded_videos/visualizations/'.$name;
            $visualizations['visualization_video'] = $totalPathName;
//            $success = DB::table('visualizations')->where('id','=',$id)->updateOrInsert($visualizations);

            //image thumbnail

            try {
                $ffvideo = FFMpeg::fromDisk('directpublic')->open($totalPathName);


//            $image = $request->file('visualization_image');
                $name = $id . '.jpg';
                $destinationPath = public_path('uploaded_images/visualizations');
//            $image->move($destinationPath, $name);
//            dd($ffvideo->getFrameFromSeconds(2)->export());
                $ffvideo->getFrameFromSeconds(0)->export()->toDisk('directpublic')->save('/uploaded_images/visualizations/'.$name);

                $totalPathName = 'uploaded_images/visualizations/' . $name;
                $visualizations['visualization_image'] = $totalPathName;

            }catch (\Exception $e){

            }
            if ($request->inputId){
                DB::table('visualizations')->where('id', '=', $id)->update($visualizations);
            }else{
                DB::table('visualizations')->where('id', '=', $id)->insert($visualizations);
            }
            return redirect()->back()->with('msg','Visualization added with video database successfully!');
        }

        if ($request->hasFile('visualization_image')) {
            $image = $request->file('visualization_image');
            $name = $id.'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('uploaded_images/visualizations');
            $image->move($destinationPath, $name);

            $totalPathName = 'uploaded_images/visualizations/'.$name;
            $visualizations['visualization_image'] = $totalPathName;
            $success = DB::table('visualizations')->where('id','=',$id)->update($visualizations);
            return redirect()->back()->with('msg','Visualization added with image database successfully!');
        }

        $success = DB::table('visualizations')->where('id','=',$id)->update($visualizations);
        return redirect()->back()->with('msg','Visualization added without image database successfully!');

    }

    public function destroy(Request $request)
    {
        //dd($request->all());
        $id = $request->inputId;

        $data = DB::table('visualizations')
            ->select('visualization_image')
            ->where('id',$id)
            ->first();
        try{
            unlink($data->visualization_image);
            unlink($data->visualization_video);

        }catch (\Exception $E){

        }
        $success = DB::table('visualizations')->where('id', '=', $id)->delete();
        return redirect()->back()->with('msg','Visualization deleted with image  successfully!');

    }

    public function activateVisualization(Request $request){
        $id = $request->inputId;
        $visualizations = array();
        $visualizations['publication_status'] = 1;
        $success = DB::table('visualizations')->where('id','=',$id)->update($visualizations);
        return redirect()->back()->with('msg','Visualization activated successfully!');
    }

    public function deactivateVisualization(Request $request){
        $id = $request->inputId;
        $visualizations = array();
        $visualizations['publication_status'] = 0;
        $success = DB::table('visualizations')->where('id','=',$id)->update($visualizations);
        return redirect()->back()->with('msg','Visualization deactivated successfully!');
    }

}
