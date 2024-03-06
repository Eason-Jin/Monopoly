<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTables extends Migration
{
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            // this will create an id, a "published" column, and soft delete and timestamps columns
            createDefaultTableFields($table);
            
            $table->integer('position')->unsigned()->nullable();
            
            // add those 2 columns to enable publication timeframe fields (you can use publish_start_date only if you don't need to provide the ability to specify an end date)
            // $table->timestamp('publish_start_date')->nullable();
            // $table->timestamp('publish_end_date')->nullable();
        });

        Schema::create('property_translations', function (Blueprint $table) {
            createDefaultTranslationsTableFields($table, 'property');
            $table->string('title', 200)->nullable();
            $table->integer('cost')->unsigned()->nullable();
            $table->integer('rent0')->unsigned()->nullable();
            $table->integer('rent1')->unsigned()->nullable();
            $table->integer('rent2')->unsigned()->nullable();
            $table->integer('rent3')->unsigned()->nullable();
            $table->integer('rent4')->unsigned()->nullable();
            $table->integer('rentHotel')->unsigned()->nullable();
            $table->integer('mortgage')->unsigned()->nullable();
            $table->integer('costHouse')->unsigned()->nullable();
            $table->integer('costHotel')->unsigned()->nullable();
        });

        Schema::create('property_slugs', function (Blueprint $table) {
            createDefaultSlugsTableFields($table, 'property');
        });

        Schema::create('property_revisions', function (Blueprint $table) {
            createDefaultRevisionsTableFields($table, 'property');
        });
    }

    public function down()
    {
        Schema::dropIfExists('property_revisions');
        Schema::dropIfExists('property_translations');
        Schema::dropIfExists('property_slugs');
        Schema::dropIfExists('properties');
    }
}
