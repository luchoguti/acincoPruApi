<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountingSeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounting_seats', function (Blueprint $table) {
            $table->uuid ('id_accounting_seat')->primary();
            $table->double ('debit',12,4);
            $table->double ('credit',12,4);
            $table->char ('id_transaction');
            $table->foreign('id_transaction')->references('id_transaction')->on('transactions')->onDelete('cascade');
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
        Schema::dropIfExists('accounting_seats');
    }
}
