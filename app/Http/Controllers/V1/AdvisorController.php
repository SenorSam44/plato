<?php

namespace App\Http\Controllers\V1;
use App\Http\Controllers\Controller;

use App\Models\Advisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdvisorController extends Controller
{
    public function index()
    {
        $advisors = DB::table('advisors')
            ->select('advisors.*')
            ->paginate(12);
        return view('admin.advisor.manageAdvisor',['advisors'=>$advisors]);
    }

    public function create()
    {
        return view('admin.advisor.addAdvisor');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $advisors = array();

        $advisors['advisor_name'] = $request->advisor_name;
        $advisors['advisor_designation'] = $request->advisor_designation;
        $advisors['advisor_description'] = $request->advisor_description;
        $advisors['publication_status'] = $request->publication_status;

        $advisor_id = DB::table('advisors')->select('id')->get();
        $count = $advisor_id->count();
        $max = $advisor_id->max('id')+1;

        if ($request->hasFile('advisor_image')) {

            $image = $request->file('advisor_image');
            $name = $max.'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('uploaded_images/advisors');
            $image->move($destinationPath, $name);
            //$this->save();

            //$totalPathName = 'public/uploaded_images/'.$name;
            //print_r($totalPathName) ;
            $totalPathName = 'uploaded_images/advisors/'.$name;
            $advisors['advisor_image'] = $totalPathName;
            $success = DB::table('advisors')->insert($advisors);
            return redirect()->back()->with('msg','Advisor added with image database successfully!');
        }

        $success = DB::table('advisors')->insert($news);
        return redirect()->back()->with('msg','Advisor added without image database successfully!');

    }

    public function show($id){
        $edit_advisor = DB::table('advisors')
                    ->where('advisors.id','=',$id)
                    ->get();
        return view('admin.advisor.editAdvisor',['edit_advisor'=>$edit_advisor]);
    }

    public function update(Request $request)
    {
        //dd($request->all());
        $id = $request->inputId;

        $advisors = array();
        $advisors['advisor_name'] = $request->advisor_name;
        $advisors['advisor_designation'] = $request->advisor_designation;
        $advisors['advisor_description'] = $request->advisor_description;
        $advisors['publication_status'] = $request->publication_status;

        if ($request->hasFile('advisor_image')) {
            $image = $request->file('advisor_image');
            $name = $id.'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('uploaded_images/advisors');
            $image->move($destinationPath, $name);

            $totalPathName = 'uploaded_images/advisors/'.$name;
            $advisors['advisor_image'] = $totalPathName;
            $success = DB::table('advisors')->where('id','=',$id)->update($advisors);
            return redirect()->back()->with('msg','Advisor updated with image successfully!');
        }

        $success = DB::table('advisors')->where('id','=',$id)->update($advisors);
        return redirect()->back()->with('msg','Advisor updated without image database successfully!');
    }

    public function destroy(Request $request)
    {
        //dd($request->all());
        $id = $request->inputId;
        $data = DB::table('advisors')
                        ->select('advisor_image')
                        ->where('id',$id)
                        ->first();
        unlink($data->advisor_image);
        $success = DB::table('advisors')->where('id', '=', $id)->delete();
        return redirect()->back()->with('msg','Advisor deleted with image  successfully!');

    }

    public function activateAdvisor(Request $request){
        $id = $request->inputId;
        $advisors = array();
        $advisors['publication_status'] = 1;
        $success = DB::table('advisors')->where('id','=',$id)->update($advisors);
        return redirect()->back()->with('msg','Advisor activated successfully!');
    }

    public function deactivateAdvisor(Request $request){
        $id = $request->inputId;
        $advisors = array();
        $advisors['publication_status'] = 0;
        $success = DB::table('advisors')->where('id','=',$id)->update($advisors);
        return redirect()->back()->with('msg','Advisor deactivated successfully!');
    }
}
