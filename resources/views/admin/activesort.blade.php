
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
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
    <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
                    <div class="layui-card-body ">
                        <table class="layui-table layui-form">
                            <thead>
                            <tr>
                                <th>活动分类ID</th>
                                <th>活动分类</th>
                                <th>操作</th>
                            </thead>
                            <tbody class="x-cate">
                            @foreach($data as $val)
                                <tr>
                                    <td>{{$val->id}}</td>
                                    <td>{{$val->aclass}}</td>
                                    <td>
                                        <a class="layui-btn-danger layui-btn layui-btn-xs"  href="{{url('admin/activeclassdel/'.$val->id)}}" ><i class="layui-icon">&#xe640;</i>删除</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <form class="layui-form layui-col-space5" method="post" action="activesortadd">
                        @csrf
                        &emsp;&emsp;&emsp;
                        <div class="layui-input-inline layui-show-xs-block">
                            <input class="layui-input" placeholder="分类名" name="aclass">
                        </div>&emsp;&emsp;
                        <div class="layui-input-inline layui-show-xs-block">
                            <button class="layui-btn" onclick="xadmin.open('添加','{{url('admin/activesortadd')}}',600,400)" type="submit"><i class="layui-icon"></i>增加</button>
                        </div>
                    </form>

                    <hr>
                    <blockquote class="layui-elem-quote"><i class="layui-icon x-show" status='true'>&#xe623;</i></blockquote>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
