<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialsTables extends Migration
{
    public function up()
    {
        Schema::create('specials', function (Blueprint $table) {
            // this will create an id, a "published" column, and soft delete and timestamps columns
            createDefaultTableFields($table);
            
            $table->integer('position')->unsigned()->nullable();
            
            $table->string('title', 200)->nullable();
            $table->integer('cost')->nullable();
            $table->string('own1', 200)->nullable();
            $table->string('own2', 200)->nullable();
            $table->string('own3', 200)->nullable();
            $table->string('own4', 200)->nullable();
            $table->integer('mortgage')->nullable();
            // add those 2 columns to enable publication timeframe fields (you can use publish_start_date only if you don't need to provide the ability to specify an end date)
            // $table->timestamp('publish_start_date')->nullable();
            // $table->timestamp('publish_end_date')->nullable();
        });

        Schema::create('special_translations', function (Blueprint $table) {
            createDefaultTranslationsTableFields($table, 'special');
            $table->string('title', 200)->nullable();
        });

        Schema::create('special_slugs', function (Blueprint $table) {
            createDefaultSlugsTableFields($table, 'special');
        });

        Schema::create('special_revisions', function (Blueprint $table) {
            createDefaultRevisionsTableFields($table, 'special');
        });
    }

    public function down()
    {
        Schema::dropIfExists('special_revisions');
        Schema::dropIfExists('special_translations');
        Schema::dropIfExists('special_slugs');
        Schema::dropIfExists('specials');
    }
}
