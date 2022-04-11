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
        
        Schema::create('order_food', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('qty');
            $table->string('instructions')->nullable();
            
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')
            ->references('id')
            ->on('orders')
            ->onDelete('cascade');
            
            $table->unsignedBigInteger('food_id');
            $table->foreign('food_id')
            ->references('id')
            ->on('foods')
            ->onDelete('cascade');
        });
        
        Schema::create('order_pack', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('qty');
            $table->string('instructions')->nullable();
            
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')
            ->references('id')
            ->on('orders')
            ->onDelete('cascade');
            
            $table->unsignedBigInteger('pack_id');
            $table->foreign('pack_id')
            ->references('id')
            ->on('packs')
            ->onDelete('cascade');
        });
        
        Schema::create('food_pack', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            
            $table->unsignedBigInteger('food_id');
            $table->foreign('food_id')
            ->references('id')
            ->on('foods')
            ->onDelete('cascade');
            
            $table->unsignedBigInteger('pack_id');
            $table->foreign('pack_id')
            ->references('id')
            ->on('packs')
            ->onDelete('cascade');
        });
        
        Schema::create('food_ingredient', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            
            $table->unsignedBigInteger('food_id');
            $table->foreign('food_id')
            ->references('id')
            ->on('foods')
            ->onDelete('cascade');
            
            $table->unsignedBigInteger('ingredient_id');
            $table->foreign('ingredient_id')
            ->references('id')
            ->on('ingredients')
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
        
        if (Schema::hasTable('orders')) {
            Schema::table('orders', function (Blueprint $table) {
                $table->dropForeign('orders_user_id_foreign');
                $table->dropColumn('user_id');
            });
        }
        
        if (Schema::hasTable('foods')) {
            Schema::table('foods', function (Blueprint $table) {
                $table->dropForeign('foods_category_id_foreign');
                $table->dropColumn('category_id');
            });
        }
        
        if (Schema::hasTable('packs')) {
            Schema::table('packs', function (Blueprint $table) {
                $table->dropForeign('packs_category_id_foreign');
                $table->dropColumn('category_id');
            });
        }
        
        if (Schema::hasTable('order_food')) {
            Schema::table('order_food', function (Blueprint $table) {
                $table->dropForeign('order_food_order_id_foreign');
                $table->dropColumn('order_id');
                $table->dropForeign('order_food_food_id_foreign');
                $table->dropColumn('food_id');
            });
        }
        
        if (Schema::hasTable('order_pack')) {
            Schema::table('order_pack', function (Blueprint $table) {
                $table->dropForeign('order_pack_order_id_foreign');
                $table->dropColumn('order_id');
                $table->dropForeign('order_pack_pack_id_foreign');
                $table->dropColumn('pack_id');
            });
        }
        
        if (Schema::hasTable('food_pack')) {
            Schema::table('food_pack', function (Blueprint $table) {
                $table->dropForeign('food_pack_food_id_foreign');
                $table->dropColumn('food_id');
                $table->dropForeign('food_pack_pack_id_foreign');
                $table->dropColumn('pack_id');
            });
        }
        
        if (Schema::hasTable('food_ingredient')) {
            Schema::table('food_ingredient', function (Blueprint $table) {
                $table->dropForeign('food_ingredient_food_id_foreign');
                $table->dropColumn('food_id');
                $table->dropForeign('food_ingredient_ingredient_id_foreign');
                $table->dropColumn('ingredient_id');
            });
        }
        
        Schema::dropIfExists('food_pack');
        Schema::dropIfExists('food_ingredient');
        Schema::dropIfExists('order_food');
        Schema::dropIfExists('order_pack');
        Schema::dropIfExists('food_pack');
        Schema::dropIfExists('food_ingredient');
        
    }
};
