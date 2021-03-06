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
            $table->bigInteger('role_id');
            $table->string('full_name');
            $table->string('user_name');
            $table->string('email')->nullable();
            $table->string('password');
            $table->string('passing_year');
            $table->bigInteger('phone_number')->nullable();
            $table->string('current_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->text('bio')->nullable();
            $table->string('image')->nullable();
            $table->string('designation')->nullable();
            $table->string('last_institution')->nullable();
            $table->string('current_job_place')->nullable();
            $table->string('last_degree')->nullable();
            $table->integer('tiket_amount')->default(0);
            $table->integer('tiket_status')->default(0);
            $table->integer('status')->default(0);
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
