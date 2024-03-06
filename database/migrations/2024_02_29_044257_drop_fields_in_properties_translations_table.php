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
        Schema::table('property_translations', function (Blueprint $table) {
            $table->dropColumn('cost');
            $table->dropColumn('rent0');
            $table->dropColumn('rent1');
            $table->dropColumn('rent2');
            $table->dropColumn('rent3');
            $table->dropColumn('rent4');
            $table->dropColumn('rentHotel');
            $table->dropColumn('mortgage');
            $table->dropColumn('costHouse');
            $table->dropColumn('costHotel');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('property_translations', function (Blueprint $table) {
            //
        });
    }
};
