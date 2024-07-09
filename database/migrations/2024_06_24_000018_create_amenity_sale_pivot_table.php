<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmenitySalePivotTable extends Migration
{
    public function up()
    {
        Schema::create('amenity_sale', function (Blueprint $table) {
            $table->unsignedBigInteger('sale_id');
            $table->foreign('sale_id', 'sale_id_fk_9892853')->references('id')->on('sales')->onDelete('cascade');
            $table->unsignedBigInteger('amenity_id');
            $table->foreign('amenity_id', 'amenity_id_fk_9892853')->references('id')->on('amenities')->onDelete('cascade');
        });
    }
}
