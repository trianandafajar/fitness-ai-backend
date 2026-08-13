<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('email_verification_codes', function (Blueprint $table) {
            $table->unsignedTinyInteger('resends')->default(0)->after('next_attempt_at');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->unsignedTinyInteger('pending_email_resends')->default(0)->after('pending_email_next_attempt_at');
        });
    }

    public function down(): void
    {
        Schema::table('email_verification_codes', function (Blueprint $table) {
            $table->dropColumn('resends');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('pending_email_resends');
        });
    }
};
