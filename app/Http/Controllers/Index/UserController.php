<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use think\response\Redirect;


class UserController extends Controller
{
    //用户登录
    public function login()
    {
        return view('index.login');
    }

    public function login_ok(Request $request)
    {

        $da=DB::table('users')->where('uid',$request->get('uid'))->first();
        if($da->password==$request->get('password')){
            session(['user'=>$da->nickname,'uid'=>$da->uid,'uimg'=>$da->img]);
            //session('uid',$da->uid);
            //dd(session()->get('user'));
            return redirect('/');
        }else{
            return back()->with('error','用户名或密码错误');
        }



    }

    //用户注册
    public function register()
    {
        $da=DB::table('users')->orderBy('uid', 'desc')->get('uid');
        $in=$da[0]->uid+1;
        return view('index.regist',compact('in'));
    }

    public function register_ok(Request $request)
    {
        if($request->all()==null) return back();

        $in=$request->except(['_token','password2']);

        $in['created_at']=date('Y-m-d H:i:s');

        $data=DB::table('users')->insert($in);

        if($data){
            return redirect('login');
        }else{
            return back();
        }
    }

    public function index(){
        $time=date('Y-m-d H:i:s');
        $data=DB::table('actives')->where('updated_time',null)->orderBy('id','desc')->paginate(6);
        $data1=DB::table('actives')->where('updated_time',null)->where('type',1)->orderBy('id','desc')->paginate(6);
        $data2=DB::table('articles')->where('type',0)->orderBy('id','desc')->limit(6)->get();
        $data3=DB::table('articles')->where('type',1)->orderBy('id','desc')->limit(6)->get();
        if($data){
            return view('index.index',compact('data','data1','data2','data3'));
        }
    }

    //事件上报
    public function addevent(){
        $data=DB::table('eventclass')->get();
        return view('index.pssendevent',compact('data'));
    }
    public function addevent_ok(Request $request){
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
            $strname='uploads/events/'.$filename;
            $path=$file->move('uploads/events/',$filename); //移动至指定目录
        }

        $request->except('_token');
        $in['img']=$strname;
        $in["uid"]=session()->get('uid');
        $in["eventname"]=$request->get('problem1');
        $in["eventjs"]=$request->get('problem');
        $in["eclass"]=$request->get('sort');
        $in["eventinfo"]=$request->get('problemdetail');
        $in["address"]=$request->get('input_province').$request->get('input_city').$request->get('addetail');
        $in["created_at"]=date('Y-m-d H:i:s');
        $id=DB::table('events')->insertGetId($in);
        $dd['e_id']=$id;
        $dd['ec_id']=$request->get('sort');
        $res=DB::table('eventsorts')->insert($dd);
        if($res){
            return redirect('/');
        }else{
            return back();
        }
    }

    public function showpersonal()
    {
        $data=DB::table('users')->where('uid',session()->get('uid'))->get();
        return view('index.personal',compact('data'));
    }

    public function uppersonal_img(Request $request)
    {
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
            $strname='uploads/users/'.$filename;
            $path=$file->move('uploads/users/',$filename); //移动至指定目录
        }
        $data=DB::table('users')->where('uid',session()->get('uid'))->update(['img'=>$strname]);
        if($data){
            return redirect('personal');
        }else{
            return back();
        }

    }

    public function uppersonal_info(Request $request){
        $da=$request->except('_token');
        $data=DB::table('users')->where('uid',session()->get('uid'))->update($da);
        if($data){
            return redirect('personal');
        }else{
            return back();
        }
    }

    public function pspwchange(){
        return view('index.pspwchange');
    }

    public function pspwchange_ok(Request $request)
    {
        $old=$request->get('oldpw');
        $new=$request->get('password');
        $isnew=$request->get('isnewpw');
        $da=DB::table('users')->where('uid',session()->get('uid'))->get('password');
        if($new!=$isnew){
            return back();
        }else{
            if($da[0]->password==$old){
                $data=DB::table('users')->where('uid',session()->get('uid'))->update(['password'=>$new]);
                if($data){
                    return \redirect('pspwchange');
                }else{
                    return back();
                }
            }
            return back();
        }

    }

    public function loginout()
    {
        session()->flush();
        if(!session()->get('uid')){
            return \redirect('login');
        }
    }

    public function pseventspend()
    {
        $data=DB::table('events')->where('uid',session()->get('uid'))->orderBy('created_at','desc')->paginate(3);
        return view('index.pseventspend',compact('data'));
    }

    public function psvttake()
    {
        $data=DB::table('useractives')->join('actives','useractives.aid','actives.id')->where('useractives.uid',session()->get('uid'))->orderBy('created_time','desc')->paginate(3);

        return view('index.psvttake',compact('data'));
    }

    //志愿者
    public function volunteer()
    {
        $data=DB::table('actives')->orderBy('ended_time','desc')->paginate(6);
        //$data1=DB::table('activesorts')->get();
        return view('index.volunteer',compact('data'));
    }

    public function volunteer_find(Request $request)
    {
        $key=$request->get('key');
        $data=DB::table('actives')->where('activetitle',$key)->orWhere('actives','like','%'.$key.'%')->orWhere('activeinfo','like','%'.$key.'%')->orderBy('ended_time','desc')->paginate(6);
        return view('index.volunteer',compact('data'));
    }
    //志愿者详情
    public function volunteercontent($id)
    {
        $data=DB::table('actives')->where('id',$id)->get();
        $da=DB::table('actives')->where('id',$id)->get('u_id');
        $data1=DB::table('mangers')->where('uid',$da[0]->u_id)->get(['truename','tel']);
        $data2=DB::table('useractives')->where('aid',$id)->where('uid',session()->get('uid'))->get();
        $data3=DB::table('useractives')->join('users','useractives.uid','users.uid')->where('aid',$id)->get();
        $data4=DB::table('comments')->where('aid',$id)->get();

        return view('index.volunteercontent',compact('id','data','data1','data2','data3','data4'));
    }

    //专题活动
    public function newsac()
    {
        $data=DB::table('actives')->where('type',1)->paginate(6);

        return view('index.newsac',compact('data'));
    }

    public function newsac_search(Request $request)
    {
        $key=$request->get('keyword');
        $data=DB::table('actives')->where('activetitle',$key)->orWhere('actives','like','%'.$key.'%')->orWhere('activeinfo','like','%'.$key.'%')->paginate(6);
        return view('index.newsac',compact('data'));
    }

    public function newsaccontent($id)
    {
        $data=DB::table('actives')->where('id',$id)->paginate(6);

        return view('index.newsaccontent',compact('data'));
    }
    //参加活动
    public function addactive(Request $request)
    {
        $id=$request->get('aid');
        $da['aid']=$id;
        $da['uid']=session()->get('uid');
        $res=DB::table('actives')->where('id',$id)->increment('num1');
        $re=DB::table('useractives')->insert($da);
        if($res&&$re){
            return back()->with('error','报名成功');
        }else{
            return back()->with('error','报名失败');
        }
    }

    public function volunteercomplaint($id){
        $data=DB::table('complaintsorts')->get();
        return view('index.volunteercomplaint',compact('id','data'));
    }

    public function volunteercomplaint_ok(Request $request)
    {
        $data=$request->except('_token');
        $id=$request->get('uid2');
        $data['uid1']=session()->get('uid');
        $res=DB::table('complaints')->insert($data);
        if(1){
            return back()->with('error','投诉成功！');
        }else{
            return back()->with('error',"投诉失败！");
        }
    }

    public function addcomment(Request $request)
    {
        $data['ccontent']=$request->get('ccontent');
        $data['uid']=session()->get('uid');
        $data['aid']=$request->get('id');
        $data['created_time']=date('Y-m-d H:i:s');
        $res=DB::table('comments')->insert($data);
        if($res){
            return back()->with('error','成功');
        }else{
            return back()->with('error','失败');
        }
    }

    public function evsilght()
    {
        return \redirect('http://106.37.208.243:8068/GJZ/Business/Publish/Main.html');
    }

    public function test()
    {
        return \redirect('/')->with('success','sucess');
    }
}
