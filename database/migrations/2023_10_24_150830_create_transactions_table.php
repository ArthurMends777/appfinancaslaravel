<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('account_id');
            $table->date('transaction_date');
            $table->decimal('amount', 10, 2);
            $table->text('description')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->enum('transaction_type', ['income', 'expense']);
            $table->timestamps();

            $table->foreign('account_id')->references('id')->on('bank_accounts');
            $table->foreign('category_id')->references('id')->on('expense_categories');
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
