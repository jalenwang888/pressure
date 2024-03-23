<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_tests', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->comment('用户名');
            $table->string('email', 32)->nullable()->comment('邮箱');
            $table->string('sex', 32)->nullable()->comment('性别 Male， Female');
            $table->integer('age')->nullable()->comment('年龄');
            $table->string('password')->nullable()->comment('密码');
            $table->string('servers')->nullable()->comment('服务器名字');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_tests');
    }
};
