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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('address')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('role')->default('user'); // Default role is 'user'
            $table->boolean('is_active')->default(true);
            $table->boolean('is_admin')->default(false);
            $table->boolean('is_verified')->default(false);
            $table->string('verification_token')->nullable();
            $table->string('profile_picture')->nullable();
            $table->string('locale')->default('en'); // Default locale is 'en'
            $table->string('timezone')->default('UTC'); // Default timezone is 'UTC'
            $table->string('theme')->default('light'); // Default theme is 'light'
            $table->string('two_factor_secret')->nullable();
            $table->boolean('two_factor_confirmed')->default(false);
            $table->string('two_factor_recovery_codes')->nullable();
            $table->string('terms_version')->nullable();
            $table->string('terms_hash')->nullable();
            $table->string('terms_signature')->nullable();
            $table->string('terms_signature_ip')->nullable();
            $table->string('terms_signature_user_agent')->nullable();
            $table->string('terms_signature_device')->nullable();
            $table->string('terms_signature_location')->nullable();
            $table->string('terms_signature_browser')->nullable();
            $table->string('terms_signature_os')->nullable();
            $table->string('terms_signature_device_type')->nullable();
            $table->string('terms_signature_device_id')->nullable();
            $table->string('terms_signature_device_name')->nullable();
            $table->string('terms_signature_device_model')->nullable();
            $table->string('terms_signature_device_manufacturer')->nullable();
            $table->string('terms_signature_device_os')->nullable();
            $table->string('terms_signature_device_os_version')->nullable();
            $table->string('terms_signature_device_browser')->nullable();
            $table->string('terms_signature_device_browser_version')->nullable();
            $table->string('terms_signature_device_browser_language')->nullable();
            $table->string('terms_signature_device_browser_platform')->nullable();
            $table->string('terms_signature_device_browser_engine')->nullable();
            $table->string('terms_signature_device_browser_engine_version')->nullable();
            $table->string('terms_signature_device_browser_engine_name')->nullable();   
            $table->datetime('terms_accepted_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
