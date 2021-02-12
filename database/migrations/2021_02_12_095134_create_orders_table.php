<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('firstName', 100);
            $table->string('lastName', 100);
            $table->string('mobile', 15);
            $table->string('email', 100);
            $table->string('country', 100);
            $table->string('address', 100);
            $table->string('remark', 255)->nullable();
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('role', 50)->default('user')->after('id');
            $table->string('firstName', 100)->nullable()->after('name');
            $table->string('lastName', 100)->nullable()->after('firstName');
            $table->string('country', 100)->nullable()->after('mobile');
            $table->string('address', 255)->nullable()->after('country');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
            $table->dropColumn('firstName');
            $table->dropColumn('lastName');
            $table->dropColumn('country');
            $table->dropColumn('address');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::dropIfExists('orders');
    }
}
