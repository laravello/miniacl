<?php

use Illuminate\Support\Facades\Schema;
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
            $table->increments('id');
            $table->string('name')->nullable();;
            $table->string('first_name')->nullable();;
            $table->string('zip')->nullable();;
            $table->string('street')->nullable();;
            $table->string('place')->nullable();;
            $table->string('phone')->nullable();;
            $table->string('country')->nullable();;
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('confirmed')->default(0)->comment('0 = no email verification, 1 = is authenticated by email');
            $table->string('active')->default(0)->comment('0 = no access, 1 = has access given by admin');
            $table->integer('role_id')->default(0)->comment('0 = no access, 1 = user, 2 = admin');//
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
