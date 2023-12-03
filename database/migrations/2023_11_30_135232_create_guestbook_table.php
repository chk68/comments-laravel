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
        Schema::create('guestbook', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('email');
            /*$table->string('homepage')->nullable();*/
            /*$table->string('captcha');*/
            $table->text('text');
            $table->string('ip_address');
            $table->string('browser');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guestbook');
    }
};
