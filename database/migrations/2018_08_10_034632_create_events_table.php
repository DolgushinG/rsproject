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
            $table->text('event_start_date');
            $table->text('event_start_time',15);
            $table->text('event_end_date');
            $table->text('event_end_time',15);
            $table->text('event_description')->nullable();
            $table->text('event_city')->nullable();
            $table->text('event_image')->nullable();
            $table->text('event_url')->nullable();
            $table->enum('active_status', [0,1])->default(0)->nullable();
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
