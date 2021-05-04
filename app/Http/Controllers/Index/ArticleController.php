<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function sendpost()
    {
        return view('index.sendpost');
    }

    public function sendpost_ok(Request $request)
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

        $da=$request->except(['_token']);
        $da['uid']=session()->get('uid');
        $da['created_time']=date('Y-m-d H:i:s');
        $res=DB::table('articles')->insert($da);
        if($res){
            return redirect('/');
        }else{
            return back();
        }
    }

    public function posts()
    {
        $data=DB::table('users')->join('articles','articles.uid','users.uid')
            ->where('articles.type',0)->orderBy('articles.id','desc')->limit(6)->get();
        $data1=DB::table('mangers')->join('articles','articles.uid','mangers.uid')
            ->where('articles.type',1)->orderBy('articles.id','desc')->limit(6)->get();
        return view('index.post',compact('data','data1'));
    }
    public function postsearch(Request $request)
    {
        $key=$request->get('key');
        $data=DB::table('users')->join('articles','articles.uid','users.uid')
            ->where('articles.type',0)->orWhere('articles.activetitle',$key)->orWhere('articles.actives','like','%'.$key.'%')->orWhere('articles.activeinfo','like','%'.$key.'%')->orderBy('articles.id','desc')->limit(6)->get();
        $data1=DB::table('users')->join('articles','articles.uid','users.uid')
            ->where('articles.type',1)->orWhere('articles.activetitle',$key)->orWhere('articles.actives','like','%'.$key.'%')->orWhere('articles.activeinfo','like','%'.$key.'%')->orderBy('articles.id','desc')->limit(6)->get();
        return view('index.post',compact('data','data1'));
    }

    public function postcontent($id)
    {
        $data=DB::table('articles')->where('id',$id)->get();
        $data1=DB::table('messages')->join('users','messages.uid','users.uid')->where('messages.aid',$id)->get();
        return view('index.postcontent',compact('data','data1'));
    }
    //帖子评论
    public function sendmessahe(Request $request,$id)
    {
        $in=$request->except('_token');
        $in['uid']=session()->get('uid');
        $in['aid']=$id;
        $in['created_time']=date('Y-m-d H:i:s');
       $data=DB::table('messages')->insert($in);
       if($data){
           return redirect("/postcontent/$id");
       }else{
           return back();
       }
    }

    //我的评论
    public function psmytalk()
    {
        $data=DB::table('messages')->join('articles','messages.aid','articles.id')->where('messages.uid',session()->get('uid'))->paginate(6);
        return view('index.psmytalk',compact('data'));
    }

    public function psmypost()
    {
        $data=DB::table('articles')->where('uid',session()->get('uid'))->paginate(6);
        return view('index.psmypost',compact('data'));
    }
}
