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
        Schema::table('instant_messages', function (Blueprint $table) {
            //
            $table->dropForeign('instant_messages_chatroom_id_foreign');
            $table->foreign('chatroom_id')
                ->references('id')->on('chatrooms')
                ->onDelete('cascade');


            $table->dropForeign('instant_messages_business_id_foreign');
            $table->foreign('business_id')
                ->references('id')->on('businesses')
                ->onDelete('cascade');

            $table->dropForeign('instant_messages_user_id_foreign');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('instant_messages', function (Blueprint $table) {
            //
        });
    }
};
