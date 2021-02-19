<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->string('size');
            $table->string('color');
            $table->timestamps();
        });

        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('size');
        });

        Schema::table('carts', function (Blueprint $table) {
            $table->foreignId('sku_id')->nullable()->after('product_id')->constrained()->onDelete('set null');
        });

        Schema::table('order_items', function (Blueprint $table) {
            $table->dropColumn('size');
            $table->foreignId('sku_id')->after('product_id')->constrained()->onDelete('cascade');
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
            $table->dropForeign(['sku_id']);
            $table->string('size', 100)->nullable();
        });

        Schema::table('carts', function (Blueprint $table) {
            $table->dropForeign(['sku_id']);
        });

        Schema::table('products', function (Blueprint $table) {
            $table->string('size', 100);
        });

        Schema::table('skus', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
        });

        Schema::dropIfExists('skus');
    }
}
