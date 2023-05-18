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
                'businesses', function (Blueprint $table) {
                //
                $table->string('payme_code')->nullable();
                $table->string('alipay_code')->nullable();
                $table->string('wechatpay_code')->nullable();
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
                'businesses', function (Blueprint $table) {
                //

                $table->dropColumn(
                    [
                        'payme_code',
                        'alipay_code',
                        'wechatpay_code'
                    ]
                );
            }
            );
        }
    };
