<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follower', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gid')->default('0');
            $table->string('openid', 80)->default('')->comment('openid');
            $table->string('nickname', 80)->default('')->comment('昵称');
            $table->integer('sex')->default('0')->comment('性别');
            $table->string('language', 80)->default('')->comment('');
            $table->string('city', 80)->default('')->comment('城市');
            $table->string('province', 80)->default('')->comment('省');
            $table->string('country', 80)->default('')->comment('国');
            $table->string('headimgurl', 80)->default('')->comment('头像');
            $table->integer('subscribe')->comment('关注状态');
            $table->bigInteger("subscribe_time")->comment('关注时间');
            $table->string('remark', 80)->default('')->comment('');
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
        Schema::dropIfExists('follower');
    }
}
