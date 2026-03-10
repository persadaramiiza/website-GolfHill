<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('units', function (Blueprint $table) {
            // Replace single `size` with a min/max range.
            // Keep `size` as nullable for backward compatibility with existing data.
            $table->decimal('size', 10, 2)->nullable()->change();
            $table->decimal('size_min', 10, 2)->nullable()->after('size');
            $table->decimal('size_max', 10, 2)->nullable()->after('size_min');
            $table->string('key_features', 255)->nullable()->after('size_max');
        });
    }

    public function down(): void
    {
        Schema::table('units', function (Blueprint $table) {
            $table->dropColumn(['size_min', 'size_max', 'key_features']);
        });
    }
};
