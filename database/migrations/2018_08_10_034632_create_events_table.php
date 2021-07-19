<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('event_title',150);
            $table->string('event_start_date',15);
            $table->string('event_start_time',15);
            $table->string('event_end_date',15);
            $table->string('event_end_time',15);
            $table->text('event_description')->nullable();
            $table->text('event_city')->nullable();
            $table->text('event_image')->nullable();
            $table->text('event_url')->nullable();
            $table->text('active_status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
