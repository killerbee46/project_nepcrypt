<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\UserController;
Use App\Http\Controllers\PostController;
Use App\Http\Controllers\FrontEndController;
Use App\Http\Controllers\EncryptionController;
use Illuminate\Support\Facades\Auth;


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

Route::get('/',[FrontendController::class, 'index']);
Route::get('/post', [FrontendController::class, 'post']);
Route::get('/profile', [FrontendController::class, 'profile']);
Route::get('/post/add-post',[FrontendController::class, 'addPost']);
Route::post('/post',[FrontendController::class, 'addNewPost']);
Route::get('/post/show/{id}', [FrontendController::class, 'viewPost']);
Route::post('/post/comment/{id}',[FrontendController::class, 'comment']);
Route::get('/deletecomment/{id}',[FrontendController::class, 'deletecomment']);
Route::get('/deletepost/{id}',[FrontendController::class, 'deletepost']);


require __DIR__.'/auth.php';

// Route::get('/user',[UserController::class, 'index']);

Route::group(['prefix'=>'encro','middleware'=>'auth'],function (){

    Route::get('/',[EncryptionController::class, 'encrypt']);
    Route::get('/encrypt', [EncryptionController::class, 'encrypt']);
    Route::post('/addencrypt', [EncryptionController::class, 'addEncrypt']);
    Route::get('/decrypt', [EncryptionController::class, 'decrypt']);
    Route::post('/decrypt', [EncryptionController::class, 'addDecrypt']);

});

 Route::group(['prefix'=>'admin','middleware'=>'admin'],function (){
    Route::get('/', [UserController::class, 'index']);
    Route::group(['prefix'=>'profile','middleware'=>'auth'],function (){

        Route::get('/',
        function ()
        {
            return view('admin.profile');
        }
    );


    });
        
        Route::group(['prefix'=>'users','middleware'=>'auth'],function (){

    	    Route::get('/',[UserController::class, 'index']);
    	    Route::post('/updateuserinfo/{id}',[UserController::class, 'UpdateUser']);
    	    Route::get('/add-user',[UserController::class, 'addUser']);
            Route::post('/searchuser',[UserController::class, 'searchUserForAdmin']);
            Route::post('/add-user',[UserController::class, 'addNewUser']);
            Route::get('/edit-user/{id}',[UserController::class, 'editUser']);
            Route::post('/edit-user/{id}',[UserController::class, 'updateUser']);
            Route::post('/delete-user/{id}',[UserController::class, 'deleteUser']);
        });
        Route::group(['prefix'=>'posts','middleware'=>'auth'],function (){

    	    Route::get('/',[PostController::class, 'index']); 
    	    Route::post('/updatepostinfo/{id}',[PostController::class, 'UpdatePost']);
    	    Route::get('/add-post',[PostController::class, 'addPost']);
            Route::post('/search-post',[PostController::class, 'searchPostForAdmin']);
            Route::post('/add-post',[PostController::class, 'addNewPost']);
            Route::get('/edit-post/{id}',[PostController::class, 'editPost']);
            Route::post('/edit-post/{id}',[PostController::class, 'updatePost']);
            Route::get('/delete-post/{id}',[PostController::class, 'deletePost']);

        });

    });
      Route::get('/logout', function () {
        Auth::logout();
        return redirect('/');
    });
      