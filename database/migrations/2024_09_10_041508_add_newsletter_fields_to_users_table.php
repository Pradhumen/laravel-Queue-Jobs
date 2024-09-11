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
            $table->string('admin')->nullable(); // Add the admin field
            $table->string('to')->nullable(); // Add the recipient field
            $table->string('subject')->nullable(); // Add the subject field
            $table->text('body')->nullable(); // Add the body field
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['admin', 'to', 'subject', 'body']);
        });
    }
};
