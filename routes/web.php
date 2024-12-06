<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\CourseController as AdminCourseController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\VideoController as AdminVideoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [HomeController::class, 'getListOfCoursesAndBlogs'])->name('home');  


Route::resource('courses', CourseController::class)->only(['index', 'show']);
Route::resource('blogs', BlogController::class)->only(['index', 'show']);


Route::get('register', [AuthController::class, 'showRegisterForm'])->name('auth.register');
Route::post('register', [AuthController::class, 'register'])->name('register');

Route::get('login', [AuthController::class, 'showLoginForm'])->name('auth.login');
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::post('logout', [AuthController::class, 'logout'])->name('logout');


// Admin Routes (Requires Authentication)
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('courses', AdminCourseController::class);
    // Route::get('sections/{section}/videos', [AdminVideoController::class, 'index'])->name('sections.videos.index');
    Route::resource('sections.videos', AdminVideoController::class);

    Route::prefix('/courses/{course_id}/sections')->group(function () {
        Route::get('/', [SectionController::class, 'index'])->name('sections.index');
        Route::get('/create', [SectionController::class, 'create'])->name('sections.create');
        Route::post('/', [SectionController::class, 'store'])->name('sections.store');
        Route::get('/{id}/edit', [SectionController::class, 'edit'])->name('sections.edit');
        Route::put('/{id}', [SectionController::class, 'update'])->name('sections.update');
        Route::delete('/{id}', [SectionController::class, 'destroy'])->name('sections.destroy');
    });

    Route::resource('blogs', AdminBlogController::class);
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
});






Route::middleware(['auth'])->group(function () {
    
    Route::get('/enroll/{courseId}', [CourseController::class, 'enroll'])->name('stripe.enroll');
    Route::get('/success/{userId}/{courseId}', [CourseController::class, 'success'])->name('stripe.success');
    Route::get('/cancel', [CourseController::class, 'cancel'])->name('stripe.cancel');
    Route::get('/video/{video}', [VideoController::class, 'show'])->name('video.show');
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    
});



Route::get('/set-language/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ar'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('set-language');

