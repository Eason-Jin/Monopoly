<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('properties', function (Blueprint $table) {
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
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            //
        });
    }
};
