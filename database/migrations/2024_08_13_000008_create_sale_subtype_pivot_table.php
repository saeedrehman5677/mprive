<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleSubtypePivotTable extends Migration
{
    public function up()
    {
        Schema::create('sale_subtype', function (Blueprint $table) {
             $table->unsignedBigInteger('sale_id');
             $table->unsignedBigInteger('subtype_id');
        });
    }
}
