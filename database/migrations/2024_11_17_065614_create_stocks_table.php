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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name'); // Name of the stock item
            $table->integer('in_stock'); // Quantity in stock
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
        });
    }

    /**$table->foreignId('category_id')->constrained()->onDelete('cascade');
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
};
