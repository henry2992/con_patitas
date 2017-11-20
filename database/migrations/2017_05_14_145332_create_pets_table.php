<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("user_id");
            $table->string("name",50);
            $table->string("avatar")->nullable();
            $table->string('tag_id')->nullable();
            $table->string("breed")->nullable();
            $table->enum("gender",array(0,1,2));
            $table->string("type");
            $table->date("birth");
            $table->smallInteger("weight");
            $table->smallInteger("unit")->default("1");
            $table->boolean('spay');
            $table->string('rabiestag')->nullable();
            $table->string("license",50)->nullable();
            $table->integer("provider_id")->nullable();
            $table->string("microchip")->nullable();
            $table->string("municipal_license")->nullable();
            $table->string("municipal_license_location")->nullable();
            $table->string("municipal_expiration")->nullable();
            $table->text("additional_color")->nullable();
            $table->text("additional_medical")->nullable();
            $table->boolean("missing")->default(false);
            $table->integer("service_level")->default(0);
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
        Schema::dropIfExists('pets');
    }
}
