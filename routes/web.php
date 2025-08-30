<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\ThanaController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\FeeTypeController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InstituteController;
use App\Http\Controllers\ReferenceController;
use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ApplicableFeeTypeController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\StudentInformationController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\PayPalController;

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
// Route::get('/', function () { return view('home'); });

Route::get('/', 'Frontend\LandingPageController@landingPage');
// Route::get('/microfinance', 'Frontend\LandingPageController@microfinancePage')->name('microfinance.index');
Route::get('/foundation', 'Frontend\LandingPageController@foundationPage')->name('foundation.index');
Route::get('/contact-us', 'Frontend\ContactUsPageController@index')->name('contact-us.index');
Route::get('/about-us', 'Frontend\AboutUsController@index')->name('about-us.index');
Route::get('/news-room', 'Frontend\NewsController@index')->name('news-room.index');
Route::get('/news-room/{id}/show', 'Frontend\NewsController@show')->name('news-room.show');
Route::get('/career','Frontend\CareerController@index')->name('career.index');
Route::get('/career/{id}/apply','Frontend\CareerController@apply')->name('career.apply');
Route::post('/career/apply/store','JobApplicationController@store')->name('career.apply.store');
Route::get('/donation','Frontend\DonationPageController@index')->name('donation.index');
Route::post('donation-info/store','DonationController@store')->name('donation-info.store');
Route::get('news-room/category/{id}','Frontend\NewsController@categoryNews')->name('news-room.category');
Route::get('approach-article/show/{id}','Frontend\HomeController@approachShow')->name('approach-article.show');
Route::get('member-category/{slug}','Frontend\AboutUsController@show')->name('member-category.slug');
Route::post('news-letter/store','NewsLetterController@store')->name('news-letter.store');


// Route::get('/', function () { return view('auth.login'); });

Route::get('login', [LoginController::class,'showLoginForm'])->name('login');
Route::post('login', [LoginController::class,'login']);
Route::post('register', [RegisterController::class,'register']);

Route::get('password/forget',  function () { 
	return view('pages.forgot-password'); 
})->name('password.forget');
Route::post('password/email', [ForgotPasswordController::class,'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class,'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class,'reset'])->name('password.update');


Route::group(['middleware' => 'auth'], function(){
	// logout route
	Route::get('/logout', [LoginController::class,'logout']);
	Route::get('/clear-cache', [HomeController::class,'clearCache']);

	// dashboard route  
	Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Route::get('/dashboard/this-month-admissions', [DashboardController::class, 'thisMonthAdmissions'])->name('dashboard.this_month_admissions');
    // Route::get('/dashboard/this-month-transactions', [DashboardController::class, 'thisMonthTransactions'])->name('dashboard.this_month_transactions');

	//only those have manage_user permission will get access
	Route::group(['middleware' => 'can:manage_user'], function(){
	Route::get('/users', [UserController::class,'index']);
	Route::get('/user/get-list', [UserController::class,'getUserList']);
		Route::get('/user/create', [UserController::class,'create']);
		Route::post('/user/create', [UserController::class,'store'])->name('create-user');
		Route::get('/user/{id}', [UserController::class,'edit']);
		Route::post('/user/update', [UserController::class,'update']);
		Route::get('/user/delete/{id}', [UserController::class,'delete']);
	});

	//only those have manage_role permission will get access
	Route::group(['middleware' => 'can:manage_role|manage_user'], function(){
		Route::get('/roles', [RolesController::class,'index']);
		Route::get('/role/get-list', [RolesController::class,'getRoleList']);
		Route::post('/role/create', [RolesController::class,'create']);
		Route::get('/role/edit/{id}', [RolesController::class,'edit']);
		Route::post('/role/update', [RolesController::class,'update']);
		Route::get('/role/delete/{id}', [RolesController::class,'delete']);
	});


	//only those have manage_permission permission will get access
	Route::group(['middleware' => 'can:manage_permission|manage_user'], function(){
		Route::get('/permission', [PermissionController::class,'index']);
		Route::get('/permission/get-list', [PermissionController::class,'getPermissionList']);
		Route::post('/permission/create', [PermissionController::class,'create']);
		Route::get('/permission/update', [PermissionController::class,'update']);
		Route::get('/permission/delete/{id}', [PermissionController::class,'delete']);
	});

	// get permissions
	Route::get('get-role-permissions-badge', [PermissionController::class,'getPermissionBadgeByRole']);


	// permission examples
    Route::get('/permission-example', function () {
    	return view('permission-example'); 
    });

	Route::group(['prefix' => 'home-page', 'as' => 'home-page.','middleware' => 'auth'], function(){
		Route::get('/', 'Admin\HomeController@home');
		// Route::get('section-1','Admin\HomeController@createOrUpdate')->name('home-page.section-1');
		route::resource('top-banner','TopBannerController');
		route::resource('top-slider','TopSliderController');
		route::resource('approach','ApproachController');
		Route::get('approach/status/{id}','ApproachController@updateStatus')->name('approach.status');
		route::resource('approach-item','ApproachItemController');
		route::resource('middle-banner-content','MiddleBannerContentController');
		route::resource('members','MemberController');
		route::resource('bottom-banner','BottomBannerController');


		Route::get('show-hide/{id}/status','Admin\HomeController@showHide')->name('show-hide.status');

	});

	Route::group(['prefix' => 'about-us-page', 'as' => 'about-us-page.','middleware' => 'auth'], function(){
		Route::get('/', 'Admin\HomeController@aboutUs');
		Route::resource('section-one','AboutUsBannerController');
		Route::resource('section-two','AboutUsSectionOneController');
		Route::resource('section-three','AboutUsSectionTwoController');
		Route::resource('section-four','AboutUsSectionThreeController');
		Route::resource('section-five','AboutUsSectionFourController');
		Route::resource('section-six','AboutUsSectionFiveController');
		Route::resource('section-seven','AboutUsSectionSixController');
		Route::resource('section-eight','AboutUsSectionSevenController');

		Route::get('about-page-show-hide/{id}/status','Admin\HomeController@aboutPageshowHide')->name('about-page-show-hide.status');
	});

	Route::group(['prefix' => 'news-page', 'as' => 'news-page.','middleware' => 'auth'], function(){
		Route::get('/', 'Admin\HomeController@news');
		route::resource('news-banner','NewsBannerController');
		route::resource('news','NewsController');

		Route::get('news-page-show-hide/{id}/status','Admin\HomeController@newsPageshowHide')->name('news-page-show-hide.status');
	});

	Route::group(['prefix' => 'job', 'as' => 'job.', 'middleware' => 'auth'], function(){
		route::resource('profession', 'ProfessionController');
		route::resource('team', 'TeamController');
		route::resource('location', 'LocationController');
		route::resource('circular', 'JobController');
		Route::get('circular/status/{id}','JobController@updateStatus')->name('circular.status');
		route::resource('banner', 'JobBannerController');

		route::get('job-applications', 'JobApplicationController@index')->name('job-applications');
		route::get('job-applications/{id}/show', 'JobApplicationController@show')->name('job-applications.show');
	});

	Route::resource('donation-banner','DonationBannerController');
	Route::get('donation-info','DonationController@index')->name('donation-info');


	route::resource('middle-banner','MiddleBannerController');
	route::resource('middle-banner-content','MiddleBannerContentController');
	// route::resource('bottom-banner','BottomBannerController');

	route::resource('member-designation','MemberTypeController');
    
	route::get('member/category/create','MemberCategoryController@create')->name('member.category.create');
	route::resource('member-category','MemberCategoryController')->only(['index', 'store', 'show', 'edit', 'update', 'destroy']);
	


	// route::resource('members','MemberController');

	// route::resource('about-us','AboutUsController');
	// route::resource('patron','PatronController');
	// route::resource('about-us-content','AboutUsContentController');


	Route::get('news-category/status/{id}','NewsCategoryController@updateStatus')->name('news-category.status');
    route::resource('news-category','NewsCategoryController');
	route::resource('news-banner','NewsBannerController');
	// route::resource('news','NewsController');
	Route::get('news/status/{id}','NewsController@updateStatus')->name('news.status');
	Route::get('news-letter','NewsLetterController@index')->name('news-letter.index');
	Route::get('news-letter/{id}/edit','NewsLetterController@edit')->name('news-letter.edit');
	Route::post('news-letter/{id}/update','NewsLetterController@update')->name('news-letter.update');
	Route::delete('news-letter/destroy','NewsLetterController@destroy')->name('news-letter.destroy');
	
});


Route::get('/register', function () { return view('pages.register'); });
Route::get('/login-1', function () { return view('pages.login'); });


// Route::get('create-transaction', [PayPalController::class, 'createTransaction'])->name('createTransaction');
Route::post('process-transaction', [PayPalController::class, 'processTransaction'])->name('processTransaction');
Route::get('success-transaction', [PayPalController::class, 'successTransaction'])->name('successTransaction');
Route::get('cancel-transaction', [PayPalController::class, 'cancelTransaction'])->name('cancelTransaction');
