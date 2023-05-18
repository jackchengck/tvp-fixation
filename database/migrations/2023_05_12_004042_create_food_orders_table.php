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
            Schema::create(
                'food_orders', function (Blueprint $table) {
                $table->id();
                $table->foreignId('table_id')->constrained();
                $table->foreignId('business_id')->constrained();
                $table->string('status')->default('preparing');
                $table->string('payment_method')->nullable()->default(null);
                $table->timestamps();
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
            Schema::dropIfExists('food_orders');
        }
    };