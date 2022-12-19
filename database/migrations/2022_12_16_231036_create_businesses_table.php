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
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('address')->nullable();
            $table->string('phone');
            $table->text('email');
            $table->text('info')->nullable();
//            $table->foreignId('user_id')->nullable()->constrained();
            $table->foreignId('admin_id')->nullable()->constrained('users');
            $table->foreignId('solution_integrator_id')->constrained()->onDelete('CASCADE');

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
        Schema::dropIfExists('businesses');
    }
};
