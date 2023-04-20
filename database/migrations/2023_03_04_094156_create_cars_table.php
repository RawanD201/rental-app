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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users', 'id')->onDelete('cascade');
            $table->string('car');
            $table->string('model');
            $table->string('color');
            $table->double('america_price');
            $table->double('dubai_transfer');
            $table->double('repair_price');
            $table->double('gumrk_price');
            $table->double('total_price');
            $table->double('sell_price')->default(0.00);
            $table->date('date');
            $table->timestamps();
            // $table->softDeletes();
            // $table->string('deleted_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
