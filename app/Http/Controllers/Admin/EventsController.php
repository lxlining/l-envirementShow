<?php

namespace App\Http\Controllers\Admin;

use App\Admin\active;
use App\admin\events;
use App\Admin\eventsorts;
use App\Admin\manger;
use App\Admin\zhixing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use function React\Promise\all;
use function Symfony\Component\String\b;
use think\response\Redirect;

class EventsController extends Controller
{
    //
    public function index()
    {
        $data = events::where('updated_at','=',null)->paginate(5);
        return view('admin.eventlist', compact('data'));
    }
    public function finishevent()
    {
        $data = events::where('updated_at','=',null)->where('eststus','=',2)->paginate(5);
        //dd($data);
        return view('admin.eventlist', compact('data'));
    }

    public function sortlist(){
        $da=DB::table('events')->where('eststus','=',0)->paginate(5);
        $data=eventsorts::get();
        return view('admin.eventsort',compact('data','da'));
    }
    public  function sortadd(Request $request){
        $data=$request->except(['_token']);

        $res=DB::table('eventclass')->insert($data);
        if($res){
            return redirect('admin/eventsort');
        }else{
            return back();
        }
    }
    public function sortdel($id){
        $res=DB::table('eventclass')->delete($id);
        if($res){
            return redirect('admin/eventsort');
        }else{
            return back();
        }
    }
    //事件统计展示
    public  function  showevent1(){
        return view('admin.eventechars1');
    }

    public function howevents1()
    {
        $sorts=Db::table('eventclass')->get('eventclass');
        $counts=Db::table('events')->get();
    }

    //事件处理
    public function dealshow($id)
    {
        $data=manger::where('type',0)->get('truename');
        return view('admin.eventdeal',compact('data','id'));
    }

    /**
     * Notes:派遣人员处理污染事件
     * User: lixl
     * Date: 2021/4/7
     * Time: 15:49
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\View\View|\think\response\View
     */
    public function deal(Request $request)
    {
        $data=$request->except('_token');
        $da=$request->get('e_id');
        $re=Db::table('events')->where('id','=',$da)->update(['eststus'=>1]);
            //events::where('id',$da)->update('eststus',1);
        $res=zhixing::insert($data);
        if($res&&$re){
            return view('admin.index');
        }else{
            return back();
        }
    }

    /**
     * Notes:本事件并非真实事件--删除
     * User: lixl
     * Date: 2021/4/7
     * Time: 15:50
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View|\think\response\View
     */
    public function del($id)
    {
        $data=Db::table('events')->where('id',$id)->update(['updated_at'=>date('Y-m-d H:i:s')]);
       if($data){
           return view('admin.index');
       }else
           return back();
    }

    /**
     * Notes:执行者事件显示
     * User: lixl
     * Date: 2021/4/10
     * Time: 15:56
     */
    public function zxeventshow($name){
       /* $da=[];
        $data=zhixing::where('zxname',$name)->get();
        for($i=0;$i<count($data->toarray());$i++)
        $da+=events::where('id',$data->toarray()[$i]['e_id'])->get();
        dd($da);*/
       $data=Db::table('zhixinginfos')->join('events','zhixinginfos.e_id','events.id')->where('zhixinginfos.zxname',$name)->where('events.eststus',1)->paginate(5);
       return view('admin.zxeventlist',compact('data'));
    }

    public function zxactiveadd($id)
    {
        return view('admin/zxactiveadd',compact('id'));
    }

    public function zxactiveadd_ok(Request $request)
    {
        $info=$request->except(['_token']);
        $info["u_id"]=session()->get('zxid');
        $info["created_time"]=date("Y-m-d H:i:s");
        $re=active::insert($info);
        if($re){
            return back();
        }else{
            echo "失败";
        }
    }

    public function zxindex()
    {
        $data=active::where('u_id',session()->get('zxid'))->paginate(5);
        return view('admin.zxactivelist',compact('data'));
    }

    public function zxactivedeal($id){
        return view('admin.zxactivedeal',compact('id'));
    }

    public function zxfinishactive()
    {
        $data=active::where('updated_time','=',null)->where('aststus','1')->paginate(5);
        return view('admin.zxactivefinish', compact('data'));
    }

    public function zxactivedeal_ok(Request $request)
    {
        //dd($request->all());
        $file = $request->file('img');
        $strname='';
        //判断文件是否上传成功
        if($file->isValid()){
            //获取原文件名
            $originalName = $file->getClientOriginalName();
            //扩展名
            $ext = $file->getClientOriginalExtension();
            //文件类型
            $type = $file->getClientMimeType();
            //临时绝对路径
            $realPath = $file->getRealPath();

            $filename = md5(date('Y-m-d-H-i-S')).'-'.uniqid().'.'.$ext;
            $strname='uploads/actives/'.$filename;
            $path=$file->move('uploads/actives/',$filename); //移动至指定目录
        }
        $request->except(['_token','img']);
        //$request['img']=$strname;
        $data=Db::table('actives')->where('id',$request->get('id'))->update(['img'=>$strname,'aststus'=>1]);
        $eid=Db::table('actives')->join('events','actives.e_id','events.id')->where('actives.id',$request->get('id'))->update(['eststus'=>2]);
        $res=Db::table('zhixinginfos')->where('id'.$request->get('id'))->update(['zxststus'=>1]);
        if($data&&$eid&&$res){
            return redirect('admin/zxactivelist');
        }else{
            return back();
        }
    }


    /**
     * Notes:事件完成，不经过活动
     * User: lixl
     * Date: 2021/4/12
     * Time: 16:27
     */
    public function zxeventfinish($id)
    {
        $res=Db::table('zhixinginfos')->where('e_id'.$id)->update(['zxststus'=>1]);
        $re=Db::table('events')->where('id',$id)->update(['eststus'=>2,'zxststus'=>1]);
        if($re&&$res){
            return \redirect('admin/zxfinisheventlist');
        }else{
            return back();
        }
    }

    public function zxfinisheventlist()
    {
        $data =  $eid=Db::table('zhixinginfos')->join('events','zhixinginfos.e_id','events.id')->where('zhixinginfos.zxname',session()->get('zxname'))->paginate(5);
        return view('admin.zxeventfinish',compact('data'));
    }
    //公告
    public function noticelist()
    {
        $data=Db::table('articles')->where('updated_time',null)->orderBy('id','desc')->get();
        return view('admin.noticelist',compact('data'));
    }

    public function noticeadd()
    {
        return view('admin.noticeadd');
    }

    public function noticeadd_ok(Request $request)
    {
        $file = $request->file('aimg');
        $strname='';
        //判断文件是否上传成功
        if($file->isValid()){
            //获取原文件名
            $originalName = $file->getClientOriginalName();
            //扩展名
            $ext = $file->getClientOriginalExtension();
            //文件类型
            $type = $file->getClientMimeType();
            //临时绝对路径
            $realPath = $file->getRealPath();

            $filename = md5(date('Y-m-d-H-i-S')).'-'.uniqid().'.'.$ext;
            $strname='uploads/articles/'.$filename;
            $path=$file->move('uploads/articles/',$filename); //移动至指定目录
        }

        $in['atitle']=$request->get('atitle');
        $in['acontent']=$request->get('acontent');
        $in['uid']=session()->get('uid');
        $in['type']=1;
        $in['aimg']=$strname;
        $in['created_time']=date('Y-m-d H:i:s');
        $data=Db::table('articles')->insert($in);
        if($data){
            return back()->with('error','发表成功');
        }else{
            return back()->with('error','发表失败');
         }
    }

    public function noticeedit($id)
    {
        $data=Db::table('articles')->where('id',$id)->get();
        return view('admin.noticeedit',compact('data','id'));
    }

    public function noticeedit_ok(Request $request,$id)
    {
        $file = $request->file('aimg');
        $strname='';
        //判断文件是否上传成功
        if($file->isValid()){
            //获取原文件名
            $originalName = $file->getClientOriginalName();
            //扩展名
            $ext = $file->getClientOriginalExtension();
            //文件类型
            $type = $file->getClientMimeType();
            //临时绝对路径
            $realPath = $file->getRealPath();

            $filename = md5(date('Y-m-d-H-i-S')).'-'.uniqid().'.'.$ext;
            $strname='uploads/articles/'.$filename;
            $path=$file->move('uploads/articles/',$filename); //移动至指定目录
        }

        $in['atitle']=$request->get('atitle');
        $in['acontent']=$request->get('acontent');

        $in['aimg']=$strname;

        $data=Db::table('articles')->where('id',$id)->update($in);
        if($data){
            return back()->with('error','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }

    public function noticedel($id)
    {
        $data=Db::table('articles')->where('id',$id)->update(['updated_time'=>date('Y-m-d')]);
        if($data){
            return back()->with('error','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
