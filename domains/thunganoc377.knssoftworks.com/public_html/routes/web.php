<?php

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
Route::group(['middleware' => ['auth','admin']], function() {




Route::get('/', function () {
    return redirect()->route('index');
});
Route::get('index',[
	'as'=>'index',
	'uses'=>'AdminController@index'
]);



Route::get('manage_user',[
	'as'=>'manage_user',
	'uses'=>'AdminController@manage_user'
]);
Route::post('postadminuseredit/{id}',[
	'as'=>'postadminuseredit',
	'uses'=>'AdminController@postadminuseredit'
]);
Route::get('deluser/{id}',[
	'as'=>'deluser',
	'uses'=>'AdminController@deluser'
]);





Route::get('signin',[
	'as'=>'signin',
	'uses'=>'AdminController@signin'
]);
Route::post('signin',[
	'as'=>'signin',
	'uses'=>'AdminController@postSignin'
]);
Route::get('changepassadmin',[
	'as'=>'changepassadmin',
	'uses'=>'AdminController@changepass'
]);

Route::post('changepassadmin',[
	'as'=>'changepassadmin',
	'uses'=>'AdminController@postChangepass'
]);

Route::post('changepassuser/{id}',[
	'as'=>'changepassuser',
	'uses'=>'AdminController@postChangePassUser'
]);






Route::get('manage_bill',[
	'as'=>'manage_bill',
	'uses'=>'AdminController@manage_bill'
]);
Route::get('done_bill/{id}',[
	'as'=>'done_bill',
	'uses'=>'AdminController@done_bill'
]);
Route::get('manage_bill_info/{id}',[
	'as'=>'manage_bill_info',
	'uses'=>'AdminController@manage_bill_info'
]);
Route::post('postdiscount/{id}',[
	'as'=>'postdiscount',
	'uses'=>'AdminController@postdiscount'
]);
Route::get('pdf/{id}',[
	'as'=>'pdf',
	'uses'=>'AdminController@pdf'
]);





Route::get('manage_food',[
	'as'=>'manage_food',
	'uses'=>'AdminController@manage_food'
]);
Route::post('food_add',[
	'as'=>'food_add',
	'uses'=>'AdminController@productAdd'
]);
Route::post('postfoodedit/{id}',[
	'as'=>'postfoodedit',
	'uses'=>'AdminController@postfoodedit'
]);
Route::get('fudstatusoff/{id}',[
	'as'=>'fudstatusoff',
	'uses'=>'AdminController@fudstatusoff'
]);
Route::get('fudstatusonl/{id}',[
	'as'=>'fudstatusonl',
	'uses'=>'AdminController@fudstatusonl'
]);






Route::get('manage_category',[
	'as'=>'manage_category',
	'uses'=>'AdminController@manage_category'
]);
Route::post('category_add',[
	'as'=>'category_add',
	'uses'=>'AdminController@categoryAdd'
]);
Route::post('postcategoryedit/{id}',[
	'as'=>'postcategoryedit',
	'uses'=>'AdminController@postcategoryedit'
]);
Route::get('delcat/{id}',[
	'as'=>'delcat',
	'uses'=>'AdminController@delcat'
]);




Route::get('manage_table',[
	'as'=>'manage_table',
	'uses'=>'AdminController@manage_table'
]);
Route::post('table_add',[
	'as'=>'table_add',
	'uses'=>'AdminController@tableAdd'
]);
Route::post('posttableedit/{id}',[
	'as'=>'posttableedit',
	'uses'=>'AdminController@posttableedit'
]);
Route::get('deltable/{id}',[
	'as'=>'deltable',
	'uses'=>'AdminController@deltable'
]);









Route::get('manage_dt',[
	'as'=>'manage_dt',
	'uses'=>'AdminController@manage_dt'
]);
Route::get('doanhthutime',[
	'as'=>'doanhthutime',
	'uses'=>'AdminController@doanhthutime'
]);

Route::get('export',[
	'as'=>'export',
	'uses'=>'ExportController@export'
]);



});
/*
Route::get('index',[
	'as'=>'index',
	'uses'=>'Controller@index'
]);

Route::post('add',[
	'as'=>'add',
	'uses'=>'Controller@add'
]);
Route::post('update/{id}',[
	'as'=>'update',
	'uses'=>'Controller@update'
]);

Route::get('delete/{id}',[
	'as'=>'delete',
	'uses'=>'Controller@delete'
]);
*/



Route::get('login',[
	'as'=>'login',
	'uses'=>'Controller@login'
]);
Route::post('login',[
	'as'=>'login',
	'uses'=>'Controller@postLogin'
]);
Route::get('logout',[
	'as'=>'logout',
	'uses'=>'Controller@logout'
]);




Route::post('loginapp',[
	'as'=>'loginapp',
	'uses'=>'Controller@postLoginapp'
]);
Route::get('logoutapp',[
	'as'=>'logoutapp',
	'uses'=>'Controller@logoutapp'
]);







Route::get('testing', function () {
    event(new App\Events\MyEvent(1,'abc','bg-success'));
    return "Event has been sent!";
});




//Route::group(['middleware' => ['auth']], function() {







Route::get('loadtable',[
	'as'=>'loadtable',
	'uses'=>'Controller@loadtable'
]);

Route::get('showfood',[
	'as'=>'showfood',
	'uses'=>'Controller@showfood'
]);
Route::get('first',[
	'as'=>'first',
	'uses'=>'Controller@first'
]);


Route::post('addorder/{id}',[
	'as'=>'addorder',
	'uses'=>'Controller@addorder'
]);



Route::get('getbill/{id}',[
	'as'=>'getbill',
	'uses'=>'Controller@getbill'
]);




Route::post('update/{id}',[
	'as'=>'update',
	'uses'=>'Controller@update'
]);

Route::get('delete/{id}',[
	'as'=>'delete',
	'uses'=>'Controller@delete'
]);




Route::post('checkout/{id}',[
	'as'=>'checkout',
	'uses'=>'Controller@checkout'
]);



//});