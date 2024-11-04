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
        Schema::create('exchange_rates', function (Blueprint $table) {
            $table->id(); // This also creates an unsignedBigInteger with auto-increment
            $table->unsignedBigInteger('currency_id'); // Ensure this is unsignedBigInteger
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->float('buying_rate');
            $table->float('selling_rate');

            // Foreign key reference to the currencies table
            $table->foreign('currency_id')
            ->references('id')
                ->on('currencies')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exchange_rates');
    }
};
