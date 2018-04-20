<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use EasyWeChat\Message\News;
use EasyWeChat\Foundation\Application;
use Log;
class WechartController extends Controller
{
    public function index()
    {
//        return 'aaa';
//        Log::info('request arrived.'); # 注意：Log 为 Laravel 组件，所以它记的日志去 Laravel 日志看，而不是 EasyWeChat 日志
        $wechat = app('wechat');

        //微信菜单
        $menu = $wechat->menu;
        $buttons = [
            [
                "type" => "view",
                "name" => "介绍",
                "url"  => 'http://www.baidu.com'
            ],
            [
                "type" => "view",
                "name" => "luozhen1111",
                "url"  => 'http://www.baidu.com'
            ],
            [
                "type" => "view",
                "name" => "待定",
                "url"  =>  'http://www.baidu.com'
            ],
        ];
        $menu->add($buttons);
        $wechat->server->setMessageHandler(function($message){
            $news = new News();
            $news->title = '测试';
            $news->description = '微信测试';
            $news->url = "http://www.baidu.com";
            $news->image = "http://oc4u0nphu.bkt.clouddn.com/test/1471588733.jpg";
            return $news;
        });
//        Log::info('return response.');
        return $wechat->server->serve();
    }
}
