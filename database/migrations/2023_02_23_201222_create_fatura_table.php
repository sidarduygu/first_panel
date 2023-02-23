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
        Schema::create('faturalar', function (Blueprint $table) {
            $table->id();
            $table->string('item')->default('Fatura'); //sadece yazi
            $table->string('description')->default('description'); //sadece yazi
            $table->integer('rate'); //Numara oldugu zaman (150)
            $table->integer('quantity'); //Numara oldugu zaman (150)
            $table->integer('price'); //Numara oldugu zaman (150)
            $table->string('additional_notes'); 
            $table->string('address_info'); 
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
        Schema::dropIfExists('faturalar');
    }
};
