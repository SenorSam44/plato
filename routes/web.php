<?php

use App\Http\Controllers\V1\AdvisorController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\HomeController;
use App\Http\Controllers\V1\CategoryController;
use App\Http\Controllers\V1\MemberController;
use App\Http\Controllers\V1\ProjectController;
use App\Http\Controllers\V1\NewsController;
use App\Http\Controllers\V1\ServiceController;
use App\Http\Controllers\V1\ReviewController;
use App\Http\Controllers\V1\BannerController;
use App\Http\Controllers\V1\AboutController;
use App\Http\Controllers\V1\MessageController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/admin', function () {
    return view('welcome');
});

Route::get('/admin/home', function () {
    return view('admin.admin_layout');
});


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
//MANAGE VIEWS
Route::get('about', [HomeController::class, 'about']);
Route::get('banners', [HomeController::class, 'banners']);
Route::get('departments', [HomeController::class, 'departments']);


Route::get('projects', [HomeController::class, 'projects']);
Route::get('projects2', [HomeController::class, 'projects2']);
Route::get('projects/{project}', [HomeController::class, 'singleProject']);
Route::get('projects/{project}/modal', [HomeController::class, 'projectModal']);

Route::get('project-category/{name}', [HomeController::class, 'categorizedProjects']);

Route::get('anima', [HomeController::class, 'anima']);


Route::get('members', [HomeController::class, 'members']);
Route::get('news', [HomeController::class, 'news']);
Route::get('services', [HomeController::class, 'services']);
Route::get('reviews', [HomeController::class, 'reviews']);
Route::get('contacts', [HomeController::class, 'contacts']);
Route::get('moreabout', [HomeController::class, 'moreabout']);

Route::post('messages', [MessageController::class, 'store']);

Route::get('objectives', [HomeController::class, 'objectives']);
Route::get('missionvison', [HomeController::class, 'missionvison']);
Route::get('companyprofile', [HomeController::class, 'companyprofile']);

Route::get('floorplan', [HomeController::class, 'floorplan']);
Route::get('outdoor', [HomeController::class, 'outdoor']);
Route::get('indoor', [HomeController::class, 'indoor']);
Route::get('majorcomponents', [HomeController::class, 'majorcomponents']);
Route::get('diagnostic', [HomeController::class, 'diagnostic']);


//SINGLE PAGE
Route::get('banners/{id}', [HomeController::class, 'banner']);
Route::get('departments/{id}', [HomeController::class, 'department']);
Route::get('members/{id}', [HomeController::class, 'doctor']);
Route::get('news/{id}', [HomeController::class, 'new']);
Route::get('services/{id}', [HomeController::class, 'service']);
Route::get('reviews/{id}', [HomeController::class, 'review']);

//Review Client side

Route::get('review', [HomeController::class, 'review']);
Route::get('reviews', [HomeController::class, 'reviews']);
Route::post('reviews', [ReviewController::class, 'store']);



Route::middleware('auth:web')->group(function () {
	Route::prefix('admin')->group(function(){

		//Banner
		Route::get('about', [AboutController::class, 'create']);
		Route::get('abouts', [AboutController::class, 'index']);
		Route::post('abouts', [AboutController::class, 'store']);
		Route::get('abouts/{about}', [AboutController::class, 'show']);
		Route::post('abouts/{about}', [AboutController::class, 'update']);
		Route::get('edit-about', [AboutController::class, 'show']);
		Route::post('update-about', [AboutController::class, 'update']);
		Route::post('delete-about', [AboutController::class, 'destroy']);

	    Route::post('/activate-about', [AboutController::class, 'activateAbout']);
	    Route::post('/deactivate-about', [AboutController::class, 'deactivateAbout']);

		//Route::delete('banners/{banner}', [BannerController::class, 'destroy']);

        Route::get('banner', [BannerController::class, 'create']);
        Route::get('banners', [BannerController::class, 'index']);
        Route::post('banners', [BannerController::class, 'update']);
        Route::get('banners/{banner}', [BannerController::class, 'show']);
        Route::post('banners/{banner}', [BannerController::class, 'update']);
        Route::get('edit-banner', [BannerController::class, 'show']);
        Route::post('update-banner', [BannerController::class, 'update']);
        Route::post('delete-banner', [BannerController::class, 'destroy']);

	    Route::post('/activate-banner', [BannerController::class, 'activateBanner']);
	    Route::post('/deactivate-banner', [BannerController::class, 'deactivateBanner']);

		//Departments
		Route::get('category', [CategoryController::class, 'create']);
		Route::get('categories', [CategoryController::class, 'index']);
		Route::post('categories', [CategoryController::class, 'store']);
		Route::get('categories/{category}', [CategoryController::class, 'show']);
		Route::post('categories/{category}', [CategoryController::class,'update']);
		Route::post('delete-category', [CategoryController::class, 'destroy']);
	    Route::post('/activate-category', [CategoryController::class, 'activateDepartment']);
	    Route::post('/deactivate-category', [CategoryController::class, 'deactivateCategory']);

		//Members
		Route::get('member', [MemberController::class, 'create']);
		Route::get('members', [MemberController::class, 'index']);
		Route::post('members', [MemberController::class, 'store']);
		Route::get('members/{member}', [MemberController::class, 'show']);
		Route::post('members/{member}', [MemberController::class, 'update']);
		Route::post('delete-member', [MemberController::class, 'destroy']);

	    Route::post('/activate-member', [MemberController::class, 'activateMember']);
	    Route::post('/deactivate-member', [MemberController::class, 'deactivateMember']);

	    //advisor
        Route::get('advisor', [AdvisorController::class, 'create']);
        Route::get('advisors', [AdvisorController::class, 'index']);
        Route::post('advisors', [AdvisorController::class, 'store']);
        Route::get('advisors/{advisor}', [AdvisorController::class, 'show']);
        Route::post('advisors/{advisor}', [AdvisorController::class, 'update']);
        Route::post('delete-advisor', [AdvisorController::class, 'destroy']);

        Route::post('/activate-advisor', [AdvisorController::class, 'activateAdvisor']);
        Route::post('/deactivate-advisor', [AdvisorController::class, 'deactivateAdvisor']);

	    //Projects
		Route::get('project', [ProjectController::class, 'create']);
		Route::get('projects', [ProjectController::class, 'index']);
		Route::post('projects', [ProjectController::class, 'store']);
		Route::get('projects/{project}', [ProjectController::class, 'show']);
		Route::post('projects/{project}', [ProjectController::class, 'update']);
		Route::post('delete-project', [ProjectController::class, 'destroy']);
	    Route::post('/activate-project', [ProjectController::class, 'activateProject']);
	    Route::post('/deactivate-project', [ProjectController::class, 'deactivateProject']);

		//News
		Route::get('new', [NewsController::class, 'create']);
		Route::get('news', [NewsController::class, 'index']);
		Route::post('news', [NewsController::class, 'store']);
		Route::get('news/{news}', [NewsController::class, 'show']);
		Route::post('news/{news}', [NewsController::class, 'update']);
		Route::post('delete-news', [NewsController::class, 'destroy']);

	    Route::post('/activate-news', [NewsController::class, 'activateNews']);
	    Route::post('/deactivate-news', [NewsController::class, 'deactivateNews']);

		//services
		Route::get('service', [ServiceController::class, 'create']);
		Route::get('services', [ServiceController::class, 'index']);
		Route::post('services', [ServiceController::class, 'store']);
		Route::get('services/{service}', [ServiceController::class, 'show']);
		Route::post('services/{service}', [ServiceController::class, 'update']);
		Route::post('delete-service', [ServiceController::class, 'destroy']);

	    Route::post('/activate-service', [ServiceController::class, 'activateService']);
	    Route::post('/deactivate-service', [ServiceController::class, 'deactivateService']);

		//Review
		Route::get('review', [ReviewController::class, 'create']);
		Route::get('reviews', [ReviewController::class, 'manageReviews']);
		 Route::post('reviews', [ReviewController::class, 'store']);
		Route::get('reviews/{review}', [ReviewController::class, 'show']);
		Route::post('reviews/{review}', [ReviewController::class, 'update']);
		Route::post('delete-review', [ReviewController::class, 'destroy']);
	    Route::post('/activate-review', [ReviewController::class, 'activateReview']);
	    Route::post('/deactivate-review', [ReviewController::class, 'deactivateReview']);

		Route::get('/messages', [MessageController::class, 'index']);
		Route::post('/activate-message', [MessageController::class, 'activateMessage']);
		Route::post('/delete-message', [MessageController::class, 'destroy']);

	});
});

/*TESTING

//Departments
Route::get('departments', [DepartmentController::class, 'index']);
Route::post('departments', [DepartmentController::class, 'store']);
Route::get('departments/{department}', [DepartmentController::class, 'show']);
Route::post('departments/{department}', [DepartmentController::class, 'update']);
Route::delete('departments/{department}', [DepartmentController::class, 'destroy']);

//Doctors
Route::get('doctors', [DoctorController::class, 'index']);
Route::post('doctors', [DoctorController::class, 'store']);
Route::get('doctors/{doctor}', [DoctorController::class, 'show']);
Route::post('doctors/{doctor}', [DoctorController::class, 'update']);
Route::delete('doctors/{doctor}', [DoctorController::class, 'destroy']);

//News
Route::get('news', [NewsController::class, 'index']);
Route::post('news', [NewsController::class, 'store']);
Route::get('news/{news}', [NewsController::class, 'show']);
Route::post('news/{news}', [NewsController::class, 'update']);
Route::delete('news/{news}', [NewsController::class, 'destroy']);

//Banner
Route::get('banners', [ReviewController::class, 'index']);
Route::post('banners', [ReviewController::class, 'store']);
Route::get('banners/{banner}', [ReviewController::class, 'show']);
Route::post('banners/{banner}', [ReviewController::class, 'update']);
Route::delete('banners/{banner}', [ReviewController::class, 'destroy']);

//services
Route::get('services', [ServiceController::class, 'index']);
Route::post('services', [ServiceController::class, 'store']);
Route::get('services/{service}', [ServiceController::class, 'show']);
Route::post('services/{service}', [ServiceController::class, 'update']);
Route::delete('services/{service}', [ServiceController::class, 'destroy']);

//Review
Route::get('reviews', [ReviewController::class, 'index']);
Route::post('reviews', [ReviewController::class, 'store']);
Route::get('reviews/{review}', [ReviewController::class, 'show']);
Route::post('reviews/{review}', [ReviewController::class, 'update']);
Route::delete('reviews/{review}', [ReviewController::class, 'destroy']);

*/



