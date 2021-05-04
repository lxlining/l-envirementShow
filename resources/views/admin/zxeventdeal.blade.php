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
                    <form class="layui-form layui-col-space5" action="{{url('/admin/eventdeal')}}" method="post">
                    @csrf
                        <input type="hidden" name="e_id" value="{{$id}}">
                        <div class="layui-input-inline layui-show-xs-block">
                            <select name="zxname">
                                <option value="">可派人员</option>
                               @foreach($data as $val)
                                    <option value="{{$val->truename}}">{{$val->truename}}</option>
                               @endforeach
                            </select>
                        </div>
                        <div class="layui-form-item">
                            <label for="L_repass" class="layui-form-label"></label>
                            <button type="submit" class="layui-btn" lay-filter="add" lay-submit="">确定</button></div>
        </form>
    </div>
</div>
<script>
    layui.use(['laydate', 'form'],
        function() {
            var laydate = layui.laydate;

            //执行一个laydate实例
            laydate.render({
                elem: '#start' //指定元素
            });

            //执行一个laydate实例
            laydate.render({
                elem: '#end' //指定元素
            });
        });
</script>
</body>
</html>