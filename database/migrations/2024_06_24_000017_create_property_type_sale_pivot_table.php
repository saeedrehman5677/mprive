<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyTypeSalePivotTable extends Migration
{
    public function up()
    {
        Schema::create('property_type_sale', function (Blueprint $table) {
            $table->unsignedBigInteger('sale_id');
            $table->foreign('sale_id', 'sale_id_fk_9892852')->references('id')->on('sales')->onDelete('cascade');
            $table->unsignedBigInteger('property_type_id');
            $table->foreign('property_type_id', 'property_type_id_fk_9892852')->references('id')->on('property_types')->onDelete('cascade');
        });
    }
}
