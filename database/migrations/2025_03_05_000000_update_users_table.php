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
        Schema::table('users', function (Blueprint $table) {
            // Rename name column to nama
            $table->renameColumn('name', 'nama');
            
            // Add missing columns
            $table->string('role')->default('anggota')->after('email');
            $table->string('foto')->nullable()->after('role');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Revert the changes
            $table->renameColumn('nama', 'name');
            $table->dropColumn('role');
            $table->dropColumn('foto');
        });
    }
};
