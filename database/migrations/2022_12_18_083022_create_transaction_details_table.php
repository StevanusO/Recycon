<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->foreignId('transaction_id')->constrained('transactions', 'id');
            $table->string('item_id', 10);
            $table->foreign('item_id')->references('primary_id')->on('items')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('qty');
            $table->timestamps();
            $table->primary(['transaction_id', 'item_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_details');
    }
}
