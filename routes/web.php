<?php

use Illuminate\Support\Facades\Route;
//ルーティングを設定するコントローラを宣言する
use App\Http\Controllers\PostsController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts',[PostsController::class, 'index']);

Route::get('/posts/create',[PostsController::class,'create']);
Route::post('/posts/store',[PostsController::class,'store'])->name('posts.store');

Route::get('/posts/{id}',[PostsController::class, 'show']);

