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
            $table->string('firstname');
            $table->string('lastname');
            $table->string('gender');
            $table->string('phonenumber');
            $table->string('token')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('street',100)->nullable();;
            $table->string('city',100)->nullable();;
            $table->string('country');
            $table->string('postalcode');
            $table->string("state",100)->nullable();
            $table->smallInteger('petcount')->default(0);
            $table->enum("membership",array(0,1,2))->default(0);
            $table->enum("is_activated",array(0,1))->default(0);
            $table->integer("notfications_id")->nullable();;
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
