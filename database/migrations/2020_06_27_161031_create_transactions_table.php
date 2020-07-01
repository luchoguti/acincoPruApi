<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->uuid ('id_transaction')->primary();
            $table->double ('value_transaction',12,4);
            $table->char ('accounts_origin');
            $table->foreign('accounts_origin')->references('id_accounts')->on('accounts')->onDelete('cascade');
            $table->char ('accounts_addressee')->nullable();
            $table->foreign('accounts_addressee')->references('id_accounts')->on('accounts')->onDelete('cascade');
            $table->char ('id_atm')->nullable();
            $table->foreign('id_atm')->references('id_atm')->on('atms')->onDelete('cascade');
            $table->unsignedBigInteger ('type_transaction');
            $table->foreign('type_transaction')->references('id_type_transaction')->on('type_transactions')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
