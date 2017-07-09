<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('eee', function () {
    $token=csrf_field();
    echo <<<haha
    <form action="test/post" method="post">
    $token
    <input type="text" name="user"><br/>
    <input type="text" name="pwd" > <br/>
    <input type="submit" value="提交">
    </form> 
haha;

});

Route::post('try1',function(){
    var_dump($_POST);
});

Route::match(['get','post'],'abc',function(){
    echo 'yohoho';
});

Route::get('index/index','IndexController@index');
Route::get('test/test','Admin\TestController@test');
Route::post('test/post','Admin\TestController@post');
Route::any('login/login','Admin\LoginController@login');

