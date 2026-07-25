<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('foods', function (Blueprint $table) {
            $table->foreignId('category_id')
                ->nullable()
                ->constrained('food_categories')
                ->nullOnDelete()
                ->after('name');
            $table->dropColumn('category');
        });
    }

    public function down(): void
    {
        Schema::table('foods', function (Blueprint $table) {
            $table->string('category')->nullable()->after('name');
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }
};
