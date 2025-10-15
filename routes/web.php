<?php  

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider and all of them 
| will be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// ✅ Use only one home route (controller-based is cleaner)
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Authentication routes
Auth::routes();

// User management routes
Route::get('/add', [UserController::class, 'index'])->name('add');
Route::post('/add_user', [UserController::class, 'store'])->name('add_user.store'); 
Route::get('/add_user', function () {
    return redirect()->route('add');
})->name('add_user'); // renamed

Route::get('/edit_user/{id}', [UserController::class, 'edit'])->name('edit_user');
Route::post('/update_user', [UserController::class, 'update'])->name('update_user');

Route::get('/delete_user/{id}', [UserController::class, 'delete'])->name('delete_user');
Route::post('/destroy_user', [UserController::class, 'destroy'])->name('destroy_user');

Route::get('user_subjects/{id}', [UserController::class,'user_subjects'])->name('user_subjects'); 
Route::get('add_user_subject/{id}',[UserController::class,'add_user_subject'])->name('add_user_subject');

Route::get('/assign_subject/{user_id}/{subject_id}', [UserController::class, 'assign_subject'])->name('assign_subject');