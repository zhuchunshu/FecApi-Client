<?php

use Dcat\Admin\Admin;
use Illuminate\Support\Facades\Route;
use App\Admin\Controllers\UserController;
use App\Admin\Controllers\ApiSettingController;
use App\Admin\Controllers\AdminSwitchController;
use App\Admin\Controllers\ApiNoticeController;
use App\Admin\Controllers\PersonalAccessTokenController;

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
        // Api设置
        Route::prefix("api")->group(function (){
            Route::get("/",[\App\Admin\Controllers\ApiSettingController::class,"create"]);
            Route::post("/",[\App\Admin\Controllers\ApiSettingController::class,"store"]);
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

    //　Api 
    Route::prefix("api")->group(function(){
        // 通知文档

        Route::prefix("noticeDoc")->group(function(){
            Route::get('/', [ApiNoticeController::class,'index']);
            Route::get('/{id}/edit', [ApiNoticeController::class,'edit']);
            Route::put('/{id}', [ApiNoticeController::class,'update']);
            Route::get('/{id}', [ApiNoticeController::class,'show']);
        });

    });

});
