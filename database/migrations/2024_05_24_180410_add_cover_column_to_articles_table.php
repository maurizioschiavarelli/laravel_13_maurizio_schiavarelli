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
        //aggiungiamo la colonna
        Schema::table('articles', function (Blueprint $table) {

            //$table->string('cover')->default('image-placeholder.jpg');
            $table->string('cover')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {

            $table->dropColumn(['cover']);

        });
    }
};
