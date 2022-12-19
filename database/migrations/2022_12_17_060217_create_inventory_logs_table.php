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
        Schema::create('inventory_logs', function (Blueprint $table) {
            $table->id();
            $table->enum('type', [
                'move_in',
                'move_out',
                'consume',
                'damaged',
                'sold',
            ]);
            $table->integer('quantity');
            $table->text('remark')->nullable();
            $table->json('inventory_log_meta')->nullable();

            $table->foreignId('location_id')->nullable()->constrained()->onDelete('SET NULL');

            $table->foreignId('product_id')->constrained()->onDelete('CASCADE');

            $table->foreignId('business_id')->constrained()->onDelete('CASCADE');
            $table->foreignId('user_id')->constrained()->onDelete('CASCADE');
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
        Schema::dropIfExists('inventory_logs');
    }
};

