<?php

namespace App\Http\Controllers\Admin;

use App\Admin\active;
use App\Admin\activesort;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActiveController extends Controller
{
    public function index()
    {
        $data=active::where('updated_time','=',null)->paginate(5);
        return view('admin.activelist', compact('data'));
   }
   public function activeadd(){
        return view('admin.activeadd');
   }

    public function activeadd_ok(Request $request)
    {
        $in=$request->except('_token');
        $in['created_time']=date('Y-m-d H:i:s');
        $in['type']=1;
        $res=active::insert($in);
        if($res){
            return back()->with('error','成功');
        }else{
            return back()->with('error','失败');
        }
   }

    public function finishactive()
    {
        $data=active::where('updated_time','=',null)->where('aststus','1')->paginate(5);
        return view('admin.activefinish', compact('data'));
   }

    /**
     * Notes:活动分类
     * User: lixl
     * Date: 2021/4/6
     * Time: 16:20
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\think\response\Redirect
     */
    public function sortlist(){
        $data=activesort::get();
        return view('admin.activesort',compact('data'));
    }
    public  function sortadd(Request $request){
        $data=$request->except(['_token']);

        $res=activesort::insert($data);
        if($res){
            return redirect('admin/activesort');
        }else{
            return back();
        }
    }
    public function sortdel($id){
        $res=activesort::delete($id);
        if($res){
            return redirect('admin/activesort');
        }else{
            return back();
        }
    }
}
