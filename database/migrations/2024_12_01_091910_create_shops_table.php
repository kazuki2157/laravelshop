<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id(); // 自動的にIDを作成
            $table->string('name'); // 店名
            $table->text('description'); // 店舗の説明
            $table->timestamps(); // 作成日時・更新日時
        });
    }

    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
