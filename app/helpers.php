<?php

use App\Models\AdminSetting;
use App\Models\AdminSwitch;

if (!function_exists("get_options")){
    function get_options(string $name,string $default=null){
        if (AdminSetting::where("name",$name)->count()){
            return AdminSetting::where("name",$name)->first()->value;
        }else{
            return $default;
        }
    }
}

if (!function_exists("get_options_count")){
    function get_options_count(string $name){
        return AdminSetting::where("name",$name)->count();
    }
}

if (!function_exists("get_switch")){
    function get_switch(string $name){
        return AdminSwitch::where("name",$name)->count();
    }
}