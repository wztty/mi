@extends('home.public.index')
@section('myCss')
<link rel="stylesheet" href="/static/homes/common/css/index.min.css" />
@show
@section('content')
       <!--  轮播图 -->
    <div class="home-hero-container container">
        <div class="home-hero">
            <div class="home-hero-slider">
                <div class="ui-wrapper" style="max-width: 100%;">
                    <div class="ui-viewport" style="width: 100%; overflow: hidden; position: relative; height: 460px;">
                        <div id="J_homeSlider" class="xm-slider" data-stat-title="焦点图轮播" style="width: auto; position: relative;">
                            <div class="slide loaded">
                                <a href="/" >
                                   <img src="/static/homes/common/image/1.jpg" srcset="http://i3.mifile.cn/a4/20c8359e-6e5e-46e1-a017-b2308d9fbbae 2x"></a>
                            </div>

                            <div class="slide loaded">
                                <a href="/" >
                                    <img src="/static/homes/common/image/2.jpg" srcset="http://i3.mifile.cn/a4/5de4e2bb-54fe-45b1-a399-d5b26f106f82 2x"></a>
                            </div>

                            <div class="slide loaded">
                                <a href="/" >
                                    <img src="/static/homes/common/image/3.jpg" srcset="http://i3.mifile.cn/a4/b3642c09-0d31-49e0-a011-7934fa395697 2x"></a>
                            </div>

                            <div class="slide loaded">
                                <a href="/" >
                                    <img src="/static/homes/common/image/4.jpg" srcset="http://i3.mifile.cn/a4/f779d9d8-caac-4f12-8b9c-3032f3daf8e1 2x"></a>
                            </div>

                            <div class="slide loaded">
                                <a href="/" >
                                    <img src="/static/homes/common/image/5.jpg" srcset="http://i3.mifile.cn/a4/efaf715f-a1cc-4942-a24d-41f7d73e7ff5 2x"></a>
                            </div>

                        </div>
                    </div>
                    <div class="ui-controls-direction">
                        <a class="ui-prev" href="javascript:void(0);">上一张</a>
                        <a class="ui-next" href="javascript:void(0);">下一张</a>
                    </div>
                    <div class="ui-controls ui-has-pager ui-has-controls-direction">
                        <div class="ui-pager ui-default-pager">
                            <div class="ui-pager-item">
                                <a href="javascript:void(0);" class="ui-pager-link">1</a>
                            </div>
                            <div class="ui-pager-item">
                                <a href="javascript:void(0);" class="ui-pager-link">2</a>
                            </div>
                            <div class="ui-pager-item">
                                <a href="javascript:void(0);" class="ui-pager-link">3</a>
                            </div>
                            <div class="ui-pager-item">
                                <a href="javascript:void(0);" class="ui-pager-link active">4</a>
                            </div>
                            <div class="ui-pager-item">
                                <a href="javascript:void(0);" class="ui-pager-link">5</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 轮播图结束 -->


            <div class="home-hero-sub row">
                <div class="span4">
                    <ul class="home-channel-list clearfix">
                        <li class="top left">
                            <a href="/" data-stat-aid="AA11221" data-stat-pid="2_44_1_250" target="_blank"> <i class="iconfont">&#xe640;</i>
                                电信专场
                            </a>
                        </li>
                        <li class="top">
                            <a href="/" data-stat-aid="AA10868" data-stat-pid="2_44_2_251" target="_blank">
                                <i class="iconfont">&#xe63e;</i>
                                企业团购
                            </a>
                        </li>
                        <li class="top">
                            <a href="/" data-stat-aid="AA10869" data-stat-pid="2_44_3_252" target="_blank">
                                <i class="iconfont">&#xe63b;</i>
                                官翻产品
                            </a>
                        </li>
                        <li class="left">
                            <a href="/" data-stat-aid="AA11244" data-stat-pid="2_44_4_253" target="_blank">
                                <i class="iconfont"></i>
                                小米移动
                            </a>
                        </li>
                        <li class="">
                            <a href="/" data-stat-aid="AA12084" data-stat-pid="2_44_5_254" target="_blank">
                                <i class="iconfont"></i>
                                以旧换新
                            </a>
                        </li>
                        <li class="">
                            <a href="/" data-stat-aid="AA10871" data-stat-pid="2_44_6_255" target="_blank">
                                <i class="iconfont"></i>
                                话费充值
                            </a>
                        </li>

                    </ul>
                </div>
                <div class="span16" id="J_homePromo" data-stat-title="焦点图下方小图">
                    <ul class="home-promo-list clearfix">
                        <li class="first">
                            <a class="item" href="/" data-stat-aid="AA13327" data-stat-pid="2_16_1_77" target="_blank">
                                <img alt="米兔儿童手表-0720" src="/static/homes/common/image/6.jpg" srcset="http://i3.mifile.cn/a4/fbde1968-89d6-402b-bcee-7451c7b327e3 2x" />
                            </a>
                        </li>
                        <li>
                            <a class="item" href="/" data-stat-aid="AA13313" data-stat-pid="2_16_2_78" target="_blank">
                                <img alt="小米手机5-0720" src="/static/homes/common/image/7.jpg" srcset="http://i3.mifile.cn/a4/cfd68741-d5d4-43aa-9ca9-f71b85483976 2x" />
                            </a>
                        </li>
                        <li>
                            <a class="item" href="/" data-stat-aid="AA13314" data-stat-pid="2_16_3_79" target="_blank">
                                <img alt="/static/homes/common/image/8.jpg" srcset="http://i3.mifile.cn/a4/11f55f19-4011-4e67-be32-d245745c57ea 2x" />
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

       <!--  小米明星产品 -->

        <div class="home-star-goods" id="J_homeStar">
            <div class="xm-plain-box">
                <div class="box-hd">
                    <h2 class="title">小米明星单品</h2>
                    <div class="more">
                        <div class="xm-controls xm-controls-line-small xm-carousel-controls">
                            <a class="control control-prev iconfont" href="javascript: void(0);"></a>
                            <a class="control control-next iconfont" href="javascript: void(0);"></a>
                        </div>
                    </div>
                </div>
                <div class="box-bd">
                    <ul class="xm-carousel-list xm-carousel-col-5-list goods-list rainbow-list clearfix J_carouselList">
                    @if(!empty($star))
                        @foreach($star as $key=>$val)
                            @if($key<=20)
                        <li class="rainbow-item-{{$key}}">
                            <a class="thumb" href="/datail?id={{$val->id}}"  target="_blank">
                                
                                <img src="{{$val->showImg}}" srcset="{{$val->showImg}}" alt="{{$val->title}}" />
                            </a>
                            <h3 class="title">
                                <a href="/datail?id={{$val->id}}" target="_blank">{{$val->title}}</a>
                            </h3>
                            <p class="desc">{{$val->sub_title}}</p>
                            <p class="price">{{$val->price}}</p>
                        </li>
                            @endif
                        @endforeach
                    @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>



<!-- 智能硬件 -->
 <div class="page-main home-main">
        <div class="container">
            <div id="smart" class="home-brick-box home-brick-row-2-box xm-plain-box J_itemBox J_brickBox" data-from-stat="false">
                <div class="box-hd">
                    <h2 class="title">手机</h2>
                    <div class="more J_brickNav"></div>
                </div>
                <div class="box-bd J_brickBd">
                <!-- 智能硬件 start-->
                    <div class="row">
                        <div class="span4 span-first">
                            <ul class="brick-promo-list clearfix">
                                <li class="brick-item brick-item-l brick-item-active">
                                    <a href="/" data-stat-aid="AA13253" data-stat-pid="2_18_1_90" target="_blank" data-stat-id="AA13253+2_18_1_90" onclick="_msq.push(['trackEvent', '79fe2eae924d2a2e-AA13253+2_18_1_90', '//www.mi.com/scooter/', 'pcpid']);">
                                        <img src="/static/homes/common/image/9.jpg" width="160" height="160" alt=""></a>
                                </li>
                            </ul>
                        </div>
                        <div class="span16">
                            <ul class="brick-list clearfix">
                               @foreach($smarty as $key=>$v)
                                <li class="brick-item brick-item-m brick-item-m-2" data-gid="1161200059">
                                    <div class="figure figure-img">
                                        <a href="/detail?id={{$v->good->id}}">
                                            <img src="{{$v->img}}" width="160" height="160" alt="{{$v->title}}"></a>
                                    </div>
                                    <h3 class="title">
                                        <a href="/detail?id={{$v->good->id}}">{{$v->title}}</a>
                                    </h3>
                                    <p class="desc">{{$v->good->sub_title}}</p>
                                    <p class="price">
                                        <span class="num">{{$v->price}}</span>
                                        元
                                    </p>
                                    <!-- <div class="flag flag-postfree">免邮费</div> -->
                                </li>
                                @endforeach
                              
                            </ul>
                        </div>
                    </div>
                <!-- 智能硬件 end-->
                </div>
            </div>

           <!--  广告模块 -->

<div class="J_itemBox J_homeBanner home-banner-box home-banner-box-brick is-visible" data-index="2">
   <a href="http://www.mi.com/a/h/7546.html" target="_blank" data-log_code="31pchomebanner_2001012#t=normal&amp;act=other&amp;page=home&amp;bid=3186791.1&amp;adm=5668" data-stat-id="bdcee1aea8520b99" onclick="_msq.push(['trackEvent', '81190ccc4d52f577-bdcee1aea8520b99', 'http://www.mi.com/a/h/7546.html', 'pcpid', '31pchomebanner_2001012#t=normal&amp;act=other&amp;page=home&amp;bid=3186791.1&amp;adm=5668']);"> 
   <img class="" alt="11.11电视分会场" width="1226" src="//i1.mifile.cn/a4/xmad_15409837644072_fKVUE.jpg" /></a>
</div>



            <div id="video" class="home-video-box xm-plain-box J_itemBox J_videoBox is-visible">
                <div class="box-hd">
                    <h2 class="title">视频</h2>
                    <div class="more J_brickNav">

                    </div>
                </div>
                <div class="box-bd J_brickBd">
                    <!-- 视频 start -->
                    <ul class="video-list clearfix">
                        <li class="video-item video-item-first">
                            <div class="figure figure-img">
                                <a class="J_videoTrigger" href="javascript: void(0);" data-stat-aid="AA12841" data-stat-pid="2_43_1_245" data-video="http://player.youku.com/embed/XMTU2NDM3NjEzMg==" data-video-title="小米Max 绝美外观视频" >
                                    <img src="//i3.mifile.cn/a4/T1v3LgBTxv1RXrhCrK.jpg" width="296" height="180" alt="小米Max 绝美外观视频">
                                    <span class="play"> <i class="iconfont"></i>
                                    </span>
                                </a>
                            </div>
                            <h3 class="title">
                                <a class="J_videoTrigger" href="javascript: void(0);" data-stat-aid="AA12841" data-stat-pid="2_43_1_245" data-video="http://player.youku.com/embed/XMTU2NDM3NjEzMg==" data-video-title="小米Max 绝美外观视频" >小米Max 绝美外观视频</a>
                            </h3>
                            <p class="desc">6.44" 大屏黄金尺寸，看什么都震撼</p>
                        </li>

                        <li class="video-item video-item-first">
                        <div class="figure figure-img"> <a class="J_videoTrigger exposure" href="javascript: void(0);" data-stat-aid="AA20704" data-stat-pid="2_43_1_245" data-log_code="31pchomevideo001010#t=normal&amp;act=other&amp;page=home&amp;bid=3030362.1&amp;adm=5419" data-video="https://v.mifile.cn/b2c-mimall-media/c2cb94c9485243e1767d43268fb90820.mp4" data-video-poster="https://i8.mifile.cn/b2c-mimall-media/e0a27677f28572b6fa8dfcf5677d6499.jpeg" data-video-title="一团火" title="点击播放视频" data-stat-id="AA20704+2_43_1_245" onclick="_msq.push(['trackEvent', '81190ccc4d52f577-AA20704+2_43_1_245', 'javascript:void0', 'pcpid', '31pchomevideo001010#t=normal&amp;act=other&amp;page=home&amp;bid=3030362.1&amp;adm=5419']);"> 
                        <img src="//i1.mifile.cn/a4/xmad_15318974928021_cthgC.jpg" width="296" height="180" alt="一团火"> 
                        <span class="play"><i class="iconfont"></i></span> </a> </div> 
                        <h3 class="title"> <a class="J_videoTrigger" href="javascript: void(0);" data-stat-aid="AA20704" data-stat-pid="2_43_1_245" data-log_code="31pchomevideo001010#t=normal&amp;act=other&amp;page=home&amp;bid=3030362.1&amp;adm=5419" data-video="https://v.mifile.cn/b2c-mimall-media/c2cb94c9485243e1767d43268fb90820.mp4" data-video-poster="https://i8.mifile.cn/b2c-mimall-media/e0a27677f28572b6fa8dfcf5677d6499.jpeg" data-video-title="一团火" title="点击播放视频" data-stat-id="AA20704+2_43_1_245" onclick="_msq.push(['trackEvent', '81190ccc4d52f577-AA20704+2_43_1_245', 'javascript:void0', 'pcpid', '31pchomevideo001010#t=normal&amp;act=other&amp;page=home&amp;bid=3030362.1&amp;adm=5419']);">一团火</a> </h3> 
                        <p class="desc">小米创业8年内部纪录片（手机篇）</p></li>

                       <li class="video-item">
                        <div class="figure figure-img"> 
                        <a class="J_videoTrigger exposure" href="javascript: void(0);" data-stat-aid="AA20705" data-stat-pid="2_43_2_246" data-log_code="31pchomevideo002010#t=normal&amp;act=other&amp;page=home&amp;bid=3030362.2&amp;adm=5297" data-video="https://v.mifile.cn/b2c-mimall-media/ed921294fb62caf889d40502f5b38147.mp4" data-video-poster="https://i8.mifile.cn/b2c-mimall-media/6589da5fea27b58e5b061c1fb70bdfce.jpg" data-video-title="小米8，一部与众不同的手机" title="点击播放视频" data-stat-id="AA20705+2_43_2_246" onclick="_msq.push(['trackEvent', '81190ccc4d52f577-AA20705+2_43_2_246', 'javascript:void0', 'pcpid', '31pchomevideo002010#t=normal&amp;act=other&amp;page=home&amp;bid=3030362.2&amp;adm=5297']);">
                         <img src="//i1.mifile.cn/a4/xmad_15278351912522_frJQc.jpg" width="296" height="180" alt="小米8，一部与众不同的手机"> <span class="play"><i class="iconfont"></i></span> </a> </div>
                         <h3 class="title"> <a class="J_videoTrigger" href="javascript: void(0);" data-stat-aid="AA20705" data-stat-pid="2_43_2_246" data-log_code="31pchomevideo002010#t=normal&amp;act=other&amp;page=home&amp;bid=3030362.2&amp;adm=5297" data-video="https://v.mifile.cn/b2c-mimall-media/ed921294fb62caf889d40502f5b38147.mp4" data-video-poster="https://i8.mifile.cn/b2c-mimall-media/6589da5fea27b58e5b061c1fb70bdfce.jpg" data-video-title="小米8，一部与众不同的手机" title="点击播放视频" data-stat-id="AA20705+2_43_2_246" onclick="_msq.push(['trackEvent', '81190ccc4d52f577-AA20705+2_43_2_246', 'javascript:void0', 'pcpid', '31pchomevideo002010#t=normal&amp;act=other&amp;page=home&amp;bid=3030362.2&amp;adm=5297']);">小米8，一部与众不同的手机</a>
                         </h3> <p class="desc">透明探索版，将科技与美学完美结合</p></li>
                        
                        <li class="video-item"> 
                       <div class="figure figure-img"> 
                        <a class="J_videoTrigger exposure" href="javascript: void(0);" data-stat-aid="AA20706" data-stat-pid="2_43_3_247" data-log_code="31pchomevideo003010#t=normal&amp;act=other&amp;page=home&amp;bid=3030362.3&amp;adm=5244" data-video="https://v.mifile.cn/b2c-mimall-media/53fc775dd6b29ecd8df3e2ea35129766.mp4" data-video-poster="https://i8.mifile.cn/b2c-mimall-media/850c08e77da8d346b3a0145252d114bb.jpg" data-video-title="小米MIX 2S，一面科技 一面艺术" title="点击播放视频" data-stat-id="AA20706+2_43_3_247" onclick="_msq.push(['trackEvent', '81190ccc4d52f577-AA20706+2_43_3_247', 'javascript:void0', 'pcpid', '31pchomevideo003010#t=normal&amp;act=other&amp;page=home&amp;bid=3030362.3&amp;adm=5244']);"> <img src="//i1.mifile.cn/a4/xmad_15278359339164_dDTJC.jpg" width="296" height="180" alt="小米MIX 2S，一面科技 一面艺术" /> 
                        <span class="play"><i class="iconfont"></i></span> </a> 
                       </div> <h3 class="title"> <a class="J_videoTrigger" href="javascript: void(0);" data-stat-aid="AA20706" data-stat-pid="2_43_3_247" data-log_code="31pchomevideo003010#t=normal&amp;act=other&amp;page=home&amp;bid=3030362.3&amp;adm=5244" data-video="https://v.mifile.cn/b2c-mimall-media/53fc775dd6b29ecd8df3e2ea35129766.mp4" data-video-poster="https://i8.mifile.cn/b2c-mimall-media/850c08e77da8d346b3a0145252d114bb.jpg" data-video-title="小米MIX 2S，一面科技 一面艺术" title="点击播放视频" data-stat-id="AA20706+2_43_3_247" onclick="_msq.push(['trackEvent', '81190ccc4d52f577-AA20706+2_43_3_247', 'javascript:void0', 'pcpid', '31pchomevideo003010#t=normal&amp;act=other&amp;page=home&amp;bid=3030362.3&amp;adm=5244']);">小米MIX 2S，一面科技 一面艺术</a>
                        </h3>
                        <p class="desc">艺术品般陶瓷机身，惊艳、璀璨</p></li>
                            </ul>
                    <!-- 视频 end -->
                </div>
            </div>
        </div>
    </div>

    <div id="J_modalVideo" class="modal modal-video fade modal-hide">
        <div class="modal-hd">
            <h3 class="title">视频播放</h3>
            <a class="close" data-dismiss="modal" href="javascript: void(0);">
                <i class="iconfont">&#xe602;</i>
            </a>
        </div>
        <div class="modal-bd">
            <div class="loading">
                <div class="loader"></div>
            </div>
        </div>
    </div>


 </div>
<div> 
 @endsection