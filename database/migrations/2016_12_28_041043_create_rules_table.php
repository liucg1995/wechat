<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rules', function (Blueprint $table) {
            $table->increments('id')->comment('主键');
            $table->integer('cate_id')->default('0')->comment('规则分类id');
            $table->string('keyword', 1000)->default('')->comment('关键词列表');
            $table->integer('media_type')->default('0')->comment('媒体类型');
            $table->integer('media_id')->default('0')->comment('多图文时，为bundle_id');
            $table->string('bundle_data', 500)->default('')->comment('一个规则包含多个素材时使用');

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
        Schema::dropIfExists('rules');
    }
}
