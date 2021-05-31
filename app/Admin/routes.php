<?php

use App\Admin\Controllers\AdminSwitchController;
use App\Admin\Controllers\PersonalAccessTokenController;
use App\Admin\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Dcat\Admin\Admin;

Admin::routes();

Route::group([
    'prefix'     => config('admin.route.prefix'),
    'namespace'  => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
], function () {

    Route::get('/', 'HomeController@index');

    // 站点设置
    Route::prefix("setting")->group(function (){
        // 设置
        Route::prefix("setting")->group(function (){
            Route::get("/",[\App\Admin\Controllers\AdminSettingController::class,"create"]);
            Route::post("/",[\App\Admin\Controllers\AdminSettingController::class,"store"]);
        });
        // 开关
        Route::prefix("switch")->group(function(){
            Route::get('/', [AdminSwitchController::class,"index"]);
            Route::put('/{name}', [AdminSwitchController::class,"update"]);
            Route::post('/{name}', [AdminSwitchController::class,"update"]);
        });
    });

    // 用户管理
    Route::prefix("users")->group(function(){
        Route::get('/', [UserController::class,'index']);
        Route::get('/{id}/edit', [UserController::class,'edit']);
        Route::put('/{id}', [UserController::class,'update']);
        Route::get('/{id}', [UserController::class,'show']);
    });

    // ApiTokens
    Route::prefix("ApiTokens")->group(function(){
        Route::get('/', [PersonalAccessTokenController::class,'index']);
        Route::get('/{id}/edit', [PersonalAccessTokenController::class,'edit']);
        Route::put('/{id}', [PersonalAccessTokenController::class,'update']);
        Route::get('/{id}', [PersonalAccessTokenController::class,'show']);
    });

});
