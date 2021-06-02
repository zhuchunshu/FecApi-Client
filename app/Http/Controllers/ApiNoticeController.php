<?php

namespace App\Http\Controllers;

use App\Models\ApiNotice;
use Illuminate\Http\Request;
use App\lib\aip\AipContentCensor;

class ApiNoticeController extends Controller
{
    public function show($hash){
        if(!ApiNotice::where('hash',$hash)->count()){
            return abort(404);
        }
        $data = ApiNotice::where('hash',$hash)->first();
        if(!$data->status){
            $client = new AipContentCensor(get_options("s-api-baidu-appid"), get_options("s-api-baidu-apikey"), get_options("s-api-baidu-secretkey"));
            $result = $client->textCensorUserDefined($data->content);
            if($result['conclusionType']==1){
                ApiNotice::where("hash",$hash)->update([
                    "status" => "正常"
                ]);
            }else{
                ApiNotice::where("hash",$hash)->update([
                    "status" => "违规"
                ]);
            }
        }
        $data = ApiNotice::where('hash',$hash)->first();
        if($data->status=="违规"){
            $content = "内容违规,无法展示";
        }else{
            $content =$data->content;
        }
        return view("view.api.ApiNotice",["title"=>$data->title,"content"=>$content]);
    }
}
