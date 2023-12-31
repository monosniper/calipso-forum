<?php

use App\Http\Controllers\AdminConttroller;
use App\Http\Controllers\DealController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/guaranties', [HomeController::class, 'guaranties'])->name('guaranties');
Route::get('/users', [HomeController::class, 'users'])->name('users');

Route::get('/deal', [DealController::class, 'deal'])->middleware('auth')->name('deal');
Route::post('/deal/message', [DealController::class, 'sendMessage'])->middleware('auth')->name('deal.message');
Route::post('/deal/invite', [DealController::class, 'invite'])->middleware('auth')->name('deal.invite');
Route::post('/deal/offer', [DealController::class, 'offer'])->middleware('auth')->name('deal.offer');
Route::get('/deal/join/{invite}', [DealController::class, 'join'])->middleware('auth')->name('deal.join');
Route::get('/deal/{deal}', [DealController::class, 'show'])->middleware('auth')->name('deal.show');
Route::get('/deal/payed/{deal}', [DealController::class, 'payed'])->middleware('auth')->name('deal.payed');

Route::get('/users/{user}', [HomeController::class, 'user'])->name('user');

Route::get('/threads/{thread}', [HomeController::class, 'thread'])->name('thread');
Route::get('/posts/{post}', [HomeController::class, 'post'])->name('post');
Route::get('/posts', [HomeController::class, 'posts'])->name('posts');
Route::post('/reply', [HomeController::class, 'reply'])->name('reply');

Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
Route::get('/product/{product}', [HomeController::class, 'product'])->name('product');
Route::get('/buy/{product}', [HomeController::class, 'buy'])->middleware('auth')->name('buy');

Route::get('/chat', [HomeController::class, 'chat']);
Route::post('/chat/send', [HomeController::class, 'chatSend']);

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [AdminConttroller::class, 'index']);

    Route::resource('users', \App\Http\Controllers\Admin\UsersController::class);
    Route::resource('categories', \App\Http\Controllers\Admin\CategoriesController::class);
    Route::resource('threads', \App\Http\Controllers\Admin\ThreadsController::class);
    Route::resource('posts', \App\Http\Controllers\Admin\PostsController::class);
    Route::resource('replies', \App\Http\Controllers\Admin\RepliesController::class);
    Route::resource('products', \App\Http\Controllers\Admin\ProductsController::class);
    Route::resource('transactions', \App\Http\Controllers\Admin\TransactionsController::class);
    Route::resource('deals', \App\Http\Controllers\Admin\DealsController::class);
    Route::resource('support', \App\Http\Controllers\Admin\SupportController::class);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile/wallet', [ProfileController::class, 'wallet'])->name('profile.wallet');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/replenish', [ProfileController::class, 'replenish'])->name('profile.replenish');
});

require __DIR__.'/auth.php';
