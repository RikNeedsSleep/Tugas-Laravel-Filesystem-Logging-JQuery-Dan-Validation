<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\Web\UserController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    //return view('welcome');

    //$resEncrypt = encrypt('Password123', true);
    //dd($resEncrypt);
    // eyJpdiI6IkR6WGhrV205bTVnMGFyakd2ZEhEenc9PSIsInZhbHVlIjoieU9VYys3YWdGeEdML0NBRWxXN0ZTZUZ4cDFYVUxxdGJDUHpOeDFoSmVzaz0iLCJtYWMiOiJlOWVhMzY2MTgyNmViYTk2MTBiYWQ3Zjc1NDExMDZmMWU2MjM5ZTVjYjM5MzA2MWUwZDIyNmNiMmNkZjA4ODE3IiwidGFnIjoiIn0=
    //$resDecrypt = decrypt('eyJpdiI6IkR6WGhrV205bTVnMGFyakd2ZEhEenc9PSIsInZhbHVlIjoieU9VYys3YWdGeEdML0NBRWxXN0ZTZUZ4cDFYVUxxdGJDUHpOeDFoSmVzaz0iLCJtYWMiOiJlOWVhMzY2MTgyNmViYTk2MTBiYWQ3Zjc1NDExMDZmMWU2MjM5ZTVjYjM5MzA2MWUwZDIyNmNiMmNkZjA4ODE3IiwidGFnIjoiIn0=', true);
    //dd($resDecrypt);

    $pass = 'Password123';
    $hashPass = Hash::make('Password1234');
    dd(Hash::check($pass, $hashPass));
});

Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register-user', [UserController::class, 'registerUser'])->name('register_user');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'loginUser'])->name('login_user');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard')->middleware(['authenticate', 'role:superadmin|user']);

Route::get('/login/google', [UserController::class, 'loginGoogle'])->name('login_google');
Route::get('/login/google/callback', [UserController::class, 'loginGoogleCallback'])->name('callback_google');

Route::post('/{user}/post-request', [UserController::class, 'postRequest'])->name('postRequest');
Route::get('/{user}/tambah-product', [UserController::class, 'handleRequest'])->name('form_product');
Route::get('/products', [UserController::class, 'getProduct'])->name('get_product');
Route::get('/{user}/product/{product}', [UserController::class, 'editProduct'])->name('edit_product');
Route::put('/{user}/product/{product}/update', [UserController::class, 'updateProduct'])->name('update_product');
Route::post('/{user}/product/{product}/delete', [UserController::class, 'deleteProduct'])->name('delete_product');
Route::get('/profile/{user}', [UserController::class, 'getProfile'])->name('get_profile');

Route::get('/admin/{user}/list-products', [UserController::class, 'getAdmin'])->name('admin_page');

Route::get('/cafe-amandemy', [UserController::class, 'cafe']);

// Route::post('/posts/{post}/delete', [PostController::class, 'delete']);
