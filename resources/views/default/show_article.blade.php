@inject('systemPresenter', 'App\Presenters\SystemPresenter')

@extends('layouts.app')

@section('title', $systemPresenter->checkReturnValue('title', $article->title))

@section('description', $systemPresenter->checkReturnValue('seo_desc', $article->desc))

@section('keywords', $systemPresenter->checkReturnValue('seo_keyword', $article->keyword))

@section('style')
    <link rel="stylesheet" href="{{ asset('editor.md/css/editormd.preview.min.css') }}">
    <link rel="stylesheet" href="{{ asset('share.js/css/share.min.css') }}">
    <style>
        @CHARSET "UTF-8";
        * {
            -webkit-tap-highlight-color: rgba(255, 0, 0, 0)
        }

        .box-size {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box
        }

        .bd-hide {
            display: none
        }

        .bd-payment-way{
            margin-left:22%
        }

        .bd-reward-stl {
            font-family: "microsoft yahei";
            text-align: center;
            background: #f1f1f1;
            padding: 10px 0;
            color: #666;
            margin: 20px auto;
            width: 100%
        }

        #bdRewardBtn {
            border: 0;
            outline: 0;
            border-radius: 100%;
            padding: 0;
            margin: 0
        }

        #bdRewardBtn span {
            display: inline-block;
            width: 50px;
            height: 50px;
            border-radius: 100%;
            line-height: 58px;
            color: #fff;
            font: 400 25px/50px 'microsoft yahei';
            background: #FEC22C
        }

        #bdRewardBtn:hover {
            cursor: pointer
        }

        .bd-dialog {
            z-index: 9999;
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            border: 1px solid #d9d9d9
        }

        .bd-dialog .bd-close-dialog {
            position: absolute;
            top: 15px;
            right: 20px;
            font: 400 24px/24px Arial;
            width: 20px;
            height: 20px;
            text-align: center;
            padding: 0;
            cursor: pointer;
            background: transparent;
            border: 0;
            -webkit-appearance: none;
            font-weight: 700;
            line-height: 20px;
            opacity: .2;
            filter: alpha(opacity=20)
        }

        .bd-dialog .bd-close-dialog:hover {
            color: #000;
            text-decoration: none;
            cursor: pointer;
            opacity: .4;
            filter: alpha(opacity=40)
        }

        .bd-dialog-bg {
            position: absolute;
            opacity: .3;
            filter: alpha(opacity=30);
            background: #000;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%
        }

        .bd-dialog-content {
            font-family: 'microsoft yahei';
            font-size: 14px;
            background-color: #FFF;
            position: fixed;
            padding: 0 20px;
            z-index: 10000;
            overflow: hidden;
            border-radius: 6px;
            -webkit-box-shadow: 0 3px 7px rgba(0, 0, 0, .3);
            -moz-box-shadow: 0 3px 7px rgba(0, 0, 0, .3);
            box-shadow: 0 3px 7px rgba(0, 0, 0, .3);
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box
        }

        .bd-dialog-pc {
            width: 390px;
            height: 380px;
            top: 50%;
            left: 50%;
            margin: -190px 0 0 -195px
        }

        .bd-dialog-wx {
            width: 90%;
            height: 280px;
            top: 50%;
            margin-top: -140px;
            margin-left: 5%
        }

        .bd-dialog-content h5 {
            text-align: left;
            font-size: 15px;
            font-weight: 700;
            margin: 25px 0;
            color: #555
        }

        .bd-payment-way {
            text-align: left
        }

        .bd-payment-way label {
            cursor: pointer;
            font-weight: 400;
            display: inline-block;
            font-size: 14px;
            margin: 0 30px 0 0;
            padding: 0
        }

        .bd-payment-way input[type=radio] {
            vertical-align: middle;
            margin: -2px 5px 0 0
        }

        .bd-payment-img {
            margin: 15px 0;
            text-align: center
        }

        p.bd-pay-info {
            font-size: 15px;
            margin: 0 0 10px
        }

        .bd-pay-money {
            font-size: 14px;
            margin-top: 10px
        }

        .bd-pay-money p {
            margin: 0
        }

        .bd-pay-money .bd-pay-money-sum {
            margin-bottom: 4px
        }

        .bd-payment-img img {
            margin: 0 auto
        }

        .bd-payment-img #qrCode_1 {
            display: none
        }

        .bd-payment-img .qrcode-border {
            margin: 0 auto
        }

        .bd-payment-img .qrcode-tip {
            position: relative;
            margin: 0 auto;
            font-size: 12px;
            font-weight: 700;
            background: #fff;
            height: 15px;
            line-height: 15px;
            margin-top: -12px
        }

        #qrCode_0 .qrcode-tip {
            color: #e10602
        }

        .bd-payment-img #qrCode_2 {
            display: none
        }

        #qrCode_2 .qrcode-tip {
            color: #3caf36
        }

        .wx_qrcode_container {
            text-align: center
        }

        .wx_qrcode_container h2 {
            font-size: 17px
        }

        .wx_qrcode_container p {
            font-size: 14px
        }
    </style>
@endsection

@section('header-text')
    <div class="text-inner">
        <div class="row">
            <div class="col-md-12 article-info">
                <h3 class="to-animate fadeInUp animated">
                    {{ $article->title }}
                </h3>

                <p class="to-animate fadeInUp animated" style="margin-top:10px;">
                    {{ $article->desc }}
                </p>

                <p class="to-animate fadeInUp animated">
                    <i class="glyphicon glyphicon-calendar"></i>{{ $article->created_at }}
                    &nbsp;
                    <i class="glyphicon glyphicon-user"></i>{{ $user->name }}
                </p>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="markdown-body editormd-html-preview" style="padding:0;">
        {!! $article->html_content !!}
    </div>

    <div class="bd-reward-stl"><p class="bd-pay-info">您的支持是对我最大的鼓励！</p>
        <button id="bdRewardBtn"><span>赏</span></button>
    </div>

    <div class="panel panel-default" style="margin-top:10px;">
        <div>
            <div id="share" class="social-share"></div>
        </div>
        <div class="panel-body">
            @if($category)
                <p>分类:
                    <i class="glyphicon glyphicon-th-list"></i>

                    <a href="{{ route('category', ['id' => $category->id]) }}" target="_blank">
                        {{ $category->name }}
                    </a>

                </p>
            @endif
            @if ($tags)
                <p>标签:
                    <i class="glyphicon glyphicon-tags"></i>&nbsp;
                    @foreach ($tags as $tag)
                        <a href="{{ route('tag', ['id' => $tag->id]) }}" target="_blank">
                            {{ $tag->tag_name }} &nbsp;
                        </a>
                    @endforeach
                </p>
            @endif
        </div>
    </div>

    <div class="bd-dialog" style="display: none">
        <div class="bd-dialog-bg"></div>
        <div class="bd-dialog-content bd-dialog-pc "><i class="bd-close-dialog">×</i><h5>打赏支付方式：</h5>
            <div class="bd-payment-way">
                <label index="2" for="alipay"><input type="radio" id="alipay" class="reward-radio" value="1" checked="checked" name="reward-way">支付宝</label>
                <label index="3" for="wechat"><input type="radio" id="wechat" class="reward-radio" value="2" name="reward-way">微信支付</label>
            </div>
            <div class="bd-payment-img">
                <div class="qrcode-img" id="qrCode_0">
                    <div class="qrcode-border box-size" style="border-radius: 26.56px; width: 210px; height: 210px; padding: 16px; margin-top: 24.33px; border: 8px solid rgb(225, 6, 2);">
                        <div id="indexss" style="direction:ltr;border: 0; width:164px; border-collapse: collapse;background-color:#fff;margin:0 auto;" align="center">
                            <img id="index2" src="{{ asset('zfb.png') }}" width="100%">
                            <img id="index3" src="{{ asset('wx.png') }}" style="display: none" width="100%">
                        </div>
                    </div>
                    <p class="qrcode-tip" style="width: 42.67px;">打赏</p>
                </div>
            </div>
        </div>
    </div>
    <!-- 评论插件 -->
    @include('default.comment.index', [
        'commentId' => $article->id,
        'commentTitle' => $article->title,
        'commentUrl' => Request::getUri()
    ])
@endsection

@section('script')
    <script src="{{ asset('share.js/js/jquery.share.min.js') }}"></script>
    <script>
        $('#bdRewardBtn').click(function () {
            $('.bd-dialog').show();
        });

        $('.bd-close-dialog').click(function () {
            $('.bd-dialog').hide();
        });
        $('.bd-payment-way label').click(function () {
            var index = $(this).attr('index');
            $('#indexss img').hide();
            $('#index'+index).show();
        });
    </script>
    <script>
        $(function(){
            $('#share').share({sites: ['qzone', 'qq', 'weibo','wechat']});
        });
    </script>

@endsection
