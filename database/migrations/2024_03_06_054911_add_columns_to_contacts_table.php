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
        Schema::table('contacts', function (Blueprint $table) {
            $table->text('kids')->nullable();
            $table->text('nights_in_makkah')->nullable();
            $table->text('nights_in_madina')->nullable();
            $table->tinyInteger('email_checkbox')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropColumn('kids');
            $table->dropColumn('nights_in_makkah');
            $table->dropColumn('nights_in_madina');
            $table->dropColumn('email_checkbox');
        });
    }
};
