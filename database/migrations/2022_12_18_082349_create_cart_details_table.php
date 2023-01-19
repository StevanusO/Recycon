<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_details', function (Blueprint $table) {
            $table->foreignId('cart_id')->constrained('carts', 'id')->onDelete('cascade')->onUpdate('cascade');
            $table->string('item_id', 10);
            $table->foreign('item_id')->references('primary_id')->on('items')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('qty');
            $table->primary(['cart_id', 'item_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_details');
    }
}
