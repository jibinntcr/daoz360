<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations for DAOZ360 leads, chat requests, and contact inquiries.
     */
    public function up(): void
    {
        Schema::create('chat_leads', function (Blueprint $table) {
            $table->id();
            $table->string('lead_id', 64)->unique();
            $table->string('session_id', 64)->index();
            $table->string('name', 80);
            $table->string('email', 150)->index();
            $table->string('company', 120)->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->timestamps();
        });

        Schema::create('chat_requests', function (Blueprint $table) {
            $table->id();
            $table->string('reference', 64)->unique();
            $table->string('session_id', 64)->index();
            $table->string('name', 80);
            $table->string('email', 150)->index();
            $table->string('company', 120)->nullable();
            $table->string('topic', 50);
            $table->json('details')->nullable();
            $table->text('custom_notes')->nullable();
            $table->string('status', 32)->default('New');
            $table->timestamps();
        });

        Schema::create('contact_inquiries', function (Blueprint $table) {
            $table->id();
            $table->string('reference', 64)->unique();
            $table->string('name', 100);
            $table->string('email', 150)->index();
            $table->string('company', 150)->nullable();
            $table->string('channels', 255)->nullable();
            $table->string('category', 80)->default('Product Enquiry');
            $table->text('message');
            $table->string('ip_address', 45)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_inquiries');
        Schema::dropIfExists('chat_requests');
        Schema::dropIfExists('chat_leads');
    }
};
