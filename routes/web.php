<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductAdminController;
use App\Http\Controllers\UpdateAdminController;
use App\Http\Controllers\UsersAdminController;
use App\Http\Controllers\PostController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/bill', [BillController::class, 'index'])->name('bill');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/detail/{id}', [DetailController::class, 'index'])->name('detail');

// Route::get('/login', [LoginController::class, 'index'])->name('login');
// Route::get('/signin', [RegisterController::class, 'index'])->name('signin');
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/usersadmin', [UsersAdminController::class, 'index'])->name('useradmin');
Route::get('/productadmin', [ProductAdminController::class, 'index'])->name('productadmin');

Route::post('/productupdate/{id}', [UpdateAdminController::class, 'productupdate'])->name('productupdate');
Route::get('/productupdate/{id}', [UpdateAdminController::class, 'productupdateform'])->name('productupdateform');


Route::post('/productadd', [ProductAdminController::class, 'productadd'])->name('productadd');
Route::get('/productdelete/{id}', [ProductAdminController::class, 'productdelete'])->name('productdelete');


Route::get('/categories/{category_id}', [ProductController::class, 'getProductByCategory'])->name('categories');
Route::get('/search', [ProductController::class, 'search'])->name('search');

Route::apiResource('posts', PostController::class);


//cart
Route::post('add', [CartController::class, 'addToCart'])->name('add');
Route::get('destroy', [CartController::class, 'destroy'])->name('destroy');
Route::post('<q></q>remove/{id}', [CartController::class, 'remove'])->name('cart.remove');