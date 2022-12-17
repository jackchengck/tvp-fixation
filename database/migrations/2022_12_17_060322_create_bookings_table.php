<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            $table->foreignId('service_id')->constrained()->onDelete('CASCADE');

            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone');
            $table->string('customer_password');
            $table->string('order_num');

            $table->date('booking_date');
            $table->time('booking_time');

            $table->json('booking_meta')->nullable();

            $table->foreignId('business_id')->constrained()->onDelete('CASCADE');
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
        Schema::dropIfExists('bookings');
    }
};
