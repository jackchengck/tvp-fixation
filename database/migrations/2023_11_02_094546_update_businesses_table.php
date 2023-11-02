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
            Schema::table('businesses', function (Blueprint $table) {
                //
                $table->boolean('on_booking_email_notification')->default(false);
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::table('businesses', function (Blueprint $table) {
                //
                $table->dropColumn('on_booking_email_notification');
            });
        }
    };
