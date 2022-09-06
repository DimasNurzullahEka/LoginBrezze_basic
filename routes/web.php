<?php
use App\Http\Controllers\AdminController;
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
    return view('welcome');
});
Route::controller(AdminController::class)->group(function(){
  Route::get('/admin/logout','destroy')->name('admin.logout');
  Route::get('/admin/AdminProfile','Profile')->name('admin.adminProfile');
  Route::get('/edit/EditProfile','EditProfile')->name('edit.profile');
  Route::get('/change/ChangePassword','ChangePassword')->name('change.password');
  Route::post('/store/profile','StoreProfile')->name('store.profile');
  Route::post('/Update/Password','UpdatePassword')->name('update.password');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth','verified'])->name('dashboard');

require __DIR__.'/auth.php';
