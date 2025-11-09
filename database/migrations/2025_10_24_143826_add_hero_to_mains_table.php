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
        Schema::table('mains', function (Blueprint $table) {
            $table->string('hero_title')->nullable();
            $table->string('hero_image')->nullable();
            $table->text('hero_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mains', function (Blueprint $table) {
            $table->dropColumn(['hero_title', 'hero_image', 'hero_description']);
        });
    }
};
