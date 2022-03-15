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
        Schema::table('food_ingredient', function (Blueprint $table) {
            $table->dropForeign('foods_ingredients_food_id_foreign');
            $table->dropColumn('food_id');
            $table->dropForeign('foods_ingredients_ingredient_id_foreign');
            $table->dropColumn('ingredient_id');
        });
            
        Schema::table('food_ingredient', function (Blueprint $table) {
            $table->unsignedBigInteger('ingredient_id');
            $table->foreign('ingredient_id')
            ->references('id')
            ->on('ingredients')
            ->onDelete('cascade');
            
            $table->unsignedBigInteger('food_id');
            $table->foreign('food_id')
            ->references('id')
            ->on('foods')
            ->onDelete('cascade');
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('foods_ingredient', function (Blueprint $table) {
            $table->dropForeign('food_ingredient_food_id_foreign');
            $table->dropColumn('food_id');
            $table->dropForeign('food_ingredient_ingredient_id_foreign');
            $table->dropColumn('ingredient_id');
        });
            
        Schema::table('foods_ingredient', function (Blueprint $table) {
            $table->unsignedBigInteger('food_id');
            $table->foreign('food_id')->references('id')->on('foods');
            $table->unsignedBigInteger('ingredient_id');
            $table->foreign('ingredient_id')->references('id')->on('packs');
        });
    }
};
