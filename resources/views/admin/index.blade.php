<!doctype html>
<html class="x-admin-sm">
<head>
    <meta charset="UTF-8">
    <title>后台登录</title>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="{{url('/css/font.css')}}">
    <link rel="stylesheet" href="{{url('/css/xadmin.css')}}">
    <script type="text/javascript" src="{{url('/lib/layui/layui.js')}}" charset="utf-8"></script>
    <script type="text/javascript" src="{{url('/js/xadmin.js')}}"></script>
    <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>

</head>
<body class="index">
<!-- 顶部开始 -->
<div class="container">
    <div class="logo">
        <a href="/index.html">后台管理</a></div>
    <div class="left_open">
        <a><i title="展开左侧栏" class="iconfont">&#xe699;</i></a>
    </div>

    <ul class="layui-nav right" lay-filter="">
        <li class="layui-nav-item">
            <a href="javascript:;">{{session()->get('uid')}}</a>
            <dl class="layui-nav-child">
                <!-- 二级菜单 -->

                <dd>
                    <a href="{{url('admin/loginout')}}">切换帐号</a></dd>
                </dl>
        </li>
        <li class="layui-nav-item to-index">
            <a href="{{url('/')}}">前台首页</a></li>
    </ul>
</div>
<!-- 顶部结束 -->
<!-- 中部开始 -->
<!-- 左侧菜单开始 -->
<div class="left-nav">
    <div id="side-nav">
        <ul id="nav">
            <li>
                <a href="javascript:;">
                    <i class="iconfont left-nav-li" lay-tips="会员管理">&#xe6b8;</i>
                    <cite>人员管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i></a>
                <ul class="sub-menu">
                    <li id="list2" onclick="chk();">
                        <a onclick="xadmin.add_tab('人员列表(静态表格)','{{url('admin/userlist')}}')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>人员列表</cite></a>
                    </li>
                </ul>
                <ul class="sub-menu">
                    <li id="list2" onclick="chk();">
                        <a onclick="xadmin.add_tab('用户列表(静态表格)','{{url('admin/userlists')}}')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>用户列表</cite></a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="iconfont left-nav-li" lay-tips="订单管理">&#xe723;</i>
                    <cite>事件管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i></a>
                <ul class="sub-menu">
                    <li>
                        <a onclick="xadmin.add_tab('未完成列表','{{url('admin/eventlist')}}')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>事件列表</cite></a>
                    </li>
                    <li>
                        <a onclick="xadmin.add_tab('完成列表1','{{url('admin/finisheventlist')}}')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>完成列表</cite></a>
                    </li>
                    <li>
                        <a onclick="xadmin.add_tab('事件统计','{{url('admin/showevents')}}')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>事件统计</cite></a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="iconfont left-nav-li" lay-tips="订单管理">&#xe723;</i>
                    <cite>活动管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i></a>
                <ul class="sub-menu">
                    <li>
                        <a onclick="xadmin.add_tab('活动列表','{{url('admin/activelist')}}')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>活动列表</cite></a>
                    </li>
                    <li>
                        <a onclick="xadmin.add_tab('完成列表1','{{url('admin/finishactive')}}')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>完成列表</cite></a>
                    </li>
                    <li>
                        <a onclick="xadmin.add_tab('订单列表1','')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>活动统计</cite></a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="iconfont left-nav-li" lay-tips="分类管理">&#xe723;</i>
                    <cite>分类管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i></a>
                <ul class="sub-menu">
                    <li>
                        <a onclick="xadmin.add_tab('事件分类','{{url('admin/eventsort')}}')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>事件分类</cite></a>
                    </li>
                    <li>
                        <a onclick="xadmin.add_tab('活动分类','{{url('admin/activesort')}}')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>活动分类</cite></a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="javascript:;">
                    <i class="iconfont left-nav-li" lay-tips="订单管理">&#xe723;</i>
                    <cite>公告管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i></a>
                <ul class="sub-menu">
                    <li>
                        <a onclick="xadmin.add_tab('未完成列表','{{url('admin/notice')}}')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>公告列表</cite></a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- <div class="x-slide_left"></div> -->
<!-- 左侧菜单结束 -->
<!-- 右侧主体开始 -->
<div class="page-content">
    <div class="layui-tab tab" lay-filter="xbs_tab" lay-allowclose="false">
        <ul class="layui-tab-title">
            <li class="home">
                <i class="layui-icon">&#xe68e;</i>我的桌面
            </li>
        </ul>
        <div class="layui-unselect layui-form-select layui-form-selected" id="tab_right">
            <dl>
                <dd data-type="this">关闭当前</dd>
                <dd data-type="other">关闭其它</dd>
                <dd data-type="all">关闭全部</dd></dl>
        </div>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <iframe src='{{url('admin/welcome')}}' frameborder="0" scrolling="yes" class="x-iframe"></iframe>
            </div>
        </div>
        <div id="tab_show"></div>
    </div>
</div>
<div class="page-content-bg"></div>
<style id="theme_style"></style>
<!-- 右侧主体结束 -->
<!-- 中部结束 -->
<script>

</script>
</body>

</html>