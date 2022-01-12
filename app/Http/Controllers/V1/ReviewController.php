<?php

namespace App\Http\Controllers\V1;
use App\Http\Controllers\Controller;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = DB::table('reviews')
            ->select('reviews.*')
            ->orderByDesc('reviews.created_at')
            ->where('reviews.publication_status','=','1')
            ->get();
        return view('frontend.manages.reviews',['reviews'=>$reviews]);
    }
 
    public function create()
    {
        return view('frontend.single.review');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'user_name' => ['required', 'unique:reviews', 'min:3']
        ]);

        //dd($request->all());
        $reviews = array();

        $reviews['user_name'] = $request->user_name;
        $reviews['user_designation'] = $request->user_designation;
        $reviews['review_description'] = $request->review_description;
        $reviews['rating'] = $request->rating;
        $reviews['publication_status'] = 1;

        $member_id = DB::table('reviews')->select('id')->get();
        $count = $member_id->count();
        $max = $member_id->max('id')+1;

        if($validateData){
            if ($request->hasFile('user_image')) {
                $image = $request->file('user_image');
                $name = $max.'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('uploaded_images/reviews');
                $image->move($destinationPath, $name);

                $totalPathName = 'uploaded_images/reviews/'.$name;
                $reviews['user_image'] = $totalPathName;
                $success = DB::table('reviews')->insert($reviews);
                return redirect()->back()->with('msg','Review added with image database successfully!'); 
            }

            $success = DB::table('reviews')->insert($news);
            return redirect()->back()->with('msg','Review added without image database successfully!');
        }
    }

    public function manageReviews()
    {
        $reviews = DB::table('reviews')
            ->select('reviews.*')
            ->orderByDesc('reviews.created_at')
            ->get();
        return view('admin.review.manageReview',['reviews'=>$reviews]);
    }

    public function show($id){
        $edit_reviews = DB::table('reviews')
                    ->where('reviews.id','=',$id)
                    ->get();
        return view('admin.review.editReview',['edit_reviews'=>$edit_reviews]);
    }

    public function update(Request $request)
    {
        //dd($request->all());
        $id = $request->inputId;

        $reviews = array();
        $reviews['user_name'] = $request->user_name;
        $reviews['user_designation'] = $request->user_designation;
        $reviews['review_description'] = $request->review_description;
        $reviews['rating'] = $request->rating;
        $reviews['publication_status'] = $request->publication_status;

        if ($request->hasFile('user_image')) {
            $image = $request->file('user_image');
            $name = $id.'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('uploaded_images/reviews');
            $image->move($destinationPath, $name);
  
            $totalPathName = 'uploaded_images/reviews/'.$name;
            $reviews['user_image'] = $totalPathName;
            $success = DB::table('reviews')->where('id','=',$id)->update($reviews);
            return redirect()->back()->with('msg','Review updated with image successfully!'); 
        }

        $success = DB::table('reviews')->where('id','=',$id)->update($reviews);
        return redirect()->back()->with('msg','Review updated without image database successfully!');
    }

    public function destroy(Request $request)
    {
        //dd($request->all());
        $id = $request->inputId;
        $data = DB::table('reviews')
                        ->select('user_image')
                        ->where('id',$id)
                        ->first();
        unlink($data->user_image);
        $success = DB::table('reviews')->where('id', '=', $id)->delete();
        return redirect()->back()->with('msg','Review deleted with image  successfully!');
        
    }

    public function activateReview(Request $request){
        $id = $request->inputId;
        $reviews = array();
        $reviews['publication_status'] = 1;
        $success = DB::table('reviews')->where('id','=',$id)->update($reviews);
        return redirect()->back()->with('msg','Review activated successfully!');
    }

    public function deactivateReview(Request $request){
        $id = $request->inputId;
        $reviews = array();
        $reviews['publication_status'] = 0;
        $success = DB::table('reviews')->where('id','=',$id)->update($reviews);
        return redirect()->back()->with('msg','Review deactivated successfully!');
    }
}
