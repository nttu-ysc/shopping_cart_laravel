<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateOrderItemsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->dropForeign(['sku_id']);
            $table->dropColumn('sku_id');
            $table->dropColumn('name');
            $table->dropColumn('price');
            $table->dropColumn('discount');
            $table->dropColumn('quantity');
            $table->json('productData')->after('product_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->foreignId('sku_id')->after('product_id')->nullable()->constrained()->onDelete('set null');
            $table->string('name')->after('sku_id');
            $table->float('price')->after('name');
            $table->float('discount', 8, 5)->default(1)->after('price');
            $table->integer('quantity');
            $table->dropColumn('productData');
        });
    }
}
