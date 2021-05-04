
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


    <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>

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
                                <th>事件分类ID</th>
                                <th>事件分类名</th>
                                <th>操作</th>
                            </thead>
                            <tbody class="x-cate">
                            @foreach($data as $val)
                                <tr>
                                    <td>{{$val->id}}</td>
                                    <td>{{$val->eventclass}}</td>
                                    <td>
                                        <a class="layui-btn-danger layui-btn layui-btn-xs"  href="{{url('admin/eventclassdel/'.$val->id)}}" ><i class="layui-icon">&#xe640;</i>删除</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <form class="layui-form layui-col-space5" method="post" action="eventsortadd">
                        @csrf
                        &emsp;&emsp;&emsp;
                        <div class="layui-input-inline layui-show-xs-block">
                            <input class="layui-input" placeholder="分类名" name="eventclass">
                        </div>&emsp;&emsp;
                        <div class="layui-input-inline layui-show-xs-block">
                            <button class="layui-btn" onclick="xadmin.open('添加','{{url('admin/eventsortadd')}}',600,400)" type="submit"><i class="layui-icon"></i>增加</button>
                        </div>
                    </form>

                    <hr>
                    <blockquote class="layui-elem-quote"><i class="layui-icon x-show" status='true'>&#xe623;</i></blockquote>
                </div>
                <div class="layui-card-header">
                    <button class="layui-btn layui-btn-danger" onclick="delAll()">
                        <i class="layui-icon"></i>批量删除</button>
                </div>
                <div class="layui-card-body ">
                    <table class="layui-table layui-form">
                        <thead>
                        <tr>
                            <th width="70">ID</th>
                            <th width="200">事件名</th>
                            <th width="50">地址</th>
                            <th width="80">状态</th>

                        </thead>
                        <tbody class="x-cate">
                        @foreach($da as $val)
                            <tr cate-id='1' fid='0' >
                                <td>{{$val->id}}</td>
                                <td>
                                    {{$val->eventname}}
                                </td>
                                <td>{{$val->address}}</td>
                                <td>
                                   @if($val->eststus==0) 未启动@else 其他@endif
                                </td>
                               {{-- <td class="td-manage">
                                    <button class="layui-btn layui-btn layui-btn-xs"  onclick="xadmin.open('编辑','admin-edit.html')" ><i class="layui-icon">&#xe642;</i>编辑</button>

                                    <button class="layui-btn-danger layui-btn layui-btn-xs"  onclick="member_del(this,'要删除的id')" href="javascript:;" ><i class="layui-icon">&#xe640;</i>删除</button>
                                </td>--}}
                            </tr>


                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="layui-card-body ">
                    <div class="page">
                        {{$da->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    /*layui.use(['form'], function(){
        form = layui.form;

    });*/

    /*用户-删除*/
    function member_del(obj,id){
        layer.confirm('确认要删除吗？',function(index){
            //发异步删除数据
            $(obj).parents("tr").remove();
            layer.msg('已删除!',{icon:1,time:1000});
        });
    }



   /* var cateIds = [];
    function getCateId(cateId) {
        $("tbody tr[fid="+cateId+"]").each(function(index, el) {
            id = $(el).attr('cate-id');
            cateIds.push(id);
            getCateId(id);
        });
    }
*/
</script>
</body>
</html>
