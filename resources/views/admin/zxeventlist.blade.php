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
</head>

<body>
<div class="x-nav">
            <span class="layui-breadcrumb">
                <a href="">首页</a>
                <a href="">演示</a>
                <a>
                    <cite>导航元素</cite></a>
            </span>
    <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="location.reload()" title="刷新">
        <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i>
    </a>
</div>
<div class="layui-fluid">
    <div class="layui-row layui-col-space15">
        <div class="layui-col-md12">
            <div class="layui-card">
                <div class="layui-card-body ">
                    <form class="layui-form layui-col-space5">
                        <div class="layui-input-inline layui-show-xs-block">
                            <input class="layui-input" placeholder="开始日" name="start" id="start"></div>
                        <div class="layui-input-inline layui-show-xs-block">
                            <input class="layui-input" placeholder="截止日" name="end" id="end"></div>

                        <div class="layui-input-inline layui-show-xs-block">
                            <input type="text" name="username" placeholder="请输入事件" autocomplete="off" class="layui-input"></div>
                        <div class="layui-input-inline layui-show-xs-block">
                            <button class="layui-btn" lay-submit="" lay-filter="sreach">
                                <i class="layui-icon">&#xe615;</i></button>
                        </div>
                    </form>
                </div>

                <div class="layui-card-body ">
                    <table class="layui-table layui-form">
                        <thead>
                        <tr>
                            <th>
                                <input type="checkbox" name="" lay-skin="primary">
                            </th>
                            <th>事件编号</th>
                            <th>事件名称</th>
                            <th>地址</th>
                            <th>简介</th>
                            <th>状态</th>
                            <th>上报时间</th>
                            <th>操作</th></tr>
                        </thead>
                        <tbody>
                        @foreach($data as $val)
                            <tr>
                                <td>
                                    <input type="checkbox" name="" lay-skin="primary"></td>
                                <td>{{$val->id}}</td>
                                <td>{{$val->eventname}}</td>
                                <td>{{$val->address}}</td>
                                <td>{{$val->eventjs}}</td>
                                <td>@if($val->eststus==0) 未处理@elseif($val->eststus==1)处理中 @else 已完成@endif</td>
                                <td>{{$val->created_at}}</td>
                                <td class="td-manage">&emsp;
                                    <a title="处理" onclick="xadmin.open('处理','{{url('/admin/zxactiveadd/'.$val->id)}}')" >
                                        <i class="layui-icon">&#xe63c;</i>
                                    </a>&emsp;&emsp;
                                    <a title="完成" onclick="xadmin.open('完成','{{url('/admin/zxeventfinish/'.$val->id)}}')" >
                                        <i class="layui-icon">&#xe6b2;</i>
                                    </a>
                                </td>

                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="layui-card-body ">
                    <div class="page">
                        {{$data->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>