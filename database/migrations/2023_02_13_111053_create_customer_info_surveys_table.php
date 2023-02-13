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
        Schema::create('customer_info_surveys', function (Blueprint $table) {
            $table->id();
            $table->string('occupation')->nullable();
            $table->string('district')->nullable();
            $table->string('age_group')->nullable();
            $table->longText('other')->nullable();
            $table->foreignId('business_id')->constrained();
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
        Schema::dropIfExists('customer_info_surveys');
    }
};
