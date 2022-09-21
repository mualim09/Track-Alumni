<?php

use Illuminate\Support\Facades\Route;

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
Route::get('admin/dashboard', function () {
    $alumnies = App\Models\Alumni::all();
    $departments = App\Models\Department::all();
    $events = App\Models\Event::all();
    $jobs = App\Models\Jobpost::all();

    return view('admin.index', compact('alumnies', 'departments', 'events', 'jobs'));

})->middleware(['auth'])->name('admin.dashboard');

require __DIR__.'/auth.php';

Route::get('/staff/dashboard', function () {
    $alumnies = App\Models\Alumni::all();
    $departments = App\Models\Department::all();
    $events = App\Models\Event::all();
    $jobs = App\Models\Jobpost::all();

    return view('staff.index', compact('alumnies', 'departments', 'events', 'jobs'));

})->middleware(['auth:staff', 'auth.staff'])->name('staff.dashboard');

require __DIR__.'/staff_auth.php';

Route::get('/alumni/dashboard', function () {
    $alumnies = App\Models\Alumni::all();
    $departments = App\Models\Department::all();
    $events = App\Models\Event::all();
    $jobs = App\Models\Jobpost::all();
    return view('alumni.index', compact('alumnies', 'departments', 'events', 'jobs'));
})->middleware(['auth:alumni', 'auth.alumni'])->name('alumni.dashboard');

require __DIR__.'/alumni_auth.php';


Route::middleware(['auth'])->group(function(){
    
    Route::get('admin/alumnies', [App\Http\Controllers\Admin\AlumniController::class, 'index'])->name('admin.alumnies.index');
    Route::get('admin/alumni/{id}', [App\Http\Controllers\Admin\AlumniController::class, 'show'])->name('admin.alumnies.show');
    Route::get('admin/staffs', [App\Http\Controllers\Admin\StaffController::class, 'index'])->name('admin.staffs.index');
    // alumni pending request
    Route::get('admin/alumnies/pending', [App\Http\Controllers\Admin\AdminController::class, 'pending_alumnies'])->name('admin.alumnies.pending_alumnies');

    Route::get('admin/pending/alumnies/{id}/edit', [App\Http\Controllers\Admin\AdminController::class, 'pending_alumni_edit'])->name('admin.alumnies.pending_alumni_edit');

    Route::post('admin/alumnies/pending/{id}', [App\Http\Controllers\Admin\AdminController::class, 'pending_alumni_update'])->name('admin.alumnies.pending_alumni_update');

    // staff pending request
    Route::get('admin/staffs/pending', [App\Http\Controllers\Admin\AdminController::class, 'pending_staffs'])->name('admin.staffs.pending_staffs');

    Route::get('admin/pending/staffs/{id}/edit', [App\Http\Controllers\Admin\AdminController::class, 'pending_staff_edit'])->name('admin.staffs.pending_staff_edit');

    Route::post('admin/staffs/pending/{id}', [App\Http\Controllers\Admin\AdminController::class, 'pending_staff_update'])->name('admin.staffs.pending_staff_update');
    

    // Events
    Route::get('admin/events', [App\Http\Controllers\Admin\EventController::class, 'index'])->name('admin.events.index');
    Route::get('admin/events/create', [App\Http\Controllers\Admin\EventController::class, 'create'])->name('admin.events.create');
    Route::post('admin/events', [App\Http\Controllers\Admin\EventController::class, 'store'])->name('admin.events.store');
    Route::get('admin/events/{id}', [App\Http\Controllers\Admin\EventController::class, 'show'])->name('admin.events.show');
    Route::get('admin/events/{id}/edit', [App\Http\Controllers\Admin\EventController::class, 'edit'])->name('admin.events.edit');
    Route::post('admin/events/{id}', [App\Http\Controllers\Admin\EventController::class, 'update'])->name('admin.events.update');
    Route::get('admin/events/{id}/delete', [App\Http\Controllers\Admin\EventController::class, 'destroy'])->name('admin.events.destroy');

    // jobs
    Route::get('admin/jobs', [App\Http\Controllers\Admin\JobPostController::class, 'index'])->name('admin.jobs.index');
    Route::get('admin/jobs/create', [App\Http\Controllers\Admin\JobPostController::class, 'create'])->name('admin.jobs.create');
    Route::post('admin/jobs', [App\Http\Controllers\Admin\JobPostController::class, 'store'])->name('admin.jobs.store');
    Route::get('admin/jobs/{id}', [App\Http\Controllers\Admin\JobPostController::class, 'show'])->name('admin.jobs.show');
    Route::get('admin/jobs/{id}/edit', [App\Http\Controllers\Admin\JobPostController::class, 'edit'])->name('admin.jobs.edit');
    Route::post('admin/jobs/{id}', [App\Http\Controllers\Admin\JobPostController::class, 'update'])->name('admin.jobs.update');
    Route::get('admin/jobs/{id}/delete', [App\Http\Controllers\Admin\JobPostController::class, 'destroy'])->name('admin.jobs.destroy');

    // galleries 
    Route::get('admin/galleries', [App\Http\Controllers\Admin\GalleryController::class, 'index'])->name('admin.galleries.index');
    Route::get('admin/galleries/create', [App\Http\Controllers\Admin\GalleryController::class, 'create'])->name('admin.galleries.create');
    Route::post('admin/galleries', [App\Http\Controllers\Admin\GalleryController::class, 'store'])->name('admin.galleries.store');
    Route::get('admin/galleries/{id}', [App\Http\Controllers\Admin\GalleryController::class, 'show'])->name('admin.galleries.show');
    Route::get('admin/galleries/{id}/edit', [App\Http\Controllers\Admin\GalleryController::class, 'edit'])->name('admin.galleries.edit');
    Route::post('admin/galleries/{id}', [App\Http\Controllers\Admin\GalleryController::class, 'update'])->name('admin.galleries.update');
    Route::get('admin/galleries/{id}/delete', [App\Http\Controllers\Admin\GalleryController::class, 'destroy'])->name('admin.galleries.destroy');

    // trainings 
    Route::get('admin/trainings', [App\Http\Controllers\Admin\TrainingController::class, 'index'])->name('admin.trainings.index');
    Route::get('admin/trainings/create', [App\Http\Controllers\Admin\TrainingController::class, 'create'])->name('admin.trainings.create');
    Route::post('admin/trainings', [App\Http\Controllers\Admin\TrainingController::class, 'store'])->name('admin.trainings.store');
    Route::get('admin/trainings/{id}', [App\Http\Controllers\Admin\TrainingController::class, 'show'])->name('admin.trainings.show');
    Route::get('admin/trainings/{id}/edit', [App\Http\Controllers\Admin\TrainingController::class, 'edit'])->name('admin.trainings.edit');
    Route::post('admin/trainings/{id}', [App\Http\Controllers\Admin\TrainingController::class, 'update'])->name('admin.trainings.update');
    Route::get('admin/trainings/{id}/delete', [App\Http\Controllers\Admin\TrainingController::class, 'destroy'])->name('admin.trainings.destroy');

    // funds 
    Route::get('admin/funds', [App\Http\Controllers\Admin\FundController::class, 'index'])->name('admin.funds.index');
    Route::get('admin/funds/create', [App\Http\Controllers\Admin\FundController::class, 'create'])->name('admin.funds.create');
    Route::post('admin/funds', [App\Http\Controllers\Admin\FundController::class, 'store'])->name('admin.funds.store');
    Route::get('admin/funds/{id}', [App\Http\Controllers\Admin\FundController::class, 'show'])->name('admin.funds.show');
    Route::get('admin/funds/{id}/edit', [App\Http\Controllers\Admin\FundController::class, 'edit'])->name('admin.funds.edit');
    Route::post('admin/funds/{id}', [App\Http\Controllers\Admin\FundController::class, 'update'])->name('admin.funds.update');
    Route::get('admin/funds/{id}/delete', [App\Http\Controllers\Admin\FundController::class, 'destroy'])->name('admin.funds.destroy');

    // departments 
    Route::get('admin/departments', [App\Http\Controllers\Admin\DepartmentController::class, 'index'])->name('admin.departments.index');
    Route::get('admin/departments/create', [App\Http\Controllers\Admin\DepartmentController::class, 'create'])->name('admin.departments.create');
    Route::post('admin/departments', [App\Http\Controllers\Admin\DepartmentController::class, 'store'])->name('admin.departments.store');
    Route::get('admin/departments/{id}', [App\Http\Controllers\Admin\DepartmentController::class, 'show'])->name('admin.departments.show');
    Route::get('admin/departments/{id}/edit', [App\Http\Controllers\Admin\DepartmentController::class, 'edit'])->name('admin.departments.edit');
    Route::post('admin/departments/{id}', [App\Http\Controllers\Admin\DepartmentController::class, 'update'])->name('admin.departments.update');
    Route::get('admin/departments/{id}/delete', [App\Http\Controllers\Admin\DepartmentController::class, 'destroy'])->name('admin.departments.destroy');

    
    
    
});

Route::middleware(['auth:alumni', 'auth.alumni'])->group(function(){

    //alumnies CRUD
    Route::get('alumnies', [App\Http\Controllers\Admin\AlumniController::class, 'department_alumnies'])->name('alumnies.dept_alumnies');
    Route::get('alumnies/batch-mates', [App\Http\Controllers\Admin\AlumniController::class, 'batch_alumnies'])->name('alumnies.batch_alumnies');
    Route::get('alumnies/donate-blood', [App\Http\Controllers\Admin\AlumniController::class, 'donate_blood'])->name('alumnies.donate_blood');
    Route::get('alumni/profile', [App\Http\Controllers\Admin\AlumniController::class, 'profile'])->name('alumni.profile');
    Route::get('alumni/profile/edit', [App\Http\Controllers\Admin\AlumniController::class, 'profile_edit'])->name('alumni.profile.edit');
    Route::get('alumni/{id}', [App\Http\Controllers\Admin\AlumniController::class, 'show'])->name('alumnies.show');

    Route::get('alumni/{id}/edit', [App\Http\Controllers\Admin\AlumniController::class, 'edit'])->name('alumnies.edit');
    Route::post('alumni/{id}', [App\Http\Controllers\Admin\AlumniController::class, 'update'])->name('alumnies.update');
 
    // jobs CRUD
    Route::get('alumnies/jobs', [App\Http\Controllers\Admin\JobPostController::class, 'index'])->name('alumni.jobs.index');
    Route::get('alumnies/jobs/create', [App\Http\Controllers\Admin\JobPostController::class, 'create'])->name('alumni.jobs.create');
    Route::post('alumnies/jobs', [App\Http\Controllers\Admin\JobPostController::class, 'store'])->name('alumni.jobs.store');
    Route::get('alumnies/jobs/{id}', [App\Http\Controllers\Admin\JobPostController::class, 'show'])->name('alumni.jobs.show');
    Route::get('alumni/jobs/{id}/edit', [App\Http\Controllers\Admin\JobPostController::class, 'edit'])->name('alumni.jobs.edit');
    Route::post('alumnies/jobs/{id}', [App\Http\Controllers\Admin\JobPostController::class, 'update'])->name('alumni.jobs.update');
    Route::get('alumni/jobs/{id}/delete', [App\Http\Controllers\Admin\JobPostController::class, 'destroy'])->name('alumni.jobs.destroy');

    //event
    // Events CRUD
    Route::get('alumnies/events', [App\Http\Controllers\Admin\EventController::class, 'index'])->name('alumni.events.index');

    
});

Route::middleware(['auth:staff', 'auth.staff'])->group(function(){
    
    Route::get('staff/alumnies', [App\Http\Controllers\Admin\AlumniController::class, 'index'])->name('staff.alumnies.index');

    // stuffs crud 
    Route::get('staffs', [App\Http\Controllers\Admin\StaffController::class, 'index'])->name('staffs.index');

     // Events CRUD
     Route::get('staff/events', [App\Http\Controllers\Admin\EventController::class, 'index'])->name('staff.events.index');
     Route::get('staff/events/create', [App\Http\Controllers\Admin\EventController::class, 'create'])->name('staff.events.create');
     Route::post('staff/events', [App\Http\Controllers\Admin\EventController::class, 'store'])->name('staff.events.store');
     Route::get('staff/events/{id}', [App\Http\Controllers\Admin\EventController::class, 'show'])->name('staff.events.show');
     Route::get('staff/events/{id}/edit', [App\Http\Controllers\Admin\EventController::class, 'edit'])->name('staff.events.edit');
     Route::post('staff/events/{id}', [App\Http\Controllers\Admin\EventController::class, 'update'])->name('staff.events.update');
     Route::get('staff/events/{id}/delete', [App\Http\Controllers\Admin\EventController::class, 'destroy'])->name('staff.events.destroy');

     // trainings CRUD
    Route::get('staff/trainings', [App\Http\Controllers\Admin\TrainingController::class, 'index'])->name('staff.trainings.index');
    Route::get('staff/trainings/create', [App\Http\Controllers\Admin\TrainingController::class, 'create'])->name('staff.trainings.create');
    Route::post('staff/trainings', [App\Http\Controllers\Admin\TrainingController::class, 'store'])->name('staff.trainings.store');
    Route::get('staff/trainings/{id}', [App\Http\Controllers\Admin\TrainingController::class, 'show'])->name('staff.trainings.show');
    Route::get('staff/trainings/{id}/edit', [App\Http\Controllers\Admin\TrainingController::class, 'edit'])->name('staff.trainings.edit');
    Route::post('staff/trainings/{id}', [App\Http\Controllers\Admin\TrainingController::class, 'update'])->name('staff.trainings.update');
    Route::get('staff/trainings/{id}/delete', [App\Http\Controllers\Admin\TrainingController::class, 'destroy'])->name('staff.trainings.destroy');

    // jobs CRUD
    Route::get('staff/jobs', [App\Http\Controllers\Admin\JobPostController::class, 'index'])->name('staff.jobs.index');
    Route::get('staff/jobs/create', [App\Http\Controllers\Admin\JobPostController::class, 'create'])->name('staff.jobs.create');
    Route::post('staff/jobs', [App\Http\Controllers\Admin\JobPostController::class, 'store'])->name('staff.jobs.store');
    Route::get('staff/jobs/{id}', [App\Http\Controllers\Admin\JobPostController::class, 'show'])->name('staff.jobs.show');
    Route::get('staff/jobs/{id}/edit', [App\Http\Controllers\Admin\JobPostController::class, 'edit'])->name('staff.jobs.edit');
    Route::post('staff/jobs/{id}', [App\Http\Controllers\Admin\JobPostController::class, 'update'])->name('staff.jobs.update');
    Route::get('staff/jobs/{id}/delete', [App\Http\Controllers\Admin\JobPostController::class, 'destroy'])->name('staff.jobs.destroy');


    // galleries  CRUD
    Route::get('staff/galleries', [App\Http\Controllers\Admin\GalleryController::class, 'index'])->name('staff.galleries.index');
    Route::get('staff/galleries/create', [App\Http\Controllers\Admin\GalleryController::class, 'create'])->name('staff.galleries.create');
    Route::post('staff/galleries', [App\Http\Controllers\Admin\GalleryController::class, 'store'])->name('staff.galleries.store');
    Route::get('staff/galleries/{id}', [App\Http\Controllers\Admin\GalleryController::class, 'show'])->name('staff.galleries.show');
    Route::get('staff/galleries/{id}/edit', [App\Http\Controllers\Admin\GalleryController::class, 'edit'])->name('staff.galleries.edit');
    Route::post('staff/galleries/{id}', [App\Http\Controllers\Admin\GalleryController::class, 'update'])->name('staff.galleries.update');
    Route::get('staff/galleries/{id}/delete', [App\Http\Controllers\Admin\GalleryController::class, 'destroy'])->name('staff.galleries.destroy');

     // funds 
     Route::get('staff/funds', [App\Http\Controllers\Admin\FundController::class, 'index'])->name('staff.funds.index');
     Route::get('staff/funds/create', [App\Http\Controllers\Admin\FundController::class, 'create'])->name('staff.funds.create');
     Route::post('staff/funds', [App\Http\Controllers\Admin\FundController::class, 'store'])->name('staff.funds.store');
     Route::get('staff/funds/{id}', [App\Http\Controllers\Admin\FundController::class, 'show'])->name('staff.funds.show');
     Route::get('staff/funds/{id}/edit', [App\Http\Controllers\Admin\FundController::class, 'edit'])->name('staff.funds.edit');
     Route::post('staff/funds/{id}', [App\Http\Controllers\Admin\FundController::class, 'update'])->name('staff.funds.update');
     Route::get('staff/funds/{id}/delete', [App\Http\Controllers\Admin\FundController::class, 'destroy'])->name('staff.funds.destroy');
});





// ==================== Frontend Routes ================== //

// Alumni routes 

Route::get('front/alumni-list', [App\Http\Controllers\FrontendController::class, 'alumni_list'])->name('front.alumnies.index');
Route::get('front/alumni-list/{id}', [App\Http\Controllers\FrontendController::class, 'front_single_alumni'])->name('front.alumnies.show');
Route::get('alumnies/create', [App\Http\Controllers\FrontendController::class, 'create_alumni'])->name('alumnies.create');
Route::post('alumnies', [App\Http\Controllers\FrontendController::class, 'store_alumni'])->name('alumnies.store');

// Staff routes

Route::get('front/staffs-list', [App\Http\Controllers\FrontendController::class, 'staff_list'])->name('front.staffs.index');
Route::get('front/staffs-list/{id}', [App\Http\Controllers\FrontendController::class, 'front_single_staff'])->name('front.staffs.show');
Route::get('staffs/create', [App\Http\Controllers\FrontendController::class, 'create_staff'])->name('staffs.create');
Route::post('staffs', [App\Http\Controllers\FrontendController::class, 'store_staff'])->name('staffs.store');


Route::get('/', [App\Http\Controllers\FrontendController::class, 'home'])->name('front.home');
Route::get('about', [App\Http\Controllers\FrontendController::class, 'about'])->name('front.about');


Route::get('front/events', [App\Http\Controllers\FrontendController::class, 'events'])->name('front.events');
Route::get('front/events/{id}', [App\Http\Controllers\FrontendController::class, 'eventshow'])->name('front.events.show');

Route::get('front/opportunities', [App\Http\Controllers\FrontendController::class, 'jobs'])->name('front.jobs');
Route::get('front/jobs/{id}', [App\Http\Controllers\FrontendController::class, 'jobshow'])->name('front.jobs.show');


Route::get('front/galleries', [App\Http\Controllers\FrontendController::class, 'galleries'])->name('front.galleries');

// Route::get('front/galleries/{id}', [App\Http\Controllers\FrontendController::class, 'galleryshow'])->name('front.gallerieshow');

Route::get('front/trainings', [App\Http\Controllers\FrontendController::class, 'trainings'])->name('front.trainings');
Route::get('front/trainings/{id}', [App\Http\Controllers\FrontendController::class, 'trainingshow'])->name('front.trainings.show');


Route::get('contact', [App\Http\Controllers\FrontendController::class, 'contact'])->name('front.contact');