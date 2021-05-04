<!DOCTYPE html>
<html class="x-admin-sm">

<head>
    <meta charset="UTF-8">
    <title>欢迎页面</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <link rel="stylesheet" href="{{url('/css/font.css')}}">
    <link rel="stylesheet" href="{{url('/css/xadmin.css')}}">
    <script type="text/javascript" src="{{url('/lib/layui/layui.js')}}" charset="utf-8"></script>
    <script type="text/javascript" src="{{url('/js/xadmin.js')}}"></script>
    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
    <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="layui-fluid">
    <div class="layui-row">
        <form class="layui-form" method="post" action="{{url('/admin/activeadd')}}">
            @csrf
            <input type="hidden" name="e_id" value="{{$id}}">
            <div class="layui-form-item">
                <label for="L_username" class="layui-form-label">
                    <span class="x-red">*</span>活动名</label>
                <div class="layui-input-inline">
                    <input type="text" id="L_truename" name="activetitle" required="" lay-verify="truename" autocomplete="off" class="layui-input"></div>
            </div>
            <div class="layui-form-item">
                <label for="L_username" class="layui-form-label">
                    <span class="x-red">*</span>活动简述</label>
                <div class="layui-input-inline">
                    <input type="text" id="L_tel" name="actives" required="" lay-verify="tel" autocomplete="off" class="layui-input"></div>
            </div>
            <div class="layui-form-item">
                <label for="L_username" class="layui-form-label">
                    <span class="x-red">*</span>活动详情</label>
                <div class="layui-input-inline">
                    <input type="text" id="L_type" name="activeinfo" required="" lay-verify="type" autocomplete="off" class="layui-input"></div>
            </div>
            <div class="layui-form-item">
                <label for="L_username" class="layui-form-label">
                    <span class="x-red">*</span>地址</label>
                <div class="layui-input-inline">
                    <input type="text" id="L_tel" name="address" required="" lay-verify="tel" autocomplete="off" class="layui-input"></div>
            </div>
            <div class="layui-form-item">
                <label for="L_pass" class="layui-form-label">
                    <span class="x-red">*</span>人数</label>
                <div class="layui-input-inline">
                    <input type="number" id="L_pass" name="num" required="" lay-verify="pass" autocomplete="off" class="layui-input"></div>
                <div class="layui-form-mid layui-word-aux"></div></div>
            <div class="layui-form-item">
                <label for="L_repass" class="layui-form-label">
                    <span class="x-red">*</span>截止时间</label>
                <div class="layui-input-inline">
                    <input type="date" id="L_repass" name="ended_time" required="" lay-verify="repass" autocomplete="off" class="layui-input"></div>
            </div>
            <div class="layui-form-item">
                <label for="L_repass" class="layui-form-label"></label>
                <button type="submit" class="layui-btn" lay-filter="add" lay-submit="">增加</button></div>
        </form>
    </div>
</div>
</body>
</html>