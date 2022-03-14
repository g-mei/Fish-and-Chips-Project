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
        Schema::table('foods_packs', function (Blueprint $table) {
            $table->dropForeign('foods_packs_food_id_foreign');
            $table->dropColumn('food_id');
            $table->dropForeign('foods_packs_pack_id_foreign');
            $table->dropColumn('pack_id');
        });
        
        Schema::table('foods_packs', function (Blueprint $table) {
            $table->unsignedBigInteger('pack_id');
            $table->foreign('pack_id')
            ->references('id')
            ->on('packs')
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
        Schema::table('foods_packs', function (Blueprint $table) {
            $table->dropForeign('foods_packs_food_id_foreign');
            $table->dropColumn('food_id');
            $table->dropForeign('foods_packs_pack_id_foreign');
            $table->dropColumn('pack_id');
        });
        
        Schema::table('foods_packs', function (Blueprint $table) {
            $table->unsignedBigInteger('food_id');
            $table->foreign('food_id')->references('id')->on('foods');
            $table->unsignedBigInteger('pack_id');
            $table->foreign('pack_id')->references('id')->on('packs');
        });
    }
};
