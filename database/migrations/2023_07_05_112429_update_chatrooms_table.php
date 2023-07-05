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
            Schema::table(
                'chatrooms', function (Blueprint $table) {
                $table->dropForeign('chatrooms_business_id_foreign');
                $table->foreign('business_id')
                    ->references('id')->on('businesses')
                    ->onDelete('cascade');
            }
            );
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::table(
                'chatrooms', function (Blueprint $table) {
                //
            }
            );
        }
    };
