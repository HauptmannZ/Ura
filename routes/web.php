<?php

use App\Http\Controllers\AdminCatagoryController;
use App\Http\Controllers\BerandaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\ProfileAccountController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\authPengunjung;
use App\Http\Controllers\dataKomentar;
use App\Http\Controllers\DataUserController;

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

Route::get('/', [BerandaController::class, 'index']);
// Route::get('/', function () {
//     return view('beranda', [
//         'nama' => 'Lorem',
//         'title' => 'Beranda',
//         'active' => 'home'
//     ]);
// });

Route::get('/posts', [PostController::class, 'index']);

Route::get('/tentang',[BerandaController::class, 'tentang']);

//halaman post sendiri
Route::get('/posts/{post:slug}', [PostController::class, 'tampil']);
// Route::get('posts/{slug}', [PostController::class, 'tampil']);

// Routes Pengunjung
Route::get('/loginPengunjung/{slug}', [authPengunjung::class, 'index']);
Route::get('/registerPengunjung/{slug}', [authPengunjung::class, 'register']);
Route::post('/registerPengunjung/{slug}', [authPengunjung::class, 'create']);
Route::post('/loginPengunjung/{slug}', [authPengunjung::class, 'authenticatePengunjung']);
Route::post('//kirimKomentar/{slug}', [authPengunjung::class, 'kirimKomentar']);
Route::post('/logoutPengunjung/{slug}', [authPengunjung::class, 'logout']);

Route::get('/categories', [CategoryController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/forgotPassword', [LoginController::class, 'forgotpassword']);
Route::post('/forgotPassword', [LoginController::class, 'prosesEmail']);
Route::get('/updatePassword/{email}/{token}', [LoginController::class, 'updatePassword']);
Route::post('/updatePassword', [LoginController::class, 'resetPassword']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/dashboard/profile', [ProfileAccountController::class, 'index'])->middleware('auth');
Route::get('/dashboard/profile', [ProfileAccountController::class, 'index'])->middleware('auth');
Route::post('/dashboard/ubahPassword', [ProfileAccountController::class, 'updatePassword'])->middleware('auth');
Route::post('/dashboard/editAkun', [ProfileAccountController::class, 'updateAkun'])->middleware('auth');
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::get('/dashboard/categories/checkSlug', [AdminCatagoryController::class, 'checkSlug'])->middleware('admin');
Route::resource('/dashboard/categories', AdminCatagoryController::class)->except('show')->middleware('admin');
Route::get('/dashboard/komentar', [dataKomentar::class,'index'])->middleware('admin');
Route::resource('/dashboard/dataUser', DataUserController::class)->except('show')->middleware('admin');
Route::get('/dashboard/semuaActivityPosts', [AdminCatagoryController::class, 'AllPosts'])->middleware('admin');
Route::delete('/dashboard/komentar/{id}', [dataKomentar::class,'hapusKomentar'])->middleware('admin');
Route::get('/dashboard/tentang', [DashboardController::class, 'tentang'])->middleware('admin');
Route::post('/dashboard/tentang/{id}', [DashboardController::class, 'tentangEdit'])->middleware('admin');
Route::get('/dashboard/semuaActivityPosts', [AdminCatagoryController::class, 'AllPosts'])->middleware('admin');
Route::get('/dashboard/semuaActivityPosts', [AdminCatagoryController::class, 'filterPosts'])->middleware('admin');
// Route::get('/categories/{category:slug}', [CategoryController::class, 'category']);

// Route::get('/authors/{user:username}', [UserController::class, 'author']);
