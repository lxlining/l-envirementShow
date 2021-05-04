<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMangersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mangers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('uid')->unique();
            $table->string('nickname');
            $table->string('password');
            $table->integer('tel');
            $table->string('truename');
            $table->tinyInteger('type')->default(0);//普通执行者0 管理者1
            $table->tinyInteger('mststus')->default(0);//未执行活动0 执行1
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mangers');
    }
}
