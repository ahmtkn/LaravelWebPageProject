<?php

use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'guest'],function(){
    Route::resource('/install','InstallController');
});


Auth::routes();

Route::get('/', 'HomeController@index')->name('/');
Route::get('/profile', 'UserController@profile')->name('my_profile');
Route::resource('/blogs','BlogController');
Route::resource('/about','AboutController');
Route::resource('/chefs','ChefsController');
Route::resource('/menu','MenuController');
Route::resource('/contact','ContactController');

Route::get('/test','TestController@index');


Route::namespace('Admin')->prefix('admin')->middleware(['auth','admin'])->name('admin.')->group(function()
{
    Route::get('/','AdminController@index')->name('dasboard');
    Route::get('/routes','RouteController@index')->name('routes');

    Route::resource('/abouts','AboutController');
    Route::resource('/posts','PostController');
    Route::resource('/chefs','ChefsController');
    Route::resource('/menus','MenuController');
    Route::get('/manage-role/{role}','RoleController@managerPermissions')->name('roles.manage-permissions');
    Route::post('/manage-role-permissions/','RoleController@managerPermissionsStore')->name('roles.manage-permissions-store');
    Route::resource('/roles','RoleController');
    Route::resource('/permissions','PermissionController');
    Route::resource('/users','UserController');
    Route::resource('/categories','CategoryController');
    Route::resource('/tags','TagController');
    Route::resource('/comments','CommentController',['only'=>['index','destroy']]);

});





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
