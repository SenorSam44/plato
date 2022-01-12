<?php

namespace App\Http\Controllers\V1;
use App\Http\Controllers\Controller;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = DB::table('projects')
            ->join('projects_images','projects.id','=','projects_images.project_id')
            ->select('projects.*',
                'projects_images.project_id', 
                'projects_images.project_image1',
                'projects_images.project_image2',
                'projects_images.project_image3',
                'projects_images.project_image4',
                'projects_images.project_image5',
                'projects_images.project_image6',
                'projects_images.project_image7',
                'projects_images.project_image8',
                'projects_images.project_image9',
                'projects_images.project_image10',
                'projects_images.project_image11',
                'projects_images.project_image12')
            ->get();
            //->paginate(12);
        return view('admin.project.manageProject',['projects'=>$projects]);
    }

    public function create()
    {
        return view('admin.project.addProject');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $projects = array();
        $projects['project_title'] = $request->project_title;
        $projects['category_id'] = $request->category_id;

        $projects['address'] = $request->address;
        $projects['land_area'] = $request->land_area;
        $projects['occupation_type'] = $request->occupation_type;
        $projects['classification'] = $request->classification;
        $projects['no_of_stories'] = $request->no_of_stories;
        $projects['no_of_car_parking'] = $request->no_of_car_parking;
        $projects['apartment_size'] = $request->apartment_size;
        $projects['no_of_apartment'] = $request->no_of_apartment;
        $projects['no_of_lifts'] = $request->no_of_lifts;
        $projects['no_of_stairs'] = $request->no_of_stairs;
        $projects['no_of_generator'] = $request->no_of_generator;
        $projects['water_reserve'] = $request->water_reserve;

        $projects['start_date'] = $request->start_date;
        $projects['end_date'] = $request->end_date;
        $projects['project_description'] = $request->project_description;
        $projects['publication_status'] = $request->publication_status;

        //At first insert all data and then rest images
        //$success = DB::table('projects')->insert($projects);
        $project_id = DB::table('projects')->insertGetId($projects);
        $max = $project_id;


        $projects_images = array();
        $projects_images['project_id'] = $project_id;

        for($i=1;$i<=12;$i++){
            if ($request->hasFile('project_image'.$i)) {
                
                $image = $request->file('project_image'.$i);
                $name = $max.'-x'.$i.'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('uploaded_images/projects');
                $image->move($destinationPath, $name); 
                $totalPathName = 'uploaded_images/projects/'.$name;
                $projects_images['project_image'.$i] = $totalPathName; 
            }  
        }

        //print_r($projects);
        $success = DB::table('projects_images')->insert($projects_images);
        return redirect()->back()->with('msg','Project added to database successfully!');
    }

    public function show($id){
        $edit_project = DB::table('projects')
                    ->join('projects_images','projects.id','=','projects_images.project_id')
                    ->where('projects.id','=',$id)
                    ->get();
        return view('admin.project.editProject',['edit_project'=>$edit_project]);
    }

    public function update(Request $request)
    {
        //dd($request->all());

        $id = $request->inputId;

        $projects = array();
        $projects['project_title'] = $request->project_title;
        $projects['category_id'] = $request->category_id;

        $projects['address'] = $request->address;
        $projects['land_area'] = $request->land_area;
        $projects['occupation_type'] = $request->occupation_type;
        $projects['classification'] = $request->classification;
        $projects['no_of_stories'] = $request->no_of_stories;
        $projects['no_of_car_parking'] = $request->no_of_car_parking;
        $projects['apartment_size'] = $request->apartment_size;
        $projects['no_of_apartment'] = $request->no_of_apartment;
        $projects['no_of_lifts'] = $request->no_of_lifts;
        $projects['no_of_stairs'] = $request->no_of_stairs;
        $projects['no_of_generator'] = $request->no_of_generator;
        $projects['water_reserve'] = $request->water_reserve;

        $projects['start_date'] = $request->start_date;
        $projects['end_date'] = $request->end_date;
        $projects['project_description'] = $request->project_description;
        $projects['publication_status'] = $request->publication_status;

        //At first insert all data and then rest images
        //$success = DB::table('projects')->insert($projects);
        $project_id = $request->inputId;
        $max = $project_id;

        $project_id = DB::table('projects')->where('id','=',$max)->update($projects);


        $projects_images = array();

        for($i=1;$i<=12;$i++){
            if ($request->hasFile('project_image'.$i)) {
                
                $image = $request->file('project_image'.$i);
                $name = $max.'-x'.$i.'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('uploaded_images/projects');
                $image->move($destinationPath, $name); 
                $totalPathName = 'uploaded_images/projects/'.$name;
                $projects_images['project_image'.$i] = $totalPathName; 
            }  
        }
        
        //print_r($projects);
        $success = DB::table('projects_images')->where('project_id','=',$max)->update($projects_images);
        return redirect()->back()->with('msg','Project updated to database successfully!');
    }

    public function destroy(Request $request)
    {
        //dd($request->all());
        $id = $request->inputId;

        $data = DB::table('projects')
                        ->join('projects_images','projects_images.project_id','projects.id')
                        ->select('projects_images.*')
                        ->where('projects.id',$id)
                        ->first();
                        
        if($data->project_image1){
          unlink($data->project_image1);  
        }
        if($data->project_image2){
          unlink($data->project_image2);  
        }
        if($data->project_image3){
          unlink($data->project_image3);  
        }
        if($data->project_image4){
          unlink($data->project_image4);  
        }
        if($data->project_image5){
          unlink($data->project_image5);  
        }
        if($data->project_image6){
          unlink($data->project_image6);  
        }
        if($data->project_image7){
          unlink($data->project_image7);  
        }
        if($data->project_image8){
          unlink($data->project_image8);  
        }
        if($data->project_image9){
          unlink($data->project_image9);  
        }
        if($data->project_image10){
          unlink($data->project_image10);  
        }  
        if($data->project_image11){
          unlink($data->project_image11);  
        }
        if($data->project_image12){
          unlink($data->project_image12);  
        }  

        $success = DB::table('projects')->where('id', '=', $id)->delete();
        return redirect()->back()->with('msg','Project deleted with image  successfully!');
        
    }

    public function activateProject(Request $request){
        $id = $request->inputId;
        $projects = array();
        $projects['publication_status'] = 1;
        $success = DB::table('projects')->where('id','=',$id)->update($projects);
        return redirect()->back()->with('msg','Project activated successfully!');
    }

    public function deactivateProject(Request $request){
        $id = $request->inputId;
        $projects = array();
        $projects['publication_status'] = 0;
        $success = DB::table('projects')->where('id','=',$id)->update($projects);
        return redirect()->back()->with('msg','Project deactivated successfully!');
    }
}
