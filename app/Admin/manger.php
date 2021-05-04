<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class manger extends Model
{
    //执行者

    //指定模型关联表
    protected $table = 'mangers';
    //指定数据库主键
    protected $primaryKey = 'id';
    //定义时间戳
    public $timestamps = true;

    //多对多
    /*public function article(){
        return $this->belongsToMany('App\Home\message','message','id','article');
    }*/

}
