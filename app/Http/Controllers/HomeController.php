<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        return view('frontend.home_content');
    }

    public function banners()
    {
        $banners = DB::table('banners')
            ->select('banners.*')
            ->get();
        return view('frontend.banners',['banners'=>$banners]);
    }

    public function categories()
    {
        $categories = DB::table('categories')
            ->select('categories.*')
            ->get();
        return view('frontend.manages.categories',['categories'=>$categories]);
    }

    public function projects()
    {
        $projects = DB::table('categories')
                    ->join('projects', 'categories.id','=','projects.category_id' )
                    ->join('projects_images', 'projects.id','=','projects_images.project_id' )
                    ->select('projects.*','projects_images.*','categories.category_name')
                    ->where('projects.publication_status','=','1')
                    ->where('categories.publication_status','=','1')
                    ->inRandomOrder()
                    ->limit(10)
                    ->get();
        return view('frontend.manages.projects',['projects'=>$projects]);
    }

    public function projects2()
    {
        $projects = DB::table('categories')
                    ->join('projects', 'categories.id','=','projects.category_id' )
                    ->join('projects_images', 'projects.id','=','projects_images.project_id' )
                    ->select('projects.*','projects_images.*','categories.category_name')
                    ->where('projects.publication_status','=','1')
                    ->where('categories.publication_status','=','1')
                    ->get();
        return view('frontend.manages.projects',['projects'=>$projects]);
    }

    public function singleProject($id)
    {
        $single_project = DB::table('categories')
                    ->join('projects', 'categories.id','=','projects.category_id' )
                    ->join('projects_images', 'projects.id','=','projects_images.project_id' )
                    ->select('projects.*','projects_images.*','categories.category_name')
                    ->where('projects.publication_status','=','1')
                    ->where('categories.publication_status','=','1')
                    ->where('projects.id','=',$id)
                    ->first();
        return view('frontend.single.project',['single_project'=>$single_project]);
    }

    public function projectModal($id)
    {
        $project = DB::table('categories')
            ->join('projects', 'categories.id','=','projects.category_id' )
            ->select('projects.*','categories.category_name')
            ->where('projects.id','=',$id)
            ->first();

        return view('frontend.includes.project_modal',[
            'project'=>$project
        ]);
    }

    public function categorizedProjects($name)
    {
        $categorized_projects = DB::table('projects')
             ->join('categories','projects.category_id','categories.id')
             ->join('projects_images','projects.id','projects_images.project_id')
             ->select('projects.*', 'projects_images.*','categories.category_name')
             ->where('categories.publication_status',1)
             ->where('projects.publication_status',1)
             ->where('categories.category_name','=',$name)
             ->get();

        return view('frontend.manages.categorizedProjects',['categorized_projects'=>$categorized_projects]);
    }

    public function members()
    {
        $members = DB::table('members')
            ->select('members.*')
            ->get();
        return view('frontend.manages.members',['members'=>$members]);
    }

    public function services()
    {
        $services = DB::table('services')
            ->select('services.*')
            ->get();
            return view('frontend.manages.services',['services'=>$services]);
    }

    public function news()
    {
        $news = DB::table('news')
            ->join('categories','categories.id','news.category_id')
            ->select('categories.category_name','news.*')
            ->orderByDesc('created_at')
            ->where('news.publication_status',1)
            ->paginate(12);

        return view('frontend.manages.news',['news'=>$news]);
    }

    public function reviews()
    {
        $reviews = DB::table('reviews')
            ->select('reviews.*')
            ->get();
        return view('frontend.manages.reviews',['reviews'=>$reviews]);
    }


    ///SINGLE PAGE
    public function banner($id)
    {
        $banners = DB::table('banners')
            ->select('banners.*')
            ->where('banners.id','=',$id)
            ->get();
        return view('frontend.single.banner',['banners'=>$banners]);
    }

    public function category($id)
    {
        $categories = DB::table('categories')
            ->select('categories.*')
            ->where('categories.id','=',$id)
            ->get();

        return view('frontend.single.category',['categories'=>$categories]);
    }

    public function member($id)
    {
        $members = DB::table('members')
            ->join('categories', 'categories.id','=','members.category_id')
            ->select('members.*','categories.*')
            ->where('members.id','=',$id)
            ->get();
        return view('frontend.single.member',['members'=>$members]);
    }

    public function service($id)
    {
        $services = DB::table('services')
            ->select('services.*')
            ->where('services.id','=',$id)
            ->get();
            return view('frontend.single.service',['services'=>$services]);
    }

    public function new($id)
    {
        $news = DB::table('news')
            ->join('categories','categories.id','news.category_id')
            ->select('categories.category_name')
            ->select('news.*')
            ->where('news.id','=',$id)
            ->get();
        return view('frontend.single.news',['news'=>$news]);
    }

    public function review($id)
    {
        $reviews = DB::table('reviews')
            ->select('reviews.*')
            ->where('reviews.id','=',$id)
            ->get();
        return view('frontend.single.review',['reviews'=>$reviews]);
    }

    public function about()
    {
        return view('frontend.single.about');
    }

    public function contacts()
    {
        return view('frontend.single.static.contacts');
    }

    public function moreabout()
    {
        return view('frontend.single.moreabout');
    }


    //MISSION VISON GOAL PROFILE
    public function objectives()
    {
        return view('frontend.single.static.objectives');
    }

    public function missionvison()
    {
        return view('frontend.single.static.missionvison');
    }

    public function companyprofile()
    {
        return view('frontend.single.static.companyprofile');
    }
    //END MISSION VISON GOAL PROFILE


    public function floorplan()
    {
        return view('frontend.single.static.floorplan');
    }

    public function outdoor()
    {
        return view('frontend.single.static.outdoor');
    }

    public function indoor()
    {
        return view('frontend.single.static.indoor');
    }

    public function majorcomponents()
    {
        return view('frontend.single.static.majorcomponents');
    }

    public function diagnostic()
    {
        return view('frontend.single.static.diagnostic');
    }
}
