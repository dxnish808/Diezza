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
        Schema::table('stocks', function (Blueprint $table) {
            $table->string('barcode')->nullable();
            $table->string('brand')->nullable();
            $table->string('capacity')->nullable(); 
            $table->decimal('sell_price', 10, 2)->nullable(); 
            $table->decimal('cost', 10, 2)->nullable();
        });
    }


    /**
     *
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stocks', function (Blueprint $table) {
            $table->dropColumn(['barcode', 'brand', 'capacity', 'sell_price', 'cost']);
        });
    }
    
};
