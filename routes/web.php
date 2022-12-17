<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\ProfileController;
use App\Models\Information;
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

Route::get('/', function () {
    $infos = Information::all();
    return view('welcome',compact('infos'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// Admin Controller Here

Route::middleware('AdminUserCheck')->group(function(){
    Route::post('/admin/password/change',[AdminController::class,'password_change'])->name('admin.password.change');
    Route::post('/admin/info/change',[AdminController::class,'info_change'])->name('admin.info.change');
    Route::resource('category', CategoryController::class);
    Route::get('/add-sub-admin', [AdminController::class,'add_sub_admin'])->name('add.sub.admin');
    Route::post('/post-sub-admin', [AdminController::class,'post_sub_admin'])->name('sub.admin.post');
    Route::get('/user-list', [AdminController::class,'user_list'])->name('user.list');
    Route::post('/user-list-delete/{id}', [AdminController::class,'user_list_delete'])->name('user.list.delete');
    Route::post('/user-status-update/{id}', [AdminController::class,'user_status_update'])->name('user.status.update');
    Route::get('/infopost', [InformationController::class,'create']);
    Route::post('/post', [InformationController::class,'store']);
});
