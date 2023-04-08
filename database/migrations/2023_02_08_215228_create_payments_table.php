<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('payment_type')->comment('1= BD, 2= Paypal');
            $table->string('payment_id');
            $table->string('payer_id');
            $table->string('payer_email');
            $table->float('amount', 10, 2);
            $table->float('due_amount', 10, 2);
            $table->float('total_amount', 10, 2);
            $table->date('payment_date');
            $table->string('currency');
            $table->string('payment_status');
            $table->string('name')->nullable();
            $table->string('phone', 30)->unique();
            $table->text('address')->nullable();
            $table->text('transaction_id')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
