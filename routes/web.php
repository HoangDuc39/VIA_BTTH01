<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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


Route::get('/hello', function () {
    return view('hello');
});
Route::get('/user/{id}', function ($id) {
    $users = [
		[
			'id' => 1,
			'name' => 'Tran Van A',
			'gender' => 'Nam'
        ],
        [
            'id' => 2,
            'name' => 'Tran Thi B',
            'gender' => 'Nu'
        ]
        ];
     return view('user', compact('users','id'));
});
Route::group(['prefix'=>'/contact'],function(){
    Route::get('/', function () {
        return view('contact');
    })->name('contact_view');
    Route::post('/', function (Request $request) {
        $name = $request->input('name');
        $email = $request->input('email');
        return view('submitted_form', compact('name','email'));
    })->name('contact_submit');
});
Route::resource('posts', 'PostController');
Route::resource('categories', 'CategoryController');

