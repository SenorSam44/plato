<?php

namespace App\Http\Controllers\V1;
use App\Http\Controllers\Controller;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MemberController extends Controller
{
    public function index()
    {
        $members = DB::table('members')
            ->select('members.*')
            ->paginate(12);
        return view('admin.member.manageMember',['members'=>$members]);
    }

    public function create()
    {
        return view('admin.member.addMember');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $members = array();

        $members['member_name'] = $request->member_name;
        $members['member_designation'] = $request->member_designation;
        $members['member_description'] = $request->member_description;
        $members['publication_status'] = $request->publication_status;

        $member_id = DB::table('members')->select('id')->get();
        $count = $member_id->count();
        $max = $member_id->max('id')+1;

        if ($request->hasFile('member_image')) {
            
            $image = $request->file('member_image');
            $name = $max.'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('uploaded_images/members');
            $image->move($destinationPath, $name);
            //$this->save();

            //$totalPathName = 'public/uploaded_images/'.$name;
            //print_r($totalPathName) ;  
            $totalPathName = 'uploaded_images/members/'.$name;
            $members['member_image'] = $totalPathName;
            $success = DB::table('members')->insert($members);
            return redirect()->back()->with('msg','Member added with image database successfully!'); 
        }

        $success = DB::table('members')->insert($news);
        return redirect()->back()->with('msg','Member added without image database successfully!');

    }

    public function show($id){
        $edit_member = DB::table('members')
                    ->where('members.id','=',$id)
                    ->get();
        return view('admin.member.editMember',['edit_member'=>$edit_member]);
    }

    public function update(Request $request)
    {
        //dd($request->all());
        $id = $request->inputId;

        $members = array();
        $members['member_name'] = $request->member_name;
        $members['member_designation'] = $request->member_designation;
        $members['member_description'] = $request->member_description;
        $members['publication_status'] = $request->publication_status;

        if ($request->hasFile('member_image')) {
            $image = $request->file('member_image');
            $name = $id.'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('uploaded_images/members');
            $image->move($destinationPath, $name);
  
            $totalPathName = 'uploaded_images/members/'.$name;
            $members['member_image'] = $totalPathName;
            $success = DB::table('members')->where('id','=',$id)->update($members);
            return redirect()->back()->with('msg','Member updated with image successfully!'); 
        }

        $success = DB::table('members')->where('id','=',$id)->update($members);
        return redirect()->back()->with('msg','Member updated without image database successfully!');
    }

    public function destroy(Request $request)
    {
        //dd($request->all());
        $id = $request->inputId;
        $data = DB::table('members')
                        ->select('member_image')
                        ->where('id',$id)
                        ->first();
        unlink($data->member_image);
        $success = DB::table('members')->where('id', '=', $id)->delete();
        return redirect()->back()->with('msg','Member deleted with image  successfully!');
        
    }

    public function activateMember(Request $request){
        $id = $request->inputId;
        $members = array();
        $members['publication_status'] = 1;
        $success = DB::table('members')->where('id','=',$id)->update($members);
        return redirect()->back()->with('msg','Member activated successfully!');
    }

    public function deactivateMember(Request $request){
        $id = $request->inputId;
        $members = array();
        $members['publication_status'] = 0;
        $success = DB::table('members')->where('id','=',$id)->update($members);
        return redirect()->back()->with('msg','Member deactivated successfully!');
    }
}
