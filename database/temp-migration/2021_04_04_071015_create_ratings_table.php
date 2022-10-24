<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->increments('id', true);
            $table->timestamps();
            $table->integer('rating');
            $table->string('user_ip');
            $table->string('name_guest');
            $table->string('email_guest');
            $table->morphs('rateable');
            $table->Integer('user_id')->unsigned();
            $table->index('rateable_id');
            $table->index('rateable_type');
        });
        Schema::table('ratings', function($table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('ratings');
    }
}
