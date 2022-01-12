<?php

namespace App\Http\Controllers\V1;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function index()
    {
        $messages = DB::table('messages')
            ->select('messages.*')->orderByDesc('messages.id')
            ->paginate(12);
        return view('admin.message.manageMessages',['messages'=>$messages]);
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $messages = array();

        $messages['user_name'] = $request->name;
        $messages['phone'] = $request->phone;
        $messages['subject'] = $request->subject;
        $messages['email'] = $request->email;
        $messages['message'] = $request->message;
        $messages['publication_status'] = 0;

        $success = DB::table('messages')->insert($messages);
        return redirect()->back()->with('msg','Your message has been sent to our Admin Panel, after reviewing your message we will contact you soon.');
    }

    public function show($id){
        $edit_category = DB::table('categories')
                    ->where('categories.id','=',$id)
                    ->get();
        return view('admin.category.editCategory',['edit_category'=>$edit_category]);
    }

    public function destroy(Request $request)
    {
        $id = $request->inputId;
        $success = DB::table('messages')->where('id', '=', $id)->delete();
        return redirect()->back()->with('msg','Message deleted successfully!');
        
    }

    public function activateMessage(Request $request){
        $id = $request->inputId;
        $messages = array();
        $messages['publication_status'] = 1;
        $success = DB::table('messages')->where('id','=',$id)->update($messages);
        return redirect()->back()->with('msg','Message stored as read successfully!');
    }
}
