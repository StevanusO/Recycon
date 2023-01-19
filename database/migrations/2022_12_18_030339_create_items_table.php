<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            // $table->id()
            $table->string('primary_id', 10);
            $table->string('name', 20)->unique();
            $table->integer('price');
            $table->string('description', 200);
            $table->text('image');
            $table->string('category', 9);
            $table->timestamps();
            $table->primary('primary_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
