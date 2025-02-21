<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->double('lat')->nullable();
            $table->double('lon')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
            $table->string('phone')->nullable();
            $table->date('dob')->nullable();
            $table->string('profession')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('role',['admin','worker','client']);
            $table->string('password');
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
