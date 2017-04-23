<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('uid');
            $table->string('mobile');
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->integer('regtime');
            $table->integer('money');
            $table->string('zhifubao');
            $table->integer('lastlogin');
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}