<?php

use Illuminate\Support\Facades\Route;
use App\User;
use App\Permission\Models\Role;
use App\Permission\Models\Permission;
use Illuminate\Support\Facades\Gate;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//rutas Login
Route::get('/', 'AuthController@index')->name('login');
Route::post('post-login', 'AuthController@postLogin');
Route::get('logout', 'AuthController@logout')->name('logout');


//rutas role
Route::resource('/role', 'RoleController')->names('role');

//rutas user
//Route::resource('/user', 'UserController', ['except' => ['create', 'store']])->names('user');
Route::resource('/user', 'UserController')->names('user');

//rutas perfil de usuario
Route::get('profile/{id}', 'UserController@profile')->name('profile');
Route::get('profile/{id}/edit', 'UserController@editProfile')->name('profile.edit');
Route::put('profile/{id}', 'UserController@updateProfile')->name('profile.update');

//rutas cuestionario
Route::resource('/questionary', 'QuestionaryController')->names('questionary');

//rutas question
Route::get('question/questions/{id}', 'QuestionController@questions')->name('question.questions');
Route::get('question/addQuestion/{id}', 'QuestionController@addQuestion')->name('question.addQuestion');
Route::resource('/question', 'QuestionController')->names('question');
