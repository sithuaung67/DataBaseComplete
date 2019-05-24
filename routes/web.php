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



Route::get('/login',[
    'uses'=>'AuthController@getLogin',
    'as'=>'login'
]);

Route::post('/login',[
    'uses'=>'AuthController@postLogin',
    'as'=>'login'
]);


Route::group(['middleware'=>'auth'], function (){

    Route::get('/', function (){
        return redirect()->route('showData');
    });


    Route::group(['prefix'=>'user'], function (){

        Route::get('/account/setting',[
            'uses'=>'AdminController@getUserAccountSetting',
            'as'=>'account.setting'
        ]);
        Route::post('/password/update',[
            'uses'=>'AdminController@postUpdatePassword',
            'as'=>'password.update'
        ]);
        Route::get('/dashboard',[
            'uses'=>'AdminController@getDashboard',
            'as'=>'dashboard'
        ]);

        Route::get('/logout',[
            'uses'=>'AuthController@getLogout',
            'as'=>'logout'
        ]);
        Route::get('/error',[
            'uses'=>'AdminController@getError',
            'as'=>'error'
        ]);
    });




    Route::group(['prefix'=>'admin', ], function (){

        Route::get('/users',[
            'uses'=>'AdminController@getUsers',
            'as'=>'users'
        ]);
        Route::get('/user/new',[
            'uses'=>'AdminController@getNewUser',
            'as'=>'user.new'
        ]);
        Route::post('/user/new',[
            'uses'=>'AdminController@postNewUser',
            'as'=>'user.new'
        ]);
        Route::post('/user/delete',[
            'uses'=>'AdminController@postDeleteUser',
            'as'=>'user.delete'
        ]);

        Route::post('/user/update',[
            'uses'=>'AdminController@postUpdateUser',
            'as'=>'user.update'
        ]);
        Route::get('department',[
           'uses'=>'DataController@getDepartment',
           'as'=>'department'
        ]);
        Route::post('postDepartment',[
           'uses'=>'DataController@postDepartment',
           'as'=>'postDepartment'
        ]);

        Route::get('data',[
           'uses'=>'DataController@getData',
           'as'=>'data'
        ]);
        Route::get('showData',[
            'uses'=>'DataController@getShowData',
            'as'=>'showData'
        ]);
        Route::post('postData',[
           'uses'=>'DataController@postData',
           'as'=>'postData'
        ]);
        Route::post('updateDepartment/{id}',[
            'uses'=>'DataController@updateDepartment',
            'as'=>'updateDepartment'
        ]);
        Route::post('/department/delete',[
            'uses'=>'DataController@postDeleteDepartment',
            'as'=>'department.delete'
        ]);
        Route::post('/data/delete',[
            'uses'=>'DataController@postDeleteData',
            'as'=>'data.delete'
        ]);

        Route::post('/data/update',[
            'uses'=>'DataController@postUpdateData',
            'as'=>'data.update'
        ]);
        Route::get('/search/department',[
            'uses'=>'DataController@getSearchDepartment',
            'as'=>'search.data'
        ]);
        Route::get('/search/date',[
            'uses'=>'DataController@getSearchDate',
            'as'=>'search.date'
        ]);
        Route::post('/data/update',[
            'uses'=>'DataController@postUpdateData',
            'as'=>'update.data'
        ]);
        Route::get('/view',[
           'uses'=>'DataController@getViewData',
           'as'=>'view.data'
        ]);
        Route::get('/back',[
            'uses'=>'DataController@getBack',
            'as'=>'back'
        ]);
        Route::get('/search/data',[
            'uses'=>'DataController@getSearchAll',
            'as'=>'search.all'
        ]);
    });



});



