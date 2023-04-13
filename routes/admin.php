<?php

use App\Http\Controllers\Admin\admin_panel_settings;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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





Auth::routes();
Route::group(['namespace' => 'Admin','prefix' => 'admin', 'middleware' => 'auth'], function () {
  Route::get('home', [HomeController::class, 'getlogin'])->name('admin.getlogin');
  Route::get('logout', [HomeController::class, 'logout'])->name('admin.logout');
  Route::get('adminPanaleseting', [admin_panel_settings::class, 'index'])->name('admin.adminPanelSetting.index');
  Route::get('adminPanalesetingedite', [admin_panel_settings::class, 'edite'])->name('admin.adminPanelSetting.edit');
  Route::post('adminPanalesetingupdate', [admin_panel_settings::class, 'update'])->name('admin.adminPanelSetting.update');
});
