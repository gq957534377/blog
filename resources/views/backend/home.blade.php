@extends('layouts.backend')

@section('title', 'gq1994 Blog')

@section('header')
    <h1>
        Home
        <small>gq1994 Blog</small>
    </h1>
@endsection

@section('content')
    <style>
        p {
            text-indent: 10px;
        }
    </style>
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-solid" style="padding: 10px;">
                <h3>欢迎使用gq1994 Blog!</h3>
                <strong>简介</strong>
                <p> gq1994 Blog 是一个基于Laravel开发，支持markdown语法的简易博客,致力于给博主更好的写作体验。</p>
                <strong>开发者信息</strong>
                <p>Name : 郭庆</p>
                <p>Email : 957534377@qq.com</p>
                <p>博客地址 : <a href="{{ url('/') }}" target="_blank">gq1994 Blog</a></p>

                <strong>依赖开源程序</strong>
                <ul>
                    <li>LNMP</li>
                    <li>
                        <a href="https://laravel.com/" target="_blank">Laravel</a>
                    </li>
                    <li>
                        <a href="https://www.almsaeedstudio.com" target="_blank">
                            AdminLTE
                        </a>
                    </li>
                    <li>
                        <a href="http://getbootstrap.com/" target="_blank">
                            Bootstrap
                        </a>
                    </li>
                    <li>
                        <a href="https://pandao.github.io/editor.md/examples/index.html" target="_blank">
                            Editor.md
                        </a>
                    </li>
                    <li>
                        <a href="https://github.com/andersao/l5-repository" target="_blank">
                            andersao/l5-repository
                        </a>
                    </li>
                    <li>
                        <a href="https://github.com/etrepat/baum" target="_blank">
                            etrepat/baum
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
