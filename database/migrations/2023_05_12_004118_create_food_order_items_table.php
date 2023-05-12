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
                'food_order_items', function (Blueprint $table) {
                $table->id();
                $table->foreignId('food_order_id')->constrained();

                $table->foreignId('dish_id')->constrained();
                $table->unsignedInteger('quantity')->default(1);

                $table->foreignId('business_id')->constrained();
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
            Schema::dropIfExists('food_order_items');
        }
    };
