<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('email_verification_codes', function (Blueprint $table) {
            $table->unsignedTinyInteger('attempts')->default(0)->after('expires_at');
            $table->timestamp('next_attempt_at')->nullable()->after('attempts');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->unsignedTinyInteger('pending_email_attempts')->default(0)->after('pending_email_sent_at');
            $table->timestamp('pending_email_next_attempt_at')->nullable()->after('pending_email_attempts');
        });
    }

    public function down(): void
    {
        Schema::table('email_verification_codes', function (Blueprint $table) {
            $table->dropColumn(['attempts', 'next_attempt_at']);
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['pending_email_attempts', 'pending_email_next_attempt_at']);
        });
    }
};
