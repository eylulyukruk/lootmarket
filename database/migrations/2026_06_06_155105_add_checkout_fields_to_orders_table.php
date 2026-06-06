<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('name')->nullable()->after('user_id');
            $table->string('email')->nullable()->after('name');
            $table->string('phone')->nullable()->after('email');
            $table->text('address')->nullable()->after('phone');
            $table->string('city')->nullable()->after('address');
            $table->string('country')->nullable()->after('city');
            $table->string('zip_code')->nullable()->after('country');
            $table->decimal('subtotal', 10, 2)->default(0)->after('zip_code');
            $table->decimal('shipping_price', 10, 2)->default(0)->after('subtotal');
            $table->string('shipping_method')->default('Free Shipping')->after('shipping_price');
            $table->string('payment_method')->default('Credit Card')->after('shipping_method');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'name',
                'email',
                'phone',
                'address',
                'city',
                'country',
                'zip_code',
                'subtotal',
                'shipping_price',
                'shipping_method',
                'payment_method',
            ]);
        });
    }
};
