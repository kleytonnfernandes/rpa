<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('legal_name')->nullable();
            $table->string('trade_name')->nullable();
            $table->string('cnpj', 14)->nullable()->unique();
            $table->string('state_registration')->nullable();
            $table->char('state', 2)->nullable();
            $table->string('tax_regime')->nullable();
            $table->string('email')->nullable();
            $table->string('phone', 30)->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('postal_code', 8)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void { Schema::dropIfExists('companies'); }
};
