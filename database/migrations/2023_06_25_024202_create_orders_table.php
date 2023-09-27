<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('orderid');
            $table->string('order_date');
            $table->text('order_list');
            $table->integer('total');
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone');
            $table->text('customer_address');
        
            $table->string('payment_type');
            $table->string('payment_receipt');
            
            $table->integer('order_confirm');
            $table->string('order_status');
            $table->string('arrival_date');
            $table->string('rider_name');
            $table->string('rider_contact');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
