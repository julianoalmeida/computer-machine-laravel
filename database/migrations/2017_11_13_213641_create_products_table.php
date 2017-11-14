<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id', true);
            $table->string('name', 60)->unique();
            $table->string('code', 60)->unique();
            $table->float('price', 8, 2);
            $table->integer('category_id')->unsigned();
            $table->timestamps();

            $table->index(['category_id']);

//            Schema::table('products', function($table) {
//                $table->foreign('category_id')->references('id')->on('categories');
//            });

            $table->foreign('category_id')
                ->references('id')->on('categories')
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
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_category_id_foreign');
        });

        Schema::drop('products');
    }
}
