{{--<!-- 多说评论框 start -->--}}
{{--<div class="ds-thread" data-thread-key="{{ $commentId }}"--}}
     {{--data-title="{{ $commentTitle }}"--}}
     {{--data-url="{{ $commentUrl }}"></div>--}}
{{--<!-- 多说评论框 end -->--}}
{{--<!-- 多说公共JS代码 start (一个网页只需插入一次) -->--}}
{{--<script type="text/javascript">--}}
    {{--var duoshuoQuery = {short_name: "gq1994"};--}}
    {{--(function () {--}}
        {{--var ds = document.createElement('script');--}}
        {{--ds.type = 'text/javascript';--}}
        {{--ds.async = true;--}}
        {{--ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';--}}
        {{--ds.charset = 'UTF-8';--}}
        {{--(document.getElementsByTagName('head')[0]--}}
        {{--|| document.getElementsByTagName('body')[0]).appendChild(ds);--}}
    {{--})();--}}
{{--</script>--}}
{{--<!-- 多说公共JS代码 end -->--}}
<!-- 代码1：放在页面需要展示的位置  -->
<!-- 如果您配置过sourceid，建议在div标签中配置sourceid、cid(分类id)，没有请忽略  -->
<div id="cyEmoji" role="cylabs" data-use="emoji"></div>
<!-- 代码2：用来读取评论框配置，此代码需放置在代码1之后。 -->
<!-- 如果当前页面有评论框，代码2请勿放置在评论框代码之前。 -->
<!-- 如果页面同时使用多个实验室项目，以下代码只需要引入一次，只配置上面的div标签即可 -->
<script type="text/javascript" charset="utf-8" src="https://changyan.itc.cn/js/lib/jquery.js"></script>
<script type="text/javascript" charset="utf-8" src="https://changyan.sohu.com/js/changyan.labs.https.js?appid=cyt5M1oVX"></script>

<!--PC和WAP自适应版-->
<!--PC版-->
<div id="SOHUCS" sid="{{ $commentId }}"></div>
<script charset="utf-8" type="text/javascript" src="https://changyan.sohu.com/upload/changyan.js" ></script>
<script type="text/javascript">
    window.changyan.api.config({
        appid: 'cyt5M1oVX',
        conf: 'prod_28e6992693dfc4463be006a7de8e6b82'
    });
</script>