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
                'orders', function (Blueprint $table) {
                $table->id();
                $table->string('order_num')->nullable();
                $table->dateTime('order_date');
//            $table->string
                $table->string('coupon_code')->nullable();
                $table->decimal('discount', 8, 2)->nullable();
                $table->boolean('discount_is_percentage')->default(false);

                $table->decimal('total', 8, 2);

                $table->string('payment_method');
                $table->enum(
                    'payment_status', [
                    'pending',
                    'paid',
                    'rejected',
                    'refunded'
                ]
                )->default('pending');
                $table->string('payment_uid')->nullable();
//
                $table->enum(
                    'delivery_method', [
                    'pickup',
                    'delivery'
                ]
                );
                $table->enum(
                    'delivery_status', [
                    'pending',
                    'processing',
                    'finished',
                    'cancelled'
                ]
                )->default('pending');
                $table->text('delivery_address')->nullable();
                $table->text('delivery_recipient_name')->nullable();
                $table->text('delivery_contact_number')->nullable();
                $table->dateTime('pickup_date')->nullable();

                $table->foreignId('business_id')->constrained()->cascadeOnDelete();
                $table->foreignId('customer_id')->nullable()->constrained()->cascadeOnDelete();

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
            Schema::dropIfExists('orders');
        }
    };
