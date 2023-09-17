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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('rrn', 10);
            $table->string('transaction', 25);
            $table->unsignedBigInteger('fk_id_user');
            $table->foreign('fk_id_user')->references('id')->on('users');
            $table->integer('total');
            $table->integer('commission');
            $table->integer('bank_commission');
            $table->string('card_name');
            $table->string('card_mask');
            $table->string('name',200)->nullable();
            $table->string('email',200)->nullable();
            $table->string('phone',30)->nullable();
            $table->string('inn',255)->nullable();
            $table->string('contract_number',255)->nullable();
            $table->tinyInteger('pay_status');
            $table->integer('bank_error_id')->nullable();
            $table->tinyInteger('type');
            $table->tinyInteger('purpose');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
