<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('property')->unique();
            $table->string('title');
            $table->longText('sub_title')->nullable();
            $table->string('slug')->unique();
            $table->string('emirates');
            $table->string('location');
            $table->integer('size');
            $table->decimal('price', 15, 2);
            $table->decimal('discounted_price', 15, 2)->nullable();
            $table->integer('bathrooms');
            $table->integer('bed_rooms');
            $table->date('year_built');
            $table->string('property_status');
            $table->longText('description')->nullable();
            $table->string('publishing_status')->nullable();
            $table->longText('nearby')->nullable();
            $table->boolean('featured')->default(0)->nullable();
            $table->boolean('top_properties')->default(0)->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_content')->nullable();
            $table->longText('meta_description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
