<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Index\UserController@index');
//登录
Route::get('/admin/login', 'Admin\LoginController@index');
Route::post('/admin/index', 'Admin\LoginController@login');
Route::group(['prefix'=>'admin','middleware' => 'admin.login'],function() {

        Route::get('welcome', 'Admin\LoginController@welcome');
        //人员列表
        Route::get('userlist', 'Admin\LoginController@userlist');
        //用户列表
        Route::get('userlists', 'Admin\LoginController@userlists');

        //增加人员
        Route::get('useradd', 'Admin\LoginController@useradd');
        Route::post('useradd', 'Admin\LoginController@useradd_ok');
        //修改
        Route::get('useredit/{id?}', 'Admin\LoginController@useredit');
        Route::post('useredit/{id?}', 'Admin\LoginController@useredit_ok');
        //删除
        Route::get('userdel/{id}', 'Admin\LoginController@userdel');
        //注销
        Route::get('loginout', 'Admin\LoginController@loginout');

        //邮件测试
        Route::get('email', 'Admin\LoginController@testeamil');


        //事件
        //列表
        Route::get('eventlist', 'Admin\EventsController@index');
        //完成事件
        Route::get('finisheventlist', 'Admin\EventsController@finishevent');

        //图表显示
        Route::get('showevents', 'Admin\EventsController@showevent1');
        #Route::get('showevents','Admin\EventsController@showevents1');
        //事件分类
        Route::get('eventsort', 'Admin\EventsController@sortlist');
        Route::post('eventsortadd', 'Admin\EventsController@sortadd');
        Route::get('eventclassdel/{id}', 'Admin\EventsController@sortdel');

        //活动
        Route::get('activelist', 'Admin\ActiveController@index');
        Route::get('activeadd', 'Admin\ActiveController@activeadd');
        Route::post('activeadd', 'Admin\ActiveController@activeadd_ok');
        Route::get('finishactive', 'Admin\ActiveController@finishactive');

        //活动分类
        Route::get('activesort', 'Admin\ActiveController@sortlist');
        Route::post('activesortadd', 'Admin\ActiveController@sortadd');
        Route::get('activeclassdel/{id}', 'Admin\ActiveController@sortdel');

        //事件处理
        Route::get('eventdeal/{id}', 'Admin\EventsController@dealshow');
        Route::post('eventdeal', 'Admin\EventsController@deal');
        Route::get('eventdel/{id}', 'Admin\EventsController@del');


    //公告
    Route::get('notice','Admin\EventsController@noticelist');
    Route::get('noticeadd','Admin\EventsController@noticeadd');
    Route::post('noticeadd','Admin\EventsController@noticeadd_ok');
    //修改  删除
    Route::get('noticeedit/{id}','Admin\EventsController@noticeedit');
    Route::post('noticeedit/{id}','Admin\EventsController@noticeedit_ok');
    Route::get('noticedel/{id}','Admin\EventsController@noticedel');

});
Route::group(['prefix'=>'admin'],function() {

    //执行者
    Route::get('zxlogin', 'Admin\LoginController@zxlogin');
    Route::post('zxindex', 'Admin\LoginController@zxindex');
    Route::get('zxloginout', 'Admin\LoginController@zxloginout');
//查看需要执行的事件
    Route::get('zxeventshow/{name}', 'Admin\EventsController@zxeventshow');
    Route::get('zxactiveadd/{id}', 'Admin\EventsController@zxactiveadd');
    Route::post('zxactiveadd/{id}', 'Admin\EventsController@zxactiveadd_ok');
    Route::get('zxeventfinish/{id}', 'Admin\EventsController@zxeventfinish');
    Route::get('zxfinisheventlist', 'Admin\EventsController@zxfinisheventlist');

//执行者活动
    Route::get('zxactivelist', 'Admin\EventsController@zxindex');

//活动完成
    Route::get('zxactivedeal/{id}', 'Admin\EventsController@zxactivedeal');
    Route::post('zxactivedeal', 'Admin\EventsController@zxactivedeal_ok');

     Route::get('zxfinishactive', 'Admin\EventsController@zxfinishactive');
});




//前台
Route::get('login','Index\UserController@login');
Route::post('login','Index\UserController@login_ok');
Route::get('register','Index\UserController@register');
Route::post('register','Index\UserController@register_ok');
//贴吧
Route::get('post','Index\ArticleController@posts');
Route::get('postcontent/{id}','Index\ArticleController@postcontent');
//专题活动
Route::get('newsac','Index\UserController@newsac');
Route::get('newsaccontent/{id}','Index\UserController@newsaccontent');
//志愿活动
Route::get('volunteer','Index\UserController@volunteer');

Route::group(['middleware' => ['index.login',]],function(){
    Route::get('pssendevent','Index\UserController@addevent');
    Route::post('pssendevent','Index\UserController@addevent_ok');
    //信息修改
    Route::get('personal','Index\UserController@showpersonal');
    Route::post('personalimg','Index\UserController@uppersonal_img');
    Route::post('personalinfo','Index\UserController@uppersonal_info');

    //密码修改
    Route::get('pspwchange','Index\UserController@pspwchange');
    Route::post('pspwchange','Index\UserController@pspwchange_ok');

    //退出
    Route::get('loginout','Index\UserController@loginout');

    //事件进度
    Route::get('pseventspend','Index\UserController@pseventspend');

    //活动查看
    Route::get('psvttake','Index\UserController@psvttake');

    //发帖
    Route::get('sendpost','Index\ArticleController@sendpost');
    Route::post('sendpost','Index\ArticleController@sendpost_ok');

    //贴吧

    Route::post('post','Index\ArticleController@postsearch');

    Route::post('sendmessahe/{id}','Index\ArticleController@sendmessahe');

    //我的评论
    Route::get('psmytalk','Index\ArticleController@psmytalk');
    //我的帖子
    Route::get('psmypost','Index\ArticleController@psmypost');

    //志愿者

    Route::post('volunteer','Index\UserController@volunteer_find');
    Route::get('volunteercontent/{id}','Index\UserController@volunteercontent');

    //专题活动

    Route::post('newsac','Index\UserController@newsac_search');

    //参加活动
    Route::post('addactive','Index\UserController@addactive');


    Route::get('volunteercomplaint/{id}','Index\UserController@volunteercomplaint');
    Route::post('volunteercomplaint','Index\UserController@volunteercomplaint_ok');

    Route::post('addcomment','Index\UserController@addcomment');
    Route::get('evsilght','Index\UserController@evsilght');
});

Route::get('/test','Index\UserController@test');