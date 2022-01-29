<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\CommentLikesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\TopicFollowersController;
use App\Http\Controllers\UserFollowersController;
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

require __DIR__ . '/auth.php';

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/u/{user}', [ProfileController::class, 'index'])->name('profile');

Route::group(['middleware' => 'auth'], function () {
    Route::get('posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::post('posts', [PostController::class, 'store'])->name('posts.store');

    // Commenting On Posts
    Route::get('posts/{post}/comments', [PostCommentsController::class, 'index'])->name('posts.comments.index');
    Route::post('posts/{post}/comments', [PostCommentsController::class, 'store'])->name('posts.comments.store');

    Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

    // Liking Posts
    Route::post('posts/{post}/likes', [PostLikesController::class, 'store'])->name('post.likes');
    Route::delete('posts/{post}/likes', [PostLikesController::class, 'destroy']);

    // Liking Comments
    Route::post('comments/{comment}/likes', [CommentLikesController::class, 'store'])->name('comments.likes.store');
    Route::delete('comments/{comment}/likes', [CommentLikesController::class, 'destroy'])->name('comments.likes.destroy');

    Route::get('topics/{topic}', [TopicController::class, 'show'])->name('topics.show');

    // Following Users
    Route::post('users/{user}/followers', [UserFollowersController::class, 'store'])->name('user.followers');
    Route::delete('users/{user}/followers', [UserFollowersController::class, 'destroy']);

    // Following Topics
    Route::post('topics/{topic}/followers', [TopicFollowersController::class, 'store'])->name('topic.followers');
    Route::delete('topics/{topic}/followers', [TopicFollowersController::class, 'destroy']);
});
