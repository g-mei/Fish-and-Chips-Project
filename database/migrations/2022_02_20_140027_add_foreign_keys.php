<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
        
        Schema::table('foods', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
        });
        
        Schema::table('packs', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
        });
        
        Schema::create('orders_foods', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('qty');
            
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders');
            
            $table->unsignedBigInteger('food_id');
            $table->foreign('food_id')->references('id')->on('foods');
        });
        
        Schema::create('foods_packs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            
            $table->unsignedBigInteger('food_id');
            $table->foreign('food_id')->references('id')->on('foods');
            
            $table->unsignedBigInteger('pack_id');
            $table->foreign('pack_id')->references('id')->on('packs');
        });
        
        Schema::create('foods_ingredients', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            
            $table->unsignedBigInteger('food_id');
            $table->foreign('food_id')->references('id')->on('foods');
            
            $table->unsignedBigInteger('ingredient_id');
            $table->foreign('ingredient_id')->references('id')->on('ingredients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('orders_user_id_foreign');
            $table->dropColumn('user_id');
        });
        
        Schema::table('foods', function (Blueprint $table) {
            $table->dropForeign('foods_category_id_foreign');
            $table->dropColumn('category_id');
        });
        
        Schema::table('packs', function (Blueprint $table) {
            $table->dropForeign('packs_category_id_foreign');
            $table->dropColumn('category_id');
        });
        
        Schema::table('orders_foods', function (Blueprint $table) {
            $table->dropForeign('orders_foods_order_id_foreign');
            $table->dropColumn('order_id');
            $table->dropForeign('orders_foods_food_id_foreign');
            $table->dropColumn('food_id');
        });
        
        Schema::table('foods_packs', function (Blueprint $table) {
            $table->dropForeign('foods_packs_food_id_foreign');
            $table->dropColumn('food_id');
            $table->dropForeign('foods_packs_pack_id_foreign');
            $table->dropColumn('pack_id');
        });
        
        Schema::table('foods_ingredients', function (Blueprint $table) {
            $table->dropForeign('foods_ingredients_food_id_foreign');
            $table->dropColumn('food_id');
            $table->dropForeign('foods_ingredients_ingredient_id_foreign');
            $table->dropColumn('ingredient_id');
        });
        
        Schema::dropIfExists('orders_foods');
        Schema::dropIfExists('foods_packs');
        Schema::dropIfExists('foods_ingredients');
    }
};
