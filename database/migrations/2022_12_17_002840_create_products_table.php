<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("title")->nullable();
            $table->text('description')->nullable();
            $table->string('image', 255)->nullable();

            $table->decimal("cost");
            $table->decimal("price");

            $table->integer('minimum_inventory')->nullable();
            $table->integer('alert_quantity')->nullable();

            $table->foreignId('business_id')->constrained()->onDelete('CASCADE');
            $table->foreignId('supplier_id')->nullable()->constrained()->onDelete('SET NULL');
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
        Schema::dropIfExists('products');
    }
};
