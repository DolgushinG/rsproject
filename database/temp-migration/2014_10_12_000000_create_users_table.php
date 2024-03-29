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
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->timestamp('last_seen')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->integer('salary_route_rope')->default(0)->nullable(); //Salary from
            $table->integer('salary_route_bouldering')->default(0)->nullable(); //Salary from
            $table->integer('salary_hour')->default(0)->nullable(); //Salary to (Up range)
            $table->enum('exp_level', ['beginner', 'middle', 'senior'])->nullable();
            $table->text('description')->nullable();
            $table->text('educational_requirements')->nullable();
            $table->integer('exp_local')->default(0)->nullable();
            $table->integer('exp_national')->default(0)->nullable();
            $table->integer('exp_international')->default(0)->nullable();
            $table->text('apply_instruction')->nullable();
            $table->string('city_name')->nullable();
            $table->tinyInteger('experience_required_years')->default(0)->nullable(); //In Years
            $table->tinyInteger('experience_plus')->default(0)->nullable(); //In Years
            $table->integer('views')->nullable();
            $table->integer('other_city')->nullable();
            $table->integer('all_time')->nullable();
            $table->dateTime('approved_at')->nullable();
            $table->tinyInteger('status')->default(0)->nullable(); //0,pending,1=approved,2=blocked
            $table->tinyInteger('is_premium')->nullable();
            $table->string('phone')->nullable();
            $table->string('photo')->nullable();
            $table->enum('user_type', ['user', 'admin']);
            $table->string('company')->nullable();
            $table->string('grade')->nullable();
            $table->string('contact')->nullable();
            $table->string('instagram')->nullable();
            $table->string('telegram')->nullable();
            $table->tinyInteger('active_status')->default(0);
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
