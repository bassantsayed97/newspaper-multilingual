<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Models\User;
use App\Models\Category;
use App\Http\Controllers\Posts;

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
   // Route::get('/', function () {
    //     return view('index');
    // });

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
   
    // Route::get('/', function () {
    //     return view('index');
    // });
    Route::get('/',[App\Http\Controllers\FrontIndexController::class,'index'])
    ->name('index');
    
    Route::get('/post/{id}',[App\Http\Controllers\FrontIndexController::class,'show'])
    ->name('post.show');
    
    
    
    
    Route::resource("users", Controllers\UsersController::class);
    Route::get('/admin', function () {
        return view('admin.index');
    });
    
    //  Route::resource("admin/category",Controllers\CategoryController::class);
     Route::get('/admin/category',[App\Http\Controllers\CategoryController::class,'index'])
    ->name('category.index');
    
    Route::get('/admin/category/create',[App\Http\Controllers\CategoryController::class,'create'])
    ->name('category.create');
    
    Route::post('/admin/category/create',[App\Http\Controllers\CategoryController::class,'store'])
    ->name('category.store');
    
    Route::get('/admin/category/show/{category}',[App\Http\Controllers\CategoryController::class,'show'])
    ->name('category.show');
    
    Route::get('/admin/category/{category}',[App\Http\Controllers\CategoryController::class,'edit'])
    ->name('category.edit');
    
    Route::post('/admin/category/{category}',[App\Http\Controllers\CategoryController::class,'update'])
    ->name('category.update');
    
    Route::delete('/admin/category/{category}',[App\Http\Controllers\CategoryController::class,'destroy'])
    ->name('category.destroy');
    Route::get('/admin/posts',[App\Http\Controllers\PostsController::class,'index'])
    ->name('posts.index');
    
    Route::get('/admin/posts/create',[App\Http\Controllers\PostsController::class,'create'])
    ->name('posts.create');
    
    Route::post('/admin/posts/create',[App\Http\Controllers\PostsController::class,'store'])
    ->name('posts.store');
    
    Route::post('/admin/posts/create',[App\Http\Controllers\PostsController::class,'store'])
    ->name('posts.store');
    
    Route::get('/admin/posts/show/{post}',[App\Http\Controllers\PostsController::class,'show'])
    ->name('posts.show');
    
    Route::get('/admin/posts/{post}',[App\Http\Controllers\PostsController::class,'edit'])
    ->name('posts.edit');
    
    Route::post('/admin/posts/{post}',[App\Http\Controllers\PostsController::class,'update'])
    ->name('posts.update');
    
    Route::delete('/admin/posts/{post}',[App\Http\Controllers\PostsController::class,'destroy'])
    ->name('posts.destroy');
    
 

// Route::resource("viewposts",singlePostController::class);
// Route::get('/admin/categories',[App\Http\Controllers\CategoryController::class,'index'])
// ->name('category.index');

// Route::get('/admin/category/create',[App\Http\Controllers\CategoryController::class,'create'])
// ->name('Category.create');

// Route::post('/admin/Category/create',[App\Http\Controllers\CategoryController::class,'store'])
// ->name('Category.store');
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

