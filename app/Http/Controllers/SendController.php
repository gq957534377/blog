<?php

namespace App\Http\Controllers;

use App\Services\WechatSourceService;
use App\Services\WechatUserService;
use EasyWeChat\Broadcast\Broadcast;
use EasyWeChat\Core\Exception;
use EasyWeChat\Foundation\Application;
use EasyWeChat\Staff\Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SendController extends Controller
{
    private static $application;

    public function __construct(
        Application $application
    )
    {
        self::$application = $application;
    }

    /**
     * 说明:
     *
     * @author 郭庆
     */
    public function index()
    {  dd(self::$application->user->lists());
        return view('admin.wechat.massSend');
    }

    /**
     * 说明: 发送预览给指定用户名
     *
     * @param Request $request
     * @return mixed
     * @author 郭庆
     */
    public function create(Request $request)
    {
        $data = $request->all();
//dd(1);
//        if (empty($data) || empty($data['list']) || empty($data['wxname']) || empty($data['media_id'])) return back()->withErrors('数据参数有误');
$notice = self::$application->notice;
//dd($notice);
        $userId = 'oKxKt05fx36Gn4BCwMD26YVjiRk8';
        $templateId = 'eG8cxcjEloAF_xy7VpwjeKmsNoEdeEfcITJJ2M5wEk0';
        $url = '';
        $data = array(
            "first"  => "8月账单明细！",
            "name"   => "光谷cbc 501",
            "date"  => "2017年8月22日-2019年9月10日",
            "price"  => "39.8元",
            "remark" => "请按时交租！",
        );
        $result = $notice->uses($templateId)->withUrl($url)->andData($data)->andReceiver($userId)->send();
        dd($result,$notice->status('434475628'));

        // 实例化app
        $broadcast = self::$application->broadcast;
//        $res = $broadcast->sendText('大家好的教科书', 'hzx2004');
//        $res = $broadcast->sendText('第三次群发测试',['oun2CxMEWsjddlXWeI3Ax3-ROD4w','oun2CxPCVMn6-Y2jKWTSfrLrxQv0','oun2CxBu4J0fGxj0CmRX3eSsTLJU']);
//        $res = $broadcast->previewText('hzx','oKxKt09ZtIpNQMJwO2LN96M1IAoo');
//        echo time();
//        $res = $broadcast->previewText('jack','oun2CxD69AaStWk7Ehoi2vpjie00');
//        echo time();
//        $res = $broadcast->previewText('gq','oun2CxBu4J0fGxj0CmRX3eSsTLJU');
//        echo time();
//        $res = $broadcast->previewText('banana','oun2CxMEWsjddlXWeI3Ax3-ROD4w');
//        echo time();
//        $res = $broadcast->previewText('hzx2','oKxKt09ZtIpNQMJwO2LN96M1IAoo');
//        $res = $broadcast->previewCard('http://blog.guoq.xin','oKxKt09ZtIpNQMJwO2LN96M1IAoo');
        echo time();

//        dd($res);
//        try {
//
            //            switch ($data['list']) {
//                case 'NEWS':
//                    $res = $broadcast->previewNewsByName($data['media_id'], $data['wxname']);
//                    break;
//                case 'TEXT':
//                    $res = $broadcast->previewTextByName($data['media_id'], $data['wxname']);
//                    break;
//                case 'VOICE':
//                    $res = $broadcast->previewVoiceByName($data['media_id'], $data['wxname']);
//                    break;
//                case 'IMAGE':
//                    $res = $broadcast->previewImageByName($data['media_id'], $data['wxname']);
//                    break;
//                case 'VIDEO':
//                    $res = $broadcast->previewVideoByName($data['media_id'], $data['wxname']);
//                    break;
//                default:
//                    return back()->withErrors('消息类型有误');
//                    break;
//            }
//        } catch (Exception $e) {
////            if ($e->getCode() == 43004) return back()->withErrors('该用户尚未订阅，请先订阅，错误代码：43004');
////            return back()->withErrors(trans('wechat.'.$e->getCode()) . ' 错误代码： ' . $e->getCode());
//            return back()->withErrors(trans('wechat.'.$e->getCode()). ' 错误代码： ' . $e->getCode());
//        }

//        return back()->withErrors('发送预览成功', 'success');
    }

    /**
     * 说明: 新建消息群发
     *
     * @param Request $request
     * @return mixed
     * @author 郭庆
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');

        if (empty($data) || empty($data['list']) || empty($data['media_id'])) return back()->withErrors('数据参数有误');
        $message = $data['media_id'];
        // 实例化app
        $broadcast = self::$application->broadcast;
        switch ($data['list']) {
            case 'NEWS':
                $messageType = Broadcast::MSG_TYPE_NEWS;
                break;
            case 'TEXT':
                $messageType = Broadcast::MSG_TYPE_TEXT;
                break;
            case 'VOICE':
                $messageType = Broadcast::MSG_TYPE_VOICE;
                break;
            case 'IMAGE':
                $messageType = Broadcast::MSG_TYPE_IMAGE;
                break;
            case 'VIDEO':
                $messageType = Broadcast::MSG_TYPE_VIDEO;
//                $message = [$data['media_id'], $data['title'], $data['description']];
                break;
            default:
                return back()->withErrors('消息类型有误');
                break;
        }
        // 群发开始
        try{
//            $result = $broadcast->send($messageType, $message, ['o7ZmVwQjCHH7KjcMSlAcsxF__Qhw', 'o7ZmVwQyOzTrvDajiscgW2VR6SR8']);
            $result = $broadcast->send($messageType, $message);
        }catch (Exception $e){
            if ($e->getCode() == 45028) return back()->withErrors('本月群发最大配额已达上限（请下月再试）,错误代码45028');
            return back()->withErrors(trans('wechat.'.$e->getCode()).' || 错误代码：'.$e->getCode());
        }
//        $result = $broadcast->send(['tQYRfquxlqavH4gtpzYX_lgBxEAppsJ5s8UQoMPJ4QQ','测试标题','测试内容'], ['oZ5SowxoO-jqtGbjpZkQXzz_1a_A', 'oZ5SowyB56Hc-Gu0SmvrbegvyTf8', 'oZ5Sow8Ta9QYlyNZCPytCnjNBV6Y']);
        if (empty($result->errcode)) return back()->withErrors('发送成功', 'success');
        return back()->withErrors('发送失败，' . $result->errmsg);
    }

    /**
     * 说明: 获取指定类型全部素材接口
     *
     * @param string $type 素材类型 image voice video news
     * @return \Illuminate\Http\JsonResponse
     * @author 郭庆
     */
    public function show($type)
    {
        $config = [
            'app_id'  => config('wechat.app_id'),         // AppID
            'oauth' => [
                'scopes'   => ['snsapi_userinfo'],
                'callback' => '/wechat_massSend/1/edit',
            ],

        ];
        $app = self::$application;
        $oauth = $app->oauth;
        return $oauth->redirect();

//// 未登录
//        if (empty($_SESSION['wechat_user'])) {
//            $_SESSION['target_url'] = 'user/profile';
//            return $oauth->redirect();
////             这里不一定是return，如果你的框架action不是返回内容的话你就得使用
//             $oauth->redirect()->send();
//        }
//// 已经登录过
//        $user = $_SESSION['wechat_user'];
    }

    public function edit($id,Request $request)
    {
            $user = self::$application->oauth->user();
//        dd(empty(self::$application->oauth->user()));
//        dd($request->session()->flush());
//        $user = self::$application->oauth->user();
        dd($user,$user->name,$user->original['openid'],$user->original);
    }

}
