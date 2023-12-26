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
        Schema::table('shipping_rates', function (Blueprint $table) {
            $table->foreignId('asal')->after('id')->references('id')->on('alamat')->onDelete('restrict');
            $table->foreignId('tujuan')->after('asal')->references('id')->on('alamat')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('shipping_rates', function (Blueprint $table) {
            $table->dropForeign(['asal']);
            $table->dropForeign(['tujuan']);
            $table->dropColumn('asal');
            $table->dropColumn('tujuan');
        });
    }
};
