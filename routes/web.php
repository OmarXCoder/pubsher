<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\TopicController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Auth::loginUsingId(1);

Route::get('/', function () {
    return Inertia::render('Home');
})->middleware('auth');

Route::get('posts', [PostController::class, 'index'])->name('posts.index');

Route::get('topics/{topic}', [TopicController::class, 'show'])->name('topics.show');
