<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChefsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chefs', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->string('image',225);
            $table->string('position',50);
            $table->string('twitter_link',500);
            $table->string('facebook_link',500);
            $table->string('google_plus_link',500);
            $table->string('instagram_link',500);
            $table->string('ip',35);
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('chefs');
    }
}
