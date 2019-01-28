<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Repositories\ArticleRepositoryEloquent;

class HomeController extends Controller
{
    protected $article;

    public function __construct(ArticleRepositoryEloquent $article)
    {
        $this->article = $article;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        #\Log::info('访问者IP' . $request->getClientIp() . '来源:'.$this->getLocation($request->getClientIp()));
        $articles = $this->article
            ->orderBy('sort','desc')
            ->orderBy('id', 'desc')
            ->paginate(15, ['id','title','desc','user_id','cate_id','read_count','created_at']);
        return view('default.home', compact('articles'));
    }

    /**
     * 说明:获取ip地址
     *
     * @param string $ip
     * @return string
     * @author 王浩
     */
    public function getLocation($ip = '')
    {
        empty($ip) && $ip = getip();
        if ($ip == "127.0.0.1") return "本机地址";
        $api = "http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=json&ip=$ip";
        $json = @file_get_contents($api);//调用新浪IP地址库
        $arr = json_decode($json, true);//解析json
        $country = $arr['country']; //取得国家
        $province = $arr['province'];//获取省份
        $city = $arr['city']; //取得城市
        if ((string)$country == "中国") {
            if ((string)($province) != (string)$city) {
                $_location = $province . $city;
            } else {
                $_location = $country . $city;
            }
        } else {
            $_location = $country;
        }
        return $_location;
    }
}
