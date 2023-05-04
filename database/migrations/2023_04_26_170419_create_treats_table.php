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
        Schema::create('treats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('merchant_id')->constrained('merchants', 'id')->onDelete('cascade');
            $table->string('car_name');
            $table->string('shasi_number')->unique();
            $table->string('color');
            $table->integer('model');
            $table->string('border');
            $table->double('transport_price');
            $table->double('coc_price');
            $table->double('custom_price');
            $table->double('balance_price');
            $table->double('total_price');
            $table->double('recive_price');
            $table->double('amount_price');
            $table->string('in_sh')->nullable();
            $table->string('inv_agr')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treats');
    }
};
