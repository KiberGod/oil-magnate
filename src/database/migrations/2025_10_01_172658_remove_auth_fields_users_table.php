<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Поля эмейла и пароля не нужны, т.к. будем работать с Telegram WebApp.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique('users_email_unique');
            $table->dropColumn(['email', 'email_verified_at', 'password', 'remember_token']);
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->rememberToken()->after('name');
            $table->timestamp('email_verified_at')->nullable()->after('name');
            $table->string('email')->unique()->after('name');
            $table->string('password')->after('name');
        });
    }
};
