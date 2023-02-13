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
        Schema::create('instant_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id')->constrained();

            $table->foreignId('chatroom_id')->constrained();

            $table->foreignId('user_id')->nullable()->constrained();
            $table->enum('sender_type', ['admin', 'customer'])->default('admin');

            $table->enum('content_type', ['text', 'image', 'record'])->default('text');
            $table->longText('content')->nullable();
            $table->longText('image_url')->nullable();
            $table->longText('record_url')->nullable();

            $table->boolean('unread')->default(true);

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
        Schema::dropIfExists('instant_messages');
    }
};
