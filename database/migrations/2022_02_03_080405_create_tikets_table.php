<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tikets', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id');
            $table->string('amount');
            $table->string('payment_by');
            $table->string('paymet_reciver_name')->nullable();
            $table->string('paymet_reciver_number')->nullable();
            $table->string('bkash_transaction_id')->nullable();
            $table->string('bkash_three_digit')->nullable();
            $table->string('bank_transaction_id')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('date');
            $table->string('status')->default(0);
            $table->string('tiket_image')->nullable();
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
        Schema::dropIfExists('tikets');
    }
}
