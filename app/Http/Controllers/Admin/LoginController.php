<?php

namespace App\Http\Controllers\Admin;

use App\Admin\manger;
use App\Admin\User;
use function foo\func;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use think\response\Redirect;
use think\View;

class LoginController extends Controller
{
    //登录界面
    public function index(){
        return view('admin.login');
    }
    //登录验证
    public function login(Request $request){
        $user=$request->get("username");
        $pass=$request->get("password");
        $u=manger::where('type',1)->where('uid',$user)->first();
            if($u->password==$pass){
                session(['uid'=>$user]);
                //session()->push('uid',$user);
                return view('admin.index');
            }else{
                echo "用户名或密码错误！";
                return back();
            }
    }

    public function welcome(){
        return view('admin.welcome');
    }
    //人员列表
    public function userlist(){
        $mangers=DB::table('mangers')->where('type','=',0 )->where('updated_at','=',null)->paginate(5);
        return view('admin.userlist',compact('mangers'));
    }
    //添加人员
    public function useradd(){
        return view('admin.useradd');
    }

    public function useradd_ok(Request $request){
        $data=$request->except(['_token','repass']);
        $da=['created_at'=>date('Y-m-d H:i:s')];
        //dd($data);
        $data=array_merge($data,$da);
        //dd($data);

        $res=DB::table('mangers')->insert($data);
        if($res){
            return redirect('admin/userlist');
        }else{
            return back();
        }
    }
    //修改
    public function useredit($id){
        return view('admin.useredit',compact('id'));
    }
    public function useredit_ok(Request $request){

        //dd($request->all());
        $id=$request->get('id');
        $data=$request->except(['_token','id']);

        $res=DB::table('mangers')->where('id','=',$id)->update($data);
        if($res){
            return redirect('admin/userlist');
        }else{
            return back();
        }
    }
    public function userdel($id){
        $res=DB::table('mangers')->where('id','=',$id)->update(['updated_at'=>date('Y-m-d H:i:s')]);
        if($res){
            return redirect('admin/userlist');
        }else{
            return back();
        }
    }

    /**
     * Notes:志愿用户列表
     * User: lixl
     * Date: 2021/4/6
     * Time: 14:47
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Redirect
     */
    public function userlists()
    {
        $mangers=User::where('updated_at','=',null)->paginate(5);
        return view('admin.userlist',compact('mangers'));
    }
    public function loginout(){
        session()->flush();
        return redirect('admin/login');
    }

    public function testeamil()
    {
        //纯文本
       /* Mail::raw('test！！！',function(Message $message){
            $message->to('1752116947@qq.com');
            $message->subject('test');
        });*/
       //视图
        Mail::send('admin.welcome',['user'=>'lixl'],function (Message $m){
            $m->to('1752116947@qq.com');
            $m->subject('test');
        });

    }

    /**
     * Notes:执行者相关
     * User: lixl
     * Date: 2021/4/5
     * Time: 18:02
     */
    public function zxlogin()
    {
        return view('admin.zxlogin');
    }

    //登录验证
    public function zxindex(Request $request){
        $user=$request->get("username");
        $pass=$request->get("password");
        $u=manger::where('type',0)->where('uid',$user)->first();
        if($u->password==$pass){
            session(['zxid'=>$user,'zxname'=>$u->truename]);
            return view('admin.zxindex');
        }else{
            echo "用户名或密码错误！";
            return back();
        }
    }
    public function zxloginout(){
        session()->flush();
        return redirect('admin/zxlogin');
    }

}

