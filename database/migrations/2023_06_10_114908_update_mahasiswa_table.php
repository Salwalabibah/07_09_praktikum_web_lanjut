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
        //
        Schema::table('mahasiswas', function (Blueprint $table) {
            $table->char('Nim', 10)->unique()->change();
            $table->string('Email', 50)->after('Nama')->unique();
            $table->date('Tanggal_Lahir',)->after('Email')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('mahasiswas', function (Blueprint $table) {
            $table->dropColumn('Email');
            $table->dropColumn('Tanggal_Lahir');
        });
    }
};
