<?php


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
Route::group(['namespace' => 'Main'], function () {
    Route::get('/', 'IndexController')->name('main.index');
});

Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function () {
    Route::get('/', 'IndexController')->name('posts.index');
    Route::get('/create', 'CreateController')->name('post.create');
    Route::post('/', 'StoreController')->name('post.store');
    Route::get('/{post}', 'ShowController')->name('posts.show');
        Route::group(['namespace' => 'Comment', 'prefix' =>'{post}/comments'], function (){
            Route::post('/', 'StoreController')->name('post.comment.store');
        });
        Route::group(['namespace' => 'Like', 'prefix' =>'{post}/likes'], function (){
            Route::post('/', 'StoreController')->name('post.like.store');
        });

    Route::get('/{post}/edit', 'EditController')->name('post.edit');
    Route::patch('/{post}', 'UpdateController')->name('post.update');
    Route::delete('/{post}', 'DestroyController')->name('post.destroy');
});

Route::group(['namespace' => 'Personal', 'prefix' => 'personal', 'middleware' => ['auth', 'verified']], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', 'IndexController')->name('personal.main.index');
        Route::get('/{user}/edit', 'EditController')->name('personal.main.edit');
        Route::patch('/{user}', 'UpdateController')->name('personal.main.update');
    });

    Route::group(['namespace' => 'Following', 'prefix' => '{user}/following'], function () {
        Route::get('/', 'IndexController')->name('personal.followings.index');
        Route::post('/{id}', 'StoreController')->name('personal.followings.store');
        Route::delete('/{id}', 'DestroyController')->name('personal.followings.destroy');
    });

    Route::group(['namespace' => 'FollowingPost', 'prefix' => 'followingpost'], function () {
        Route::get('/', 'IndexController')->name('personal.followingsposts.index');
    });


    Route::group(['namespace' => 'Follower', 'prefix' => '{user}/follower'], function () {
        Route::get('/', 'IndexController')->name('personal.followers.index');
    });
    
    Route::group(['namespace' => 'Liked', 'prefix' => 'liked'], function () {
        Route::get('/', 'IndexController')->name('personal.liked.index');
        Route::delete('/{post}', 'DestroyController')->name('personal.liked.destroy');
    });

    Route::group(['namespace' => 'Comment', 'prefix' => 'comment'], function () {
        Route::get('/', 'IndexController')->name('personal.comments.index');
        Route::delete('/{comment}', 'DestroyController')->name('personal.comments.destroy');
        Route::get('/{comment}/edit', 'EditController')->name('personal.comments.edit');
        Route::patch('/{comment}', 'UpdateController')->name('personal.comments.update');
    });

    Route::group(['namespace' => 'User', 'prefix' => 'user'], function () {
        Route::get('/', 'IndexController')->name('personal.users.index');
        Route::get('/{user}', 'ShowController')->name('personal.users.show');
       
    });

    Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function () {
        Route::get('/create', 'CreateController')->name('personal.posts.create');
        Route::post('/', 'StoreController')->name('personal.posts.store');    
        Route::get('/{post}/edit', 'EditController')->name('personal.posts.edit');
        Route::patch('/{post}', 'UpdateController')->name('personal.posts.update');
        Route::delete('/{post}', 'DestroyController')->name('personal.posts.destroy');
    });
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin', 'verified']], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', 'IndexController')->name('admin.main.index');
    });

    Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function () {
        Route::get('/', 'IndexController')->name('admin.posts.index');
        Route::get('/create', 'CreateController')->name('admin.posts.create');
        Route::post('/', 'StoreController')->name('admin.posts.store');
        Route::get('/{post}/edit', 'EditController')->name('admin.posts.edit');
        Route::patch('/{post}', 'UpdateController')->name('admin.posts.update');
        Route::delete('/{post}', 'DestroyController')->name('admin.posts.destroy');
    });
    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
        Route::get('/', 'IndexController')->name('admin.categories.index');
        Route::get('/create', 'CreateController')->name('admin.categories.create');
        Route::post('/', 'StoreController')->name('admin.categories.store');
        Route::get('/{category}/edit', 'EditController')->name('admin.categories.edit');
        Route::patch('/{category}', 'UpdateController')->name('admin.categories.update');
        Route::delete('/{category}', 'DestroyController')->name('admin.categories.destroy');
    });
    Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function () {
        Route::get('/', 'IndexController')->name('admin.tags.index');
        Route::get('/create', 'CreateController')->name('admin.tags.create');
        Route::post('/', 'StoreController')->name('admin.tags.store');
        Route::get('/{tag}/edit', 'EditController')->name('admin.tags.edit');
        Route::patch('/{tag}', 'UpdateController')->name('admin.tags.update');
        Route::delete('/{tag}', 'DestroyController')->name('admin.tags.destroy');
    });

    Route::group(['namespace' => 'User', 'prefix' => 'users'], function () {
        Route::get('/', 'IndexController')->name('admin.users.index');
        Route::get('/create', 'CreateController')->name('admin.users.create');
        Route::post('/', 'StoreController')->name('admin.users.store');
        Route::get('/{user}/edit', 'EditController')->name('admin.users.edit');
        Route::patch('/{user}', 'UpdateController')->name('admin.users.update');
        Route::delete('/{user}', 'DestroyController')->name('admin.users.destroy');
    });
});
// Route::get('/', function () {
//     return view('post.index');
// });


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes(['verify' => true]);
