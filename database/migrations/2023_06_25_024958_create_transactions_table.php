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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('invoice')->unique();
            $table->integer('total');
            $table->integer('cash');
            $table->enum('type', ['sale', 'buy']);
            $table->enum('status', ['paid', 'process', 'failed'])->default('paid');

            $table->unsignedBigInteger('voucher_id')->default(0)->nullable();
            $table->unsignedBigInteger('customer_id')->default(0)->nullable();
            $table->unsignedBigInteger('user_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
