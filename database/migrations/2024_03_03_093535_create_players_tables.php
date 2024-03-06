<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTables extends Migration
{
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            // this will create an id, a "published" column, and soft delete and timestamps columns
            createDefaultTableFields($table);
            
            $table->integer('position')->unsigned()->nullable();
            
            // add those 2 columns to enable publication timeframe fields (you can use publish_start_date only if you don't need to provide the ability to specify an end date)
            // $table->timestamp('publish_start_date')->nullable();
            // $table->timestamp('publish_end_date')->nullable();
        });

        Schema::create('player_translations', function (Blueprint $table) {
            createDefaultTranslationsTableFields($table, 'player');
            $table->string('title', 200)->nullable();
        });

        Schema::create('player_slugs', function (Blueprint $table) {
            createDefaultSlugsTableFields($table, 'player');
        });

        Schema::create('player_revisions', function (Blueprint $table) {
            createDefaultRevisionsTableFields($table, 'player');
        });
    }

    public function down()
    {
        Schema::dropIfExists('player_revisions');
        Schema::dropIfExists('player_translations');
        Schema::dropIfExists('player_slugs');
        Schema::dropIfExists('players');
    }
}
