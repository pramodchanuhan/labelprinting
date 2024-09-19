<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentationController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\LeavesController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DefProfileController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\interviewformController as interviewformController;
use App\Http\Controllers\hrformController;
use App\Http\Controllers\interviewerformController;
use App\Http\Controllers\directorformController;
use App\Http\Controllers\salaryformController;
use App\Http\Controllers\EmployeeSalaryController;
use App\Http\Controllers\ResignationController;
use App\Http\Controllers\LabelprintController;
use App\Http\Controllers\RegisterformController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Http\Request;

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


// Route::get('/welcome',function(){
//     // return view('welcome');
//     // dd(request(),Inertia::share('app.url'));

//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [DefProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [DefProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [DefProfileController::class, 'destroy'])->name('profile.destroy');
// });

/** for side bar menu active */
function set_active($route)
{
    if (is_array($route)) {
        return in_array(Request::path(), $route) ? 'active' : '';
    }
    return Request::path() == $route ? 'active' : '';
}


Route::get('/assesmentform', '\App\Http\Controllers\interviewformController@index')->name('assesmentform');
Route::get('/assesmentform-edit/{id}', [interviewformController::class, 'edit'])->name('assesmentform.edit');
Route::get('/thankyou/{id}', [interviewformController::class, 'thankyou'])->name('thankyou');
Route::post('/assesmentform-update/{id}', [InterviewformController::class, 'update'])->name('assesmentform.update');
Route::post('/form-store', [interviewformController::class, 'assesmentform_store'])->name('form-store');


// Route::get('/shreesairaj/registerfrom', '\App\Http\Controllers\RegisterformController@index')->name('shreesairaj.registerfrom');
// Route::post('shreesairaj/registerfrom-store', [RegisterformController::class, 'registerfrom_store'])->name('shreesairaj.registerfrom-store');
// Route::get('/shreesairaj/thankyou', [RegisterformController::class, 'thankyou'])->name('shreesairaj.thankyou');
// Route::get('/shreesairaj/registerfromList', [RegisterformController::class, 'registerfromList'])->name('shreesairaj.registerfromList');

require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {
    Route::controller(DashboardController::class)->group(function () {

        Route::get('/', 'dashboard');
        Route::get('index', 'dashboard');

        // Route::get('/admin-dashboard', 'admin_dashboard')->middleware('role:admin|super admin');
        
        Route::get('/admin-dashboard', 'employee_dashboard')->middleware('role:admin|super admin');
        Route::get('/employee-dashboard', 'employee_dashboard');
    });

    // -----------------------------  employee ------------------------------//
    Route::controller(EmployeesController::class)->group(function () {
        Route::get('/employees', 'employees');
        Route::get('/empcreate', 'empcreate');
        // Route::post('/employees', 'employees_store');
    });

    // Route::controller(ProfileController::class)->group(['prefix' => 'profile', 'middleware' => ['auth']],function () {
    // Route::controller(ProfileController::class)->prefix('profile')->middleware('auth')->group(function () {
    Route::group(['controller' => ProfileController::class, 'prefix' => 'profile', 'middleware' => ['auth']], function () {
        Route::get('/',  'profile');
        Route::put('profile-info/{emp_info}', 'profile_info_update');
        Route::put('my-letters/{id}', 'my_letters_update');
        Route::put('education-info/{emp_info}', 'education_info_update');
        Route::put('account-info/{emp_info}', 'account_info_update');
        Route::put('experience-info/{emp_info}', 'experience_info_update');
        Route::put('personal-info/{emp_info}', 'personal_info_update');
        Route::put('emergency-info/{emp_info}', 'emergency_info_update');
    });

   
    Route::post('employees-store', [EmployeesController::class, 'employees_store'])->name('employees-store');
    Route::get('/labelprint/labelprintfrom', '\App\Http\Controllers\LabelprintController@index')->name('labelprint.labelprintfrom');
    Route::post('labelprint/labelprintfrom-store', [LabelprintController::class, 'labelprintfrom_store'])->name('labelprint.labelprintfrom-store');
    Route::get('/labelprint/labelprintfromedit/{id}', '\App\Http\Controllers\LabelprintController@edit')->name('labelprint.labelprintfromedit');
    Route::post('labelprint/labelprintfrom-update/{id}', [LabelprintController::class, 'labelprintfrom_update'])->name('labelprint.labelprintfrom-update');
    Route::get('/labelprint/labelprintfromlist', '\App\Http\Controllers\LabelprintController@labelprintfrom_list')->name('labelprint.labelprintfromlist');

    Route::get('/shreesairaj/thankyou/{id}', [RegisterformController::class, 'thankyou'])->name('shreesairaj.thankyou');
    Route::get('/shreesairaj/registerfromList', [RegisterformController::class, 'registerfromList'])->name('shreesairaj.registerfromList');
    Route::get('/shreesairaj/registerfrom_print/{id}', [RegisterformController::class, 'registerfrom_print'])->name('shreesairaj.registerfrom_print');
    // Route::get('/users', [EmployeesController::class, 'users']);

    // Route::get('/apptitude-result', [JobsController::class, 'apptitude_result'])

});

// Route::view('/thank-you', 'thankyou')->name('thankyou');
