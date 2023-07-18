<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardCategoryController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardUserController;

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

Route::get('/welcome', function() {
    return view('welcome');
});

Route::get('/', function () {
    return view('home', [
        "title" => "Home",
        'image' => 'Andre.JPG'
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "name" => "Andre Sevtian",
        "email" => "andrasevtian501@gmail.com",
        "image" => "Andre.JPG"
    ]);
});

Route::get('/categories', function() {
    return view('categories', [
        'title' => 'Post Category',
        'categories' => Category::all()
    ]);
});

Route::get('/blog', [PostController::class, 'index']);
Route::get('/post/{post:slug}', [PostController::class, 'show']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function() {
    return view('dashboard.index');
})->middleware('auth');

Route::get('/dashboard/posts/createSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::get('/dashboard/categories/createSlug', [DashboardPostController::class, 'checkSlug']);
Route::resource('/dashboard/categories', DashboardCategoryController::class)->except('show');

Route::resource('/dashboard/user', DashboardUserController::class)->except('show');
