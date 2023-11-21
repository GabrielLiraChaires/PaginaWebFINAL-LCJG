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
        Schema::table('temporadas', function (Blueprint $table) {
            $table->string('imagen')->nullable(); // Puedes ajustar el tipo y las características según tus necesidades
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('temporadas', function (Blueprint $table) {
            $table->dropColumn('imagen');
        });
    }
};
