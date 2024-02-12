<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Route::group(['prefix' => 'ideas/', 'as' => 'ideas.'], function () {
//     Route::get('/ideas/{idea}', [IdeaController::class, 'show'])->name('show');

//     Route::group(['middleware' => ['auth']], function () {

//         Route::post('/', [IdeaController::class, 'store'])->name('store');
//         Route::get('/{idea}/edit', [IdeaController::class, 'edit'])->name('edit');
//         Route::put('/{idea}/update', [IdeaController::class, 'update'])->name('update');
//         Route::delete('/{idea}', [IdeaController::class, 'destroy'])->name('destroy');
//         Route::post('/{idea}/comments', [CommentController::class, 'store'])->name('comments.store');

//     });
// });

//Automatic create routes, replace for code above
Route::resource('ideas', IdeaController::class)->except(['index', 'create', 'show'])->middleware('auth');
Route::resource('ideas', IdeaController::class)->only(['show']);
Route::resource('ideas.comments', CommentController::class)->only(['store'])->middleware('auth');

Route::resource('users',UserController::class)->only(['edit','show','update']);
Route::get('profile',[UserController::class, 'profile'])->name('profile');

Route::post('users/{user}/follow',[FollowerController::class, 'follow'])->middleware('auth')->name('users.follow');
Route::post('users/{user}/unfollow',[FollowerController::class, 'unfollow'])->middleware('auth')->name('users.unfollow');


Route::get('/terms', function () {
    return view('terms');
});
