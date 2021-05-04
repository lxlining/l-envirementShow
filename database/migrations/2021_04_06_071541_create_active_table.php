<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actives', function (Blueprint $table) {

                $table->bigIncrements('id');
                $table->string('activetitle');
                $table->string('address');
                $table->string('img');
                $table->string('actives');//简述
                $table->text('activeinfo');//内容
                $table->integer('num')->nullable();//需要人手
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
        Schema::dropIfExists('actives');
    }
}
