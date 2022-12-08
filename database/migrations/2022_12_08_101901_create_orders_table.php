<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_id');
            $table->tinyInteger('store');
            $table->float('amount');
            $table->float('paid');
            $table->tinyInteger('created_by');
            $table->tinyInteger('active');
            $table->tinyInteger('status');
            $table->tinyInteger('refunded')->default(0);
            $table->tinyInteger('canceled')->default(0);
            $table->text('comments')->nullable();
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
